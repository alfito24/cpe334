@extends('template')
@section('title', 'Buy Products')
@section('isikonten')
<div class="mt-28 font-poppins px-5">
    <!-- Image gallery -->
    <div class="mt-6 max-w-2xl mx-auto sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-x-8">
      <div class="hidden aspect-w-3 aspect-h-4 rounded-lg overflow-hidden lg:block">
        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-secondary-product-shot.jpg" alt="Two each of gray, white, and black shirts laying flat." class="w-full h-full object-center object-cover">
      </div>
      <div class="hidden lg:grid lg:grid-cols-1 lg:gap-y-8">
        <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-01.jpg" alt="Model wearing plain black basic tee." class="w-full h-full object-center object-cover">
        </div>
        <div class="aspect-w-3 aspect-h-2 rounded-lg overflow-hidden">
          <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-tertiary-product-shot-02.jpg" alt="Model wearing plain gray basic tee." class="w-full h-full object-center object-cover">
        </div>
      </div>
      <div class="aspect-w-4 aspect-h-5 sm:rounded-lg sm:overflow-hidden lg:aspect-w-3 lg:aspect-h-4">
        <img src="https://tailwindui.com/img/ecommerce-images/product-page-02-featured-product-shot.jpg" alt="Model wearing plain white basic tee." class="w-full h-full object-center object-cover">
      </div>
    </div>

    <!-- Product info -->
    <div class="max-w-2xl mx-auto pt-10 px-4 sm:px-6 lg:max-w-7xl lg:pt-16 lg:px-8 lg:grid lg:grid-cols-3 lg:grid-rows-[auto,auto,1fr] lg:gap-x-8">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold sm:text-3xl">Lampu Tidur</h1>
        <div class="mt-5">
            <img src="{{asset('images/location.png')}}" alt="location" class=" px-1 inline">
            <h4 class="font-medium inline pl-2 text-[#66737D]">Dikirim dari <span class="text-[#3166AD] font-semibold">Kota Bekasi</span></h4>
        </div>
        <div class="mt-2">
            <img src="{{asset('images/material.png')}}" alt="material" class="inline">
            <h4 class="font-medium inline pl-2 text-[#66737D]">Terbuat dari <span class="text-[#3166AD] font-semibold">Sendok Plastik Bekas</span></h4>
        </div>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:mt-0 lg:row-span-3">
        <p class="tracking-tight text-3xl text-[#3166AD] lg:font-semibold">Rp 54000</p>
        <div class="rounded-lg border-[#B5B8BA] border-[1px] px-4 py-2.5 mt-5 max-w-max">
            <h4 class="font-semibold text-[#66737D]">Stock : <span class="text-[#3166AD] font-semibold">5 items left</span></h4>
        </div>
        <button type="submit" class="py-2 mt-5 min-w-full bg-gradient-to-r from-[#0162A7] to-[#BFD9EB] text-xl font-bold text-white rounded hover:from-[#BFD9EB] hover:text-[black] transition duration-300">Order via WA</button>
      </div>

      <div class="py-10 lg:pt-6 lg:pb-10 lg:col-start-1 lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <!-- Description and details -->
        <div>
          <div class="space-y-6">
            <p class="text-base text-gray-900">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut accumsan laoreet diam ac. Posuere in curabitur placerat amet. Amet cum in purus gravida. Sed at pellentesque scelerisque at. Et dui ullamcorper posuere in elementum lobortis. Leo mauris arcu, nibh risus vestibulum. Eu, enim in duis et duis faucibus. Velit in nunc egestas lacus, dolor, hendrerit orci. Urna, amet adipiscing enim, felis netus ullamcorper. Imperdiet elementum lacus in mauris. Placerat in arcu pharetra sociis adipiscing ultricies. Enim, amet sit gravida leo. Congue eros, lobortis amet aliquam viverra nisl. Volutpat faucibus sed auctor eu risus, ligula. Vivamus amet, mauris risus, leo ultrices viverra .</p>
          </div>
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
