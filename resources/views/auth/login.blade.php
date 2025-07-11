<x-guest-layout>
    <!-- Header -->
    <div class="text-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">Login</h1>
        <p class="mt-1 text-sm text-gray-600 text-center">
            Welcome back!<br>
            Please sign in to your account.
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full placeholder-gray-500" type="email" name="email"
                :value="old('email')" placeholder="Email" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full placeholder-gray-500" type="password" name="password"
                placeholder="Password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200"
                    name="remember">
                <span class="ms-2 text-sm text-gray-700"> {{ __('Remember me') }} </span>
            </label>
        </div>

        <!-- Actions -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <!-- Optional Admin Link -->
    @auth
        @if(Auth::user()->role === 'admin')
            <div class="mt-6 text-center">
                <a href="{{ url('/admin/dashboard') }}" class="text-blue-600 hover:underline font-medium">
                    Go to Admin Dashboard
                </a>
            </div>
        @endif
    @endauth
</x-guest-layout>
