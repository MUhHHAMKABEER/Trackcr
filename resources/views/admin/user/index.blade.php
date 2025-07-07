@extends('layouts.admin')

@section('content')
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">All Users</h2>

        <table class="min-w-full bg-white rounded-lg shadow">
            <thead>
                <tr class="bg-gray-100 text-left text-gray-600 text-sm uppercase">
                    <th class="py-3 px-6">ID</th>
                    <th class="py-3 px-6">Name</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Role</th>
                    <th class="py-3 px-6">Created At</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="py-3 px-6">{{ $user->id }}</td>
                        <td class="py-3 px-6">{{ $user->name }}</td>
                        <td class="py-3 px-6">{{ $user->email }}</td>
                        <td class="py-3 px-6 capitalize">{{ $user->role }}</td>
                        <td class="py-3 px-6">{{ $user->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
