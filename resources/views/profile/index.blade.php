@extends('layouts.app')

@section('title', 'Profile')

@section('content')
  <script>
    window.user = @json($user);
  </script>

  <div class="max-w-5xl mx-auto">

    {{-- Blue Header --}}
    <div class="bg-gradient-to-r from-[#2596f3] to-[#1e88e5] rounded-xl p-8 mt-6 shadow-lg">
      <div class="flex items-center gap-6 text-white">

        {{-- Avatar --}}
        <div
          class="w-28 h-28 rounded-full overflow-hidden border-4 border-white shadow-lg bg-white flex items-center justify-center">
          @if ($user->profile_photo)
            <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}" class="w-full h-full object-cover">
          @else
            <i class="bi bi-person-circle text-3xl text-gray-400"></i>
          @endif


        </div>

        {{-- User Info --}}
        <div>
          <h2 class="text-2xl font-semibold">{{ $user->name }}</h2>
          <p class="text-sm text-white/90">{{ $user->email }}</p>
        </div>

      </div>
    </div>

    {{-- White Form Card --}}
    <div class="bg-white rounded-xl mt-8 p-6 shadow-lg">
      <form x-data="profile()" @submit="editing = false" action="{{ route('profile.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-2 gap-6">

          {{-- LEFT --}}
          <div>
            <label class="block text-xs font-semibold text-gray-600">Full Name</label>
            <input x-model="form.name" name="name" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">

            <label class="block text-xs font-semibold text-gray-600 mt-4">NIS</label>
            <input x-model="form.nis" name="nis" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">

            <label class="block text-xs font-semibold text-gray-600 mt-4">NISN</label>
            <input x-model="form.nisn" name="nisn" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Gender</label>
            <select x-model="form.gender" name="gender"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">
              <option value="">Pilih</option>
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>

            <label class="block text-xs font-semibold text-gray-600 mt-4">Tempat & Tanggal Lahir</label>
            <div class="flex gap-2">
              <input x-model="form.birth_place" name="birth_place" type="text"
                class="mt-1 block w-1/2 rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">
              <input x-model="form.birth_date" name="birth_date" type="date"
                class="mt-1 block w-1/2 rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">
            </div>

            <label class="block text-xs font-semibold text-gray-600 mt-4">Address</label>
            <textarea x-model="form.address" name="address" class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2"
              x-bind:disabled="!editing"></textarea>

            <label class="block text-xs font-semibold text-gray-600 mt-4">Phone Number</label>
            <input x-model="form.phone" name="phone" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">
          </div>

          {{-- RIGHT --}}
          <div>
            <label class="block text-xs font-semibold text-gray-600">Email</label>
            <input x-model="form.email" name="email" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Religion</label>
            <input x-model="form.religion" name="religion" type="text"
              class="mt-1 block w-full rounded-md border-gray-200 bg-gray-50 p-2" x-bind:disabled="!editing">

            <label class="block text-xs font-semibold text-gray-600 mt-4">Profile Photo</label>
            <div class="mt-2 flex items-center gap-4">
              <div class="w-20 h-20 rounded-full overflow-hidden border bg-gray-50 flex items-center justify-center">
                <template x-if="previewUrl">
                  <img :src="previewUrl" class="w-full h-full object-cover">
                </template>

                <template x-if="!previewUrl">
                  @if ($user->profile_photo)
                    <img src="{{ asset('storage/profile_photos/' . $user->profile_photo) }}"
                      class="w-full h-full object-cover">
                  @else
                    <i class="bi bi-person-circle text-3xl text-gray-400"></i>
                  @endif
                </template>
              </div>

              <div>
                <template x-if="!editing">
                  <button type="button" @click="startEdit"
                    class="text-sm px-3 py-1 bg-blue-500 text-white rounded">Change</button>
                </template>

                <template x-if="editing">
                  <button type="button" @click="triggerFile"
                    class="text-sm px-3 py-1 bg-gray-200 rounded">Choose</button>
                </template>
              </div>
            </div>

            <input x-ref="file" type="file" name="profile_photo" class="hidden" accept="image/*"
              @change="fileChosen">
          </div>

        </div>

        {{-- BUTTONS (CENTER) --}}
        <div class="mt-6 flex justify-center">
          <button x-show="!editing" type="button" @click="startEdit"
            class="px-6 py-2 rounded-full bg-blue-500 text-white shadow">
            Edit
          </button>

          <template x-if="editing">
            <div class="flex gap-3">
              <button type="button" @click="cancelEdit" class="px-6 py-2 rounded bg-gray-200">Cancel</button>
              <button type="submit" class="px-6 py-2 rounded bg-blue-600 text-white">Save</button>
            </div>
          </template>
        </div>

      </form>
    </div>

  </div>
@endsection
