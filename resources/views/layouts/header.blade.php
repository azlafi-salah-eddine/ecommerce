<header>
    <div class="container mx-auto px-3 py-3">
        <div class="flex items-center justify-between">
            <div class="hidden w-full text-gray-600 md:flex md:items-center">
                <!-- Logo or Icon -->
                <svg width="30px" height="30px" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <rect width="48" height="48" fill="white" fill-opacity="0.01"></rect> <path d="M35 26.6139L15.1463 7.31395C13.9868 6.18686 12.1332 6.21308 11.0062 7.3725C10.9652 7.41459 10.9256 7.45789 10.8873 7.50235C9.74436 8.82907 9.8228 10.814 11.0669 12.0463L21.091 21.9763" stroke="#000000" stroke-width="4" stroke-linecap="round"></path> <path d="M21.0909 21.9762L10.1773 11.1548C8.88352 9.87195 6.8201 9.80176 5.44214 10.9937C4.17554 12.0893 4.03694 14.0043 5.13256 15.2709C5.17411 15.3189 5.21715 15.3656 5.26164 15.411L16.2553 26.6138" stroke="#000000" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M16.2553 26.6138L10 20.5001C8.73766 19.2104 6.67317 19.1745 5.36682 20.4197C4.07445 21.6515 4.02538 23.6978 5.25721 24.9902C5.26288 24.9961 5.26857 25.002 5.27429 25.0079C14.5039 34.5444 19.294 39.0486 21.091 40.5535C24 42.9898 29.7351 44.0001 32.7305 42.0001C35.7259 40.0001 38.4333 37.1545 39.7183 34.3288C40.4833 32.6466 41.9692 27.4596 44.1759 18.768C44.6251 16.9987 43.5549 15.2002 41.7856 14.751C41.7627 14.7452 41.7397 14.7396 41.7167 14.7343C39.8835 14.3106 38.0431 15.4117 37.5499 17.2274L35 26.6138" stroke="#000000" stroke-width="4" stroke-linecap="round"></path> <path d="M31.7159 12.666C31.004 11.6026 30.1903 10.6131 29.2887 9.71151C28.3871 8.80992 27.3976 7.9962 26.3342 7.28431C25.8051 6.9301 25.2577 6.6011 24.6937 6.29903C24.133 5.99872 23.5559 5.72502 22.9641 5.47963" stroke="#000000" stroke-width="4" stroke-linecap="round"></path> <path d="M5.19397 33.7763C5.84923 34.8754 6.61005 35.9062 7.46322 36.8537C8.31639 37.8012 9.26192 38.6656 10.2866 39.4322C10.7964 39.8136 11.3259 40.1708 11.8733 40.502C12.4175 40.8312 12.9795 41.1348 13.5576 41.4108" stroke="#000000" stroke-width="4" stroke-linecap="round"></path> </g></svg>

                <span class="mx-1 text-sm">
                    @if (Auth::check())
                        @if (Auth::user()->role === 'admin')
                            <b>Hi Admin</b>
                        @elseif (Auth::user()->role === 'editor')
                            <b>Hi Editor</b>
                        @else
                            Hi User
                        @endif
                    @else
                        Hi Guest
                    @endif
                </span>
            </div>

            <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                @if (Auth::check())
                    @if (Auth::user()->role === 'admin')
                        <b>Admin</b>
                    @elseif (Auth::user()->role === 'editor')
                        <b>Editor</b>
                    @else
                        User
                    @endif
                @else
                    Guest
                @endif
            </div>

            <div class="flex items-center justify-end w-full">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <!-- Profile Link -->
                            <x-dropdown-link :href="route('profile.edit')" class="flex items-center space-x-3 p-3 hover:bg-gray-100 rounded-lg transition-colors duration-200 ease-in-out">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-gray-700 font-medium">{{ __('Profile') }}</span>
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="flex items-center space-x-3 p-3 hover:bg-gray-100 rounded-lg transition-colors duration-200 ease-in-out"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                        <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    <span class="text-gray-700 font-medium">{{ __('Log Out') }}</span>
                                </x-dropdown-link>
                            </form>
                        </x-slot>


                    </x-dropdown>

                    <div class="flex sm:hidden">
                        <button @click="isOpen = !isOpen" type="button" class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500" aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                @else
                    <div class="flex space-x-4">
                        <a href="{{ route('login') }}" class="inline-flex items-center border border-transparent text-base font-medium rounded-lg text-black">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="inline-flex items-center border border-transparent text-base font-medium rounded-lg text-black">
                            Register
                        </a>
                    </div>
                @endauth
            </div>
        </div>

        <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                    @if (Auth::check())
                        @if (Auth::user()->role === 'admin')
                            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/admin">Home</a>
                            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('products.index') }}">Products</a>
                            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="{{ route('categories.index') }}">Categories</a>
                        @elseif (Auth::user()->role === 'editor')
                            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/editor">Home</a>
                        @else
                            <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>
                        @endif
                    @else
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="/">Home</a>
                    @endif

                <!-- Links visible to all users -->

                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
            </div>
        </nav>

        <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </span>

            <input class="w-full border rounded-md pl-10 pr-4 py-2 focus:border-blue-500 focus:outline-none focus:shadow-outline" type="text" placeholder="Search">
        </div>
    </div>
</header>
