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
  <div class="container">
    <ul>
      <li><a href="/save/create">CREATE</a></li>
    </ul>
    <table class="table">
      <tr>
        <th>書名</th>
        <th>価格</th>
        <th>出版社</th>
        <th>刊行日</th>
        <th></th>
      </tr>
      @foreach ($records as $record)
      <tr>
        <td>{{ $record->title }}</td>
        <td>{{ $record->price }} 円</td>
        <td>{{ $record->publisher }}</td>
        <td>{{ $record->published }}</td>
        <td>
          <a href="/save/{{ $record->id }}/edit">編集</a> | 
          <a href="/save/{{ $record->id }}">削除</a>
        </td>
      </tr>
      @endforeach
    </table>
  </div>
</body>
</html>