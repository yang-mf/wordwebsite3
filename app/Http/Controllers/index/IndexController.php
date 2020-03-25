<?php

namespace App\Http\Controllers\index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // 显示首页
    public function index()
    {
        return view('index/index');
    }

    //登录
    public function login()
    {
        echo 55;
    }
}
