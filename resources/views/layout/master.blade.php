<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title') - Shop Laravel</title>
  <script src="/assets/js/jquery-2.2.4.min.js" defer></script> 
  <script src="/assets/js/bootstrap.min.js" defer></script> 
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
</head>
<body>
  <header>
    @if(session()->has('user_id'))
    <a href="/user/auth/signout">登出</a>
    @else
    <a href="/user/auth/signup">註冊</a>
    <a href="/user/auth/signin">登入</a>
    @endif
  </header> 
  <div class="container"> 
    @yield('content') 
  </div> 
  <footer> 
    <a href="#">聯絡我們</a> 
  </footer>
</body>
</html>