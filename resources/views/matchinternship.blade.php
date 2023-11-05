@extends('template')
@section('title', 'Internship List')
@section('content')
@php
use Carbon\Carbon;
@endphp

<div class="mb-10 text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-20 text-2xl md:mt-36 md:text-3xl">
@php $jobFound = false; @endphp
    @foreach ($jobs as $job)
        @if(Carbon::now()->lessThanOrEqualTo($job->deadline))
            @php $jobFound = true; @endphp
        @endif
    @endforeach
@if (!$jobFound)
    <h1 class="mb-10">No Jobs Found</h1>
@else
@guest
<h1 class="mb-10">View All Internships</h1>
@endguest
@auth
@if (Auth::user()->role_id == 0)
<h1 class="mb-10">{{ $title }}</h1>
@else
<h1 class="mb-10">View your Internship Here</h1>
@endif
@endauth

@endif

</div>

@auth
@if (Auth::user()->role_id == 0)
<div class="w-1/2 mx-auto mt-5 md:w-1/2 bg-white shadow-md rounded-lg p-4 flex items-center">
    <form action="/internship/search" method="get" class="w-full flex items-center">
        <input type="text" name="search" id="search" class="w-full p-2 rounded-lg border-2 border-[#3367AD] focus:outline-none" placeholder="Search internships...">
        <button type="submit" class="ml-4 px-4 py-2 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
            Search
        </button>
    </form>
</div>   
@endif
@endauth

<div class="grid grid-cols-1 gap-x-10 gap-y-16 mt-5">
   @foreach ($jobs as $job )
   @if(Carbon::now()->lessThanOrEqualTo($job->deadline))
   <div class="w-1/2 mx-auto flex p-6 bg-white border-[#3367AD] border-2 rounded-lg space-x-6 flex-col">
    <div class="flex items-center space-x-6 mb-4">
        <div class="flex-shrink-0">
            <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                @if (!($job->user->picture === null))
                <img src="{{ url('/data_file/'.$job->user->picture) }}" alt="Grab Logo" class="" style="width: 245px;height:199px">
                @else
                <img src="{{asset('images/apply.png')}}" alt="Grab Logo" class="h-12 w-auto">
                @endif
            </div>
        </div>
        <div class="flex-grow ml-4">
            <h3 class="text-lg font-medium mb-2">{{$job->position}}</h3>
            <p class="text-gray-600 mb-1">{{$job->user->company}}</p>
            <p class="text-gray-600">{{$job->location}} ({{$job->worktype}})</p>
            <p class="text-gray-600">Deadline Application: {{ Carbon::parse($job->deadline)->format('j F Y') }}</p>
        </div>
    </div>
    @auth
   <a href="/internshipdetail/{{$job->job_id}}">
    <div class="flex justify-end">
        <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
            Details
        </button>
    </div>
   </a>
    @endauth
    @guest
    <a href="/login">
        <div class="flex justify-end">
            <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
                Login to Get the Details
            </button>
        </div>
    </a>
    @endguest
</div>
    @endif
   @endforeach
</div>


@endsection

@section('matchinternship')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('home1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
