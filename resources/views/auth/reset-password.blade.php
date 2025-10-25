@extends('layouts.guest')

@section('content')
  <form method="POST" action="{{ route('password.update') }}" class="space-y-5">
    @csrf

    <input type="hidden" name="token" value="{{ $token }}">

    <h2 class="text-xl font-semibold">Reset Password</h2>

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
      <label class="block text-sm font-medium mb-1">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required
        class="w-full border border-gray-300 rounded p-2" />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">New Password</label>
      <input type="password" name="password" required class="w-full border border-gray-300 rounded p-2" />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Confirm Password</label>
      <input type="password" name="password_confirmation" required class="w-full border border-gray-300 rounded p-2" />
    </div>

    <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded">Reset Password</button>
  </form>
@endsection
