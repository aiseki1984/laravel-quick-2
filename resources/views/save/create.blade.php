@extends('layouts.base')

@section('title', '書籍情報フォーム')

@section('main')
  @if ($errors->any())
  <ul>
    @foreach ($errors->all() as $err)
      <li class="text-danger">{{ $err }}</li>
    @endforeach
  </ul>
  {{-- 特定の項目のエラーを取得したいなら first / get メソッドを利用します --}}
  {{-- {{
    // title項目の最初のエラー
    $erros->first('title');
    // title項目のすべてのエラー
    $erros->get('title');
  }} --}}

  @endif
  <form method="POST" action="/save">
    @csrf
    <div class="pl-2">
      <label for="isbn">ISBN コード:</label><br>
      <input id="isbn" name="isbn" type="text" size="15" value="{{ old('isbn') }}" class="@error('isbn') bg-danger @enderror">
      @error('isbn')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>
    <div class="pl-2">
      <label for="title">書名:</label><br>
      <input id="title" name="title" type="text" size="30" value="{{ old('title') }}">
    </div>
    <div class="pl-2">
      <label for="price">価格:</label><br>
      <input id="price" name="price" type="text" size="5" value="{{ old('price') }}">
    </div>
    <div class="pl-2">
      <label for="publisher">出版社:</label><br>
      <input id="publisher" name="publisher" type="text" size="10" value="{{ old('publisher') }}">
    </div>
    <div class="pl-2">
      <label for="published">刊行日:</label><br>
      <input id="published" name="published" type="text" size="10" value="{{ old('published') }}">
    </div>
    <input type="submit" value="送信">
  </form>
@endsection