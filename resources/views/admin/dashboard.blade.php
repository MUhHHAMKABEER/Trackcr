@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')
<header class="flex justify-between items-center mb-6">
    <div class="search-bar flex items-center bg-white px-4 py-2 rounded-lg w-80">
        <span class="material-icons text-gray-400">search</span>
        <input type="text" placeholder="Search here..." class="ml-2 bg-transparent outline-none w-full">
    </div>
    <div class="user-actions flex items-center gap-6">
        <div class="icon-badge relative">
            <span class="material-icons text-gray-500">notifications</span>
            <span class="badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">12</span>
        </div>
        <div class="icon-badge relative">
            <span class="material-icons text-gray-500">mail</span>
            <span class="badge absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">12</span>
        </div>
        <img alt="User avatar" class="w-10 h-10 rounded-full" src="https://lh3.googleusercontent.com/...">
    </div>
</header>

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Directory Dashboard</h1>
    <p class="text-gray-500 text-sm">Dashboard &gt; Address Book</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <div class="lg:col-span-2 card bg-white p-6 rounded-xl shadow">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg font-semibold text-gray-700">Monthly Income stats for November 2020</h2>
            <div class="flex space-x-2">
                <button class="px-3 py-1 text-sm bg-gray-200 rounded-md">Today</button>
                <button class="px-3 py-1 text-sm text-gray-500">Weekly</button>
                <button class="px-3 py-1 text-sm text-gray-500">Monthly</button>
            </div>
        </div>
        <img src="https://lh3.googleusercontent.com/..." class="w-full" alt="Chart">
    </div>
    <div class="space-y-6">
        <div class="card text-center bg-white p-6 rounded-xl shadow">
            <h3 class="text-3xl font-bold text-blue-600">50 +</h3>
            <p class="text-gray-500 mt-2">Total categories</p>
        </div>
        <!-- more cards... -->
    </div>
</div>
@endsection
