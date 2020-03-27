<?php

namespace App\Http\Controllers\index;

include "../app/Tools/phpqrcode.php";

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\model\User;
use QRcode;

class LoginController extends Controller
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
        $pwd = $_POST['pwd'];
    }

    //用户登录

    public function user()
    {
        return view('login/user');
    }

    public function userdologin()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo "请输入用户名";die;
        }else{
            $where = [
                'user_name' =>$name
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
            }else{

                return view('/index')->with('name', $name);
                die;
            }
        }
    }

    public function wechat()
    {

        //下载phpqrcode类
        //引入phpqrcode类
        //区分是谁  登录的  生成一个用户标识  来区分是谁登录的
        $uid = uniqid();
//        echo $uid;die;
        $url = "http://wordwebsite.11905.com/aouth?uid=".$uid;

        $obj = new QRcode();

        $data = $obj::png($url,'../public/1.png');
        return view('login/wechat');

//        $obj->png($url,'./1.png');

    }

    public function aouth()
    {
        $uid = $_GET['uid'];
        $id = "wx9458fefe0c30d65b";
        $uri = urlencode("http://wordwebsite.11905.com/forlogin");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$id&redirect_uri=$uri&response_type=code&scope=SCOPE&state=$uid#wechat_redirect";
        echo $url;die;
//        header("location:$url");
    }

    public function forlogin()
    {
        echo $_GET['echostr'];
    }
}
