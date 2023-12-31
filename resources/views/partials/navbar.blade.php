<nav class="bg-[#FFFFFF] font-poppins shadow-lg fixed w-full z-20 top-0 left-0">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex justify-between">
            <div class="flex space-x-7">
                <div class="hidden md:flex items-center space-x-1">
                    @guest
                        <div>
                            <a href="/" class="flex items-center py-4 px-2">
                                <img src="{{ asset('images/Image 1.png') }}" alt="Logo" class="w-28 ">
                            </a>
                        </div>
                        <a @yield('homeactive') href="/"
                            class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">Home</a>
                        <a @yield('list_internship') href="/list_internship"
                            class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">All
                            Internships</a>
                    @endguest
                    @auth
                        @if (Auth::user()->role_id == 1 && Auth::user()->company_review == 'accepted')
                            <div>
                                <a href="/company_dashboard" class="flex items-center py-4 px-2">
                                    <img src="{{ asset('images/Image 1.png') }}" alt="Logo" class="w-28 ">
                                </a>
                            </div>
                            <a @yield('addinternship') href="/add_internship"
                                class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">Add
                                Internship</a>
                            <a @yield('internshiplist') href="/company_internship"
                                class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">Internship
                                Lists</a>
                        @elseif (Auth::user()->role_id == 0)
                            <div>
                                <a href="/" class="flex items-center py-4 px-2">
                                    <img src="{{ asset('images/Image 1.png') }}" alt="Logo" class="w-28 ">
                                </a>
                            </div>
                            <a @yield('list_internship') href="/list_internship"
                                class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">All
                                Internships</a>
                            <a @yield('internship_for_me') href="/internship/matching"
                                class="py-4 px-2 text-[#323842] font-semibold hover:text-[#0EA89B] transition duration-300">Internship
                                for Me</a>
                        @endif
                    @endauth
                </div>
            </div>
            <div class="flex space-x-7">
                <div class="hidden md:flex items-center space-x-3 ">
                    @guest
                        <a href="/login"
                            class="py-2 px-6 bg-[#0EA89B] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">Log
                            In</a>
                        <a href="/chooserole"
                            class="py-2 px-6 font-medium text-[#323842] rounded hover:bg-[#0EA89B] hover:text-white transition duration-300">Register</a>
                    @else
                        <div @click.away="open = false" class="relative" x-data="{ open: false }">
                            <button @click="open = !open"
                                class="py-2 px-6 font-medium text-[#323842] rounded hover:bg-[#0EA89B] hover:text-white transition duration-300">
                                @if (Auth::user()->role_id == 0)
                                    <span>{{ Auth::user()->name }}</span>
                                @elseif (Auth::user()->role_id == 1)
                                    <span>{{ Auth::user()->company }}</span>
                                @endif
                                <svg fill="currentColor" viewBox="0 0 20 20"
                                    :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                    class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="open" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                                <div class="px-2 py-2 bg-white rounded-md shadow">
                                    @if (Auth::user()->role_id == 1)
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="/company_dashboard">Dashboard</a>
                                    @else
                                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                            href="/user_profile">My Account</a>
                                    @endif
                                    <a
                                        class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                                        <form action="/logout" method="POST">
                                            @csrf
                                            <button type="submit">Logout</button>
                                        </form>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-[#323842] hover:text-[#BFD9EB] " x-show="!showMenu" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- mobile menu -->
    <div class="hidden mobile-menu">
        <ul class="">
            <li><a @yield('home1active') href="/"
                    class="block text-sm px-2 py-4 text-[#323842] hover:bg-[#BFD9EB] transition duration-300">Home</a>
            </li>
            <li><a @yield('pickup1active') href="/pickup"
                    class="block text-sm px-2 py-4 text-[#323842] hover:bg-[#BFD9EB] transition duration-300">Apply
                    Internship</a></li>
            <li><a @yield('buyproducts1active') href="/allinternshiplist"
                    class="block text-sm px-2 py-4 text-[#323842] hover:bg-[#BFD9EB] transition duration-300">All
                    Internship List</a></li>
            @if (Auth::check())
                <li>
                    <div @yield('profile_edit') @click.away="open = false" class="relative" x-data="{ open: false }">
                        <button @click="open = !open"
                            class="flex flex-row w-full px-2 py-4 text-sm text-[#323842] hover:bg-[#BFD9EB] transition duration-300">
                            <span @yield('profile_edit')>{{ Auth::user()->name }}</span>
                            <svg fill="currentColor" viewBox="0 0 20 20"
                                :class="{ 'rotate-180': open, 'rotate-0': !open }"
                                class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <div x-show="open" x-transition:enter="transition ease-out duration-100"
                            x-transition:enter-start="transform opacity-0 scale-95"
                            x-transition:enter-end="transform opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75"
                            x-transition:leave-start="transform opacity-100 scale-100"
                            x-transition:leave-end="transform opacity-0 scale-95"
                            class="absolute left-0 w-1/2 mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                            <div class="px-2 py-2 bg-white rounded-md shadow">
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="#">My Account</a>
                                <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                                    href="#">Sign Out</a>
                            </div>
                        </div>
                    </div>
                </li>
            @else
                <li><a href="/login"
                        class="block text-sm px-2 py-4 text-[#323842] hover:bg-[#BFD9EB] transition duration-300">Log
                        In</a></li>
                <li><a href="/chooserole"
                        class="block text-sm px-2 py-4 text-[#323842] hover:bg-[#BFD9EB] hover:text-white transition duration-300">Register</a>
                </li>
            @endif
        </ul>
    </div>
    <script>
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");

        btn.addEventListener("click", () => {
            menu.classList.toggle("hidden");
        });
    </script>
</nav>
