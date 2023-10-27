@extends('template')
@section('title', 'Buy Products')
@section('isikonten')
<div class="mt-24 font-poppins px-2">
    <div class="mx-auto pt-10 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
      <div class="lg:col-span-2 lg:pr-8">
        <h1 class="text-2xl font-bold sm:text-3xl">Software Engineer</h1>
        <div class="mt-5">
            <img src="{{asset('images/material-symbols_work.png')}}" alt="location" class=" px-1 inline">
            <h4 class="font-medium inline pl-2 text-[#66737D]">On-site</h4>
        </div>
        <div class="mt-5">
            <img src="{{asset('images/location.png')}}" alt="location" class=" px-1 inline">
            <h4 class="font-medium inline pl-2 text-[#66737D]">Bangkok, Thailand</h4>
        </div>
        <div class="mt-5">
            <img src="{{asset('images/mdi_calendar.png')}}" alt="location" class=" px-1 inline">
            <h4 class="font-medium inline pl-2 text-[#66737D]">4-6 Months, Start at January 2024</h4>
        </div>
      </div>
      <div class="py-10 lg:pt-6 lg:pb-10 lg:col-start-1 lg:col-span-2 lg:pr-8 ">
          <h2 class="text-2xl font-bold sm:text-3xl mt-6">About the Internship</h2>
          <div class="space-y-6 text-justify">
            <p class="text-base text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan laoreet diam ac. Posuere in curabitur placerat amet. Amet cum in purus gravida. Sed at pellentesque scelerisque at. Et dui ullamcorper posuere in elementum lobortis. Leo mauris arcu, nibh risus vestibulum. Eu, enim in duis et duis faucibus. Velit in nunc egestas lacus, dolor, hendrerit orci. Urna, amet adipiscing enim, felis netus ullamcorper. Imperdiet elementum lacus in mauris. Placerat in arcu pharetra sociis adipiscing ultricies. Enim, amet sit gravida leo. Congue eros, lobortis amet aliquam viverra nisl. Volutpat faucibus sed auctor eu risus, ligula. Vivamus amet, mauris risus, leo ultrices viverra.</p>
          </div>
        <h2 class="text-2xl font-bold sm:text-3xl mt-6 text-justify">Job Description</h2>
        <div class="space-y-6 text-justify" >
          <p class="text-base text-gray-900 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan laoreet diam ac. Posuere in curabitur placerat amet. Amet cum in purus gravida. Sed at pellentesque scelerisque at. Et dui ullamcorper posuere in elementum lobortis. Leo mauris arcu, nibh risus vestibulum. Eu, enim in duis et duis faucibus. Velit in nunc egestas lacus, dolor, hendrerit orci. Urna, amet adipiscing enim, felis netus ullamcorper. Imperdiet elementum lacus in mauris. Placerat in arcu pharetra sociis adipiscing ultricies. Enim, amet sit gravida leo. Congue eros, lobortis amet aliquam viverra nisl. Volutpat faucibus sed auctor eu risus, ligula. Vivamus amet, mauris risus, leo ultrices viverra.</p>
        </div>
        <h2 class="text-2xl font-bold sm:text-3xl mt-6 text-justify">Qualifications</h2>
        <div class="space-y-6 text-justify">
          <p class="text-base text-gray-900 text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan laoreet diam ac. Posuere in curabitur placerat amet. Amet cum in purus gravida. Sed at pellentesque scelerisque at. Et dui ullamcorper posuere in elementum lobortis. Leo mauris arcu, nibh risus vestibulum. Eu, enim in duis et duis faucibus. Velit in nunc egestas lacus, dolor, hendrerit orci. Urna, amet adipiscing enim, felis netus ullamcorper. Imperdiet elementum lacus in mauris. Placerat in arcu pharetra sociis adipiscing ultricies. Enim, amet sit gravida leo. Congue eros, lobortis amet aliquam viverra nisl. Volutpat faucibus sed auctor eu risus, ligula. Vivamus amet, mauris risus, leo ultrices viverra.</p>
        </div>
      </div>
    </div>
</div>
@endsection

@section('buyproductsactive')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('buyproducts1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
