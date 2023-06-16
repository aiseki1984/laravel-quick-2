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
  @switch($random)
    @case(5)
      <p>大ラッキーの1日です。</p>
      @break
    @case(4)
      <p>ちょっぴりいいことがあるかも？</p>
      @break
    @case(3)
      <p>ふつーの1日です。</p>
      @break
    @case(2)
      <p>今日は静かに過ごしましょう。。。</p>
      @break
    @default
      <p>ummm...</p>
  @endswitch
</body>
</html>