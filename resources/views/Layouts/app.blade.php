<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','MonApp')</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="antialiased font-sans bg-gray-50 text-gray-900">

  @include('partials.navbar')

  <div class="container mx-auto px-6 mt-6">
    @yield('content')
  </div>

  <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
