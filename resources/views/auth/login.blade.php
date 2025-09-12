@extends('layouts.guest')

@section('content')
  <form method="POST" action="{{ route('login') }}" class="space-y-5">
    @csrf
    <!-- Email -->
    <div>
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
      <input type="email" name="email" id="email" placeholder="Enter your email"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required />
    </div>

    <!-- Password -->
    <div>
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Enter your password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 pr-10"
          required />
        <i class="bi bi-eye absolute right-3 top-3 cursor-pointer text-gray-500 togglePassword"></i>
      </div>
      <div class="text-right mt-1">
        <a href="#" class="text-xs text-blue-600 hover:underline">Forgot Your Password?</a>
      </div>
    </div>

    <!-- Button -->
    <button type="submit"
      class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Sign in
    </button>

    <p class="text-sm text-center text-gray-600">
      Don't have an account?
      <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Register</a>
    </p>
  </form>
@endsection

@php
  $title = 'iConnect Login';
  $subtitle = 'Sign in';
@endphp
