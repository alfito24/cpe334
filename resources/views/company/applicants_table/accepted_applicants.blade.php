<div class="flex flex-row mb-1 sm:mb-0 justify-between w-full mt-5">
    <h2 class="text-2xl leading-tight">
        Accepted Candidates
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
            </tr>
        </thead>
        <tbody>
            @foreach ($accepted_applicants as $applicant)
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
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if ($accepted_applicants->count() === 0)
    <div class="text-center mt-3">
        No Accepted Applicants Yet
    </div>
@endif
