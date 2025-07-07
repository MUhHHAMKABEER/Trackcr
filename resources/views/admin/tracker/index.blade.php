@extends('layouts.admin') {{-- Your admin layout --}}

@section('content')
    <header class="flex justify-between items-center mb-6">
        <div class="search-bar flex items-center bg-white px-4 py-2 rounded-lg w-80">
            <span class="material-icons text-gray-400">search</span>
            <input type="text" placeholder="Search here..." class="ml-2 bg-transparent outline-none w-full">
        </div>
        <div class="user-actions flex items-center gap-6">
            <div class="icon-badge relative">
                <span class="material-icons text-gray-500">notifications</span>
                <span
                    class="badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">12</span>
            </div>
            <div class="icon-badge relative">
                <span class="material-icons text-gray-500">mail</span>
                <span
                    class="badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">12</span>
            </div>
            <img alt="User avatar" class="w-10 h-10 rounded-full object-cover"
                src="{{ Auth::user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&background=random' }}"
                onerror="this.onerror=null;this.src='https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=random';" />

        </div>
    </header>

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Device Management</h1>
            <p class="text-gray-500 text-sm">Dashboard &gt; Device Management</p>
        </div>
        <!-- Add Device Modal Trigger Button -->
        <a href="javascript:void(0)" onclick="openModal()"
            class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg shadow">
            <span class="material-icons text-white mr-2">add</span>
            Add Device
        </a>

    </div>

    <div class="p-6">


        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($devices as $device)
                <div
                    class="bg-white rounded-xl shadow p-5 space-y-3 relative border-l-4
                {{ now()->diffInMinutes($device->received_at) <= 2 ? 'border-green-500' : 'border-gray-400' }}">

                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-gray-800">
                            {{ $device->model ?? 'Unknown Model' }}
                        </h3>
                        <span
                            class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium
                        {{ now()->diffInMinutes($device->received_at) <= 2 ? 'bg-green-100 text-green-800' : 'bg-gray-200 text-gray-700' }}">
                            ● {{ now()->diffInMinutes($device->received_at) <= 2 ? 'Online' : 'Offline' }}
                        </span>
                    </div>

                    <div class="text-sm text-gray-500">
                        <strong>IMEI:</strong> {{ $device->imei }}
                    </div>

                    <div class="text-sm text-gray-500">
                        <strong>Battery:</strong> {{ $device->battery_voltage ?? 'N/A' }} V
                    </div>

                    <div class="text-sm text-gray-500">
                        <strong>Last Seen:</strong>
                        {{ $device->received_at ? $device->received_at->diffForHumans() : 'Never' }}
                    </div>

                    <div class="text-sm text-gray-500">
                        <strong>Location:</strong>
                        @if ($device->latitude && $device->longitude)
                            <a href="https://maps.google.com/?q={{ $device->latitude }},{{ $device->longitude }}"
                                target="_blank" class="text-blue-600 underline">
                                View on Map
                            </a>
                        @else
                            N/A
                        @endif
                    </div>

                    <div class="flex justify-end pt-3 space-x-3">
                        <a href="{{ route('admin.devices.edit', $device->id) }}"
                            class="text-sm text-indigo-600 hover:underline">Edit</a>
                        <form action="{{ route('admin.devices.destroy', $device->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">Delete</button>
                        </form>
                        <a href="{{ route('admin.devices.settings', $device->id) }}"
                            class="text-sm text-gray-600 hover:underline">Settings</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Add Device Modal -->
    <div id="addDeviceModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center">
        <div class="bg-white w-full max-w-md rounded-lg shadow-lg p-6 relative">
            <h2 class="text-xl font-bold mb-4">Add New Device</h2>

            <form method="POST" action="{{ route('admin.devices.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Device Name</label>
                    <input name="name" type="text" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">IMEI</label>
                    <input name="imei" type="text" required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                </div>

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Model</label>
                    <input name="model" type="text" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm" />
                </div>

                {{-- OPTIONAL: If you're an admin and want to assign to a user manually --}}

                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Assign to User</label>
                    <select name="user_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end mt-6 space-x-3">
                    <button type="button" onclick="closeModal()"
                        class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Save</button>
                </div>
            </form>


            <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-400 hover:text-gray-600">
                <span class="material-icons">close</span>
            </button>
        </div>
    </div>
    <script>
        function openModal() {
            document.getElementById('addDeviceModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('addDeviceModal').classList.add('hidden');
        }
    </script>
@endsection
