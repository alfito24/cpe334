@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen mt-20 mb-20">
    <!-- Sidebar -->
    <div class="w-64 px-4 py-6 bg-white shadow-md">
      <ul class="space-y-2">
        <li>
          <a href="/company_dashboard" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium">Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/company_detail" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium text-[#0EA89B]">Profile</span>
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
    <div class="max-w-7xl mx-auto">
        <div class="bg-white rounded-lg shadow-lg overflow-hidden p-5">
          <div class="">
            <!-- Banner image and heading -->
            <div class="mb-4 mt-4">
                <img src="{{asset('images/company.png')}}" alt="">
              <div class="flex items-center">
                <div class="bg-blue-500 rounded-full h-14 w-14 flex items-center justify-center text-white text-2xl font-bold">S</div>
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
                <p class="flex items-center"><span class="mr-2">👥</span> {{ $company->company_size }} employees</p>
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
          <div class="">
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
        </div>
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
