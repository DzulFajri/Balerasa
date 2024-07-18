<x-app-layout>
    {{-- <x-slot name="header">
        {{ __('Menu') }}
    </x-slot> --}}

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg"> --}}
                <div class="flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Menu Items') }}
                    </h2>
                    <a href="{{ route('menu.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Create Menu Item') }}
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ $message }}</span>
                    </div>
                @endif

                <div class="mt-6 relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">{{ __('No') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Name') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Image') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Price') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Ingredients') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Category') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                    <td class="px-6 py-4">{{ $menu->name }}</td>
                                    <td class="px-6 py-4">
                                        <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" class="w-16 h-16 object-cover rounded">
                                    </td>
                                    <td class="px-6 py-4">{{ $menu->price }}</td>
                                    <td class="px-6 py-4">{{ $menu->ingredients }}</td>
                                    <td class="px-6 py-4">{{ $menu->category }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route('menu.edit', $menu->id) }}" class="text-blue-600 hover:text-blue-900">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </a>
                                            <form action="{{ route('menu.destroy', $menu->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('{{ __('Are you sure you want to delete this item?') }}')">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $menus->links() }}
                </div>
            {{-- </div> --}}
        </div>
    </div>
</x-app-layout>
