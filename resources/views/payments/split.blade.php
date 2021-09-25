<form method="POST" action="{{ route('pay') }}" >
    @csrf
    <input type="hidden" name="email" value="{{ Auth::user()->email }}"> {{-- required --}}
    <input type="hidden" name="package_id" value="{{ $package->id }}"> {{-- required in kobo --}}
    <input type="hidden" name="amount" value="{{ $package->amount * 100 }}"> {{-- required in kobo --}}
    <input type="hidden" name="first_name" value="{{ Auth::user()->name }}">
    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
    <input type="hidden" name="subaccount" value="{{ $package->user->account->subaccount_code }}">

    {{-- <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> --}}
    <p>
        <a class="text-blue-400 inline-flex items-center">
            <button type="submit" class="flex-shrink-0 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg mt-10 sm:mt-0">
                Buy Now!!!
                </svg>
            </button>
        </a>
    </p>
</form>
