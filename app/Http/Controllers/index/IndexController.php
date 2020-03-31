<?php

namespace App\Http\Controllers\index;



use App\Http\Controllers\Controller;
use App\model\Book;
use Illuminate\Http\Request;
use App\model\User;
use App\model\fenlei;
use QRcode;

class IndexController extends Controller
{
    // 显示首页
    public function index()
    {
//        $fenlei = fenlei::get();
//        foreach ($fenlei as $k=>$v) {
//            $fenleiname[] = $v['fenlei_name'];
//        }

        $data = Book::orderBy('book_dianji','desc')->where(['book_type'=>2])->get();
        for($i=0;$i<5;$i++){
            $sou[$i]['book_name'] = $data[$i]['book_name'];
            $sou[$i]['book_dianji'] = $data[$i]['book_dianji'];
        }

        $yuepiao = Book::orderBy('book_yuepiao','desc')->where(['book_type'=>2])->get();
        for($i=0;$i<3;$i++){
            $yue[$i]['book_name'] = $yuepiao[$i]['book_name'];
            $yue[$i]['book_yuepiao'] = $yuepiao[$i]['book_yuepiao'];
        }
        $re = $sou;

        $name = session('name');

        return view('index/index',['sou'=>$sou,'name'=>$name,'yue'=>$yue,'re'=>$re,]);
    }

    //清空session
    public function session()
    {
        Session()->flush();
    }

}
