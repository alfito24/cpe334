@extends('template')
@section('title', 'Applicant List')
@section('content')
@php
use Carbon\Carbon;
@endphp
<div class="mb-10 text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-20 text-2xl md:mt-36 md:text-3xl">
    <h1 class="mb-10">View Applicants for {{ $applications[0]->job->position }}</h1>
</div>

<div class="grid grid-cols-1 gap-x-10 gap-y-16 mt-5">
   @foreach ($applications as $a )
   <div class="w-1/2 mx-auto flex p-6 bg-white border-[#3367AD] border-2 rounded-lg space-x-6 flex-col">
    <div class="flex items-center space-x-6 mb-4">
        <div class="flex-shrink-0">
            <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                @if (!($a->user->picture === null))
                <img src="{{ url('/data_file/'.$a->user->picture) }}" alt="Grab Logo" class="" style="width: 245px;height:199px">
                @else
                <img src="https://www.pngitem.com/pimgs/m/404-4042686_my-profile-person-icon-png-free-transparent-png.png" alt="Grab Logo" class="h-12 w-auto" style="width: 245px;height:199px">
                @endif
            </div>
        </div>
        <div class="flex-grow ml-4">
            <h3 class="text-lg font-medium mb-2">{{$a->user->name}}</h3>
            <p class="text-gray-600 mb-1">{{$a->user->gender}}</p>
            <p class="text-gray-600 mb-1">{{$a->user->education}}</p>
            <p class="text-gray-600 mb-1">{{$a->user->area_of_interest}}</p>
        </div>
    </div>
   <a href="{{ asset('storage/cvs/' . $a->cv_file_path) }}" target="_blank">
    <div class="flex justify-end">
        <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
            View CV
        </button>
    </div>
   </a>
</div>
   @endforeach
</div>


@endsection

@section('internshiplist')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('home1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
