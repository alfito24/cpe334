@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen bg-gray-100 mt-20 mb-80">
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
            <span class="ml-2 text-sm font-medium">Profile</span>
          </a>
        </li>
        <li>
          <a href="/add_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium text-[#0EA89B]">Post Internship</span>
          </a>
        </li>
        <li>
          <a href="/company_internship" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium ">All Internship</span>
          </a>
        </li>
        <li>
          <a href="/company_applicants" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
            <span class="ml-2 text-sm font-medium ">Applied Candidates</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Content Area -->
    <div class="flex-1">
        <div class="min-h-screen bg-gray-100 p-5">
            <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
              <div class="flex justify-between items-center pb-5 border-b border-gray-200 mb-5">
                <h2 class="text-2xl font-semibold text-gray-700">Internship Information</h2>
                <span class="cursor-pointer text-gray-400">
                </span>
              </div>
              @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
              @endif
              <form method="POST" action="/add_internship">
                @csrf
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Internship Position</label>
                <input name="position" value="{{ old('position') }}" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="">
                @error('position')
                <div class="text-red-700">
                  {{ $message }}
                </div>
                @enderror
            </div>
              <div class="mb-4 flex justify-between space-x-4">
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="location">Internship Location</label>
                  <input name="location" value="{{ old('location') }}" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
                  @error('location')
                  <div class="text-red-700">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="internship_type">Internship Type</label>
                   <select name="internship_type" class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#0EA89B]">
                    <option value="">Select Internship Type</option>
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Remote">Remote</option>
                </select>
                @error('internship_type')
                        <div class="text-red-700">
                          {{ $message }}
                        </div>
                        @enderror
                </div>
              </div>
              <div class="mb-4 flex justify-between space-x-4">
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="start_year">Stipend Range ($)</label>
                  <input id="start_year" type="number" min="0" name="salary" value="{{ old('salary') }}" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">
                  @error('salary')
                  <div class="text-red-700">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="stipend">No Stipend</label>
                  <input id="stipend" name="end_year" class="rounded py-2 px-3 text-gray-700" type="checkbox" onchange="toggleStipendRange()">
                </div>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Job Description</label>
                <textarea name="description" class=" border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text">{{ old('description') }}</textarea>
                @error('description')
                <div class="text-red-700">
                  {{ $message }}
                </div>
                @enderror
            </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Job Area</label>
                <select name="area_of_expertise" class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#0EA89B]">
                    <option value="">Select Job Area</option>
                    <option value="IT">IT</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Sales">Sales</option>
                    <option value="Finance">Finance</option>
                </select>
                @error('area_of_expertise')
                <div class="text-red-700">
                  {{ $message }}
                </div>
                @enderror
            </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Responsibilites</label>
                <input name="responsibilites" value="{{ old('responsibilites') }}" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" placeholder="">
                @error('responsibilites')
                <div class="text-red-700">
                  {{ $message }}
                </div>
                @enderror
            </div>
              <div class="mb-4 flex justify-between space-x-4">
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="location">Select Skills</label>
                  <select id="skillsDropdown" name="select_skills" class="mt-2 px-3 py-2 shadow rounded-lg w-full block text-sm border-2 border-[#0EA89B]">
                    <option value="">Select skills</option>
                    <option value="Software Development">Software Development</option>
                    <option value="UX/UI Design">UX/UI Design</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Data Analysis">Data Analysis</option>
                    <option value="System Administration">System Administration</option>
                    <option value="Project Management">Project Management</option>
                    <option value="Market Research">Market Research</option>
                    <option value="Finance">Finance</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Marketing">Marketing</option>
                    <option value="Law">Law</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Communication">Communication</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Biology">Biology</option>
                    <option value="Pharmacy">Pharmacy</option>
                    <option value="Chemistry">Chemistry</option>
                    <option value="Public Health">Public Health</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Interior Design">Interior Design</option>
                    <option value="Public Health">Public Health</option>
                    <option value="Visual Arts">Visual Arts</option>
                    <option value="Sociology">Sociology</option>
                    <option value="Music">Music</option>
                    <option value="Risk Analysis">Risk Analysis</option>
                    <option value="Sports Management">Sports Management</option>
                    <option value="Journalism">Journalism</option>
                    <option value="Sustainable Development">Sustainable Development</option>
                    <option value="Climate">Climate</option>
                    <option value="Film and Media Production">Film and Media Production</option>
                </select>
                </div>
                <div class="w-1/2">
                  <label class="block text-gray-700 text-sm font-semibold mb-2" for="internship_type">Skills Selected</label>
                  <input type="text" value="{{ old('skills') }}" name="skills" id="selectedSkills" class="border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Skills selected">
                  @error('skills')
                  <div class="text-red-700">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="mb-4">
                <label class="block text-gray-700 text-sm font-semibold mb-2">Application Deadline</label>
                <input name="deadline" value="{{ old('deadline') }}" class=" border-2 border-[#0EA89B] appearance-none rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="date">
                @error('deadline')
                <div class="text-red-700">
                  {{ $message }}
                </div>
                @enderror
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
