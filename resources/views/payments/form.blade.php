<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="application/json">
    @csrf
    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
    <input type="hidden" name="plan_id" value="{{ $plan->id  }}">
    <input type="hidden" name="amount" value="{{ $plan->plan_amount * 100 }}"> {{-- required in kobo --}}
    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    <input type="hidden" name="plan" value="{{ $plan->plan_code  }}"> {{-- required --}}
    {{-- <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> --}}
    <p>
        <a class="text-blue-400 inline-flex items-center">
            <button type="submit" class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">
                Subscribe Now!!!
            </svg>
            </button>
            <!-- <button class="flex items-center mt-auto text-white bg-gray-400 border-0 py-2 px-4 w-full focus:outline-none hover:bg-gray-500 rounded" type="submit">
                Subscribe Now!!!
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-auto" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </button> -->
        </a>
    </p>
</form>
