@extends('template')

@section('title', 'Add Internship')

@section('content')
@if ($message = Session::get('success'))
<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
    <strong class="font-bold">Holy smokes!</strong>
    <span class="block sm:inline">Something seriously bad happened.</span>
    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
      <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
    </span>
  </div>
    @endif
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto text-2xl md:mt-36 md:text-3xl">
    <h1>Add the Internship</h1>
</div>
<div class="w-1/2 mx-auto">
    @if(session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
</div>
<form method="POST" action="/addinternship">
    @csrf
    <div class="grid grid-cols-1 gap-x-28 gap-y-16 font-poppins mt-16 px-12 md:grid-cols-2 md:mt-16 md:px-20">
        
        <div>
            <div class="">
                <input type="text" id="position" name="position" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Position :">
            </div>
            <div class="mt-3">
                <textarea id="description" name="description" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Description :"></textarea>
            </div>
            <div class="mt-3">
                <input type="text" id="location" name="location" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Location :">
            </div>
            <div class="mt-3">
                <div class=" font-poppins font-bold grid justify-items-center mx-auto">
                    <h1>Deadline Application</h1>
                </div>
                <input type="date" id="deadline" name="deadline" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Location :">
            </div>
        </div>
        <div>
            <div class="">
                <select id="duration" name="duration" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2">
                    <option value="" disabled selected>Duration (months) :</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select>
            </div>
            <div class="mt-3">
                <textarea id="qualifications" name="qualifications" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Qualifications : Final year student,Minimum GPA 3.0,Experience in Scrum"></textarea>
            </div>
            {{-- <div class="mt-3">
                <div class=" font-poppins font-bold grid justify-items-center mx-auto">
                    <h1>Skill</h1>
                </div>
            </div> --}}
            <div class="mt-3">
                <div class=" font-poppins font-bold grid justify-items-center mx-auto">
                    <h1>Skill</h1>
                </div>
                <select id="skillsDropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2">
                    <option value="" disabled selected>Select a Skill</option>
                    <option value="JavaScript">JavaScript</option>
                    <option value="Python">Python</option>
                    <option value="Laravel">Laravel</option>
                    <!-- Tambahkan skill lain jika perlu -->
                </select>
                <div class="mt-3">
                    <input type="text" id="selectedSkills" name="skills" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Selected Skills" readonly>
                </div>
            </div>
            
            <div class="mt-3">
                <div class=" font-poppins font-bold grid justify-items-center mx-auto">
                    <h1>Internship Start</h1>
                </div>
                <input type="date" id="start" name="start" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Qualifications : Final year student,Minimum GPA 3.0,Experience in Scrum">
            </div>
            
        </div>
    </div>
    <div class="md:flex">
        <div class="hidden md:flex md:flex-none md:w-[20%] lg:w-[30%]">
            <img src="{{asset('images/pickupkiri.png')}}" >
        </div>
        <div class="md:flex-initial md:w-[60%] lg:w-[40%] font-poppins px-12 md:pt-9">
            <button type="submit" class="py-2 min-w-full bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-xl font-bold text-white rounded hover:from-[#BFD9EB] hover:text-[black] transition duration-300">Add</button>
        </div>
    </form>
    <div class="hidden md:flex md:flex-initial md:w-[20%] lg:w-[30%] md:justify-end">
        <img src="{{asset('images/pickupkanan.png')}}">
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>
@endsection

@section('addinternship')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('addinternship')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const skillsDropdown = document.getElementById('skillsDropdown');
        const selectedSkills = document.getElementById('selectedSkills');
    
        skillsDropdown.addEventListener('change', function() {
            if (selectedSkills.value) {
                selectedSkills.value += ', ' + this.value;
            } else {
                selectedSkills.value = this.value;
            }
    
            // Reset dropdown setelah dipilih
            this.selectedIndex = 0;
        });
    });
    </script>
    