<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Menu Item') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="bg-red-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <div class="max-w-7xl mx-auto mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        <div class="sm:max-w-md">
            <form action="{{ route('menu.update', $menu->id) }}" method="POST" class="mt-6 space-y-6"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        value="{{ $menu->name }}" />
                    @error('name')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" />
                    @error('image')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" name="price" type="text" class="mt-1 block w-full"
                        value="{{ $menu->price }}" />
                    @error('price')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="ingredients" :value="__('Ingredients')" />
                    <x-text-input id="ingredients" name="ingredients" type="text" class="mt-1 block w-full"
                        value="{{ $menu->ingredients }}" />
                    @error('ingredients')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="category" :value="__('Category')" />
                    <x-text-input id="category" name="category" type="text" class="mt-1 block w-full"
                        value="{{ $menu->category }}" />
                    @error('category')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
