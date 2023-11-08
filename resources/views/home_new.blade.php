@extends('template_tailwind')
@section('title', 'Home')
@section('content')
<div class="bg-[#ECFDFC] py-7 md:py-9 grid grid-cols-1 gap-x-10 gap-y-12 font-poppins sm:grid-cols-2 md:mt-16">
    <div class="order-1 sm:order-2">
        <img src="{{asset('images/Container 3.png')}}" class="w-[90%] sm:w-[70%] mx-auto">
    </div>    
    <div class="order-2 sm:order-1 px-24 sm:px-5 md:px-7 lg:px-32 flex flex-col items-center justify-center md:items-start ">
        <h4 class="text-[#0EA89B] text-center sm:text-start font-bold md:text-3xl">Your Dream Internships</h4>
        <h4 class="text-[#323842] text-center sm:text-start font-bold md:text-3xl">Waiting for You</h4>
        <a href="/login" class="mt-5 sm:mt-7 py-2 min-w-[50%] sm:min-w-[65%] lg:min-w-[50%] bg-[#0EA89B] text-xl font-bold text-white rounded hover:from-[#BFD9EB] hover:text-cyan-400 transition duration-300 block text-center">Explore Now</a>
    </div>
</div>
<div class="p-10 mt-10">
    <!-- Title -->
    <h2 class="text-[#323842] text-3xl font-bold text-center mb-5">Explore more Internships</h2>
    <div class="w-1/2 mx-auto  md:w-1/2 bg-white shadow-md rounded-lg p-4 flex items-center">
        <form action="/internship/search" method="get" class="w-full flex items-center">
            <input type="text" name="search" id="search" class="w-full p-2 rounded-lg border-2 border-[#0EA89B] focus:outline-none" placeholder="Search internships...">
            <button type="submit" class="ml-4 px-4 py-2 bg-[#0EA89B] text-white rounded-lg hover:bg-[#FFFFFF] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[#0EA89B] transition duration-300">
                Search
            </button>
        </form>
    </div>
    <div class="flex overflow-hidden space-x-4 mx-auto mt-10 p-10">
        <div class="flex space-x-16 mx-auto">
            <div class="bg-cyan-100 rounded-xl p-4 text-center">
                <div class="p-2 inline-flex items-center justify-center rounded-full mb-2">
                    <img src="{{asset('images/sales.png')}}" alt="">
                </div>
                <div class="font-bold text-cyan-900">Sales</div>
                <div class="text-sm text-cyan-700">{{ $sales_jobs_count }} Internships</div>
            </div>
            <div class="bg-cyan-100 rounded-xl p-4 text-center">
                <div class="p-2 inline-flex items-center justify-center rounded-full mb-2">
                    <img src="{{asset('images/it.png')}}" alt="">
                </div>
                <div class="font-bold text-cyan-900">IT</div>
                <div class="text-sm text-cyan-700">{{ $it_jobs_count }} Internships</div>
            </div>
            <div class="bg-cyan-100 rounded-xl p-4 text-center">
                <div class="p-2 inline-flex items-center justify-center rounded-full mb-2">
                    <img src="{{asset('images/marketing.png')}}" alt="">
                </div>
                <div class="font-bold text-cyan-900">Marketing</div>
                <div class="text-sm text-cyan-700">{{ $marketing_jobs_count }} Internships</div>
            </div>
            <div class="bg-cyan-100 rounded-xl p-4 text-center">
                <div class="p-2 inline-flex items-center justify-center rounded-full mb-2">
                    <img src="{{asset('images/finance.png')}}" alt="">
                </div>
                <div class="font-bold text-cyan-900">Finance</div>
                <div class="text-sm text-cyan-700">{{ $finance_jobs_count }} Internships</div>
            </div>
        </div>
    </div>  
    <div class=" p-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($jobs as $job)
            <a href="/detail_internship/{{ $job->job_id }}">
                <div class="bg-white rounded-lg shadow p-6 space-y-4 border border-black">
                    <div class="flex items-center space-x-3">
                        @if ($job->area_of_expertise == 'IT')
                        <img class="w-10 h-10" src="{{asset('images/it.png')}}" alt="Company Logo">
                        @elseif ($job->area_of_expertise == 'Sales')
                        <img class="w-10 h-10" src="{{asset('images/sales.png')}}" alt="Company Logo">
                        @elseif ($job->area_of_expertise == 'Marketing')
                        <img class="w-10 h-10" src="{{asset('images/marketing.png')}}" alt="Company Logo">
                        @elseif ($job->area_of_expertise == 'Finance')
                        <img class="w-10 h-10" src="{{asset('images/finance.png')}}" alt="Company Logo">
                        @endif
                      <h3 class="text-lg font-semibold">{{ $job->position }}</h3>
                      {{-- <span class="bg-red-100 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded">Hot</span> --}}
                    </div>
                    <div class="text-lg">$95K - $120K</div>
                    <div class="flex items-center space-x-2 text-gray-600">
                      <img class="w-5 h-5" src="{{asset('images/location.png')}}" alt="Location Icon">
                      <span>{{ $job->location }}</span>
                    </div>
                    <div class="flex items-center space-x-2 text-gray-600">
                      <img class="w-5 h-5" src="{{asset('images/material-symbols_work.png')}}" alt="Work Type Icon">
                      <span>{{ $job->internship_type }}</span>
                    </div>
                  </div>
            </a>
            @endforeach
        </div>
        <div class="flex justify-center mt-6">
        <a href="/list_internship">
            <button class="bg-[#0EA89B] text-white px-8 py-3 rounded-lg hover:bg-white hover:text-[#0EA89B] transition ease-in-out duration-150">
                See more
            </button>
        </a>
        </div>
      </div>
      
</div>


<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('homeactive')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('home1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
