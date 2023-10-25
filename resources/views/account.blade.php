@extends('template')

@section('title', 'My Account')

@section('isikonten')
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-28 text-2xl md:mt-36 md:text-3xl">
    <h1>Manage your account</h1>
</div>
<div class="grid grid-cols-1 gap-y-10 font-poppins mt-14 lg:grid-cols-[300px_minmax(500px,_1fr)_minmax(450px,_1fr)]" >
    <div class="py-4">
        @if (!($profil->picture === null))
        <img src="{{ url('/data_file/'.$profil->picture) }}" class="w-[50%] md:w-[30%] lg:w-[80%] mx-auto rounded-full lg:rounded-xl">
        @else
        <img src="https://www.pngitem.com/pimgs/m/404-4042686_my-profile-person-icon-png-free-transparent-png.png" class="w-[50%] md:w-[30%] lg:w-[80%] mx-auto rounded-full lg:rounded-xl">
        @endif

    </div>
    <div class="py-4 md:px-10">
        <a href="/updateprofile" class="text-[#3166AD] text-sm font-semibold flex justify-end px-10 md:px-0">Edit</a>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-5 md:text-left">Profile</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Name</td>
                    <td class="w-[50%]">{{ $profil->name }}</td>
                </tr>
                <tr>
                    <td>Birth Date</td>
                    <td>{{ $profil->birth_date }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ $profil->gender }}</td>
                </tr>
            </table>
        </div>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-7 md:text-left">Contact</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Email </td>
                    <td class="w-[50%]">{{ $profil->email }}</td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td>{{ $profil->phone_number }}</td>
                </tr>
            </table>
        </div>
        <h3 class="font-semibold text-xl md:text-2xl text-center mt-7 md:text-left">Address</h3>
        <div class="flex justify-center items-center">
            <table class="pt-3 text-md md:text-md lg:text-lg text-gray-500 border-separate border-spacing-y-3 w-[65%] md:w-[100%]">
                <tr>
                    <td class="w-[50%]">Address</td>
                    <td class="w-[50%]">{{ $profil->address }}</td>
                </tr>
            </table>
        </div>
    </div>
    @if (count($transactions))
    <div class="py-4 px-12 md:px-8">
        <h3 class="font-semibold text-xl md:text-2xl text-center md:text-left">Apply History</h3>
        @foreach ($transactions as $pickup)
        @php
        $tanggalPickup = strtotime($pickup->pickup->pickup_date);
        $jamPickup = strtotime($pickup->pickup->pickup_time);
        if ($pickup->pickup->status == "Belum Diambil"){
            $kodewarna = "E4A972";
        }elseif ($pickup->pickup->status == "Sudah Diambil") {
            $kodewarna = "31AD88";
        }elseif ($pickup->pickup->status == "Pickup Dibatalkan") {
            $kodewarna = "ed0726";
        }
        @endphp
        <div class="rounded-lg flex border-[#3367AD] border-2 mt-5">
            <div class="flex flex-intial w-[25%] px-2 pl-3 py-2.5">
                <img src="{{asset('images/pickupcar.png')}}" class="object-contain">
            </div>
            <div class="flex flex-intial w-[50%] items-center py-2.5">
                <h5 class="font-medium pl-4 text-[#66737D]">
                    Date : <span class="text-[#3367AD]">{{ date('d M Y', $tanggalPickup) }}</span> <br>
                    Status : <span class="text-[#3367AD]">{{ $pickup->pickup->status }}</span>
                </h5>
            </div>
            <div class="flex flex-intial justify-end w-[25%]">
                <div class="float bg-[#{{ $kodewarna }}] h-6 px-5 rounded-tr-md rounded-bl-md">
                    <h4 class="font-medium text-md text-white">{{ $pickup->pickup->status }}</h4>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @endif
</div>
@endsection

