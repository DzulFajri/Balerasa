<aside class="z-20 hidden w-64 overflow-y-auto bg-white md:block flex-shrink-0">
    <div class="py-4 text-gray-500">
        <a class="ml-6 text-lg font-bold text-gray-800" href="{{ route('dashboard') }}">
            Windmill
        </a>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                    </x-slot>
                    {{ __('Dashboard') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('users.index') }}" :active="request()->routeIs('users.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                             xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </x-slot>
                    {{ __('Users') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"></path>
                        </svg>
                    </x-slot>
                    {{ __('About us') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <x-nav-link href="{{ route('menu.index') }}" :active="request()->routeIs('menu.index')">
                    <x-slot name="icon">
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                             stroke-linejoin="round" stroke-width="2" viewBox="0 0 64 64" stroke="currentColor">
                            <path d="M14.936 21.814v2.849M14.936 29.221v3.419M14.936 36.628v3.419M14.936 44.035v3.418M14.936 51.442v2.448a2.11 2.11 0 0 0 2.11 2.11h29.91a2.11 2.11 0 0 0 2.109-2.11V9.11A2.112 2.112 0 0 0 46.956 7h-29.91a2.11 2.11 0 0 0-2.11 2.11v8.716"></path>
                            <path d="M14.936 14.407h-2.039c-.814 0-1.474.749-1.474 1.673v.002c0 .963.688 1.744 1.536 1.744h4.989c.848 0 1.536-.781 1.536-1.744v-.002c0-.444-.156-.869-.432-1.183a1.389 1.389 0 0 0-1.042-.49M14.936 21.814h-2.039c-.814 0-1.474.749-1.474 1.673v.002c0 .963.688 1.744 1.536 1.744h4.989c.848 0 1.536-.781 1.536-1.744v-.002c0-.444-.156-.869-.432-1.183a1.389 1.389 0 0 0-1.042-.49M14.936 29.221h-2.039c-.814 0-1.474.749-1.474 1.673v.002c0 .963.688 1.744 1.536 1.744h4.989c.848 0 1.536-.781 1.536-1.744v-.002c0-.444-.156-.869-.432-1.183a1.389 1.389 0 0 0-1.042-.49M14.936 36.628h-2.039c-.814 0-1.474.749-1.474 1.673v.002c0 .963.688 1.744 1.536 1.744h4.989c.848 0 1.536-.781 1.536-1.744v-.002c0-.444-.156-.869-.432-1.183a1.389 1.389 0 0 0-1.042-.49M14.936 44.035h-2.039c-.814 0-1.474.749-1.474 1.673v.002c0 .963.688 1.743 1.536 1.743h4.989c.848 0 1.536-.78 1.536-1.743v-.002c0-.444-.156-.869-.432-1.183a1.389 1.389 0 0 0-1.042-.49"></path>
                            <path d="M36.331 17.819a9.142 9.142 0 0 0 .21-2.53 1.929 1.929 0 0 0-3.458-1.129c-2.342 2.937-5.743 7.348-7.889 10.132a3.823 3.823 0 0 0 .268 4.982l.002.001a3.877 3.877 0 0 0 5.289.288l9.572-8.022a1.992 1.992 0 0 0-1.093-3.509c-2.417-.196-5.528.268-8.188 3.041-.693.722-2.348 2.562-4.015 8.895"></path>
                            <path d="M35.423 13.514a1.043 1.043 0 0 1 1.518 0c.112.116.195.253.247.398a1.042 1.042 0 0 1 1.446.069c.139.145.232.32.279.505.38-.146.824-.059 1.129.259.305.318.388.781.249 1.177.177.049.345.146.484.291.395.412.417 1.068.066 1.507.139.055.27.14.382.257a1.154 1.154 0 0 1 0 1.583M24.472 49.163h15.057M28.99 42.326h6.022M28.99 38.337h6.022M49.065 8.14h.894c1.17 0 2.118 1.076 2.118 2.404v41.912c0 1.328-.948 2.404-2.118 2.404h-.894"></path>
                        </svg>
                    </x-slot>
                    {{ __('Menus') }}
                </x-nav-link>
            </li>

            <li class="relative px-6 py-3">
                <button class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                        @click="toggleMultiLevelMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4">Two-level menu</span>
                </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </button>
                <template x-if="isMultiLevelMenuOpen">
                    <ul x-transition:enter="transition-all ease-in-out duration-300"
                        x-transition:enter-start="opacity-25 max-h-0" x-transition:enter-end="opacity-100 max-h-xl"
                        x-transition:leave="transition-all ease-in-out duration-300"
                        x-transition:leave-start="opacity-100 max-h-xl" x-transition:leave-end="opacity-0 max-h-0"
                        class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
                        aria-label="submenu">
                        <li class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200">
                            <a class="w-full" href="#">Child menu</a>
                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</aside>
