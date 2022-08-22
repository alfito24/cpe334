@extends('template')

@section('title', 'My Account')

@section('isikonten')
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-28 text-2xl md:mt-36 md:text-3xl">
    <h1>Manage your account</h1>
</div>
<div class="grid grid-cols-1 gap-y-10 font-poppins mt-14 lg:grid-cols-[300px_minmax(500px,_1fr)_minmax(450px,_1fr)]" >
    <div class="py-4">
        <img src="{{asset('images/profile.png')}}" class="w-[50%] md:w-[30%] lg:w-[80%] mx-auto rounded-full lg:rounded-xl">
    </div>
    <div class="py-4 md:px-10">
        <a href="/updateprofile" class="text-[#3166AD] text-sm font-semibold flex justify-end px-10 md:px-0">Ubah</a>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-5 md:text-left">Biodata Diri</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Nama</td>
                    <td class="w-[50%]">{{ $profil->name }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lahir</td>
                    <td>15 Juni 1997</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>Pria</td>
                </tr>
            </table>
        </div>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-7 md:text-left">Kontak</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Email </td>
                    <td class="w-[50%]">{{ $profil->email }}</td>
                </tr>
                <tr>
                    <td>No. HP</td>
                    <td>{{ $profil->no_telp }}</td>
                </tr>
            </table>
        </div>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-7 md:text-left">Alamat</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Alamat</td>
                    <td class="w-[50%]">{{ $profil->alamat }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="py-4 px-12 md:px-8">
        <h3 class="font-semibold text-xl md:text-2xl text-center md:text-left">Pickup History</h3>
        <div class="rounded-lg flex border-[#3367AD] border-2 mt-5">
            <div class="flex flex-intial w-[25%] px-2 pl-3 py-2.5">
                <img src="{{asset('images/pickupcar.png')}}" class="object-contain">
            </div>
            <div class="flex flex-intial w-[50%] items-center py-2.5">
                <h5 class="font-medium pl-4 text-[#66737D]">
                    Date : <span class="text-[#3367AD]">7 June 2022</span> <br>
                    Time : <span class="text-[#3367AD]">09:00 WIB</span>
                </h5>
            </div>
            <div class="flex flex-intial justify-end w-[25%]">
                <div class="float bg-[#E4A972] h-6 px-5 rounded-tr-md rounded-bl-md">
                    <h4 class="font-medium text-md text-white">waiting</h4>
                </div>
            </div>
        </div>
        <div class="mt-5 rounded-lg flex border-[#3367AD] border-2">
            <div class="flex flex-intial w-[25%] px-2 pl-3 py-2.5">
                <img src="{{asset('images/pickupcar.png')}}" class="object-contain">
            </div>
            <div class="flex flex-intial w-[50%] items-center py-2.5">
                <h5 class="font-medium pl-4 text-[#66737D]">
                    Date : <span class="text-[#3367AD]">4 June 2022</span> <br>
                    Time : <span class="text-[#3367AD]">09:00 WIB</span>
                </h5>
            </div>
            <div class="flex flex-intial justify-end w-[25%]">
                <div class="float bg-[#31AD88] h-6 px-5 rounded-tr-md rounded-bl-md">
                    <h4 class="font-medium text-md text-white">done</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

