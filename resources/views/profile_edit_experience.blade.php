@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen bg-gray-100 mt-20">
    <!-- Sidebar -->
    <div class="w-64 px-4 py-6 bg-white shadow-md">
      <ul class="space-y-2">
        <li>
          <a href="/profile_edit" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium ">General Information</span>
          </a>
        </li>
        <li>
          <a href="/profile_edit/experience" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium text-[#0EA89B]">Add Work Experiences</span>
          </a>
        </li>
        <li>
          <a href="/profile_edit/education" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium">Add Education</span>
          </a>
        </li>
      </ul>
    </div>
  
    <!-- Content Area -->
    <div class="flex-1">
        <div class="min-h-screen bg-gray-100 p-5">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md mb-10">
              <div class="flex justify-between items-center pb-5 border-b border-gray-200 mb-5">
                <h2 class="text-2xl font-semibold text-gray-700">Add Work Experience</h2>
                <span class="cursor-pointer text-gray-400">
                </span>
              </div>
              <div class="w-1/2 mx-auto">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif
            </div> 
              <form method="POST" action="/add_experience">     
                @csrf   
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="company">Company Name</label>
                <input name="company" class="border-2 border-[#0EA89B] appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="location">Location</label>
                <input name="location" class="border-2 border-[#0EA89B] appearance-none  rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="position">Position</label>
                <input name="position" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
              </div>
              <div class="mb-4 flex justify-between space-x-4">
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="start_year">Year Start</label>
                  <input name="start_year" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number">
                </div>
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="end_year">Year End</label>
                  <input name="end_year" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="number">
                </div>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2" for="description">Description</label>
                <textarea name="description" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description"></textarea>
              </div>
          
              <div class="flex items-center justify-start">
                <button class="bg-[#0EA89B] hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
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
@endsection

@section('profile_edit')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('profile_edit')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
