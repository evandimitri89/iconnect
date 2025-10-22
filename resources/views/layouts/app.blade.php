<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'iConnect')</title>
  @vite('resources/css/app.css')
  <link
    href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
</head>

<body class="font-[Inter,sans-serif] bg-gray-100">

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
