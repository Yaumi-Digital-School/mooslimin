<x-guest-layout>
    @section('title')
    Muslim Tool
    @endsection
    
    @if(Session::has('done'))
    <div class="h-screen w-screen flex flex-col justify-center items-center font-inter">
        <img src="/img/umum/Envelope.png">
        <div class="mt-10 mb-7">
            <p class="font-inter font-bold text-3xl">Verifikasi Akun Anda</p>
        </div>
        <div class="text-center mb-6">
            <p>Kami telah mengirim email permohonan ubah password ke email </p>
            <p>Jika tidak terkirim klik tombol dibawah ini.</p>
        </div>
        <button onClick="window.location.reload();" class="w-64 text-base mb-5 px-6 py-2 mt-2 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Kirim ulang email verifikasi</button>
       
    </div>        
    @else
    <div class="h-screen w-screen flex flex-col justify-center  font-inter">
        <form method="POST" action="{{ route('reset.password.store') }}" class="mx-auto w-96">
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
                    name="email"
                    id="email" 
                    type="text" 
                    placeholder="Email"
                    class="w-full text-base px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600" 
                    required>

                @if($errors->has('email'))
                    <span class="text-red-500">{{$errors->first('email')}}</span>    
                @endif
                                
           </div>

            <button type="submit" class="w-full text-base mb-5 px-6 py-2 mt-8 text-white bg-primary-500 rounded-lg hover:bg-primary-900">Request Password</button>
        </form>
        
    </div>
    @endif
</x-guest-layout>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@include('js/forum-alert')
