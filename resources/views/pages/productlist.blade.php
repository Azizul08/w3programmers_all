@extends('master')
@section('title', 'Products List')
@section('content')
<div class="mx-auto max-w-7xl mt-6 grid grid-cols-2 gap-x-4 gap-y-10 sm:gap-x-6 md:grid-cols-4 md:gap-y-0 lg:gap-x-8">
@foreach($products as $product)
<div class="group relative">
              <div class="h-56 w-full overflow-hidden rounded-md bg-gray-200 group-hover:opacity-75 lg:h-72 xl:h-80">
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-full w-full object-cover object-center">
              </div>
              <h3 class="mt-4 text-sm text-gray-700">
                <a href="#">
                  <span class="absolute inset-0"></span>
                  {{ $product->name }}
                </a>
              </h3>
              <p class="mt-1 text-sm text-gray-500">{{ $product->description }}</p>
              <p class="mt-1 text-sm font-medium text-gray-900">${{ $product->price }}</p>
              <div class="mt-6">
                <a href="{{ route('add.to.cart', $product->id) }}" class="relative flex items-center justify-center rounded-md border border-transparent bg-gray-100 py-2 px-8 text-sm font-medium text-gray-900 hover:bg-gray-200">Add to bag<span class="sr-only">, Halfsize Tote</span></a>
              </div>
            </div>    
@endforeach
</div>
 
@endsection