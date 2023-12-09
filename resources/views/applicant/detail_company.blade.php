@extends('template_tailwind')
@section('title', 'Company Detail')
@section('content')

    <div class="max-w-7xl mx-auto p-6">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-8">
            <div class="mb-6 mt-6">
                <!-- Banner image and heading -->
                <div class="mb-4 mt-4">
                    <img src="{{ asset('images/company.png') }}" alt="">
                    <div class="flex items-center">
                        <div
                            class="bg-blue-500 rounded-full h-14 w-14 flex items-center justify-center text-white text-2xl font-bold">
                            S</div>
                        <div class="ml-4">
                            <h2 class="text-xl font-bold text-gray-900">{{ $company->company }}</h2>
                            <p class="text-sm text-gray-600">{{ $company->business_area }}</p>
                        </div>
                    </div>
                </div>
                <!-- Company details -->
                <div class="grid grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="flex items-center"><span class="mr-2">🌐</span> {{ $company->company_website }}</p>
                        <p class="flex items-center"><span class="mr-2">📍</span> {{ $company->address }}</p>
                        <p class="flex items-center"><span class="mr-2">👥</span> {{ $company->company_size }} employees
                        </p>
                    </div>
                    <div>
                        <p class="flex items-center"><span class="mr-2">🔁</span> Hybrid</p>
                        <p class="flex items-center"><span class="mr-2">📅</span> {{ $company->company_workdays }}</p>
                    </div>
                </div>
            </div>

            <!-- About Us -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">About us</h3>
                <p class="text-gray-600 text-sm mb-4">
                    {{ $company->company_description }}
                </p>
            </div>

            <!-- Why choose us -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-2">Why choosing us</h3>
                <p class="text-gray-600 text-sm mb-4">
                <ul style="list-style-type: decimal;">
                    <li>Career Growth Opportunities</li>
                    <li>Innovative Work Environment</li>
                    <li>Work-Life Balance</li>
                    <li>Diverse and Inclusive Culture</li>
                    <li>Impact and Purpose</li>
                </ul>
                </p>
            </div>
            <!-- Recent job openings -->
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4">Recent job openings</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($interns as $intern)
                        <a href="/detail_internship/{{ $intern->job_id }}">
                            <div class="bg-white rounded-lg shadow p-6 space-y-4 border border-black">
                                <div class="flex items-center space-x-3">
                                    <img class="w-10 h-10" src="{{ asset('images/it.png') }}" alt="Company Logo">
                                    <h3 class="text-lg font-semibold">{{ $intern->position }}</h3>
                                </div>
                                <div class="text-lg">{{ $intern->salary }}</div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <img class="w-5 h-5" src="{{ asset('images/location.png') }}" alt="Location Icon">
                                    <span>{{ $intern->location }}</span>
                                </div>
                                <div class="flex items-center space-x-2 text-gray-600">
                                    <img class="w-5 h-5" src="{{ asset('images/material-symbols_work.png') }}"
                                        alt="Work Type Icon">
                                    <span>{{ $intern->internship_type }}</span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="flex justify-center mt-6">
                    <button
                        class="bg-[#0EA89B] text-white px-8 py-3 rounded-lg hover:bg-white hover:text-[#0EA89B] transition ease-in-out duration-150">
                        View All Jobs
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('list_internship')
    class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('list_internship')
    class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
