<?php

namespace App\Http\Controllers\detail;

use App\Http\Controllers\Controller;
use App\model\Book;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //显示详情页
    public function detail()
    {
        $shuming = $_GET['shuming'];
        $detailinfo = Book::where(['shuming'=>$shuming])->first();
        $dianji = $detailinfo['dianji'];
        $dianji = $dianji+1;
        Book::where(['shuming'=>$shuming])->update(['dianji'=>$dianji]);
        return view('detail/detail',['detailinfo'=>$detailinfo]);
    }
}
