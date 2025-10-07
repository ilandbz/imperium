<!doctype html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <link rel="icon" href="/img/logo_solo.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @vite(['resources/css/app.css','resources/js/app.js'])
  @inertiaHead
</head>
<body class="antialiased bg-background text-neutral">
  @inertia
</body>
</html>