@extends('template_tailwind')
@section('title', 'Home')

@section('content')
<div class="flex h-screen bg-gray-100 mt-20">
    {{-- Sidebar --}}
    @include('company.sidebar')

    <!-- Content Area -->
    <div class="container mx-auto mt-5 p-5">
        @if(auth()->user() && auth()->user()->company_review == 'under_review')
            <div class="text-center py-10">
                <h2 class="text-xl font-semibold text-gray-700">Please contact admin to get full access</h2>
            </div>
        @else
            <div class="text-2xl mb-5">Recruiter Dashboard</div>
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
                <!-- ... -->
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
                <!-- ... -->
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
                <!-- ... -->
            </div>
            <!-- Additional content goes here -->
        @endif
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
<script>
    // Your existing JavaScript code...
</script>
@endsection

@section('addinternship')
    class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('addinternship')
    class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
