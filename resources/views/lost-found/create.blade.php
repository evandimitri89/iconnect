@extends('layouts.app')

@section('title', 'Report Lost or Found Item')

@section('content')
  <div class="container flex justify-center items-center min-h-screen">

    <div class="bg-white rounded-xl shadow-lg p-8 max-w-4xl mx-auto">
      <h2 class="text-2xl font-bold text-gray-800 mb-6">Report Lost / Found Item</h2>

      <form action="{{ route('lost-found.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

          {{-- Item Name --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Item Name</label>
            <input type="text" name="item_name" placeholder="e.g. Wallet, Student ID Card"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none 
                     focus:ring-2 focus:ring-blue-500 transition"
              required>
          </div>

          {{-- Status --}}
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
            <select name="status"
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none 
                     focus:ring-2 focus:ring-blue-500 transition"
              required>
              <option value="">Select status</option>
              <option value="lost">Lost (Kehilangan Barang)</option>
              <option value="found">Found (Menemukan Barang)</option>
            </select>
          </div>

          {{-- Description --}}
          <div class="md:col-span-2">
            <label class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" rows="3" placeholder="Describe details about the item..."
              class="w-full border border-gray-300 rounded-lg shadow-sm p-2 outline-none focus:outline-none 
                     focus:ring-2 focus:ring-blue-500 transition"></textarea>
          </div>

        </div>

        {{-- Submit --}}
        <div class="flex justify-end mt-6">
          <a href="{{ route('lost-found') }}"
            class="mr-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-lg transition">
            Cancel
          </a>

          <button type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow transition">
            Submit
          </button>
        </div>

      </form>
    </div>
  </div>
@endsection
