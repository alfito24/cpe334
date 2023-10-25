@extends('template')
@section('title', 'Buy Products')
@section('isikonten')
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
        {{-- <div class="px-10 md:w-[75%] md:mx-auto lg:w-[60%]">
            <input type="file" id="imageUpload" onchange="previewImage()" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            <img id="imagePreview" src="{{ url('/data_file/'.$profil->picture) }}" class="w-[50%] md:w-[30%] lg:w-[20%] mx-auto rounded-full" style="display: none;">
        </div>         --}}
        <div class="px-10 md:w-[75%] md:mx-auto lg:w-[60%]">
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-5">Profile</h3>
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
                {{-- <input value="{{ $profil->gender }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2"> --}}
            </div>
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
    //    function previewImage() {
    //     const file = document.getElementById('imageUpload').files[0];
    //     const preview = document.getElementById('imagePreview');

    //         if (file) {
    //             const reader = new FileReader();

    //             reader.onload = function(event) {
                   
    //                 preview.src = event.target.result;
    //                 preview.style.display = 'block';
    //             }

    //             reader.readAsDataURL(file);
    //         }
    //     }
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
