@extends('layouts.guest')

@section('content')
  <form method="POST" action="{{ route('register') }}" class="space-y-5">
    @csrf

    {{-- GLOBAL FORM ERROR --}}
    @if ($errors->any())
      <div class="p-3 text-sm text-red-700 bg-red-100 border border-red-300 rounded-lg">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Username --}}
    <div>
      <label for="username" class="block mb-2 text-sm font-medium text-gray-900">Username</label>
      <input type="text" name="username" id="username" value="{{ old('username') }}" placeholder="Enter your username"
        class="bg-gray-50 border @error('username') border-red-500 @else border-gray-300 @enderror 
        text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required />
      @error('username')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Email --}}
    <div>
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Email Address</label>
      <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Enter your email"
        class="bg-gray-50 border @error('email') border-red-500 @else border-gray-300 @enderror 
        text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
        required />
      @error('email')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Password --}}
    <div>
      <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Enter your password"
          class="bg-gray-50 border @error('password') border-red-500 @else border-gray-300 @enderror 
          text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-10 password"
          required />
        <i class="bi bi-eye absolute right-3 top-3 cursor-pointer text-gray-500 togglePassword"></i>
      </div>
      @error('password')
        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
      @enderror
    </div>

    {{-- Confirm Password --}}
    <div>
      <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900">Confirm Password</label>
      <div class="relative">
        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password"
          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 pr-10 password"
          required />
        <i class="bi bi-eye absolute right-3 top-3 cursor-pointer text-gray-500 togglePassword"></i>
      </div>
    </div>

    {{-- Button --}}
    <button type="submit"
      class="w-full text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300
      font-medium rounded-lg text-sm px-5 py-2.5 text-center">
      Register
    </button>

    <p class="text-sm text-center text-gray-600">
      Already have an account?
      <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Sign in</a>
    </p>
  </form>
@endsection

@php
  $title = 'iConnect Register';
  $subtitle = 'Create an account';
@endphp
