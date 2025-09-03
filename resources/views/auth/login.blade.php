<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>iConnect Login</title>
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body class="min-h-screen flex items-center justify-center bg-gray-100">

  <!-- Form -->
  <div class="w-full max-w-md bg-white shadow-lg rounded-xl p-8">
    <h1 class="text-2xl font-bold text-center">iConnect</h1>
    <p class="text-lg font-semibold text-center mb-6">Sign in</p>

    <form class="space-y-5">
      <!-- Email -->
      <div>
        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
        <input type="email" id="email" placeholder="Enter your email"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                      focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
          required />
      </div>

      <!-- Password -->
      <div>
        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
        <div class="relative">
          <input type="password" id="password" placeholder="Enter your password"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                        focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10"
            required />
          <i id="togglePassword" class="bi bi-eye absolute right-3 top-3 cursor-pointer text-gray-500"></i>
        </div>
        <div class="text-right mt-1">
          <a href="#" class="text-xs text-blue-600 hover:underline">Forgot Your Password?</a>
        </div>
      </div>

      <!-- Button -->
      <button type="submit"
        class="w-full text-white bg-blue-600 hover:bg-blue-700 
                    focus:ring-4 focus:outline-none focus:ring-blue-300 
                    font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        Sign in
      </button>
      <p class="text-sm text-center text-gray-600">
        Don't have an account?
        <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Sign Out</a>
      </p>
    </form>
  </div>

</body>

</html>
