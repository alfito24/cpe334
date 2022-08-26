@extends('template')
@section('title', 'Buy Products')
@section('isikonten')
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-28 text-2xl md:mt-36 md:text-3xl">
    <h1>Update your profile</h1>
</div>
<div class="font-poppins mt-14" >
    <form action="/updateaccount">
        @csrf
        <div class="py-4">
            <img src="{{asset('images/profile.png')}}" class="w-[50%] md:w-[30%] lg:w-[20%] mx-auto rounded-full">
        </div>
        <div class="px-10 md:w-[75%] md:mx-auto lg:w-[60%]">
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-5">Biodata Diri</h3>
            <p class="font-medium text-md text-[#3166AD] mt-6">Nama</p>
            <div class="mt-2">
                <input value="{{ $profil->name }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Tanggal Lahir</p>
            <div class="mt-2">
                <input value="{{ $profil->birth_date }}" type="date" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">Jenis Kelamin</p>
            <div class="mt-2">
                <input value="{{ $profil->gender }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-10">Kontak</h3>
            <p class="font-medium text-md text-[#3166AD] mt-6">Email</p>
            <div class="mt-2">
                <input value="{{ $profil->email }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <p class="font-medium text-md text-[#3166AD] mt-6">No. Hp</p>
            <div class="mt-2">
                <input value="{{ $profil->no_telp }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <h3 class="font-semibold text-xl md:text-2xl text-center mt-10">Alamat</h3>
            <p class="font-medium text-md text-[#3166AD] mt-6">Alamat</p>
            <div class="mt-2">
                <input value="{{ $profil->alamat }}" type="text" id="" name="" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded border-[#3367AD] border-2">
            </div>
            <div class="mt-2">
                <button type="submit">

                </button>
            </div>
        </div>
    </form>


@endsection
