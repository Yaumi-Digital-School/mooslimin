<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection

    <div class="h-screen w-screen flex flex-col justify-center  font-inter">
        <form method="POST" action="{{ route('password.email') }}" class="mx-auto w-96">
            @csrf
            <h1 class="text-3xl text-center font-bold">Lupa Password</h1>

           <div class="mt-20">
                <label class="block" for="email">
                    Email
                    <span class="text-red-500">
                        *
                    </span>
                </label>
                <input 
                    type="email" 
                    name="email"
                    placeholder="Email"
                    class="w-full text-base px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                    required>

                @if($errors->has('email'))
                    <span class="text-red-500">{{$errors->first('email')}}</span>    
                @endif
                                
           </div>

            <button class="w-full text-base mb-5 px-6 py-2 mt-8 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Request Password</button>
        </form>
    </div>
    {{-- <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card> --}}
</x-guest-layout>
