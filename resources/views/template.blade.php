<!DOCTYPE html>
<html>
	<head>
        <title>@yield('title')</title>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700;900&family=Raleway&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css')}}">
        <script src="https://unpkg.com/flowbite@1.5.1/dist/datepicker.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        @section('head')
        @show
	</head>
	<body>
		<!-- Navbar goes here -->
		<nav class="bg-[#3166AD] font-poppins shadow-lg fixed w-full z-20 top-0 left-0">
			<div class="max-w-6xl mx-auto px-4">
				<div class="flex justify-between">
					<div class="flex space-x-7">
						<div>
							<!-- Website Logo -->
							<a href="#" class="flex items-center py-4 px-2">
                                <img src="{{asset('images/logo.png')}}" alt="Logo" class="w-28 ">
							</a>
						</div>
                    </div>
                    <div class="flex space-x-7">
                        <!-- Primary Navbar items -->
                        <div class="hidden md:flex items-center space-x-1">
                            <a @yield('homeactive') href="/" class="py-4 px-2 text-white font-semibold hover:text-[#BFD9EB] transition duration-300">Home</a>
                            <a @yield('pickupactive') href="/pickup" class="py-4 px-2 text-white font-semibold hover:text-[#BFD9EB] transition duration-300">Pickup</a>
                            <a @yield('buyproductsactive') href="/buyproducts" class="py-4 px-2 text-white font-semibold hover:text-[#BFD9EB] transition duration-300">Buy Products</a>
                        </div>

                        <!-- Secondary Navbar items -->
                        <div class="hidden md:flex items-center space-x-3 ">
                            <a href="/login" class="py-2 px-6 bg-gradient-to-r from-[#3166AD] to-[#BFD9EB] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">Log In</a>
                            <a href="/register" class="py-2 px-6 font-medium text-white rounded hover:bg-[#BFD9EB] transition duration-300">Register</a>
                        </div>
                    </div>
					<!-- Mobile menu button -->
					<div class="md:hidden flex items-center">
						<button class="outline-none mobile-menu-button">
						<svg class=" w-6 h-6 text-white hover:text-[#BFD9EB] "
							x-show="!showMenu"
							fill="none"
							stroke-linecap="round"
							stroke-linejoin="round"
							stroke-width="2"
							viewBox="0 0 24 24"
							stroke="currentColor"
						>
							<path d="M4 6h16M4 12h16M4 18h16"></path>
						</svg>
					</button>
					</div>
				</div>
			</div>
			<!-- mobile menu -->
			<div class="hidden mobile-menu">
				<ul class="">
					<li><a @yield('home1active') href="/" class="block text-sm px-2 py-4 text-white hover:bg-[#BFD9EB] transition duration-300">Home</a></li>
					<li><a @yield('pickup1active') href="/pickup" class="block text-sm px-2 py-4 text-white hover:bg-[#BFD9EB] transition duration-300">Pickup</a></li>
					<li><a @yield('buyproducts1active') href="/buyproducts" class="block text-sm px-2 py-4 text-white hover:bg-[#BFD9EB] transition duration-300">Buy Products</a></li>
					<li><a href="/login" class="block text-sm px-2 py-4 text-white hover:bg-[#BFD9EB] transition duration-300">Log In</a></li>
                    <li><a href="/register" class="block text-sm px-2 py-4 text-white hover:bg-[#BFD9EB] transition duration-300">Register</a></li>
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
        <div id="main">
            @section('isikonten')
            @show
        </div>
        <footer class="bg-[#3166AD] mt-16">
            <div class="flex md:mt-32 py-7 lg:py-12">
                <div class="flex flex-none w-[30%] lg:w-[35%] px-4 md:px-10 lg:px-24">
                    <img src="{{asset('images/logo.png')}}" alt="Logo" class="object-contain">
                </div>
                <div class="flex-initial w-[35%] lg:w-[35%] font-poppins px-3 lg:px-5">
                    <div>
                        <div class="text-white font-bold text-md md:text-lg lg:text-2xl" >
                            <h1>Our Service</h1>
                        </div>
                        <div class="pt-2">
                            <a href="/pickup" class="text-sm md:text-md lg:text-lg text-white hover:text-[#BFD9EB] transition duration-300">Pickup</a>
                        </div>
                        <div>
                            <a href="/buyproducts" class="text-sm md:text-md lg:text-lg text-white hover:text-[#BFD9EB] transition duration-300">Buy Products</a>
                        </div>
                        <div>
                            <a href="#" class="text-sm md:text-md lg:text-lg text-white hover:text-[#BFD9EB] transition duration-300">Redeem E-money</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-initial w-[35%] lg:w-[30%]">
                    <div class="text-white font-bold flex items-center justify-center text-lg md:text-2xl lg:text-3xl md:pr-16 ">
                        <h1>Manage your trash with just a click! </h1>
                    </div>
                </div>
            </div>
        </footer>
	</body>
</html>
