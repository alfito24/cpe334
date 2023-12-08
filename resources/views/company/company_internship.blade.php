@extends('template_tailwind')
@section('title', 'Home')
@section('content')


<div class="container mx-auto px-4 mt-20 mb-20">
  <h2 class="font-bold text-3xl mb-2">My Profile</h2>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
      <div class="md:col-span-1">
        <div class="bg-white rounded-lg shadow-lg max-w-sm mt-4">
            {{-- Sidebar --}}
            @include('company.sidebar')
      </div>
    </div>
      <div class="md:col-span-3">
        <div class="bg-white p-4 border border-gray-200 rounded">
          <div class="mb-4">
            <h3 class="font-bold mb-2">Internship List</h3>
            <div class="grid">
              @if (count($jobs))
                @foreach ($jobs as $job )
                <a href="/detail_internship/{{ $job->job_id }}">
                    <div class="flex items-start mb-4 border-2 border-black rounded p-5">
                        <div class="flex-shrink-0">
                          @if ($job->area_of_expertise == 'IT')
                          <img src="{{asset('images/it.png')}}" class="w-8 h-8 rounded-full mr-2">
                          @elseif ($job->area_of_expertise == 'Marketing')
                          <img src="{{asset('images/marketing.png')}}" class="w-8 h-8 rounded-full mr-2">
                          @elseif ($job->area_of_expertise == 'Sales')
                          <img src="{{asset('images/sales.png')}}" class="w-8 h-8 rounded-full mr-2">
                          @else
                          <img src="{{asset('images/finance.png')}}" class="w-8 h-8 rounded-full mr-2">
                          @endif
                        </div>
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold">{{ $job->position }}</h3>
                            </div>
                            <div class="text-sm text-gray-500 mb-2">
                                <span class="font-medium">🔁 {{ $job->internship_type }}</span> |📍 <span>{{ $job->user->company  }}</span>
                            </div>
                            <p class="text-gray-700">
                                {{ $job->description }}
                            </p>
                        </div>
                    </div>
                </a>
              @endforeach
              @else
              <p class="mb-2">No Internship Added</p>
              @endif
            </div>
          </div>
        </div>
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
