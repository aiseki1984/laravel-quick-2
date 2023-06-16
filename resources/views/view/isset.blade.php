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
  @isset($msg)
    <p>変数msgは「{{ $msg }}」です。</p>
    @else
    <p>変数msgはありません</p>
  @endisset
  @isset($random)
    <p>変数randomは「{{ $random }}」です。</p>
  @endisset
  @empty($random)
    <p>変数randomは存在しません。</p>
  @endempty
</body>
</html>