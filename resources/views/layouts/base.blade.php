<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <p><img src="https://wings.msn.to/image/wings.jpg" alt="" title="ロゴ"></p>
  </div>
  <hr>
  <div class="container">
    @section('main')
    <p>既定のコンテンツです</p>
    @show
  </div>
  <hr>
  <div class="container">
    <p>Copyright(c) 1998-2022, WINGS Project. All Right Reserved.</p>
  </div>
</body>
</html>