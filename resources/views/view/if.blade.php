<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>速習Laravel</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
  @if($random < 50)
    <p>{{ $random }} は 50 未満です。</p>
  @elseif($random < 70)
    <p>{{ $random }} は 50 以上 70 未満です。</p>
  @else
    <p>{{ $random }} は 70 以上です。</p>
  @endif
  @env('local')
  <p>appname</p>
  @endenv
</body>
</html>