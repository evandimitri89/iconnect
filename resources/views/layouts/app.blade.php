<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'iConnect')</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <link
    href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100..900&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@400;600;700&display=swap"
    rel="stylesheet">
</head>

<body class="font-[Inter,sans-serif] bg-gray-100">

  <div x-data="sidebar()" class="flex">
    <!-- SIDEBAR -->
    @include('layouts.partials.sidebar')

    <!-- MAIN WRAPPER -->
    <div class="transition-all duration-300 flex-1" :class="collapsed ? 'ml-16' : 'ml-60'">
      <main class="p-6 min-h-screen overflow-y-auto">
        <div class="bg-white rounded-xl shadow p-6 mb-6">
          <div class="flex items-start justify-between">
            <div>
              <div class="font-semi-bold text-xl text-gray-800">Good Evening,</div>
              <div class="font-bold text-2xl text-gray-800">{{ Auth::user()->name }}</div>
            </div>
          </div>
        </div>
        @yield('content')
      </main>
    </div>
  </div>

  <script src="//unpkg.com/alpinejs" defer></script>
</body>


</html>
