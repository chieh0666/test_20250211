<?php

namespace App\Http\Controllers;

use Hash;
use App\Shop\Entity\User;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Mail;
class UserAuthController extends Controller
{
    public function SignUpPage()
    {
        $blinding = [
            'title' => '註冊',
            'announcement' => '建立帳戶'
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

    public function SigninPage()
    {
        $blinding = [
            'title' => '登入',
            'announcement' => '登入帳戶'
        ];
        return view('auth.signin', $blinding);
    }

    public function SigninProcess()
    {
        $input = request()->all();
        // print_r($input);
        $tmpuser = User::where('email', $input['email'])->first();
        // dd($tmpuser);
        if (is_null($tmpuser)) {
            return redirect('/user/auth/signin')
                ->witherrors(['查無此帳號', '請重新輸入'])
                ->withinput();
        } else {
            // $after_password = Hash::make($input['password']);
            if (Hash::check($input['password'], $tmpuser['password'])) {
                session()->put('user_id', $tmpuser['id']);
                return redirect('/user/auth/signin')
                    ->witherrors(['密碼正確'])
                    ->withInput();
            } else {
                return redirect('/user/auth/signin')
                    ->witherrors(['密碼錯誤，請重新輸入!'])
                    ->withInput();
            }
        }
    }

    public function SigninOut()
    {
        session()->forget('user_id');
        return redirect('/user/auth/signin');
    }
}
