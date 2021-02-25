<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ログインフォーム表示アクション
     */
    public function login()
    {
      return view('user.login');
    }
}
