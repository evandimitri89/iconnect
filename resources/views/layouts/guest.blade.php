<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>{{ $title ?? 'iConnect' }}</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">
  <!-- Wrapper -->
  <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
    <h1 class="text-2xl font-bold text-center">iConnect</h1>
    <p class="text-lg font-semibold text-center mb-6">
      {{ $subtitle ?? '' }}
    </p>

    <!-- Content -->
    @yield('content')
  </div>
</body>

</html>
