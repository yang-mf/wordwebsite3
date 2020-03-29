<?php

namespace App\Http\Controllers\index;

include "../app/Tools/phpqrcode.php";

use App\Http\Controllers\Controller;
use App\model\Book;
use Illuminate\Http\Request;
use App\model\User;
use phpDocumentor\Reflection\Location;
use QRcode;

class LoginController extends Controller
{

    //用户手机号登录显示页面
    public function tel()
    {

        return view('login/tel');
    }

    public function teldologin()
    {
        $tel = $_POST['tel'];
        if(empty($tel)){
            echo "请输入您的手机号";
        }
        $code = $_POST['code'];

        $session_code = session('code');
//        echo $session_code;die;
        if($code != $session_code){
            echo "请输入正确的验证码";
        }

        $pwd = $_POST['pwd'];

        $userdata[] =[
            'user_tel'=>$tel,
            'user_pwd'=>$pwd
        ];
        $res = User::insert($userdata);
        if($res){
            session(['name'=>$tel]);

            $data = Book::orderBy('dianji','desc')->get();
            for($i=0;$i<5;$i++){
                $sou[$i]['shuming'] = $data[$i]['shuming'];
                $sou[$i]['dianji'] = $data[$i]['dianji'];
            }

            $name = session('name');

            return view('index/index',['sou'=>$sou,'name'=>$name]);
        }
    }

    //用户登录显示页面
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
                return view('/index',['name'=>$name]);
                die;
            }
        }
    }
    //微信登陆显示页面
    public function wechat()
    {
        $uid = uniqid();
        $url = "http://wordwebsite3.13366737021.top/aouth?uid=".$uid;
        $obj = new QRcode();
        $data = $obj::png($url,'../public/1.png');
        return view('login/wechat');
    }

    public function aouth()
    {
        $uid = $_GET['uid'];
        $id = "wx9458fefe0c30d65b";
        $uri = urlencode("http://wordwebsite3.13366737021.top/forlogin");
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$id&redirect_uri=$uri&response_type=code&scope=snsapi_userinfo&state=$uid#wechat_redirect";
//        echo $url;die;
        header("location:$url");
    }

    public function forlogin()
    {
        echo $_GET['code'];
    }
}
