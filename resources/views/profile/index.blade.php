@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <div class="flex flex-col bg-white rounded-2xl shadow-md overflow-hidden">

    <!-- Header -->
    <div class="bg-blue-500 p-6 text-center relative">
      <img src="https://i.pravatar.cc/100?img=3" alt="Profile Avatar"
        class="w-28 h-28 rounded-full border-4 border-white mx-auto shadow-lg">
    </div>

    <!-- Content -->
    <div class="p-6">
      <div class="grid grid-cols-2 gap-4">
        <div>
          <label class="text-sm font-semibold">Full Name</label>
          <input type="text" value="{{ $user->name }}" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div>
          <label class="text-sm font-semibold">Email</label>
          <input type="text" value="{{ $user->email }}" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div>
          <label class="text-sm font-semibold">NIS</label>
          <input type="text" value="1234" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div>
          <label class="text-sm font-semibold">Religion</label>
          <input type="text" value="Kristen" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div>
          <label class="text-sm font-semibold">NISN</label>
          <input type="text" value="223334445" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div>
          <label class="text-sm font-semibold">Gender</label>
          <input type="text" value="Boy" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div class="col-span-2">
          <label class="text-sm font-semibold">Tempat & Tanggal Lahir</label>
          <input type="text" value="Tayan, 06 October 2008" readonly
            class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div class="col-span-2">
          <label class="text-sm font-semibold">Address</label>
          <input type="text" value="Jalan 123 Komplek Maju Jaya" readonly
            class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
        <div class="col-span-2">
          <label class="text-sm font-semibold">Phone Number</label>
          <input type="text" value="081234215849" readonly class="w-full border rounded px-3 py-2 bg-gray-100">
        </div>
      </div>
    </div>

    <!-- Floating Edit Button -->
    <div class="absolute bottom-6 right-6">
      <button class="bg-blue-500 hover:bg-blue-600 text-white rounded-full p-3 shadow-lg">
        <i class="fas fa-pen"></i>
      </button>
    </div>
  </div>
@endsection
