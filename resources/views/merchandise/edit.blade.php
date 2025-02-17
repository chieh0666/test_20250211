<!-- 指定繼承 layout.master 母模板 --> 
@extends('layout.master') 

<!-- 傳送資料到母模板，並指定變數為 title --> 
@section('title', $title) 

<!-- 傳送資料到母模板，並指定變數為 content -->
@section('content') 

@include('component.errors')

<h1>{{ $announcement }}</h1>

<form action="/merchandise/{{ $merchandise->id }}/edit" method="post">
  @csrf
  商品名稱：
  <input type="text" name="name" placeholder="商品名稱：" value="{{ old('name', $merchandise->name) }}"><br/>
  商品英文名稱：
  <input type="text" name="name_en" placeholder="商品英文名稱" value="{{ old('name_en', $merchandise->name_en) }}"><br/>
  商品介紹：
  <textarea type="text" name="introduction" placeholder="商品介紹">{{ old('introduction', $merchandise->introduction) }}</textarea><br/>
  商品英文介紹：
  <textarea type="text" name="introduction_en" placeholder="商品英文介紹">{{ old('introduction_en', $merchandise->introduction_en) }}</textarea><br/>
  <input type="submit" value="儲存">
</form>

@endsection

{{-- 'status' => 'C',
'name' => '',
'name_en' => '',
'introduction' => '',
'introduction_en' => '',
'photo' => '',
'price' => 0,
'remain_count' => 0, --}}
