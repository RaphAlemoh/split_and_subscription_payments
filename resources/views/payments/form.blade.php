<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="application/json">
    @csrf
    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
    <input type="hidden" name="payment_type" value="subscription">
    <input type="hidden" name="plan_id" value="{{ $plan->id  }}">
    <input type="hidden" name="amount" value="{{ $plan->plan_amount * 100 }}"> {{-- required in kobo --}}
    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    <input type="hidden" name="plan" value="{{ $plan->plan_code  }}"> {{-- required --}}
    {{-- <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> --}}
    <input type="hidden" name="metadata" value="{{ json_encode($array = ['payment_type' => 'subscription']) }}">

    <p>
        <a class="text-blue-400 inline-flex items-center">
            <button type="submit" class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">
                Subscribe Now!!!
            </svg>
            </button>
        </a>
    </p>
</form>
