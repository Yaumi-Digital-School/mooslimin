<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection
    <div class="flex">
        <div class="flex w-2/3">
            <div>
                <div class="font-inter p-10 space-y-2">
                    <p class="font-inter font-bold text-2xl">Masuk</p>
                    <p class="font-inter text-sm text-[#9797AA]"> Masuk untuk melanjutkan ke forum </p>
                </div>
                <div class="font-inter p-16 space-y-2">
                    <form action="">
                        <div class="">
                            <div>
                                <label class="block" for="email">Email<label>
                                        <input type="text" placeholder="Email"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="mt-4">
                                <label class="block">Password<label>
                                        <input type="password" placeholder="Password"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="flex items-baseline justify-between">
                                <button class="px-6 py-2 mt-4 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Login</button>
                                <p>Belum punya akun?</p><a href="#" class="text-sm text-primary-500 hover:underline">Daftar</a>
                            </div>
                </div>
            </div>
        </div>
        
        <div class="flex-1 flex flex-row items-center bg-primary-500 h-screen">
            <div class=" p-20 space-y-4">
                <h1 class="font-inter font-semibold text-6xl text-white"> “ Ilmu akan menghidupkan jiwa. “</h1>
                <h1 class="font-inter font-semibold text-white">- Ali bin Abi Thalib </h1>
            </div>
        </div>
    
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Header --}}

            <!-- Email Address -->
            {{-- <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div> --}}

            {{-- <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat Akun Saya') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form> 
    </x-auth-card> --}}
</x-guest-layout>


