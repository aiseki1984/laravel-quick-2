<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>laravelView側タイトル</title>
    <!-- @\viteReactRefresh は @\vite() より先に読み込む必要がある -->
    @viteReactRefresh
    <!-- @\vite() ではエントリポイントとなるファイルを指定 -->
    @vite([
      'resources/css/app.css',
      'resources/scss/app.scss',
      'resources/ts/index.tsx',
    ])
</head>
<body>
    <!-- index.tsxの内容を追加する部分 -->
    <h1>これはindex.blade.phpです。</h1>
    <div class="test-module">nekoneko</div>
    <div id="app"></div>
</body>
</html>
