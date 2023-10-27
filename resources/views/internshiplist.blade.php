@extends('template')
@section('title', 'Home')
@section('isikonten')

<div class="mb-8 text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-20 text-2xl md:mt-36 md:text-3xl">
    <h1>Apply your internship here</h1>
</div>
<div class="grid grid-cols-1 gap-x-10 gap-y-16">
    <div class="w-1/2 mx-auto flex p-6 bg-white border-[#3367AD] border-2 rounded-lg space-x-6 flex-col mt-10">
        <div class="flex items-center space-x-6 mb-4">
            <div class="flex-shrink-0">
                <div class="w-24 h-24 bg-gray-100 rounded-lg flex items-center justify-center">
                    <img src="{{asset('images/apply.png')}}" alt="Grab Logo" class="h-12 w-auto">
                </div>
            </div>
            <div class="flex-grow">
                <h3 class="text-lg font-medium mb-2">Software Engineer</h3>
                <p class="text-gray-600 mb-1">Grab</p>
                <p class="text-gray-600">Thailand (On-site)</p>
            </div>
        </div>
        <div class="flex justify-end">
            <button class="py-2 px-6 bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-white rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 hover:from-[#BFD9EB] hover:text-[black] transition duration-300">
                Details
            </button>
        </div>
    </div>
</div>


@endsection

@section('internshiplist')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('home1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
