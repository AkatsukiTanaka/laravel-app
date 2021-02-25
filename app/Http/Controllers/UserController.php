<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;

class UserController extends Controller
{
    /**
    　* ログインフォーム表示アクション
    　*/
    public function signin()
    {
      return view('user.login');
    }
    /**
      * ログイン処理アクション
      */
    public function login(UserRequest $request)
    {
      $email    = $request->input('email');
      $password = $request->input('password');
      if (!Auth::attempt(['email' => $email, 'password' => $password])) {
        //認証失敗
        return redirect('/')->with('error_message', 'I failed to login');
      }
      //認証成功
      return redirect()->route('micropost.index');
    }

    /**
     * ログアウト処理アクション
     */
    public function logout()
    {
      Auth::logout();
      return redirect()->route('user.signin');
    }
}
