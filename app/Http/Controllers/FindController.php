<?php

namespace App\Http\Controllers;

use App\model\zuozhe;
use Illuminate\Http\Request;
use App\model\Book;

class FindController extends Controller
{
    //根据输入的书名或者作者查找
    public function word()
    {
        $word = $_POST['word'];
        if(empty($word)){
            echo "您搜索的书籍或作者不存在";die;
        }else{
            $where=[
                'book_name'=>$word
            ];
            $data = Book::where($where)->join('zuozhe', 'zuozhe.zuozhe_id', '=', 'book.zuozhe_id')->join('book_fenlei', 'book_fenlei.fenlei_id', '=', 'book.fenlei_id')->first();
            if(empty($data)){
                $where=[
                    'zuozhe_name'=>$word
                ];
                $data = zuozhe::where($where)->first();
                $zuozhe_id=$data['zuozhe_id'];
                $data = Book::where(['book.zuozhe_id'=>$zuozhe_id])->join('book_fenlei', 'book_fenlei.fenlei_id', '=', 'book.fenlei_id')->join('zuozhe', 'zuozhe.zuozhe_id', '=', 'book.zuozhe_id')->get();
                if(empty($data)){
                    echo "您搜索的书籍或作者不存在";die;
                }
                foreach ($data as $k => $v) {
                        $book_name[]=$v['book_name'];

                }
                foreach ($book_name as $k=>$v){
                    echo '书名：';echo "<a href='/detail?book_name=".$v."'>".($v)."</a>";echo '<br>';
                }
                die;
            }
            $book_dianji = $data['book_dianji'];
            $book_dianji = $book_dianji+1;
            Book::where($where)->update(['book_dianji'=>$book_dianji]);
            echo '作者：';print_r($data['zuozhe_name']);echo '<br>';
            echo '书名：';print_r($data['book_name']);echo '<br>';
            echo '月票：';print_r($data['book_yuepiao']);echo '<br>';
            echo '分类：';print_r($data['fenlei_name']);echo '<br>';
            echo '点击：';print_r($data['book_dianji']);echo '<br>';
            die;
        }
    }
}
