@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen bg-gray-100 mt-20 mb-80">
    <!-- Sidebar -->
    <div class="w-64 px-4 py-6 bg-white shadow-md">
      <ul class="space-y-2">
        <li>
          <a href="/add_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium text-[#0EA89B]">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/company_detail" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium">Profile</span>
          </a>
        </li>
        <li>
          <a href="/add_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium">Post Internship</span>
          </a>
        </li>
        <li>
          <a href="/company_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium ">All Internship</span>
          </a>
        </li>
        <li>
          <a href="company_applicants" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium ">Applied Candidates</span>
          </a>
        </li>
      </ul>
    </div>
  
    <!-- Content Area -->
    <div class="container mx-auto mt-5 p-5">
      <div class="text-2xl mb-5">Recruiter Dashboard</div>
        <!-- Logo and Header -->
        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
            <!-- Total Jobs Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-[#0EA89B]">Total Jobs</div>
                        <div class="text-3xl font-bold">{{ $jobs }}</div>
                    </div>
                    <div class="text-[#0EA89B]">
                        <!-- Icon placeholder -->
                    </div>
                </div>
            </div>

            <!-- Total Applicants Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-[#0EA89B]">Total Applicants</div>
                        <div class="text-3xl font-bold">{{ $applicants }}</div>
                    </div>
                    <div class="text-green-500">
                        <!-- Icon placeholder -->
                    </div>
                </div>
            </div>

            <!-- Selected Candidates Card -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <div class="text-sm font-semibold text-[#0EA89B]">Selected Candidates</div>
                        <div class="text-3xl font-bold">{{ $applicants_accepted }}</div>
                    </div>
                    <div class="text-green-500">
                        <!-- Icon placeholder -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional content goes here -->
    </div>
  </div>
  

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

@section('addinternship')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('addinternship')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
