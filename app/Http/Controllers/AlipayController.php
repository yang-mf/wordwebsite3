<?php

namespace App\Http\Controllers;

use App\model\Book;
use App\model\buycate;
use \App\model\User;
use Illuminate\Http\Request;

class AlipayController extends Controller
{
    //显示购买页面
    public function show()
    {
        return view('/pay/show');
    }

    //支付显示页面
    public function pay()
    {
        $yuepiao = $_POST['yuepiao'];
        $book_id = session('buy_book_id');
        $usrename = session('name');
        if(!empty($usrename)){
            $user_id = User::where(['user_name'=>$usrename])->value('user_id');
            if(empty($user_id)){
                $user_id = User::where(['user_tel'=>$usrename])->value('user_id');
            }
        }
        if(empty($user_id)){
            echo '请先登录';die;
        }
        include public_path('pay/config.php') ;
        include public_path('pay/pagepay/service/AlipayTradeService.php') ;
        include public_path('pay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php') ;
//        include './public/pay/pagepay/service/AlipayTradeService.php';
//        include './public/pay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = time().rand(000,999);

        //订单名称，必填
        $subject = '月票购买进行';

        //付款金额，必填
        $total_amount = $yuepiao;

        //商品描述，可空
        $body = '购买月票';

        $data=[
            'buy_code'=>$out_trade_no,
            'user_id'=>$user_id,
            'buy_num'=>$yuepiao,
            'book_id'=>$book_id,
            'buy_type'=>1
        ];

        $res = buycate::insert($data);
        if(!$res){
            echo "创建订单失败";die;
        }


        //构造参数
        $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setOutTradeNo($out_trade_no);

        $aop = new \AlipayTradeService($config);

        /**
         * pagePay 电脑网站支付请求
         * @param $builder 业务参数，使用buildmodel中的对象生成。
         * @param $return_url 同步跳转地址，公网可以访问
         * @param $notify_url 异步通知地址，公网可以访问
         * @return $response 支付宝返回的信息
         */
        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

        //输出表单
        var_dump($response);
    }

    public function return_url()
    {
        include public_path('pay/config.php') ;
        include public_path('pay/pagepay/service/AlipayTradeService.php') ;
        $aop = new \AlipayTradeService($config);
        $data = $_GET;

        $result = $aop->check($data);
        $ali_code = $data['out_trade_no'];
        $ali_num = $data['total_amount'];
        $buyinfo = buycate::where(['buy_code'=>$ali_code])->first();
        $book_yuepiao = Book::where(['book_id'=>$buyinfo['book_id']])->value('book_yuepiao');
        $new_book_yuepiao = $book_yuepiao+$ali_num;
        $res1 = Book::where(['book_id'=>$buyinfo['book_id']])->update(['book_yuepiao'=>$new_book_yuepiao]);
        if(!$res1){
            file_put_contents('notify_info.log','月票修改失败');exit;
        }
        if( ! $result){
            echo '订单有误';die;
        }else{
            echo "支付成功";
            echo '<a href="/index">请点击此处跳转首页</a>';
            die;
        }
    }

    public function notify_url()
    {
        include public_path('pay/config.php') ;
        include public_path('pay/pagepay/service/AlipayTradeService.php') ;
        $aop = new \AlipayTradeService($config);
        $data = $_POST;
        $result = $aop->check($data);
        if( ! $result){
            echo '订单有误';die;
        }
        $ali_code = $data['out_trade_no'];
        $ali_num = $data['total_amount'];
        $app_id=$data['app_id'];
        $buyinfo = buycate::where(['buy_code'=>$ali_code])->first();
        if(empty($buyinfo)){
            file_put_contents('notify_info.log','订单号码有误');exit;
        }
        if($ali_num!=$buyinfo['buy_num']){
            file_put_contents('notify_info.log','订单金额有误');exit;
        }
        if($app_id!=$config['app_id']){
            file_put_contents('notify_info.log','应用id有误');exit;
        }

        $book_yuepiao = $buyinfo['book_yuepiao'];
        $new_book_yuepiao = $book_yuepiao+$ali_num;
        $res1 = Book::where(['book_id'=>$buyinfo['book_id']])->update(['book_yuepiao'=>$new_book_yuepiao]);
        if(!$res1){
            file_put_contents('notify_info.log','月票修改失败');exit;
        }
        $res2 = buycate::where(['buy_code'=>$ali_code])->pudate(['buy_type'=>2]);
        if($res2){
            file_put_contents('notify_info.log','订单支付成功');exit;
        }else{
            file_put_contents('notify_info.log','订单状态修改失败，请手动修改');exit;
        }
    }
}
