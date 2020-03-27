<?php

namespace App\Http\Controllers\index;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\User;
use QRcode;

class IndexController extends Controller
{

    //用户手机号登录
    public function tel()
    {
        return view('login/tel');
    }

    public function teldologin()
    {
        $tel = $_POST['tel'];
        $code = $_POST['code'];
    }

    // 显示首页
    public function index()
    {
        return view('index/index');
    }
    //登录
    public function login()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo "请输入用户名";die;
        }else{
            $where[] = [
                'name' =>$name
            ];
            $res1 = User::where($where)->first();
            if(empty($res1)){
                echo "用户名不存在";die;
            }else{
                $password = $res1['user_pwd'];
                $user_tel = $res1['user_tel'];
            }
        }
        $pwd = $_POST['pwd'];
        if(empty($pwd)){
            echo "请输入密码";die;
        }else{
            if($pwd != $password){
                echo "密码有误";die;
            }
        }
        $tel = $_POST['tel'];
        if(empty($tel)){
            echo "请输入电话";die;
        }
    }

}
