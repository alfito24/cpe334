@extends('template_tailwind')
@section('title', 'Match Internship')
@section('content')


<div class="container mx-auto px-4 mt-20 mb-20">
<div class="mb-4">
    @if (!empty($jobs) && count($jobs) > 0)
    <h1 class="mx-auto text-xl font-bold">the Internship that Match to Your Profile</h1>
    @else
    <h1 class="mx-auto text-xl font-bold">No Intenships Available for Your Skills</h1>
    @endif
</div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="md:col-span-1">
      @foreach ($jobs as $job )
        <a href="/detail_internship/{{ $job->job_id }}">
          <div class="mb-4 p-4 bg-white border border-gray-200 rounded">
              <h4 class="font-bold text-[#0EA89B]">{{ $job->position }}</h4>
              <p>{{ $job->salary }}</p>
              <p>{{ $job->location }}</p>
              <p>{{ $job->internship_type }}</p>
          </div>
        </a>
      @endforeach
      </div>
      @if (!empty($jobs) && count($jobs) > 0)
      <div class="md:col-span-3">
        <div class="mb-4">
          <img src="{{asset('images/building.png')}}" alt="Building" class="w-full h-48 object-cover rounded">
          <div class="flex justify-between items-center mt-4">
            <h2 class="text-2xl font-bold">{{ $jobs[0]->position }}</h2>
            <button class="bg-[#0EA89B] text-white px-4 py-2 rounded hover:bg-blue-600">Apply Now</button>
          </div>
          <p class="text-gray-600">{{ $jobs[0]->user->company }} |📍 {{ $jobs[0]->location }}</p>
        </div>
        
        <!-- Job Details Content -->
        <div class="bg-white p-4 border border-gray-200 rounded">
          <!-- Contact Recruiter -->
          <div class="mb-4">
            <h3 class="font-bold mb-2">Contact recruiter</h3>
            <!-- Recruiter Details -->
          </div>
          
          <!-- Job Description -->
          <div class="mb-4">
            <h3 class="font-bold mb-2">Job Description</h3>
            <p>{{ $jobs[0]->description }}</p>
          </div>
          
          <!-- Responsibilities -->
          @php
            $responsibilities = array_map('trim', explode(',', $jobs[0]->responsibilites));
            $skills = array_map('trim', explode(',', $jobs[0]->skills));
          @endphp
          <div class="mb-4">
            <h3 class="font-bold mb-2">Responsibilities</h3>
            <ul class="list-disc pl-5">
              @foreach ($responsibilities as $r)
                <li>{{ $r }}</li>
              @endforeach
            </ul>
          </div>
          <div class="mb-4">
            <h3 class="font-bold mb-2">Skills</h3>
            <ul class="list-disc pl-5">
              @foreach ($skills as $r)
                <li>{{ $r }}</li>
              @endforeach
            </ul>
          </div>
          <div class="max-w-2xl py-8 px-4 sm:px-6 lg:px-8">
            <div class="mb-4">
              <h2 class="text-xl font-semibold text-gray-900">About company</h2>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
              <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                <div class="flex items-center">
                  <div class="flex-shrink-0 h-12 w-12 rounded-full bg-blue-500 text-white flex items-center justify-center">
                    <!-- Icon or Logo can go here -->
                    <span class="text-xl font-bold">S</span>
                  </div>
                  <div class="ml-4">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $jobs[0]->user->company }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500" style="text-align: jus">{{ $jobs[0]->user->company_description }}</p>
                  </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                  <a href="/detail_company/{{ $jobs[0]->user->user_id }}">
                    <button class="bg-[#0EA89B] py-2 px-4 border border-transparent rounded-md text-white text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                      View company profile
                    </button>
                  </a>
                </div>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xl font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">📍</span>
                      {{ $jobs[0]->user->address }}
                    </dt>
                    <dd class="mt-1 text-xl text-gray-900 sm:col-span-2 sm:mt-0">
                      <span class="material-icons mr-2 text-gray-400 text-base">👥</span>
                      {{ $jobs[0]->user->company_size }} people
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-xl font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">📅</span>
                      {{ $jobs[0]->user->company_workdays }}
                    </dt>
                    <dt class="text-xl font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">🔁</span>
                     {{ $jobs[0]->internship_type }}
                    </dt>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      @endif
  
    </div>
  </div>
  

<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('internship_for_me')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('internship_for_me')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
