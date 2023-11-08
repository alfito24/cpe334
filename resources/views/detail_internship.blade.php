@extends('template_tailwind')
@section('title', 'Home')
@section('content')


<div class="container mx-auto px-4 mt-20 mb-20">
  
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="md:col-span-1">
      @foreach ($interns as $intern )
        <a href="/detail_internship/{{ $intern->job_id }}">
          <div class="mb-4 p-4 bg-white border border-gray-200 rounded">
              <h4 class="font-bold text-purple-600">{{ $intern->position }}</h4>
              <p>{{ $intern->salary }}</p>
              <p>{{ $intern->location }}</p>
              <p>{{ $intern->internship_type }}</p>
          </div>
        </a>
      @endforeach
      </div>
      {{-- @foreach ($job as $j) --}}
      <div class="md:col-span-3">
        <div class="mb-4">
          <img src="{{asset('images/building.png')}}" alt="Building" class="w-full h-48 object-cover rounded">
          <div class="flex justify-between items-center mt-4">
            <h2 class="text-2xl font-bold">{{ $job->position }}</h2>
            <button class="bg-[#0EA89B] text-white px-4 py-2 rounded hover:bg-blue-600">Apply Now</button>
          </div>
          <p class="text-gray-600">{{ $job->user->company }} |📍 {{ $job->location }}</p>
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
            <p>{{ $job->description }}</p>
          </div>
          
          <!-- Responsibilities -->
          @php
            $responsibilities = array_map('trim', explode(',', $job->responsibilites));
          @endphp
          <div class="mb-4">
            <h3 class="font-bold mb-2">Responsibilities</h3>
            <ul class="list-disc pl-5">
              @foreach ($responsibilities as $r)
                <li>{{ $r }}</li>
              @endforeach
            </ul>
          </div>
          
          <!-- About Company -->
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
                    <h3 class="text-lg leading-6 font-medium text-gray-900">{{ $job->user->company }}</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ $job->user->company_description }}</p>
                  </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <a href="/detail_company/{{ $job->user->user_id }}">
                        <button class="bg-[#0EA89B] py-2 px-4 border border-transparent rounded-md text-white text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            View company profile
                          </button>
                    </a>
                </div>
              </div>
              <div class="border-t border-gray-200">
                <dl>
                  <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">📍</span>
                      {{ $job->user->address }}
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                      <span class="material-icons mr-2 text-gray-400 text-base">👥</span>
                      {{ $job->user->company_size }} employees
                    </dd>
                  </div>
                  <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                    <dt class="text-sm font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">📅</span>
                      {{ $job->user->company_workdays }}
                    </dt>
                    <dt class="text-sm font-medium text-gray-500 flex items-center">
                      <span class="material-icons mr-2 text-gray-400 text-base">🔁</span>
                      Hybrid
                    </dt>
                  </div>
                </dl>
              </div>
            </div>
          </div>
          
        </div>
      </div>
      {{-- @endforeach --}}

  
    </div>
  </div>
  

<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('list_internship')
class='border-b-4 border-[#0EA89B] text-[#0EA89B] font-semibold py-4 px-2'
@endsection

@section('list_internship')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection