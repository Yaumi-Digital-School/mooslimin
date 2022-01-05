<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection
    <div class="flex overflow-x-hidden w-screen">
        <form method="POST" action="{{ route('login.act') }}" class="flex w-7/12 flex-col flex-none">
            @csrf
                <div class="font-inter p-10 space-y-2 ml-7 mt-7">
                    <p class="font-inter font-bold text-2xl">Masuk</p>
                    <p class="font-inter text-sm text-[#9797AA]"> Masuk untuk melanjutkan ke forum </p>
                </div>
                <div class="font-inter p-10 space-y-2 ml-7">
                    <form method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="">
                            <div>

                                <label class="block" for="email">
                                    Email
                                    <span class="text-red-500">
                                        *
                                    </span>
                                </label>
                                <input type="email" 
                                        placeholder="Email"
                                        name="email"
                                        class="w-full text-base  px-4 py-2 m t-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                        required>
                                
                                @if($errors->has('email'))
                                    <span class="text-red-500">{{$errors->first('email')}}</span>    
                                @endif
                                
                            </div>
                            <div class="mt-4">
                                
                                <label class="block">
                                    Password 
                                    <span class="text-red-500">
                                        *
                                    </span></label>
                                <input type="password" 
                                        placeholder="Password"
                                        name="password"
                                        class="w-full text-base  px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                                        required>

                                @if($errors->has('password'))
                                    <span class="text-red-500">{{$errors->first('password')}}</span>    
                                @endif
                                
                            </div>
                            <div class="flex items-center justify-between my-5">
                                <div class="flex items-center space-x-2 ">
                                    <input id="ingat_akun" name="remember" type="checkbox"/>
                                    <label class="font-normal text-sm" for="ingat_akun"> Ingat Akun Saya </label> 
                                </div>
                                
                                
                                <a href="{{route('reset.password.index')}}" class="ml-auto block text-sm font-semibold text-primary-500 hover:underline">Lupa Password</a>    
                            </div>
                            
                            <div class="flex flex-col items-baseline justify-between mt-28">
                                <button class="w-full mb-5 px-6 py-2 mt-4 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Login</button>
                                <p class="font-normal text-sm">Belum punya akun? <a href="/register" class="text-sm font-semibold text-primary-500 hover:underline">Daftar</a> </p>
                            </div>
                    </form>
                </div>
            </form>
        </div>
        <div class="flex-1 flex flex-row items-center bg-primary-500 h-screen">
            <div class=" p-20 space-y-4">
                <h1 class="font-inter font-semibold text-6xl text-white"> “ Ilmu akan menghidupkan jiwa. “</h1>
                <h1 class="font-inter font-semibold text-white">- Ali bin Abi Thalib </h1>
            </div>
        </div>
    
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('js/magic-reload')


