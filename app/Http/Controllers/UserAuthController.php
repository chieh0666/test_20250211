<?php

namespace App\Http\Controllers;

class UserAuthController extends Controller
{
    public function Login()
    {
        return 12398989898;
    }

    public function Search($user_id)
    {
        return '您輸入的是:' . $user_id;
    }

    public function SignUp()
    {
        $blinding = [
            'title' => '註冊',
            'announcement' => '使用者建立帳戶頁面'
        ];
        return view('auth.signup', $blinding);
    }
}
