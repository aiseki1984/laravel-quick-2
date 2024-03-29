@extends('layouts.base')

@section('title', 'フォームの基本')

@section('main')
@if (session('alert'))
  <div class="alert">{{ session('alert') }}</div>
@endif
<form method="POST" action="/ctrl/result">
  @csrf
  <label for="name">名前: </label>
  <input id="name" name="name" type="text" value=""/>
  <input type="submit" value="送信" />
  <p>{{ $result }}</p>
</form>
@endsection