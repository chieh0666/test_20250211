<?php

namespace App\Http\Controllers;

use Hash;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\Mail;
class UserAuthController extends Controller
{
    public function SignUpPage()
    {
        $blinding = [
            'title' => '註冊',
            'announcement' => '使用者建立帳戶頁面'
        ];
        return view('auth.signup', $blinding);
    }

    public function SignUpProcess()
    {
        $input = request()->all();
        if ($input['nickname'] == '') {
            return redirect('/user/auth/signup')
                    ->withErrors(['暱稱不得為空','請重新輸入'])
                    ->withInput();
        } else if ($input['password'] == '') {
            print('密碼不得為空');
            return redirect('/user/auth/signup')
                    ->withErrors(['暱稱不得為空','請重新輸入'])
                    ->withInput();
        } else if ($input['password'] && User::where('email', $input['email'])->count() > 0) {
            return redirect('/user/auth/signup')
                    ->withErrors(['密碼已被註冊','請重新輸入'])
                    ->withInput();
        } else {
            $input['password'] = Hash::make($input['password']);
            User::create($input);
            print_r($input);

            Mail::send('email.signUpEmailNotification',
                        ['nickname' => $input['nickname']],
                        function($message) use ($input) {
                            $message->to($input['email'], $input['nickname'])
                            ->from('gtaped14876@gmail.com')
                            ->subject('Laravel 8 Mail Test');
            });
    
        }
    }
}
