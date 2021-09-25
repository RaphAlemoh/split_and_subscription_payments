<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subaccount') }}
        </h2>
    </x-slot>

    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-12">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Upload account details to recieve payments</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                    Please kindly note that account details are SAFE and are not with hold on our data set. Split Payment is handled by paystack.!!!

                </p>

                <br>
                @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    @foreach ($errors->all() as $error)
                    <span class="block sm:inline">{{ $error }}</span>
                    @endforeach
                </div>

                @endif

                @if (session('notice'))
                <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Informational message</p>
                    <p class="text-sm">{{ session('notice') }}</p>
                </div>
                @endif
            </div>

            <div class="flex lg:w-2/3 w-full sm:flex-row flex-col mx-auto px-8 sm:space-x-4 sm:space-y-0 space-y-4 sm:px-0 items-end">


                <form method="POST" action="{{ route('subaccount') }}" accept-charset="UTF-8" class="form-horizontal" role="form" enctype="application/json">
                    @csrf
                    <div class="relative flex-grow w-full">
                        <label for="bank-code" class="leading-7 text-sm text-gray-600">Banks</label>

                        <select class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" name="settlement_bank">
                            <option selected disabled>Select Bank</option>
                            @foreach($banks as $bank)
                            <option value="{{ $bank->code }}" class="py-1">{{ $bank->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <br>
                    <div class="relative flex-grow w-full">
                        <label for="account-number" class="leading-7 text-sm text-gray-600">Account Number</label>
                        <input type="text" id="account-number" name="account_number" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-transparent focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                    <br>
                    <button class="text-white bg-indigo-500 border-0 py-4 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Create</button>
                </form>
            </div>
        </div>
    </section>


</x-app-layout>
