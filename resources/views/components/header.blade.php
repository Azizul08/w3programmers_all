<nav aria-label="Top" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="border-b border-gray-200">
              <div class="flex h-16 items-center">
                <button type="button" x-description="Mobile menu toggle, controls the 'mobileMenuOpen' state." class="rounded-md bg-white p-2 text-gray-400 lg:hidden" @click="open = true">
                  <span class="sr-only">Open menu</span>
                  <svg class="h-6 w-6" x-description="Heroicon name: outline/bars-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
    </svg>
                </button>
     
                <!-- Logo -->
                <div class="ml-4 flex lg:ml-0">
                  <a href="{{ url('/') }}">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-mark.svg?color=indigo&amp;shade=600" alt="">
                  </a>
                </div>
     
                <!-- Flyout menus -->
                <div class="hidden lg:ml-8 lg:block lg:self-stretch">
                  <div class="flex h-full space-x-8">
                     
                    <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Women</a>
                    <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Men</a>
                    <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Company</a>
                    <a href="#" class="flex items-center text-sm font-medium text-gray-700 hover:text-gray-800">Stores</a>
                     
                  </div>
                </div>
     
                <div class="ml-auto flex items-center">
                  <div class="hidden lg:flex lg:flex-1 lg:items-center lg:justify-end lg:space-x-6">
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Sign in</a>
                    <span class="h-6 w-px bg-gray-200" aria-hidden="true"></span>
                    <a href="#" class="text-sm font-medium text-gray-700 hover:text-gray-800">Create account</a>
                  </div>
 
                  @php $total = 0 @endphp
 
@foreach((array) session('cart') as $id => $details)
    @php $total += $details['price'] * $details['quantity'] @endphp
@endforeach
     
                  <!-- Cart -->
                  <div class="ml-4 flow-root lg:ml-6">
                    <a href="{{ route('cart') }}" class="group -m-2 flex items-center p-2">
                      <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: outline/shopping-bag" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
      <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
    </svg>
                      <span class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">$ {{ $total }}</span>
                      <span class="sr-only">items in cart, view bag</span>
                    </a>
                  </div>
 
                   
                </div>
              </div>
            </div>
</nav>