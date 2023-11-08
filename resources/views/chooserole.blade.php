<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700;900&family=Raleway&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <link rel="icon" href="{{asset('images/internhub-high-resolution-logo.png')}}">
  <title>Log In</title>
  <link rel="stylesheet" href="{{ asset('css/app.css')}}">
</head>
<body>
    <div class="container mx-auto font-poppins max-w-sm m-9 bg-[#FBFCFF]  lg:max-w-4xl">
        <div class="rounded-lg flex shadow-full lg:rounded-none lg:rounded-r-lg">
            <div class="px-7 py-6 lg:px-8 lg:flex-1">
                <div class="flex justify-end">
                    <a href="/" class=""><i class="fa-solid fa-xmark"></i></a>
                </div>
                <h1 class="font-bold text-2xl text-center mt-1 lg:text-3xl">Choose your Role</h1>
                   <a href="/studentregister">
                    <button class="mt-3 text-lg font-semibold bg-[#0EA89B] w-full text-white rounded-xl px-6 py-3 block  hover:text-[#0EA89B] hover:bg-[#FFFFFF] transition duration-300" style="box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.25);">
                        Student
                    </button>
                   </a>
                   <a href="/companyregister">
                    <button class="mt-3 text-lg font-semibold bg-[#0EA89B] w-full text-white rounded-xl px-6 py-3 block  hover:text-[#0EA89B] hover:bg-[#FFFFFF] transition duration-300" style="box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.25);">
                        Company
                    </button>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
</body>
</html>
