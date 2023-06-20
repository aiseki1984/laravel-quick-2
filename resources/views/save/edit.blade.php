@extends('layouts.base')

@section('title', '書籍情報フォーム（編集）')

@section('main')
  <form method="POST" action="/save/{{ $b->id }}">
    @csrf
    {{-- 疑似的にHTTPメソッドを宣言 --}}
    {{-- HTML標準の<form>は、GET/POSTにしか対応していないので --}}
    @method('PATCH')
    <div class="pl-2">
      <label for="isbn">ISBN コード:</label><br>
      <input id="isbn" name="isbn" type="text" size="15" value="{{ old('isbn', $b->isbn) }}">
    </div>
    <div class="pl-2">
      <label for="title">書名:</label><br>
      <input id="title" name="title" type="text" size="30" value="{{ old('title', $b->title) }}">
    </div>
    <div class="pl-2">
      <label for="price">価格:</label><br>
      <input id="price" name="price" type="text" size="5" value="{{ old('price', $b->price) }}">
    </div>
    <div class="pl-2">
      <label for="publisher">出版社:</label><br>
      <input id="publisher" name="publisher" type="text" size="10" value="{{ old('publisher', $b->publisher) }}">
    </div>
    <div class="pl-2">
      <label for="published">刊行日:</label><br>
      <input id="published" name="published" type="text" size="10" value="{{ old('published', $b->published) }}">
    </div>
    <input type="submit" value="更新">
  </form>
@endsection