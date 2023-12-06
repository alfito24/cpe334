@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<!-- Tailwind CSS link -->

<div class="antialiased font-sans bg-gray-100">
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full mt-10">
        <h2 class="text-2xl leading-tight">
          My Applications
        </h2>
      </div>
      <div class="w-full overflow-x-auto mt-6">
        <table class="min-w-full leading-normal">
          <thead>
            @foreach ($applications as $a)
            <tr>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Company
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Internship
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Applied on
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Application Status
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Resume
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Cover Letter
              </th>
            </tr>
            @endforeach
          </thead>
          <tbody>
            @foreach ($applications as $application)
            <tr>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $application->job->user->company }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $application->job->position }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ \Carbon\Carbon::parse($application->created_at)->format('d/m/Y') }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <span
                  class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                  <span aria-hidden
                    class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                  <span class="relative">{{ $application->status }}</span>
                </span>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ asset('storage/cvs/' . $application->cv_file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                  Resume
                </a>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ asset('storage/cover_letters/' . $application->cover_letter_file_path) }}" target="_blank" class="text-blue-600 hover:text-blue-900">
                  Cover Letter
                </a>
              </td>
            </tr>
            @endforeach
            <!-- ... other rows ... -->
          </tbody>
        </table>
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
