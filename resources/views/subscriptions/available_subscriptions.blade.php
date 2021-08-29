<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <section class="text-gray-400 bg-gray-900 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                @foreach ($plans as $plan)
                <a href="http://">
                <div class="p-4 lg:w-1/3">
                    <div class="h-full bg-gray-800 bg-opacity-40 px-8 pt-16 pb-24 rounded-lg overflow-hidden text-center relative">
                        <h2 class="tracking-widest text-xs title-font font-medium text-gray-500 mb-1">Plan</h2>
                        <h1 class="title-font sm:text-2xl text-xl font-medium text-white mb-3">{{ $plan->plan_name }}</h1>
                        <p class="leading-relaxed mb-3">Enjoy free streaming of paid audio files for three(3) months!!! at {{ $plan->plan_amount }} </p>
                        @include('payments.form', $plan)
                    </div>
                </div>
                </a>
    @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
