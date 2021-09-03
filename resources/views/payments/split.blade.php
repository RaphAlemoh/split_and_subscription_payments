<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="application/json">
    @csrf
    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
    <input type="hidden" name="payment_type" value="split">
    <input type="hidden" name="package_id" value="{{ $package->id  }}">
    <input type="hidden" name="amount" value="{{ $package->amount * 100 }}"> {{-- required in kobo --}}
    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    <input type="hidden" name="metadata" value="{{ json_encode($array = ['payment_type' => 'split',]) }}">
    <input type="hidden" name="split_code" value="ACCT_1n3bm4cc4ftnk2t">

    {{-- <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> --}}
    <p>
        <a class="text-blue-400 inline-flex items-center">
            <button type="submit" class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">
                Subscribe Now!!!
                </svg>
            </button>
        </a>
    </p>
</form>
