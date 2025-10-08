<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'iConnect')</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

  {{-- Sidebar fixed --}}
  @include('layouts.partials.sidebar')

  {{-- Main Content --}}
  <div class="ml-60 flex-1 min-h-screen flex flex-col">
    <main class="p-6 overflow-y-auto">
      @yield('content')
    </main>
  </div>

  <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
