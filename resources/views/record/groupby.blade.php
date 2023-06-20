@extends('layouts.base')

@section('title', 'レコード')

@section('main')
  <table class="table">
    <tr>
      <th>出版社</th>
      <th>価格</th>
    </tr>
    @foreach ($records as $record)
    <tr>
      <td>{{ $record->publisher }}</td>
      <td>{{ $record->price_avg }}</td>
    </tr>
    @endforeach
  </table>
@endsection