<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection
    <div class="flex">
        <div class="flex w-2/3 flex-col">
                <div class="font-inter p-10 space-y-2 ml-7 mt-7">
                    <p class="font-inter font-bold text-2xl">Masuk</p>
                    <p class="font-inter text-sm text-[#9797AA]"> Masuk untuk melanjutkan ke forum </p>
                </div>
                <div class="font-inter p-10 space-y-2 ml-7">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="">
                            <div>
                                <label class="block">Email<label>
                                        <input id="email" name="email" type="email" placeholder="Email"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="mt-4">
                                <label class="block">Password<label>
                                        <input id="password" name="password" type="password" placeholder="Password"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>

                            <div class="flex items-center justify-between my-5">
                                <div class="flex items-center space-x-2 ">
                                    <input id="ingat_akun" name="remember" type="checkbox"/>
                                    <label class="font-normal text-sm" for="ingat_akun"> Ingat Akun Saya </label> 
                                </div>
                                
                                
                                <a href="#" class="ml-auto block text-sm font-semibold text-primary-500 hover:underline">Lupa Password</a>    
                            </div>
                            
                            <div class="flex flex-col items-baseline justify-between mt-28">
                                <button class="w-full mb-5 px-6 py-2 mt-4 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Login</button>
                                <p class="font-normal text-sm">Belum punya akun? <a href="/register" class="text-sm font-semibold text-primary-500 hover:underline">Daftar</a> </p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="flex-1 flex flex-row ml-7 items-center bg-primary-500 h-screen">
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


