@extends('layouts.base')

@section('title', '共通レイアウトの基本')
@section('main')
  <x-my-alert type="success" :alert-title="$title">
    コンポーネントは普通のビューと同じように .blaed.php ファイルで定義できます。
  </x-my-alert>
  <x-dynamic-component :component="$comp" type="success" :alert-title="$title">
    コンポーネントは普通のビューと同じように .blaed.php ファイルで定義できます。
  </x-dynamic-component>
  @include('components.my-alert', [
    'type' => 'success',
    'alertTitle' => '初めてのコンポーネント',
    'slot' => 'コンポーネントは普通のビューと同じように .blaed.php ファイルで定義できます。',
  ])
@endsection