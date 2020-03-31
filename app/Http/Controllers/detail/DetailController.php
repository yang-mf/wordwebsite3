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
        $book_name = $_GET['book_name'];
        $detailinfo = Book::join('zuozhe', 'zuozhe.zuozhe_id', '=', 'book.zuozhe_id')->join('book_fenlei', 'book_fenlei.fenlei_id', '=', 'book.fenlei_id')->where(['book_name'=>$book_name])->first();
//        dd($detailinfo);
        $book_id = Book::where(['book_name'=>$book_name])->value('book_id');
        session(['buy_book_id'=>$book_id]);
        $book_dianji = $detailinfo['book_dianji'];
        $book_dianji = $book_dianji+1;
        Book::where(['book_name'=>$book_name])->update(['book_dianji'=>$book_dianji]);
        return view('detail/detail',['detailinfo'=>$detailinfo]);
    }
}
