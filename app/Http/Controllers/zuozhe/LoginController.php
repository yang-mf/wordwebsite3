<?php

namespace App\Http\Controllers\zuozhe;

use App\Http\Controllers\Controller;
use App\model\Book;
use App\model\zuozhe;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //注册页面
    public function zhuce()
    {
        return view('zuozhe/zhuce');
    }

    //执行注册
    public function dozhuce()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo '作者笔名不能为空';die;
        }
        $code = $_POST['code'];
        if(empty($code)){
            echo '身份证';die;
        }elseif ($this->is_idcard($code) == false)
        {
            echo '身份证信息有误';die;
        }
        $pwd = $_POST['pwd'];
        if(empty($pwd)){
            echo '密码有误';die;
        }
        $data=[
            'name'=>$name,
            'code'=>$code,
            'pwd'=>$pwd
        ];
        $res = zuozhe::insert($data);
        if($res){
            session(['name'=>$name]);
            return redirect('/zuozhe/add');die;
        }
    }

    //显示登录页面
    public function denglu()
    {
        return view('/zuozhe/denglu');
    }

    public function dodenglu()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo '作者笔名不能为空';die;
        }
        $data = zuozhe::where(['name'=>$name])->first();
        $userpwd = $data['pwd'];
        $pwd = $_POST['pwd'];
        if(empty($pwd)){
            echo '有误';die;
        }elseif ($pwd !=$userpwd){
            echo '用户密码有误';die;
        }else{
            session(['name'=>$name]);
            return redirect('/zuozhe/add');die;
        }
    }

    //添加作品页面
    public function add()
    {
        return view('/zuozhe/add');
    }

    public function doadd(Request $request)
    {
        $name = session('name');
        $user_id= zuozhe::where(['name'=>$name])->value('zuozhe_id');
        if(empty($user_id)){
            echo '请先登录';die;
        }
        $shuming = $_POST['shuming'];
        $zuozhe = $_POST['zuozhe'];
//        $dat = $request->all();//接收所有的
        $file = $request->file("img");//接前台图片
//        print_r($file);die;
        $file_path=$file->getClientOriginalName();//图片路径
        $data = $file->move('img',$file_path);
        $img_path=$data;
        $book_info = [
            'shuming'=>$shuming,
            'zuozhe'=>$zuozhe,
            'img'=>$img_path,
            'zuozhe_id'=>$user_id,
            'booke_num'=>1
        ];
        $res = Book::insert($book_info);
        if($res){
            echo '提交成功';die;
        }else{
            echo '提交失败';die;
        }
    }


    //身份证验证
    function is_idcard($id)
    {
        $id = strtoupper($id);
        $regx = "/(^\d{15}$)|(^\d{17}([0-9]|X)$)/";
        $arr_split = array();
        if (!preg_match($regx, $id)) {
            return false;
        }
        if (15 == strlen($id)) //检查15位
        {
            $regx = "/^(\d{6})+(\d{2})+(\d{2})+(\d{2})+(\d{3})$/";
            @preg_match($regx, $id, $arr_split);
            //检查生日日期是否正确
            $dtm_birth = "19" . $arr_split[2] . '/' . $arr_split[3] . '/' . $arr_split[4];
            if (!strtotime($dtm_birth)) {
                return false;
            } else {
                return true;
            }
        } else //检查18位
        {
            $regx = "/^(\d{6})+(\d{4})+(\d{2})+(\d{2})+(\d{3})([0-9]|X)$/";
            @preg_match($regx, $id, $arr_split);
            $dtm_birth = $arr_split[2] . '/' . $arr_split[3] . '/' . $arr_split[4];
            if (!strtotime($dtm_birth)) //检查生日日期是否正确
            {
                return false;
            } else {
                //检验18位身份证的校验码是否正确。
                //校验位按照ISO 7064:1983.MOD 11-2的规定生成，X可以认为是数字10。
                $arr_int = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2);
                $arr_ch = array('1', '0', 'X', '9', '8', '7', '6', '5', '4', '3', '2');
                $sign = 0;
                for ($i = 0; $i < 17; $i++) {
                    $b = (int) $id{$i};
                    $w = $arr_int[$i];
                    $sign += $b * $w;
                }
                $n = $sign % 11;
                $val_num = $arr_ch[$n];
                if ($val_num != substr($id, 17, 1)) {
                    return false;
                } else {
                    return true;
                }
            }
        }
    }

}
