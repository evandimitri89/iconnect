<aside class="bg-blue-600 w-64 min-h-screen text-white flex flex-col" x-data="{ open: false }">
  <div class="p-4 px-4 text-2xl font-bold">iConnect</div>

  <ul class="space-y-1 p-4">
    <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md text-sm">Dashboard</a></li>
    <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md text-sm">Extracurricular</a></li>
    <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md text-sm">Room Reservation</a></li>
    <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md text-sm">Lost & Found</a></li>
    <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md text-sm">Users</a></li>
  </ul>

  <div class="p-4 space-y-1 border-t border-blue-500">
    <div class="text-xs text-white/50 font-bold uppercase">OSIS</div>
    <ul>
      <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md">Inventory</a></li>
      <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md">Meeting</a></li>
    </ul>
  </div>

  <div class="p-4 space-y-1 border-t border-blue-500">
    <div class="text-xs text-white/50 font-bold uppercase">Preferences</div>
    <ul>
      <li><a href="#" class="block px-4 py-1 hover:bg-blue-700 rounded-md">Notification</a></li>
    </ul>
  </div>

  <!-- Profile Section -->
  <div class="border-t border-blue-500 p-4 mt-auto relative" x-data="{ open: false }">
    <button @click="open = !open" class="flex items-center space-x-3 text-white/90 hover:text-white w-full">
      <img src="{{ asset('img/profile.png') }}" alt="Princely" class="w-8 h-8 rounded-full border border-white">
      <span class="font-semibold">{{ Auth::user()->name }}</span>
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-auto transform"
        :class="{ 'rotate-90': open, 'rotate-0': !open }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
      </svg>
    </button>

    <!-- Dropdown -->
    <div x-show="open" @click.away="open = false"
      class="absolute bottom-14 left-0 w-full bg-blue-700 rounded-md shadow-lg overflow-hidden">
      <a href="#" class="block px-4 py-2 hover:bg-blue-600">Profile</a>
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full text-left px-4 py-2 hover:bg-blue-600">Logout</button>
      </form>
    </div>
  </div>
</aside>
