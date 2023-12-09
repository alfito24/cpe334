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
        @foreach ($pending_applicants as $applicant)
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
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button onclick="location.href='/internship/{{ $applicant->application_id }}/accept'" class="py-2 px-6 bg-[#0EA89B] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
              Accept
            </button>
          </td>
          <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
            <button onclick="location.href='/internship/{{ $applicant->application_id }}/reject'" class="py-2 px-6 bg-[#FF0000] font-medium text-white rounded hover:from-[#BFD9EB] hover:text-[#BFD9EB] transition duration-300">
              Reject
            </button>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  @if($pending_applicants->count() === 0)
  <div class="text-center mt-3">
    No Applicants Yet
  </div>
  @endif

