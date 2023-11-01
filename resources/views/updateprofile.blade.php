@extends('template')
@section('title', 'Buy Products')
@section('content')
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-28 text-2xl md:mt-36 md:text-3xl">
    <h1>Update your profile</h1>
</div>
<div class="font-poppins mt-14" >
    <form action="/updateprofile/{{ Auth::id() }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="px-10 md:w-[75%] md:mx-auto lg:w-[60%]">
            <input name="file" type="file" id="imageUpload" onchange="previewImage()">
            <img id="imagePreview" src="{{ url('/data_file/'.$profil->picture) }}" class="w-[50%] md:w-[30%] lg:w-[20%] mx-auto rounded-full">
        </div>
        <div class="px-10 md:w-[75%] md:mx-auto lg:w-[60%]">
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-5">Profile</h3>
            @if (Auth::user()->role_id == 0)
            <p class="font-medium text-md text-[#3166AD] mt-6">Name</p>
            <div class="mt-2">
                <input value="{{ $profil->name }}" type="text" id="" name="name" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Birth Date</p>
            <div class="mt-2">
                <input value="{{ $profil->birth_date }}" type="date" id="" name="birth_date" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Gender</p>
            <div class="mt-2">
                <select name="gender" id="cars" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
                    <option {{ $profil->gender === 'male' ? 'selected' : '' }} value="male">Male</option>
                    <option {{ $profil->gender === 'female' ? 'selected' : '' }} value="female">Female</option>
                </select>
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Highest Education</p>
            <div class="mt-2">
                <select name="education" id="cars" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
                    <option {{ $profil->education === 'High School' ? 'selected' : '' }} value="high_school">High School</option>
                    <option {{ $profil->education === 'Bachelor' ? 'selected' : '' }} value="bachelor">Bachelor</option>
                    <option {{ $profil->education === 'Master' ? 'selected' : '' }} value="master">Master</option>
                    <option {{ $profil->education === 'Ph.D' ? 'selected' : '' }} value="Ph.D">Ph.D</option>
                </select>
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Area of Interest</p>
            <div class="mt-2 grid grid-cols-2 gap-3">
                <div>
                    <input {{ in_array('IT', $userInterests) ? 'checked' : '' }} type="checkbox" id="it" name="area_of_interest[]" value="IT">
                    <label for="it">IT</label>
                </div>
                <div>
                    <input {{ in_array('Medicine', $userInterests) ? 'checked' : '' }} type="checkbox" id="healthcare" name="area_of_interest[]" value="Medicine">
                    <label for="healthcare">Medicine</label>
                </div>
                <div>
                    <input {{ in_array('Finance', $userInterests) ? 'checked' : '' }} type="checkbox" id="finance" name="area_of_interest[]" value="Finance">
                    <label for="finance">Finance and Banking</label>
                </div>
                <div>
                    <input {{ in_array('Marketing', $userInterests) ? 'checked' : '' }} type="checkbox" id="marketing" name="area_of_interest[]" value="Marketing">
                    <label for="marketing">Marketing</label>
                </div>
                <div>
                    <input {{ in_array('Education', $userInterests) ? 'checked' : '' }} type="checkbox" id="education" name="area_of_interest[]" value="Education">
                    <label for="education">Education</label>
                </div>
                <div>
                    <input {{ in_array('Engineering', $userInterests) ? 'checked' : '' }} type="checkbox" id="engineering" name="area_of_interest[]" value="Engineering">
                    <label for="engineering">Engineering</label>
                </div>
                <div>
                    <input {{ in_array('Environmental Science', $userInterests) ? 'checked' : '' }} type="checkbox" id="environmental" name="area_of_interest[]" value="Environmental Science">
                    <label for="environmental">Environmental Science</label>
                </div>
                <div>
                    <input {{ in_array('Human Resources', $userInterests) ? 'checked' : '' }} type="checkbox" id="hr" name="area_of_interest[]" value="Human Resources">
                    <label for="hr">Human Resources</label>
                </div>
                <div>
                    <input {{ in_array('Art', $userInterests) ? 'checked' : '' }} type="checkbox" id="art" name="area_of_interest[]" value="Art">
                    <label for="art">Art</label>
                </div>
                <div>
                    <input {{ in_array('Social Services', $userInterests) ? 'checked' : '' }} type="checkbox" id="social" name="area_of_interest[]" value="Social Services">
                    <label for="social">Social Services</label>
                </div>
                <div>
                    <input {{ in_array('Business', $userInterests) ? 'checked' : '' }} type="checkbox" id="business" name="area_of_interest[]" value="Business">
                    <label for="business">Business</label>
                </div>
                <div>
                    <input {{ in_array('Law', $userInterests) ? 'checked' : '' }} type="checkbox" id="law" name="area_of_interest[]" value="Law">
                    <label for="law">Law</label>
                </div>
                <div>
                    <input {{ in_array('Research', $userInterests) ? 'checked' : '' }} type="checkbox" id="research" name="area_of_interest[]" value="Research">
                    <label for="research">Research</label>
                </div>
                <div>
                    <input {{ in_array('Communication', $userInterests) ? 'checked' : '' }}  type="checkbox" id="media" name="area_of_interest[]" value="Communication">
                    <label for="media">Communication</label>
                </div>
                <div>
                    <input {{ in_array('Tourism', $userInterests) ? 'checked' : '' }} type="checkbox" id="Tourism" name="area_of_interest[]" value="Tourism">
                    <label for="Tourism">Tourism</label>
                </div>
            </div>
            @elseif (Auth::user()->role_id == 1)
            <p class="font-medium text-md text-[#3166AD] mt-6">Company Name</p>
            <div class="mt-2">
                <input value="{{ $profil->company }}" type="text" id="company" name="company" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Company Established</p>
            <div class="mt-2">
                <input value="{{ $profil->company_established }}" type="date" id="company_established" name="company_established" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Area of Business</p>
            <div class="mt-2 grid grid-cols-2 gap-3">
                <div>
                    <input {{ in_array('IT', $userInterests) ? 'checked' : '' }} type="checkbox" id="it" name="area_of_interest[]" value="IT">
                    <label for="it">IT</label>
                </div>
                <div>
                    <input {{ in_array('Medicine', $userInterests) ? 'checked' : '' }} type="checkbox" id="healthcare" name="area_of_interest[]" value="Medicine">
                    <label for="healthcare">Medicine</label>
                </div>
                <div>
                    <input {{ in_array('Finance', $userInterests) ? 'checked' : '' }} type="checkbox" id="finance" name="area_of_interest[]" value="Finance">
                    <label for="finance">Finance and Banking</label>
                </div>
                <div>
                    <input {{ in_array('Marketing', $userInterests) ? 'checked' : '' }} type="checkbox" id="marketing" name="area_of_interest[]" value="Marketing">
                    <label for="marketing">Marketing</label>
                </div>
                <div>
                    <input {{ in_array('Education', $userInterests) ? 'checked' : '' }} type="checkbox" id="education" name="area_of_interest[]" value="Education">
                    <label for="education">Education</label>
                </div>
                <div>
                    <input {{ in_array('Engineering', $userInterests) ? 'checked' : '' }} type="checkbox" id="engineering" name="area_of_interest[]" value="Engineering">
                    <label for="engineering">Engineering</label>
                </div>
                <div>
                    <input {{ in_array('Environmental Science', $userInterests) ? 'checked' : '' }} type="checkbox" id="environmental" name="area_of_interest[]" value="Environmental Science">
                    <label for="environmental">Environmental Science</label>
                </div>
                <div>
                    <input {{ in_array('Human Resources', $userInterests) ? 'checked' : '' }} type="checkbox" id="hr" name="area_of_interest[]" value="Human Resources">
                    <label for="hr">Human Resources</label>
                </div>
                <div>
                    <input {{ in_array('Art', $userInterests) ? 'checked' : '' }} type="checkbox" id="art" name="area_of_interest[]" value="Art">
                    <label for="art">Art</label>
                </div>
                <div>
                    <input {{ in_array('Social Services', $userInterests) ? 'checked' : '' }} type="checkbox" id="social" name="area_of_interest[]" value="Social Services">
                    <label for="social">Social Services</label>
                </div>
                <div>
                    <input {{ in_array('Business', $userInterests) ? 'checked' : '' }} type="checkbox" id="business" name="area_of_interest[]" value="Business">
                    <label for="business">Business</label>
                </div>
                <div>
                    <input {{ in_array('Law', $userInterests) ? 'checked' : '' }} type="checkbox" id="law" name="area_of_interest[]" value="Law">
                    <label for="law">Law</label>
                </div>
                <div>
                    <input {{ in_array('Research', $userInterests) ? 'checked' : '' }} type="checkbox" id="research" name="area_of_interest[]" value="Research">
                    <label for="research">Research</label>
                </div>
                <div>
                    <input {{ in_array('Communication', $userInterests) ? 'checked' : '' }}  type="checkbox" id="media" name="area_of_interest[]" value="Communication">
                    <label for="media">Communication</label>
                </div>
                <div>
                    <input {{ in_array('Tourism', $userInterests) ? 'checked' : '' }} type="checkbox" id="Tourism" name="area_of_interest[]" value="Tourism">
                    <label for="Tourism">Tourism</label>
                </div>
            </div>
            @endif
            
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-10">Contact</h3>
            <p class="font-medium text-md text-[#3166AD] mt-6">Email</p>
            <div class="mt-2">
                <input value="{{ $profil->email }}" type="text" id="" name="email" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Phone Number</p>
            <div class="mt-2">
                <input value="{{ $profil->phone_number }}" type="text" id="" name="phone_number" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-10">Address</h3>
            <p class="font-medium text-md text-[#3166AD] mt-6">Address</p>
            <div class="mt-2">
                <input value="{{ $profil->address }}" type="text" id="" name="address" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <div class="mt-2">
                <button class="mt-8 text-lg font-semibold bg-[#3166AD] w-full text-white rounded-xl px-6 py-3 block  hover:text-white hover:bg-[#11468c]" style="box-shadow: 2px 10px 20px rgba(0, 0, 0, 0.25);">
                    Update Account
                </button>
            </div>
        </div>
    </form>
    <script>
    function previewImage() {
    const file = document.getElementById('imageUpload').files[0];
    const preview = document.getElementById('imagePreview');

    if (file) {
        const reader = new FileReader();

        reader.onload = function(event) {
            // Update the source of the image preview element with the uploaded image data
            preview.src = event.target.result;
        }

        reader.readAsDataURL(file);
    }
}
    </script>
@endsection
