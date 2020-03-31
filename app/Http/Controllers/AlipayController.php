<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AlipayController extends Controller
{
    //显示购买页面
    public function show()
    {
        return view('pay/show');
    }

    //支付显示页面
    public function pay()
    {
        $yuepiao = $_POST['yuepiao'];
        include './config.php';
        include './AlipayTradeService.php';
        include './AlipayTradePagePayContentBuilder.php';

        //商户订单号，商户网站订单系统中唯一订单号，必填
        $out_trade_no = time().rand(000,999);

        //订单名称，必填
        $subject = '月票购买进行';

        //付款金额，必填
        $total_amount = $yuepiao;

        //商品描述，可空
        $body = '购买月票';

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

}
