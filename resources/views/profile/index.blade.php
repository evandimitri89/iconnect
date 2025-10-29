@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <div class="max-w-5xl mx-auto">

    {{-- Blue Header --}}
    <div class="bg-gradient-to-r from-[#2596f3] to-[#1e88e5] rounded-xl p-8 mt-6 shadow-lg">
      <div class="flex items-center gap-6 text-white">

        {{-- Avatar Upload --}}
        <div class="flex items-center gap-4">
          <div id="avatarWrapper" class="w-24 h-24 flex items-center justify-center cursor-pointer">
            @if ($user->profile_photo)
              <img id="avatarPreview" src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}"
                class="w-24 h-24 rounded-full object-cover shadow">
            @else
              <i id="avatarPreview" class="bi bi-person-circle text-[80px] text-white"></i>
            @endif
          </div>
        </div>

        {{-- User Info --}}
        <div>
          <h2 class="text-2xl font-semibold">{{ $user->display_name ?? $user->name }}</h2>
          <p class="text-sm text-white/90">{{ $user->email }}</p>
        </div>
      </div>
    </div>

    {{-- White Form Card --}}
    <div class="bg-white rounded-xl mt-8 p-6 shadow-lg">

      {{-- Success message --}}
      @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
      @endif

      {{-- ERROR message --}}
      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <ul class="list-disc ps-5 text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <input type="file" id="profilePhotoInput" name="profile_photo" accept="image/*" class="hidden">

        <div class="grid grid-cols-2 gap-6">
          {{-- LEFT SIDE --}}
          <div>
            <label class="block text-xs font-semibold text-gray-600">Full Name</label>
            <input name="name" type="text" value="{{ $errors->any() ? $user->name : old('name', $user->name) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2 @error('name') border-red-500 @enderror">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Display Name</label>
            <input name="display_name" type="text"
              value="{{ $errors->any() ? $user->display_name : old('display_name', $user->display_name) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2 @error('display_name') border-red-500 @enderror">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Username</label>
            <input name="username" type="text"
              value="{{ $errors->any() ? $user->username : old('username', $user->username) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2 @error('username') border-red-500 @enderror">

            <label class="block text-xs font-semibold text-gray-600 mt-4">NIS</label>
            <input name="nis" type="text" value="{{ $errors->any() ? $user->nis : old('nis', $user->nis) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">

            <label class="block text-xs font-semibold text-gray-600 mt-4">NISN</label>
            <input name="nisn" type="text" value="{{ $errors->any() ? $user->nisn : old('nisn', $user->nisn) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Gender</label>
            <select name="gender" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">
              <option value="">Choose</option>
              <option value="Laki-laki"
                {{ ($errors->any() ? $user->gender : old('gender', $user->gender)) == 'Laki-laki' ? 'selected' : '' }}>
                Laki-laki
              </option>
              <option value="Perempuan"
                {{ ($errors->any() ? $user->gender : old('gender', $user->gender)) == 'Perempuan' ? 'selected' : '' }}>
                Perempuan
              </option>
            </select>

            <label class="block text-xs font-semibold text-gray-600 mt-4">Tempat & Tanggal Lahir</label>
            <div class="flex gap-2">
              <input name="birth_place" type="text"
                value="{{ $errors->any() ? $user->birth_place : old('birth_place', $user->birth_place) }}"
                class="mt-1 block w-1/2 rounded-md border-gray-300 bg-gray-100 p-2">
              <input name="birth_date" type="date"
                value="{{ $errors->any() ? $user->birth_date : old('birth_date', $user->birth_date) }}"
                class="mt-1 block w-1/2 rounded-md border-gray-300 bg-gray-100 p-2">
            </div>
          </div>

          {{-- RIGHT SIDE --}}
          <div>
            <label class="block text-xs font-semibold text-gray-600">Address</label>
            <textarea name="address" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">{{ $errors->any() ? $user->address : old('address', $user->address) }}</textarea>

            <label class="block text-xs font-semibold text-gray-600 mt-4">Phone Number</label>
            <input name="phone" type="text" value="{{ $errors->any() ? $user->phone : old('phone', $user->phone) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Email</label>
            <input name="email" type="email" value="{{ $errors->any() ? $user->email : old('email', $user->email) }}"
              class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2 @error('email') border-red-500 @enderror">
            @error('email')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

            <label class="block text-xs font-semibold text-gray-600 mt-4">Religion</label>
            <select name="religion" class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 p-2">
              <option value="">Choose</option>
              @foreach (['Islam', 'Khatolik', 'Protestan', 'Hindu', 'Buddha', 'Kong Hu Cu'] as $r)
                <option value="{{ $r }}"
                  {{ ($errors->any() ? $user->religion : old('religion', $user->religion)) == $r ? 'selected' : '' }}>
                  {{ $r }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        {{-- BUTTONS --}}
        <div class="mt-6 flex justify-end gap-3">
          <button type="submit" class="px-6 py-2 rounded-full bg-blue-600 text-white shadow">
            Save Profile
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
