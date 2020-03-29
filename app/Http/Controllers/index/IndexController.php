<?php

namespace App\Http\Controllers\index;



use App\Http\Controllers\Controller;
use App\model\Book;
use Illuminate\Http\Request;
use App\model\User;
use QRcode;

class IndexController extends Controller
{
    // 显示首页
    public function index()
    {
        $data = Book::orderBy('dianji','desc')->get();
        for($i=0;$i<5;$i++){
            $sou[$i]['shuming'] = $data[$i]['shuming'];
            $sou[$i]['dianji'] = $data[$i]['dianji'];
        }

        $name = session('name');

        return view('index/index',['sou'=>$sou,'name'=>$name]);
    }

    //显示热搜词
    public function session()
    {
        Session()->flush();
    }

}
