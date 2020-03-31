<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\model\admin;
use App\model\Book;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //注册页面
    public function zhuce()
    {
        return view('admin/zhuce');
    }

    //执行注册
    public function dozhuce()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo '昵称不能为空';die;
        }
        $pwd = $_POST['pwd'];
        if(empty($pwd)){
            echo '密码有误';die;
        }
        $data=[
            'name'=>$name,
            'pwd'=>$pwd
        ];
        $res = admin::insert($data);
        if($res){
            session(['name'=>$name]);
            return redirect('/admin/show');die;
        }
    }

    //显示登录页面
    public function denglu()
    {
        return view('/admin/denglu');
    }

    public function dodenglu()
    {
        $name = $_POST['name'];
        if(empty($name)){
            echo '昵称不能为空';die;
        }
        $data = admin::where(['name'=>$name])->first();
        $userpwd = $data['pwd'];
        $pwd = $_POST['pwd'];
        if(empty($pwd)){
            echo '密码';die;
        }elseif ($pwd !=$userpwd){
            echo '用户密码有误';die;
        }else{
            session(['name'=>$name]);
            return redirect('/admin/show');die;
        }
    }

    public function show()
    {
        $data = Book::where(['book_num'=>1])->get();
        return view('/admin/show',['data'=>$data]);
    }
    public function showzhang()
    {
        $data = Book::where(['book_num'=>1])->get();
        return view('/admin/show',['data'=>$data]);
    }

}
