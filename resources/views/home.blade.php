@extends('template')
@section('title', 'Home')
@section('isikonten')
<div class="text-[#3166AD] text-center font-poppins font-bold grid justify-items-center mx-auto mt-20 text-3xl md:mt-30 md:text-4xl">
    <h1>Streamlining Internship Connections </h1>
    <h1 class="pt-3 md:pt-4">with Efficiency and Intelligence</h1>
    <img src="{{asset('images/landing_pic.png')}}" class="w-3/5 md:w-2/5 pt-12 md:pt-20">
</div>
<div class="bg-[#3166AD] p-10 mt-10">
    <!-- Title -->
    <h2 class="text-white text-3xl font-bold text-center mb-10">Our Features</h2>
    
    <!-- Feature Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <!-- Card 1 -->
        <div class="bg-white rounded p-5 shadow-md text-center">
            <img src="{{asset('images/apply.png')}}" alt="Apply Internship" class="mx-auto mb-4 w-3/4">
            <h3 class="text-xl font-semibold text-[#3166AD]">Apply Internship</h3>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded p-5 shadow-md text-center">
            <img src="{{asset('images/track.png')}}" alt="Track Internship" class="mx-auto mb-4 w-3/4">
            <h3 class="text-xl font-semibold text-[#3166AD]">Track Internship</h3>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded p-5 shadow-md text-center">
            <img src="{{asset('images/job_matching.png')}}" alt="Internship Matching" class="mx-auto mb-4 w-3/4">
            <h3 class="text-xl font-semibold text-[#3166AD]">Internship Matching</h3>
        </div>
    </div>
</div>

<div class="py-7 md:py-9 mt-16 grid grid-cols-1 gap-x-10 gap-y-12 font-poppins sm:grid-cols-2 md:mt-24 ">
    <div class="order-1 sm:order-2">
        <img src="{{asset('images/suits.jpg')}}" class="w-[90%] sm:w-[70%] mx-auto">
    </div>    
    <div class="order-2 sm:order-1 px-24 sm:px-5 md:px-7 lg:px-32 flex flex-col items-center justify-center md:items-start ">
        <h3 class="text-[#3166AD] text-center sm:text-start font-bold text-2xl md:text-4xl">Let’s find a job that suits you!</h3>
        <button type="submit" class="mt-5 sm:mt-7 py-2 min-w-[50%] sm:min-w-[65%] lg:min-w-[50%] bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-xl font-bold text-white rounded hover:from-[#BFD9EB] hover:text-cyan-400 transition duration-300">View</button>
    </div>
</div>
<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('homeactive')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('home1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
