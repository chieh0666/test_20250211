<!-- 指定繼承 layout.master 母模板 --> 
@extends('layout.master') 

<!-- 傳送資料到母模板，並指定變數為 title --> 
@section('title', $title) 

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content') 

<h1>{{ $announcement }}</h1>

{{-- @include('component.social-button') --}}

<form action="/user/auth/signup" method="post">
  @csrf
  Email： <input type="text" name="email" placeholder="Email" ><br/>
  密碼： <input type="password" name="password" placeholder="密碼" ><br/>
  暱稱： <input type="text" name="nickname" placeholder="暱稱" ><br/>
  使用者類型：<br/>
  <input type="radio" name="userType" value="user">一般使用者
  <input type="radio" name="userType" value="admin">管理員<br/>
  <input type="submit" value="註冊"><br/>
</form>

@endsection
