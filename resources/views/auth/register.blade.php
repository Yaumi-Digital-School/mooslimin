<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection
    <div class="flex">
        <div class="flex w-2/3 flex-col">
                <div class="font-inter p-10 space-y-2 ml-7 mt-7">
                    <p class="font-inter font-bold text-2xl">Daftar</p>
                    <p class="font-inter text-sm text-[#9797AA]"> Daftar untuk dapat bergabung dengan forum </p>
                </div>
                <div class="font-inter p-10 space-y-2 ml-7">
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <div class="">
                            <div>
                                <label class="block">Nama Lengkap<label>
                                        <input id="name" name="name" type="text" placeholder="Nama Lengkap"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div>
                                <label class="block">Email<label>
                                        <input id="email" name="email" type="text" placeholder="Email"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>
                            <div class="mt-4">
                                <label class="block">Password<label>
                                        <input id="password" name="password" type="password" placeholder="Password"
                                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                            </div>

                            <div class="flex items-center my-5">
                                <div class="flex items-center space-x-2 ">
                                    <input id="ingat_akun" name="remember" type="checkbox"/>
                                    <label class="font-normal text-sm" for="ingat_akun"> Saya menyetujui  </label> 
                                </div>
                                
                                
                                <label class="ml-1 text-sm font-semibold">Syarat dan Ketentuan</label>    
                            </div>
                            
                            <div class="flex flex-col items-baseline justify-between mt-10">
                                <button class="w-full mb-5 px-6 py-2 mt-4 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Daftar</button>
                                <p class="font-normal text-sm">Sudah punya akun? <a href="/login" class="text-sm font-semibold text-primary-500 hover:underline">Masuk</a> </p>
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

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
