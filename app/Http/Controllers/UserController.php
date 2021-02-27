<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Auth;
use App\User;
use Hash;

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

    /**
     * ユーザ登録ページ表示アクション
     */
    public function create()
    {
      return view('user.create');
    }

    /**
     * ユーザ登録処理アクション
     */
    public function store(UserRequest $request)
    {
      $user     = new User;
      $name     = $request->input('name');
      $email    = $request->input('email');
      $password = $request->input('password');
      $params   = [
        'name'     => $name,
        'email'    => $email,
        'password' => Hash::make($password),
      ];
      if (!$user->userSave($params)) {
        return redirect()->route('user.create')->with('error_message', 'User registration failed');
      }
      if (!Auth::attempt(['email' => $email, 'password' => $password])) {
        return redirect()->route('user.signin')->with('error_message', 'I failed to login');
      }
      return redirect()->route('micropost.index');
    }
}
