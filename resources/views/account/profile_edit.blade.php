@extends('template_tailwind')
@section('title', 'Edit Profile')
@section('content')
    <div class="flex h-screen bg-gray-100 mt-20">
        <!-- Sidebar -->
        @include('account.sidebar')

        <!-- Content Area -->
        <div class="flex-1">

            <div class="min-h-screen bg-gray-100 p-5">
                <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
                    <div class="flex justify-between items-center pb-5 border-b border-gray-200 mb-5">
                        <h2 class="text-2xl font-semibold text-gray-700">Edit Profile</h2>
                        <span class="cursor-pointer text-gray-400">
                        </span>
                    </div>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif
                    <form action="/profile_edit" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="user_name">Profile</label>
                            <div class="flex items-center">
                                <div class="w-12 h-12 rounded-full overflow-hidden mr-4">
                                    @if (!($user->picture === null))
                                        <img src="{{ url('/data_file/' . $user->picture) }}" alt="profile picture"
                                            class="w-full h-full object-cover" id="imagePreview">
                                    @else
                                        <img src="{{ asset('images/it.png') }}" alt="profile picture"
                                            class="w-full h-full object-cover" id="imagePreview">
                                    @endif
                                </div>
                                <div class="flex-grow">
                                    <input type="file" name="picture"
                                        class="text-indigo-600 hover:text-indigo-900 text-sm mr-2" id="imageUpload"
                                        onchange="previewImage()">
                                    @error('picture')
                                        <div class="text-red-700">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="user_name">Full Name</label>
                            <input name="name"
                                class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="user_name" type="text" value="{{ $user->name }}">
                            @error('name')
                                <div class="text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-semibold mb-2" for="skills">Professional
                                Skills</label>
                            <select id="skillsDropdown" class="block text-gray-700 text-sm font-semibold mb-2">
                                <option value="" disabled selected>Select your Skills</option>
                                <option value="Software Development">Software Development</option>
                                <option value="UX/UI Design">UX/UI Design</option>
                                <option value="Cybersecurity">Cybersecurity</option>
                                <option value="Data Analysis">Data Analysis</option>
                                <option value="System Administration">System Administration</option>
                                <option value="Project Management">Project Management</option>
                                <option value="Market Research">Market Research</option>
                                <option value="Finance">Finance</option>
                                <option value="Human Resources">Human Resources</option>
                                <option value="Marketing">Marketing</option>
                                <option value="Law">Law</option>
                                <option value="Mechanical Engineering">Mechanical Engineering</option>
                                <option value="Communication">Communication</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Biology">Biology</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Chemistry">Chemistry</option>
                                <option value="Public Health">Public Health</option>
                                <option value="Graphic Design">Graphic Design</option>
                                <option value="Interior Design">Interior Design</option>
                                <option value="Public Health">Public Health</option>
                                <option value="Visual Arts">Visual Arts</option>
                                <option value="Sociology">Sociology</option>
                                <option value="Music">Music</option>
                                <option value="Risk Analysis">Risk Analysis</option>
                                <option value="Sports Management">Sports Management</option>
                                <option value="Journalism">Journalism</option>
                                <option value="Sustainable Development">Sustainable Development</option>
                                <option value="Climate">Climate</option>
                                <option value="Film and Media Production">Film and Media Production</option>
                            </select>
                            <input name="skills" value="{{ $user->skills }}"
                                class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="selectedSkills" type="text" placeholder="Selected skills">
                        </div>
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-semibold mb-2"
                                for="description">Description</label>
                            <textarea name="about_me"
                                class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="about_me">{{ $user->about_me }}</textarea>
                            @error('about_me')
                                <div class="text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="flex items-center justify-start">
                            <button
                                class="bg-[#0EA89B] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                                type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>
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
@endsection

@section('profile_edit')
    class=' text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('profile_edit')
    class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
