<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700;900&family=Raleway&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <title>Log In</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
    <div class="container mx-auto font-poppins max-w-sm m-9 bg-[#FBFCFF]  lg:max-w-4xl">
        <div class="rounded-lg flex shadow-full lg:rounded-none lg:rounded-r-lg">
            <div class="hidden bg-[#3166AD] lg:inline lg:flex-1 lg:rounded-l-lg">
                <h1 class="font-bold text-center text-white mt-1 lg:text-2xl lg:py-20">We help you to <br> manage your trash</h1>
                <img src="{{asset('images/login.png')}}" alt="" class="px-16">
            </div>
            <div class="px-7 py-6 lg:px-8 lg:flex-1">
                <div class="flex justify-end">
                    <a href="#" class=""><i class="fa-solid fa-xmark"></i></a>
                </div>
                <h1 class="font-bold text-2xl text-center mt-1 lg:text-3xl">Let’s login into your account</h1>
                <form action="">
                    <div class="mt-7">
                        <label for="email"><span class="font-semibold text-md">Email</span>
                            <input type="email" placeholder="Enter your email" class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] ">
                        </label>
                    </div>
                    <div class="mt-5" x-data="{ show: true }">
                        <label for="password"><span class="font-semibold text-md">Password</span>
                            <div class="relative">
                                <input placeholder="Enter your password" :type="show ? 'password' : 'text'"  class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] ">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                    :class="{'hidden': !show, 'block':show }" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 576 512">
                                    <path fill="currentColor"
                                        d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                    </path>
                                    </svg>
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                    :class="{'block': !show, 'hidden':show }" xmlns="http://www.w3.org/2000/svg"
                                    viewbox="0 0 640 512">
                                    <path fill="currentColor"
                                        d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                    </path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="flex justify-between mt-2" hidden style="">
                        <label class="block my-4" hidden>
                            {{-- <input type="checkbox" class=" accent-[#3166AD] focus:hover:text-[#3166AD]">
                            <span class="py-2 text-sm text-[#B5B3BC] hover:text-[#3166AD]"> Remember me </span> --}}
                        </label>
                        <label class="block my-4" hidden>
                            {{-- <a href="#" class="cursor-pointer text-[#B5B3BC] hover:text-[#3166AD]">
                                <span class="text-sm">Forgot Password?</span>
                            </a> --}}
                        </label>
                    </div>
                    <button class="mt-3 text-lg font-semibold bg-[#3166AD] w-full text-white rounded-xl px-6 py-3 block  hover:text-white hover:bg-[#11468c]" style="box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.25);">
                        Login
                    </button>
                </form>
                <p class="pt-7 text-md text-[#B5B3BC] text-center"> Don’t have an account? <a href="/register" class="text-[#3166AD] font-semibold"> Sign up here </a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</body>
</html>
