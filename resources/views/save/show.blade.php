@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')
  <form method="POST" action="/save/{{ $b->id }}">
    @csrf
    @method('DELETE')
    <div class="pl-2">
      <span class="isbn">ISBN コード:</span><br>
      <span class="isbn">{{ $b->isbn }}</span>
    </div>
    <div class="pl-2">
      <span class="title">書名:</span><br>
      <span class="title">{{ $b->title }}</span>
    </div>
    <div class="pl-2">
      <span class="price">価格:</span><br>
      <span class="price">{{ $b->price }}</span>
    </div>
    <div class="pl-2">
      <span class="publisher">出版社:</span><br>
      <span class="publisher">{{ $b->publisher }}</span>
    </div>
    <div class="pl-2">
      <span class="published">刊行日:</span><br>
      <span class="published">{{ $b->published }}</span>
    </div>
    <div class="pl-2">
      <input type="submit" value="削除">
    </div>
  </form>
@endsection