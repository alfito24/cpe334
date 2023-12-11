@extends('template_tailwind')
@section('title', 'Apply Internship')
@section('content')

    <body class="bg-gray-100 mt-20">
        <div class="container mx-auto p-6">
            <!-- Application form -->
            <div class="grid md:grid-cols-2 gap-8">
                <!-- Left column for user details and form inputs -->
                <form method="POST" action="/apply/{{ $intern->job_id }}" enctype="multipart/form-data">
                    @csrf
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h2 class="text-2xl mb-4 font-bold">Applying for {{ $intern->position }} at
                            {{ $intern->user->company }}</h2>
                        <!-- User info -->
                        <div class="flex items-center mb-4">
                            {{-- <div class="rounded-full h-16 w-16 bg-gray-200 mr-4"></div> --}}
                            <div>
                                <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                                <p class="text-gray-600">{{ $user->email }}</p>
                                <p class="text-gray-600">{{ $user->phone_number }}</p>
                            </div>
                        </div>
                        <!-- Address -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                            <input value="{{ $user->address }}" type="text"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" disabled />
                        </div>
                        <!-- Resume Upload -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Upload Resume</label>
                            <div class="flex items-center">
                                <input type="file" name="cv"
                                    class="shadow appearance-none border rounded py-2 px-3 text-gray-700" />
                            </div>
                            @error('cv')
                                <div class="text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Cover Letter Upload -->
                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Upload Cover Letter</label>
                            <input type="file" name="cover_letter"
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700" />
                            @error('cover_letter')
                                <div class="text-red-700">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <button class="bg-[#0EA89B] hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full">Submit
                            Application</button>
                    </div>
                </form>
                @php
                    $responsibilities = array_map('trim', explode(',', $intern->responsibilites));
                    $skills = array_map('trim', explode(',', $intern->skills));
                @endphp
                <!-- Right column for job description -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl mb-2 font-bold">{{ $intern->position }}</h3>
                    <p class="text-gray-600 mb-4">{{ $intern->salary }}/p>
                    <p class="text-gray-600 mb-4">{{ $intern->location }}</p>
                    <p class="text-gray-600 mb-4">{{ $intern->internship_type }}</p>
                    <h4 class="text-lg mb-2 font-bold">Job Description</h4>
                    <p class="text-gray-600 mb-4">{{ $intern->description }}</p>
                    <h4 class="text-lg mb-2 font-bold">Responsibilities</h4>
                    <ul class="list-disc pl-6 mb-4 text-gray-600">
                        @foreach ($responsibilities as $r)
                            <li>{{ $r }}</li>
                        @endforeach
                    </ul>
                    <h4 class="text-lg mb-2 font-bold">Skills</h4>
                    <ul class="list-disc pl-6 mb-4 text-gray-600">
                        @foreach ($skills as $s)
                            <li>{{ $s }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </body>



    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function toggleStipendRange() {
            // Get the checkbox and the input elements
            var checkbox = document.getElementById('stipend');
            var input = document.getElementById('start_year');

            // Toggle the disabled property and border style of the input based on the checkbox's checked state
            if (checkbox.checked) {
                input.disabled = true;
                input.classList.add('border-[#000000]'); // Add a class to remove the border
                input.classList.remove('border-[#0EA89B]', 'border-[#0EA89B]'); // Remove border classes
            } else {
                input.disabled = false;
                input.classList.remove('border-[#000000]'); // Remove the class that removes the border
                input.classList.add('border-2', 'border-[#0EA89B]'); // Add back the border classes
            }
        }
        document.addEventListener('DOMContentLoaded', function() {
            const skillsDropdown = document.getElementById('skillsDropdown');
            const selectedSkills = document.getElementById('selectedSkills');

            skillsDropdown.addEventListener('change', function() {
                if (selectedSkills.value) {
                    selectedSkills.value += ', ' + this.value;
                } else {
                    selectedSkills.value = this.value;
                }

                this.selectedIndex = 0;
            });
        });
    </script>
@endsection

@section('internshiplist')
    class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('internshiplist')
    class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
