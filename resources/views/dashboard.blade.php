<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg flex items-center p-4">
                <img src="{{ Auth::user()->photo ? asset('uploads/' . Auth::user()->photo) : asset('img/avatar.jpg') }}" alt="Foto de perfil" class="rounded-full h-20 w-20">
                <div class="p-6 text-gray-900">
                    {{ Auth::user()->position }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
