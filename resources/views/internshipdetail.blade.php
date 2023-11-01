@extends('template')
@section('title', 'Internship Detail')
@section('content')
@php
use Carbon\Carbon;
@endphp
@if(isset($job))
<div class="mt-24 font-poppins px-2">
  <div class="pt-10 px-4 sm:px-6  lg:pt-16 lg:px-8">
    <div class="lg:col-span-2 lg:pr-8">
      <h1 class="text-2xl font-bold sm:text-3xl">{{$job->position}}</h1>
      <h1 class="text-2xl font-bold sm:text-3xl">{{$job->user->company}}</h1>
      <div class="mt-5">
          <img src="{{asset('images/material-symbols_work.png')}}" alt="location" class=" px-1 inline">
          <h4 class="font-medium inline pl-2 text-[#66737D]">{{$job->worktype}}</h4>
      </div>
      <div class="mt-5">
          <img src="{{asset('images/location.png')}}" alt="location" class=" px-1 inline">
          <h4 class="font-medium inline pl-2 text-[#66737D]">{{$job->location}}</h4>
      </div>
      <div class="mt-5">
          <img src="{{asset('images/mdi_calendar.png')}}" alt="location" class=" px-1 inline">
          <h4 class="font-medium inline pl-2 text-[#66737D]">{{$job->duration}} months, Start at {{ Carbon::parse($job->start)->format('F, Y') }}</h4>
      </div>
      @if(Auth::user()->role_id == 0)
      <div class="flex justify-start mt-4">
        <a href="/applyinternship/{{$job->job_id}}">
          <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
            Apply
          </button>
        </a>
    </div>
      @elseif (Auth::user()->role_id == 1)
      <div class="flex justify-start mt-4">
        <a href="/viewapplicantslist/{{$job->job_id}}">
          <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
            View Applicants
          </button>
        </a>
    </div>
      @endif
    </div>
    <div class="py-10 lg:pt-6 lg:pb-10 lg:col-start-1 lg:col-span-2 lg:pr-8 ">
        <h2 class="font-bold sm:text-3xl">About the Internship</h2>
        <div class="space-y-6 text-justify">
          <p class="text-base text-gray-900" style="text-align:justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi eligendi, doloribus, eos, voluptatem inventore itaque voluptate aliquam recusandae quasi odio aliquid! Culpa, explicabo distinctio ipsum nemo quam itaque labore quibusdam!</p>
        </div>
      <h2 class="text-2xl font-bold sm:text-3xl mt-6">Job Description</h2>
      <div class="space-y-6 text-justify" >
        <p class="text-base text-gray-900" style="text-align:justify">{{$job->description}}</p>
      </div>
      @php
          $qualifications = preg_split('/,/', $job->qualifications);
      @endphp
      <h2 class="text-2xl font-bold sm:text-3xl mt-6">Qualifications</h2>
      <div class="space-y-6">
        <ol style="text-align:justify;list-style-type: decimal;">
          @foreach ($qualifications as $q)
          <li class="text-base text-gray-900">{{$q}}</li>
          @endforeach
        </ol>
      </div>
    </div>
  </div>
</div>
@else
    <h1>Job not found</h1>
@endif

@endsection

@section('internshiplist')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('internshiplist')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
