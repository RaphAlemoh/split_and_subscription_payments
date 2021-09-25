<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Packages') }}
        </h2>
    </x-slot>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
  @foreach ($packages as $package)
    <div class="flex items-center lg:w-3/5 mx-auto border-b pb-10 mb-10 border-gray-200 sm:flex-row flex-col">
      <div class="sm:w-32 sm:h-32 h-20 w-20 sm:mr-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 flex-shrink-0">
        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="sm:w-16 sm:h-16 w-10 h-10" viewBox="0 0 24 24">
          <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
        </svg>
      </div>
      <div class="flex-grow sm:text-left text-center mt-6 sm:mt-0">
        <h2 class="text-gray-900 text-lg title-font font-medium mb-2">{{ $package->name }} for {{ $package->amount }}</h2>
        <p class="leading-relaxed text-base">{{ (' '. $package->description .' By '. $package->author) }} </p>
        @php
            $purchased = auth()->user()->sale->transaction != null ? true : false;

            $package_id = auth()->user()->sale->package_id;
        @endphp
        @if ($package->amount  != 0 )
        @if ($purchased &&  $package->id == $package_id)
        {{ __('Access') }}
        @else
        @include('payments.split', $package)
        @endif
        @else
        {{ __('Free') }}
        @endif
    </div>
    </div>
    @endforeach

    <button class="flex mx-auto mt-20 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
        More Packages
    </button>
  </div>
</section>

</x-app-layout>
