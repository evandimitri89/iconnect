<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'iConnect')</title>
  @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

  <div class="flex min-h-screen">
    {{-- Sidebar --}}
    @include('layouts.partials.sidebar')

    <div class="flex-1 flex flex-col">
      {{-- Main Content --}}
      <main class="p-6">
        @yield('content')
      </main>

    </div>
  </div>
  <script src="//unpkg.com/alpinejs" defer></script>

</body>

</html>
