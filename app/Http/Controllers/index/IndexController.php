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
        $fenlei = Book::get();
        foreach ($fenlei as $k => $v)
        {
            $count = count($fenlei);
            for($i=0;$i<$count;$i++)
            {
                $fenleiinfo[$i] = $v['fenlei'];
            }
        }
        $data = Book::orderBy('dianji','desc')->get();
        for($i=0;$i<5;$i++){
            $sou[$i]['shuming'] = $data[$i]['shuming'];
            $sou[$i]['dianji'] = $data[$i]['dianji'];
        }

        $yuepiao = Book::orderBy('yuepiao','desc')->get();
        for($i=0;$i<3;$i++){
            $yue[$i]['shuming'] = $yuepiao[$i]['shuming'];
            $yue[$i]['yuepiao'] = $yuepiao[$i]['yuepiao'];
        }

        $name = session('name');

        return view('index/index',['sou'=>$sou,'name'=>$name,'yue'=>$yue]);
    }

    //清空session
    public function session()
    {
        Session()->flush();
    }

}
