@extends('template_tailwind')
@section('title', 'Home')
@section('content')

<div class="flex h-screen mt-20 mb-20">
    <!-- Sidebar -->
    @include('company.sidebar')

    <!-- Content Area -->
<div class="antialiased font-sans">
  <div class="container mx-auto px-4 sm:px-8">
    <div class="py-8">
      <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
        <h2 class="text-2xl leading-tight">
          Applied Candidates
        </h2>
      </div>
      <div class="w-full overflow-x-auto mt-6">
        <table class="min-w-full leading-normal">
          <thead>
            <tr>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                No
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Internship Position
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Candidate Name
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Applied On
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Review Resume
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Review Cover Letter
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Accept
              </th>
              <th
                class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                Reject
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($applicants as $applicant)
            <tr>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $loop->iteration }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $applicant->job->position }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ $applicant->user->name }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <p class="text-gray-900 whitespace-no-wrap">
                  {{ \Carbon\Carbon::parse($applicant->created_at)->format('d/m/Y') }}
                </p>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ asset('storage/cvs/' . $applicant->cv_file_path) }}" class="text-blue-600 hover:text-blue-900" target="_blank">
                  Review
                </a>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <a href="{{ asset('storage/cover_letters/' . $applicant->cover_letter_file_path) }}" class="text-blue-600 hover:text-blue-900" target="_blank">
                  Review
                </a>
              </td>
              @if ($applicant->status == 'submitted')
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button onclick="location.href='/internship/{{ $applicant->user_id }}/accept'" class="py-2 px-6 bg-[#0EA89B] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
                  Accept
                </button>
              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button onclick="location.href='/internship/{{ $applicant->user_id }}/reject'" class="py-2 px-6 bg-[#FF0000] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
                  Reject
                </button>
              </td>
              @elseif($applicant->status == 'accepted')
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="py-2 px-6 bg-[#0EA89B] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
                  Accepted
                </button>
              </td>
              @else
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">

              </td>
              <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                <button class="py-2 px-6 bg-[#FF0000] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
                  Rejected
                </button>
              </td>
              @endif
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
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

@section('internshiplist')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('internshiplist')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
