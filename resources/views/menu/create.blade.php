<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Menu Item') }}
        </h2>
    </x-slot>

    @if (session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <div class="max-w-7xl mx-auto mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="sm:max-w-md">
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="mt-6 space-y-6">
                @csrf
                <div>
                    <x-input-label for="name" :value="__('Name')" class="text-gray-800" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" />
                    @error('name')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="image" :value="__('Image')" class="text-gray-800" />
                    <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" onchange="previewImage(event)" />
                    <img id="imagePreview" class="mt-2" style="max-width: 200px; max-height: 200px; display: none;" />
                    @error('image')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="price" :value="__('Price')" class="text-gray-800" />
                    <x-text-input id="price" name="price" type="text" class="mt-1 block w-full" />
                    @error('price')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="ingredients" :value="__('Ingredients')" class="text-gray-800" />
                    <x-text-input id="ingredients" name="ingredients" type="text" class="mt-1 block w-full" />
                    @error('ingredients')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <x-input-label for="category" :value="__('Category')" class="text-gray-800" />
                    <select id="category" name="category" class="mt-1 block w-full">
                        <option value="starters">Starters</option>
                        <option value="salads">Salads</option>
                        <option value="specialty">Specialty</option>
                    </select>
                    @error('category')
                        <div class="text-red-500 mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex items-center gap-4">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-green-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                        {{ __('Save') }}
                    </button>
                    <a href="{{ route('menu.index') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Back</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            var input = event.target.files[0];
            var reader = new FileReader();

            reader.onload = function() {
                var imgElement = document.getElementById('imagePreview');
                imgElement.src = reader.result;
                imgElement.style.display = 'block';
            }

            reader.readAsDataURL(input);
        }
    </script>
</x-app-layout>
