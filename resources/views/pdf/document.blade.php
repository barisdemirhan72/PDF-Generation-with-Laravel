<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: sans-serif; }
        h1 { color: #333; }
        .date { font-style: italic; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p class="date">Tarih: {{ $date }}</p>
    <hr>
    <p>{{ $content }}</p>
</body>
</html>