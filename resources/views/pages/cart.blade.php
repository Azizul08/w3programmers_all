@extends('master')
@section('title', 'Shopping Cart')
@section('content')
<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 pt-16 pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Shopping Cart</h2>
    <form class="mt-12 lg:grid lg:grid-cols-12 lg:items-start lg:gap-x-12 xl:gap-x-16">
      <section aria-labelledby="cart-heading" class="lg:col-span-7">
        <h2 id="cart-heading" class="sr-only">Items in your shopping cart</h2>
 
        <ul id="cart" role="list" class="divide-y divide-gray-200 border-t border-b border-gray-200">
 
        @php $total = 0 @endphp
 
@if(session('cart'))
 
    @foreach(session('cart') as $id => $details)
 
        @php $total += $details['price'] * $details['quantity'] @endphp
 
          <li class="flex py-6 sm:py-10" data-id="{{ $id }}">
            <div class="flex-shrink-0">
              <img src="{{ $details['image'] }}" alt="Front of men&#039;s Basic Tee in sienna." class="h-24 w-24 rounded-md object-cover object-center sm:h-48 sm:w-48">
            </div>
 
            <div class="ml-4 flex flex-1 flex-col justify-between sm:ml-6">
              <div class="relative pr-9 sm:grid sm:grid-cols-2 sm:gap-x-6 sm:pr-0">
                <div>
                  <div class="flex justify-between">
                    <h3 class="text-sm">
                      <a href="#" class="font-medium text-gray-700 hover:text-gray-800">{{ $details['name'] }}</a>
                    </h3>
                  </div>
                  <div class="mt-1 flex text-sm">
                    <p class="text-gray-500">Sienna</p>
 
                    <p class="ml-4 border-l border-gray-200 pl-4 text-gray-500">Large</p>
                  </div>
                  <p class="mt-1 text-sm font-medium text-gray-900">${{ $details['price'] }}</p>
                </div>
 
                <div class="mt-4 sm:mt-0 sm:pr-9">
                  <label for="quantity-0" class="sr-only">Quantity, Basic Tee</label>
                  <input type="number" value="{{ $details['quantity'] }}" class="quantity update-cart w-1/3 rounded-md border border-gray-300 py-1.5 text-left text-base font-medium leading-5 text-gray-700 shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" />
                  <div class="actions absolute top-0 right-0">
                    <button type="button" class="remove-from-cart -m-2 inline-flex p-2 text-gray-400 hover:text-gray-500">
                      <span class="sr-only ">Remove</span>
                      <!-- Heroicon name: mini/x-mark -->
                      <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </li>
   @endforeach
 
        @endif
           
        </ul>
      </section>
 
      <!-- Order summary -->
      <section aria-labelledby="summary-heading" class="mt-16 rounded-lg bg-gray-50 px-4 py-6 sm:p-6 lg:col-span-5 lg:mt-0 lg:p-8">
        <h2 id="summary-heading" class="text-lg font-medium text-gray-900">Order summary</h2>
 
        <dl class="mt-6 space-y-4">
          <div class="flex items-center justify-between">
            <dt class="text-sm text-gray-600">Subtotal</dt>
            <dd class="text-sm font-medium text-gray-900">
            ${{ $total }}
        </dd>
          </div>
          <div class="flex items-center justify-between border-t border-gray-200 pt-4">
            <dt class="flex items-center text-sm text-gray-600">
              <span>Shipping estimate</span>
              <a href="#" class="ml-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                <span class="sr-only">Learn more about how shipping is calculated</span>
                <!-- Heroicon name: mini/question-mark-circle -->
                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zM8.94 6.94a.75.75 0 11-1.061-1.061 3 3 0 112.871 5.026v.345a.75.75 0 01-1.5 0v-.5c0-.72.57-1.172 1.081-1.287A1.5 1.5 0 108.94 6.94zM10 15a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
              </a>
            </dt>
            <dd class="text-sm font-medium text-gray-900">$0.00</dd>
          </div>
    
          <div class="flex items-center justify-between border-t border-gray-200 pt-4">
            <dt class="text-base font-medium text-gray-900">Order total</dt>
            <dd class="text-base font-medium text-gray-900">${{ $total }}</dd>
          </div>
        </dl>
 
        <div class="mt-6">
         
          <button type="submit" class="w-full rounded-md border border-transparent bg-indigo-600 py-3 px-4 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-50">Checkout</button>
        </div>
        <div class="mt-6 text-center text-sm">
          <p>
            or
            <a href="{{ url('/') }}" class="font-medium text-indigo-600 hover:text-indigo-500">
              Continue Shopping
              <span aria-hidden="true"> &rarr;</span>
            </a>
          </p>
        </div>
      </section>
    </form>
  </div>
</div>
 
@endsection 
 
 
@section('scripts')
 
<script type="text/javascript">
 
  $(".update-cart").change(function (e) {
 
        e.preventDefault();
 
   
 
        var ele = $(this);
 
   
 
        $.ajax({
 
            url: '{{ route('update.cart') }}',
 
            method: "patch",
 
            data: {
 
                _token: '{{ csrf_token() }}', 
 
                id: ele.parents("li").attr("data-id"), 
 
                quantity: ele.parents("li").find(".quantity").val()
 
            },
 
            success: function (response) {
 
               window.location.reload();
 
            }
 
        });
 
    });
 
     
 
 
    $(".remove-from-cart").click(function (e) {
 
        e.preventDefault();
 
   
 
        var ele = $(this);
 
   
 
        if(confirm("Are you sure want to remove?")) {
 
            $.ajax({
 
                url: "{{ route('remove.from.cart') }}",
 
                method: "DELETE",
 
                data: {
 
                    _token: '{{ csrf_token() }}', 
 
                    id: ele.parents("li").attr("data-id")
 
                },
 
                success: function (response) {
 
                    window.location.reload();
 
                }
 
            });
 
        }
 
    });
 
   
 
</script>
 
@endsection 