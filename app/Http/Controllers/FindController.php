<?php

namespace App\Http\Controllers;

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
                'shuming'=>$word
            ];
            $data = Book::where($where)->first();
            if(empty($data)){
                $where=[
                    'zuozhe'=>$word
                ];
                $data = Book::where($where)->first();
                if(empty($data)){
                    echo "您搜索的书籍或作者不存在";die;
                }
                echo '作者：';print_r($data['zuozhe']);echo '<br>';
                echo '书名：';print_r($data['shuming']);echo '<br>';
                echo '月票：';print_r($data['yuepiao']);echo '<br>';
                echo '元：';print_r($data['yuan']);echo '<br>';
                echo '点击：';print_r($data['dianji']);echo '<br>';
                if($data){
                    $dianji = $data['dianji'];
                    $dianji = $dianji+1;
                    Book::where($where)->update(['dianji'=>$dianji]);
                }
                die;
            }
            $dianji = $data['dianji'];
            $dianji = $dianji+1;
            Book::where($where)->update(['dianji'=>$dianji]);
            echo '作者：';print_r($data['zuozhe']);echo '<br>';
            echo '书名：';print_r($data['shuming']);echo '<br>';
            echo '月票：';print_r($data['yuepiao']);echo '<br>';
            echo '元：';print_r($data['yuan']);echo '<br>';
            echo '点击：';print_r($data['dianji']);echo '<br>';
            die;
        }
    }
}
