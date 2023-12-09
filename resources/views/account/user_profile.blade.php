@extends('template_tailwind')
@section('title', 'Profile')
@section('content')


    <div class="container mx-auto px-4 mt-20 mb-20">
        <h2 class="font-bold text-3xl mb-2">My Profile</h2>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-lg max-w-sm mt-4">
                    <div class="flex justify-center">
                        <div class="relative">
                            <!-- Background circle -->
                            <div class="w-24 h-24 rounded-full -mt-12"></div>
                            <!-- Profile image -->
                            @if (!($user->picture === null))
                                <img class="w-24 h-24 rounded-full border-4 border-white absolute top-0"
                                    src="{{ url('/data_file/' . $user->picture) }}" alt="Profile image">
                            @else
                                <img class="w-24 h-24 rounded-full border-4 border-white absolute top-0"
                                    src="{{ asset('images/it.png') }}" alt="Profile image">
                            @endif
                        </div>
                    </div>
                    <div class="text-center mt-12">
                        <p class="text-lg text-gray-800 font-semibold">{{ $user->name }}</p>
                        <p class="text-teal-600">{{ $user->job_dream }}</p>
                    </div>
                    <div class="flex justify-center pb-6 mt-3">
                        <a href="/profile_edit">
                            <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                                Edit profile
                            </button>
                        </a>
                    </div>
                    <div class="flex justify-center pb-3 mt-1">
                        <a href="/application_history">
                            <button class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded">
                                Application History
                            </button>
                        </a>
                    </div>
                </div>

            </div>
            {{-- @foreach ($job as $j) --}}
            <div class="md:col-span-3">
                <!-- Job Details Content -->
                <div class="bg-white p-4 border border-gray-200 rounded">
                    <!-- Job Description -->
                    <div class="mb-4">
                        <h3 class="font-bold mb-2">About</h3>
                        <p>{{ $user->about_me }}</p>
                    </div>

                    <!-- Responsibilities -->
                    <div class="mb-4">
                        <h3 class="font-bold mb-2">Work Experience</h3>
                        <div class="grid">
                            @if (count($workExperiences))
                                @foreach ($workExperiences as $w)
                                    <div class="flex items-start mb-4 border-2 border-black rounded p-5">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('images/sales.png') }}" alt="UX UI Designer"
                                                class="w-8 h-8 rounded-full mr-2"> <!-- Image on the left -->
                                        </div>
                                        <div class="flex-grow">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-lg font-semibold">{{ $w->position }}</h3>
                                                <span class="text-sm text-gray-500">{{ $w->start_year }} -
                                                    {{ $w->end_year }}</span>
                                            </div>
                                            <div class="text-sm text-gray-500 mb-2">
                                                <span class="font-medium">🔁 Fulltime</span> |📍
                                                <span>{{ $w->company }}</span>
                                            </div>
                                            <p class="text-gray-700">
                                                {{ $w->description }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="mb-2">No Work Experience Added</p>
                            @endif

                        </div>
                    </div>
                    @php
                        $skills = array_map('trim', explode(',', $user->skills));
                    @endphp
                    <div class="mb-4">
                        <h3 class="font-bold mb-2">Skills</h3>
                        <ul class="list-disc pl-5">
                            @foreach ($skills as $s)
                                <li>{{ $s }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="mb-4">
                        <h3 class="font-bold mb-2">Education</h3>
                        <div class="grid">
                            @if (count($educations))
                                @foreach ($educations as $e)
                                    <div class="flex items-start mb-4 border-2 border-black rounded p-5">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('images/sales.png') }}" alt="UX UI Designer"
                                                class="w-8 h-8 rounded-full mr-2"> <!-- Image on the left -->
                                        </div>
                                        <div class="flex-grow">
                                            <div class="flex items-center justify-between">
                                                <h3 class="text-lg font-semibold">{{ $e->school_name }}</h3>
                                            </div>
                                            <div class="text-sm text-gray-500 mb-2">
                                                <span class="font-medium">🔁 {{ $e->degree }}</span>
                                            </div>
                                            <div class="text-sm text-gray-500 mb-2">
                                                <span class="font-medium">📅 {{ $e->start_year }} -
                                                    {{ $e->end_year }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <p class="mb-2">No Education Added</p>
                            @endif
                        </div>
                    </div>


                </div>
            </div>
            {{-- @endforeach --}}

        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('profile_edit')
    class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('profile_edit')
    class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
