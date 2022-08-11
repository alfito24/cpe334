@extends('template')

@section('title', 'Pickup')

@section('isikonten')
<div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto mt-28 text-2xl md:mt-36 md:text-3xl">
    <h1>Pickup your waste by the type</h1>
</div>
<form method="POST" action="pickup/storepickup">
    @csrf
    <div class="grid grid-cols-2 gap-x-10 gap-y-16 font-poppins mt-14 px-12 md:grid-cols-4 md:mt-24">
        <div>
            <img src="{{asset('images/plastic.png')}}" alt="plastic" class="w-6 mx-auto">
            <div class="pt-9">
                <h3 class="text-[#66737D] text-center font-semibold text-lg">Plastic</h3>
            </div>
            <div class="pt-3 text-center">
                <button type="button" id="down_plastic" class="plastic" onclick="down(this.className)"><img src="{{asset('images/min.png')}}" alt="min" class="w-6 inline"></button>
                <input type="hidden" id="kuantitas_plastic" value="0" name="jumlah_plastic">
                <h3 class="font-semibold text-md inline px-3 text-[#3166AD]" id="jumlah_plastic">0 kg</h3>
                <button type="button" id="up_plastic" class="plastic" onclick="up(this.className)"><img src="{{asset('images/plus.png')}}" alt="plus" class="w-6 inline"></button>
            </div>
        </div>

        <div>
            <img src="{{asset('images/paper.png')}}" alt="paper" class="w-14 mx-auto">
            <div class="pt-9">
                <h3 class="text-[#66737D] text-center font-semibold text-lg">Paper</h3>
            </div>
            <div class="pt-3 text-center">
                <button type="button" id="down_paper" class="paper" onclick="down(this.className)"><img src="{{asset('images/min.png')}}" alt="min" class="w-6 inline"></button>
                <input type="hidden" id="kuantitas_paper" value="0" name="jumlah_paper">
                <h3 class="font-semibold text-md inline px-3 text-[#3166AD]" id="jumlah_paper">0 kg</h3>
                <button type="button" id="up_paper" class="paper" onclick="up(this.className)"><img src="{{asset('images/plus.png')}}" alt="plus" class="w-6 inline"></button>
            </div>
        </div>

        <div>
            <img src="{{asset('images/metals.png')}}" alt="metals" class="w-11 mx-auto pt-1">
            <div class="pt-10">
                <h3 class="text-[#66737D] text-center font-semibold text-lg">Metals</h3>
            </div>
            <div class="pt-3 text-center">
                <button type="button" id="down_metals" class="metals" onclick="down(this.className)"><img src="{{asset('images/min.png')}}" alt="min" class="w-6 inline"></button>
                <input type="hidden" id="kuantitas_metals" value="0" name="jumlah_metals">
                <h3 class="font-semibold text-md inline px-3 text-[#3166AD]" id="jumlah_metals">0 kg</h3>
                <button type="button" id="up_metals" class="metals" onclick="up(this.className)"><img src="{{asset('images/plus.png')}}" alt="plus" class="w-6 inline"></button>
            </div>
        </div>

        <div>
            <img src="{{asset('images/glass.png')}}" alt="glass" class="w-14 mx-auto pt-1">
            <div class="pt-9">
                <h3 class="text-[#66737D] text-center font-semibold text-lg">Glass</h3>
            </div>
            <div class="pt-3 text-center">
                <button type="button" id="down_glass" class="glass" onclick="down(this.className)"><img src="{{asset('images/min.png')}}" alt="min" class="w-6 inline"></button>
                <input type="hidden" id="kuantitas_glass" value="0" name="jumlah_glass">
                <h3 class="font-semibold text-md inline px-3 text-[#3166AD]" id="jumlah_glass">0 kg</h3>
                <button type="button" id="up_glass" class="glass" onclick="up(this.className)"><img src="{{asset('images/plus.png')}}" alt="plus" class="w-6 inline"></button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 gap-x-28 gap-y-16 font-poppins mt-16 px-12 md:grid-cols-2 md:mt-24 md:px-20">
        <div>
            <div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto text-2xl md:text-3xl">
                <h1>Pickup Location</h1>
            </div>

            <div class="flex mt-5">
                <div class="flex-auto w-[55%] mr-3">
                    <input type="text" id="address" class="p-2.5 z-20 w-full text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="street" required name="alamatPickup">
                </div>
                <div class="flex-auto w-[15%] mr-3">
                    <input type="text" id="no" class=" p-2.5 w-full text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="no" required name="number">
                </div>
                <div class="flex-auto w-[30%]">
                    <input type="text" id="city" class="p-2.5 w-full text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="city" required name="city">
                </div>
            </div>
            <div class="mt-5">
                <input type="text" id="note" name="notePickup" class="block p-2.5 w-full z-20 text-sm text-gray-900 rounded-lg border-[#3367AD] border-2" placeholder="Note :">
            </div>
        </div>
        <div>
            <div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto text-2xl md:text-3xl">
                <h1>Pickup Date</h1>
            </div>
            <div class="relative mt-5">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-[#3367AD]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                </div>
                <input datepicker datepicker-autohide type="text" class="border-2 border-[#3367AD] text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Select date" name="tanggalPickup">
            </div>
            <div class="flex justify-center text-gray-900 rounded-lg border-[#3367AD] border-2 mt-5 md:mt-6 h-11 pt-2">
                <div class=" w-40 bg-white shadow-xl">
                    <div class="flex">
                        <select name="hours" class="bg-transparent text-xl appearance-none outline-none px-2 ">
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
                        <span class="text-xl mr-3">:</span>
                        <select name="minutes" class="bg-transparent text-xl appearance-none outline-none mr-4 px-2">
                            <option value="0">00</option>
                            <option value="15">15</option>
                            <option value="30">30</option>
                            <option value="45">45</option>
                        </select>
                        <select name="ampm" class="bg-transparent text-xl appearance-none outline-none px-2">
                            <option value="am">AM</option>
                            <option value="pm">PM</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="md:flex mt-16 md:mt-32">
        <div class="hidden md:flex md:flex-none md:w-[20%] lg:w-[30%]">
            <img src="{{asset('images/pickupkiri.png')}}" >
        </div>
        <div class="md:flex-initial md:w-[60%] lg:w-[40%] font-poppins px-12 md:pt-9">
            <div>
                <div class="text-[#3166AD] font-poppins font-bold grid justify-items-center mx-auto text-2xl md:text-3xl">
                    <h1>Estimated Price</h1>
                </div>
                <div class="rounded-t-lg border-[#3367AD] border-2 h-11 px-3 py-2.5 mt-5">
                    <img src="{{asset('images/price.png')}}" alt="price" class="w-6 inline">
                    <h4 class="font-semibold inline pl-2 text-[#66737D]">Total Price</h4>
                    <h4 class="font-semibold float-right  text-[#66737D]" id="totalPrice">Rp0</h4>
                </div>
                <div class="rounded-b-lg border-[#3367AD] border-t-0 border-2 h-11 px-3 py-2.5">
                    <img src="{{asset('images/points.png')}}" alt="price" class="w-6 inline">
                    <h4 class="font-semibold inline pl-2 text-[#66737D]">B Points</h4>
                    <h4 class="font-semibold float-right  text-[#66737D]" id="bPoints">0</h4>
                    <input type="hidden" name="bPoints" id="totalbPoints" value="0">
                </div>
                <div class="mt-8">
                    <button type="submit" class="py-2 min-w-full bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-xl font-bold text-white rounded hover:from-[#BFD9EB] hover:text-[black] transition duration-300">Order</button>
                </div>
            </div>
        </div>
    </form>
    <div class="hidden md:flex md:flex-initial md:w-[20%] lg:w-[30%] md:justify-end">
        <img src="{{asset('images/pickupkanan.png')}}">
    </div>
</div>

<script src="https://cdn.tailwindcss.com"></script>

<script>
    function down(className){
        let text = document.getElementById('jumlah_' + className).textContent; //mendapatkan text dari jumlah barang
        let jumlah = parseInt(text); //mendapatkan angka spesifik jumlah

        //antisipasi jumlah bersifat negatif
        if(jumlah>0){
            jumlah--;
            document.getElementById('kuantitas_' + className).value = jumlah; //masukkan perubahan ke input value
        }
        //decrement karena fungsi down
        document.getElementById('jumlah_' + className).innerHTML = jumlah + " kg";
    }

    function up(className){
        let text = document.getElementById('jumlah_' + className).textContent; //mendapatkan text dari jumlah barang
        let jumlah = parseInt(text); //mendapatkan angka spesifik jumlah
        jumlah++; //increment karena fungsi up
        document.getElementById('kuantitas_' + className).value = jumlah; //masukkan perubahan ke input value
        document.getElementById('jumlah_' + className).innerHTML = jumlah + " kg";
    }
</script>
@endsection

@section('pickupactive')
class='border-b-4 border-[#BFD9EB] text-white font-semibold py-4 px-2'
@endsection

@section('pickup1active')
class='block text-sm px-2 py-4 bg-[#FBE0C4] font-semibold'
@endsection
