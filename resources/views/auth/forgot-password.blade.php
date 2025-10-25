@extends('layouts.guest')

@section('content')
  <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
    @csrf

    <h2 class="text-xl font-semibold">Forgot Password</h2>
    @if (session('status'))
      <div class="p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
    @endif

    @if ($errors->any())
      <div class="p-3 bg-red-100 text-red-800 rounded">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $e)
            <li>{{ $e }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div>
      <label class="block text-sm font-medium mb-1">Email Address</label>
      <input type="email" name="email" value="{{ old('email') }}" required
        class="w-full border border-gray-300 rounded p-2" />
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Send Reset Link</button>

    <p class="text-sm text-center mt-3"><a href="{{ route('login') }}" class="text-blue-600">Back to login</a></p>
  </form>
@endsection
