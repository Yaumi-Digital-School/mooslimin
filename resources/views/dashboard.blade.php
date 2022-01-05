<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
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
