<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Prodi') }}
        </h2>
    </x-slot>

  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if (session('message'))
                    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded flex justify-between items-center">
                        <span> {{ session('message') }}</span>
                    </div>
                @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="mt-5  mb-5 flex justify-end gap-3">
                    <a href="{{ route('prodi.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Tambah
                    </a>
                </div>
            
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr class="w-full bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nama</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($prodis as $prodi)
                                    <tr class="border-b border-gray-300 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">{{ $prodi->nama }}</td>
                                        <td class="py-3 px-6 text-center ">
                                            <form action="{{ route('prodi.delete', $prodi->id) }}" class="flex justify-center gap-2"  method="post">
                                                <a href="{{ route('prodi.edit', $prodi->id) }}" class="bg-cyan-500 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="return confirm('Anda yakin?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
