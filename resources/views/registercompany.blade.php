<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;500;600;700;900&family=Raleway&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" href="{{ asset('images/internhub-high-resolution-logo.png') }}">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container mx-auto font-poppins max-w-sm m-9 bg-[rgb(251,252,255)]  lg:max-w-4xl">
        <div class="rounded-lg lg:flex shadow-full lg:rounded-none lg:rounded-r-lg">
            <div class="hidden bg-[#3166AD] lg:inline lg:flex-1 lg:rounded-l-lg">
                <h2 class="font-bold text-center text-white mt-7 lg:text-2xl lg:py-28">Streamlining Internship
                    Connections with <br> Efficiency and Intelligence</h2>
                <img src="{{ asset('images/login-removebg-preview.png') }}" alt="" class="px-16">
            </div>
            <div class="px-10 py-6 lg:px-8 lg:flex-1">
                <div class="flex justify-end">
                    <a href="/" class=""><i class="fa-solid fa-xmark"></i></a>
                </div>
                <h1 class="font-bold text-2xl text-center mt-1 lg:text-3xl">Let’s make your <br> account!</h1>
                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline text-[#FF0000]">{{ session('success') }}</span>
                    </div>
                @endif
                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <span class="block sm:inline text-[#FF0000]">{{ session('error') }}</span>
                    </div>
                @endif
                <form action="/registerCompany" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mt-7">
                        <label for="email"><span class="font-semibold text-md">Email</span>
                            <input type="email" placeholder="Enter your email" value="{{ old('email') }}"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                name="email">
                        </label>
                        @error('email')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="company"><span class="font-semibold text-md">Company Name</span>
                            <input type="text" placeholder="Enter your company name" value="{{ old('company') }}"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                name="company">
                        </label>
                        @error('company')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="file"><span class="font-semibold text-md">Company Logo</span>
                            <img id="imagePreview" src=""
                                class="w-[50%] md:w-[30%] lg:w-[20%] mx-auto rounded-full">
                            <input type="file" value="{{ old('file') }}" id='imageUpload' name="file"
                                class="mt-2 px-3 py-2 shadow w-full block text-sm border-2 border-[#3166AD]"
                                name="file" onchange="previewImage()">
                        </label>
                        @error('file')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="company_description" class="font-semibold text-md">Company Description</label>
                        <textarea placeholder="Enter your company description"
                            class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD]" name="company_description"
                            rows="4">{{ old('company_description') }}</textarea>
                    </div>
                    @error('company_description')
                        <div class="text-red-700">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="mt-5">
                        <label for="company_established"><span class="font-semibold text-md">Company Established</span>
                            <input type="date" placeholder="Enter your company established"
                                value="{{ old('company_established') }}"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                name="company_established">
                        </label>
                        @error('company_established')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="address"><span class="font-semibold text-md">Address</span>
                            <input name="address" type="text" placeholder="Enter your Address"
                                value="{{ old('address') }}"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                name="address">
                        </label>
                        @error('address')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <label for="phone_number"><span class="font-semibold text-md">Phone Number</span>
                            <input type="phone_number" placeholder="Enter your name"
                                value="{{ old('phone_number') }}"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                name="phone_number">
                        </label>
                        @error('phone_number')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5" hidden>
                        <label for="education"><span class="font-semibold text-md">Highest Education</span>
                            <select name="role_id"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD]">
                                <option value="0">0</option>
                                <option selected value="1">1</option>
                            </select>
                        </label>
                    </div>
                    <div class="mt-5">
                        <label for="business_area"><span class="font-semibold text-md">Area of Business</span>
                            <select id="skillsDropdown" name="business_area"
                                class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD]">
                                <option value="" disabled selected>Select Area of Business</option>
                                <option value="IT">IT</option>
                                <option value="Medicine">Medicine</option>
                                <option value="Finance">Finance</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Education">Education</option>
                                <option value="Engineering">Engineering</option>
                                <option value="Environmental">Environmental</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Art">Art</option>
                                <option value="Social">Social</option>
                                <option value="Law">Law</option>
                                <option value="Research">Research</option>
                                <option value="Communication">Communication</option>
                                <option value="Tourism">Tourism</option>
                            </select>
                        </label>
                        @error('business_area')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-5">
                        <input type="text" id="selectedSkills" value="{{ old('business_area') }}"
                            name="business_area"
                            class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2"
                            placeholder="Selected Area of Business" readonly>
                    </div>

                    <div class="mt-5" x-data="{ show: true }">
                        <label for="password"><span class="font-semibold text-md">Password</span>
                            <div class="relative">
                                <input placeholder="Enter your password" :type="show ? 'password' : 'text'"
                                    class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#3166AD] "
                                    name="password">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                        :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 576 512">
                                        <path fill="currentColor"
                                            d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                        </path>
                                    </svg>
                                    <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                                        :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                                        viewbox="0 0 640 512">
                                        <path fill="currentColor"
                                            d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                        </path>
                                    </svg>
                                </div>
                            </div>
                        </label>
                        @error('password')
                            <div class="text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button
                        class="mt-8 text-lg font-semibold bg-[#3166AD] w-full text-white rounded-xl px-6 py-3 block  hover:text-white hover:bg-[#11468c]"
                        style="box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.25);">
                        Sign Up
                    </button>
                </form>
                <p class="pt-7 text-md text-[#B5B3BC] text-center"> Already have an account? <a href="/login"
                        class="text-[#3166AD] font-semibold"> Login here </a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <script>
        function previewImage() {
            const file = document.getElementById('imageUpload').files[0];
            const preview = document.getElementById('imagePreview');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    preview.src = event.target.result;
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const skillsDropdown = document.getElementById('skillsDropdown');
            const selectedSkills = document.getElementById('selectedSkills');

            skillsDropdown.addEventListener('change', function() {
                if (selectedSkills.value) {
                    selectedSkills.value += ', ' + this.value;
                } else {
                    selectedSkills.value = this.value;
                }

                // Reset dropdown setelah dipilih
                this.selectedIndex = 0;
            });
        });
    </script>
</body>

</html>
