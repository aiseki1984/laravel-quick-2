@extends('layouts.base')

@section('title', 'リストの基本')

@section('main')
  <table class="table">
    <tr>
      <th>No.</th>
      <th>書名</th>
      <th>価格</th>
      <th>出版社</th>
      <th>刊行日</th>
    </tr>
    @each('subviews.block', $records, 'record', 'subviews.empty')
    {{-- @foreach ($records as $id => $record)
    <tr>
      <td>{{ $id + 1 }}</td>
      <td>{{ $record->title }}</td>
      <td>{{ $record->price }} 円</td>
      <td>{{ $record->publisher }}</td>
      <td>{{ $record->published }}</td>
    </tr>
    @endforeach --}}
  </table>
@endsection
