<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prodi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-gray-900 font-bold text-lg mb-6">Form {{ isset($prodis) ? "Edit" : "Tambah" }} Prodi</h2>
                        @if(isset($prodis))
                        <form method="POST" action="{{ route('prodi.update',$prodis->id) }}">
                        @method('PUT')
                        @else
                        <form method="POST" action="{{ route('prodi.store') }}">
                        @endif
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="nama" :value="__('Nama')" />
                            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" 
                            :value="old('nama',isset($prodis) ? $prodis->nama : '')"  required autofocus autocomplete="nama" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('prodi') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-blue-800 uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-white focus:bg-blue-700 dark:focus:bg-white active:bg-blue-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-blue-800 transition ease-in-out duration-150">
                                Kembali
                            </a>
                            <x-primary-button class="ms-3">
                                {{ __('Simpan') }}
                            </x-primary-button>
                            
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
