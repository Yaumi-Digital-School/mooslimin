<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in! {{Auth::user()->name}}
                </div>
            </div>
            <div class="bg-green-400 shadow-lg animate-bounce py-7">
                ini code tailwind pertamamu
            </div>
        </div>
    </div> --}}
    <div class="grid grid-cols-4 h-60 gap-4 text-center">
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">1</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">2</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">3</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">4</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">5</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">6</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">7</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle">8</div>
        <div class="bg-gray-500 rounded-md m-2 inline-block align-middle col-start-2 col-span-2">9</div>
      </div>
</x-app-layout>
