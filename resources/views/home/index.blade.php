<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Brand</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
@if (config("app.debug") === true)
    <link rel="stylesheet" href="http://localhost:9090/build/bundle.css">
@else
    <link rel="stylesheet" href="{{ elixir('main.css') }}">
@endif
</head>
<body>
<div id="app"></div>
@if (config("app.debug") === true)
    <script src="http://localhost:9090/build/bundle.js"></script>
@else
    <script src="{{ elixir('main.js') }}"></script>
@endif
</body>
</html>
