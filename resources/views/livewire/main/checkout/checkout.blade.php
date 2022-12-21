<div class="relative max-w-3xl mx-auto" x-data="window.LjqGJmYrwJSjIHT">

    {{-- Loading --}}
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block">{{ __('messages.t_please_wait_dots') }}</span>
            </div>
        </div>
    </div>

    {{-- Xendit 3d --}}
    @if (settings('xendit')->is_enabled)
        <div class="xendit-overlay fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" style="display: none"></div>
        <div id="three-ds-container" style="display: none;">
            <iframe height="450" width="550" id="sample-inline-frame" name="sample-inline-frame"> </iframe>
        </div>
    @endif

    {{-- Error message --}}
    @if (session()->has('error'))
        <div class="w-full mb-10">
            <div class="rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/> </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <h3 class="text-sm font-medium text-red-800">
                            {{ session()->get('error') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- Error --}}
    @if ($has_error)
        <div class="w-full mb-10">
            <div class="rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/> </svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <h3 class="text-sm font-medium text-red-800">
                            {{ $error_message }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white dark:bg-zinc-800 dark:border-zinc-700 rounded-lg shadow-sm border border-gray-200">

        {{-- Checkout form --}}
        <section class="flex-auto overflow-y-auto px-4 pt-12 pb-16 sm:px-6 sm:pt-16 lg:px-8 lg:pt-0 lg:pb-24">
            <div class="max-w-lg mx-auto lg:pt-16">

                {{-- Select a payment gateway --}}
                <fieldset>

                    {{-- Empty state --}}
                    <div class="text-center mb-12">

                        {{-- Icon --}}
                        <div class="h-28 w-28 border-2 border-gray-100 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 rounded-full flex items-center justify-center mx-auto">
                            <svg class="mx-auto h-9 w-9 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M6.5 2h11a1 1 0 0 1 .8.4L21 6v15a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6l2.7-3.6a1 1 0 0 1 .8-.4zm12 4L17 4H7L5.5 6h13zM9 10H7v2a5 5 0 0 0 10 0v-2h-2v2a3 3 0 0 1-6 0v-2z"></path></g></svg>
                        </div>

                        {{-- Texts --}}
                        <h2 class="mt-4 text-base font-bold text-gray-700 dark:text-gray-100">{{ __('messages.t_checkout') }}</h2>
                        <div class="flex items-center justify-center text-green-400 hover:text-green-500 mt-1">
                            <svg class="h-5 w-5 ltr:mr-1 rtl:ml-1" stroke="currentColor" fill="currentColor" stroke-width="0" version="1.2" baseProfile="tiny" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M17 10h-1v-2c0-2.205-1.794-4-4-4s-4 1.795-4 4v2h-1c-1.103 0-2 .896-2 2v7c0 1.104.897 2 2 2h10c1.103 0 2-.896 2-2v-7c0-1.104-.897-2-2-2zm-5 8.299c-.719 0-1.3-.58-1.3-1.299s.581-1.301 1.3-1.301 1.3.582 1.3 1.301-.581 1.299-1.3 1.299zm2-7.299h-4v-3c0-1.104.897-2 2-2s2 .896 2 2v3z"></path></svg>
                            <p class="text-sm">{{ __('messages.t_ur_transaction_is_secure') }}</p>
                        </div>

                    </div>
                
                    {{-- Available payment methods --}}
                    @if (is_null($payment_method))
                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-3 sm:gap-x-4">

                            {{-- Stripe --}}
                            @if (settings('stripe')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'stripe')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'stripe' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('stripe')->logo)
                                        <img src="{{ src(settings('stripe')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif

                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('stripe')->name }}</span>

                                </div>
                            @endif

                            {{-- Paypal --}}
                            @if (settings('paypal')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'paypal')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'paypal' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('paypal')->logo)
                                        <img src="{{ src(settings('paypal')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif

                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paypal')->name }}</span>

                                </div>
                            @endif

                            {{-- Wallet --}}
                            @if (auth()->user()->balance_available >= $this->total() + $this->taxes())
                                <div 
                                    wire:click="$set('payment_method', 'wallet')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'wallet' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    <div class="flex items-center justify-center max-h-[35px] mb-2 mx-auto p-1 mt-2 dark:text-gray-300">
                                        <svg class="w-5 h-5" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M16 12h2v4h-2z"></path><path d="M20 7V5c0-1.103-.897-2-2-2H5C3.346 3 2 4.346 2 6v12c0 2.201 1.794 3 3 3h15c1.103 0 2-.897 2-2V9c0-1.103-.897-2-2-2zM5 5h13v2H5a1.001 1.001 0 0 1 0-2zm15 14H5.012C4.55 18.988 4 18.805 4 18V8.815c.314.113.647.185 1 .185h15v10z"></path></svg>
                                        <h1 class="text-sm font-semibold ltr:ml-1 rtl:mr-1">{{ __('messages.t_wallet') }}</h1>
                                    </div>

                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">
                                        @money(auth()->user()->balance_available, settings('currency')->code, true)    
                                    </span>

                                </div>
                            @endif

                            {{-- Offline payment --}}
                            @if (settings('offline_payment')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'offline')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'offline' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('offline_payment')->logo)
                                        <img src="{{ src(settings('offline_payment')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('offline_payment')->name }}</span>

                                </div>
                            @endif

                            {{-- Flutterwave --}}
                            @if (settings('flutterwave')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'flutterwave')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'flutterwave' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('flutterwave')->logo)
                                        <img src="{{ src(settings('flutterwave')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('flutterwave')->name }}</span>

                                </div>
                            @endif

                            {{-- Paystack --}}
                            @if (settings('paystack')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'paystack')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'paystack' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('paystack')->logo)
                                        <img src="{{ src(settings('paystack')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paystack')->name }}</span>

                                </div>
                            @endif

                            {{-- Cashfree --}}
                            @if (settings('cashfree')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'cashfree')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'cashfree' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('cashfree')->logo)
                                        <img src="{{ src(settings('cashfree')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('cashfree')->name }}</span>

                                </div>
                            @endif

                            {{-- Mollie --}}
                            @if (settings('mollie')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'mollie')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'mollie' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('mollie')->logo)
                                        <img src="{{ src(settings('mollie')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('mollie')->name }}</span>

                                </div>
                            @endif

                            {{-- Xendit --}}
                            @if (settings('xendit')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'xendit')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'xendit' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('xendit')->logo)
                                        <img src="{{ src(settings('xendit')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('xendit')->name }}</span>

                                </div>
                            @endif

                            {{-- Mercadopago --}}
                            @if (settings('mercadopago')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'mercadopago')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'mercadopago' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('mercadopago')->logo)
                                        <img src="{{ src(settings('mercadopago')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('mercadopago')->name }}</span>

                                </div>
                            @endif

                            {{-- Vnpay --}}
                            @if (settings('vnpay')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'vnpay')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'vnpay' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('vnpay')->logo)
                                        <img src="{{ src(settings('vnpay')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('vnpay')->name }}</span>

                                </div>
                            @endif

                            {{-- Paymob --}}
                            @if (settings('paymob')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'paymob')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'paymob' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('paymob')->logo)
                                        <img src="{{ src(settings('paymob')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paymob')->name }}</span>

                                </div>
                            @endif

                            {{-- Paytabs --}}
                            @if (settings('paytabs')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'paytabs')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'paytabs' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('paytabs')->logo)
                                        <img src="{{ src(settings('paytabs')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paytabs')->name }}</span>

                                </div>
                            @endif

                            {{-- Paytr --}}
                            @if (settings('paytr')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'paytr')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'paytr' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('paytr')->logo)
                                        <img src="{{ src(settings('paytr')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif

                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paytr')->name }}</span>

                                </div>
                            @endif

                            {{-- Razorpay --}}
                            @if (settings('razorpay')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'razorpay')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'razorpay' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('razorpay')->logo)
                                        <img src="{{ src(settings('razorpay')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('razorpay')->name }}</span>

                                </div>
                            @endif

                            {{-- Jazzcash --}}
                            @if (settings('jazzcash')->is_enabled)
                                <div 
                                    wire:click="$set('payment_method', 'jazzcash')" 
                                    class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $payment_method === 'jazzcash' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                    {{-- Logo --}}
                                    @if (settings('jazzcash')->logo)
                                        <img src="{{ src(settings('jazzcash')->logo) }}" class="max-h-[35px] max-w-[75%] mb-2 mx-auto p-1 mt-2">
                                    @endif
                                    
                                    {{-- Name --}}
                                    <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('jazzcash')->name }}</span>

                                </div>
                            @endif
                        
                        </div>
                    @endif

                    {{-- Order summary --}}
                    @if (in_array($payment_method, ['cashfree', 'flutterwave', 'mercadopago', 'mollie', 'offline', 'paymob', 'paypal', 'paystack', 'paytabs', 'paytr', 'razorpay', 'stripe', 'vnpay', 'xendit', 'jazzcash', 'wallet']))
                        <div class="w-full mt-14" wire:key="checkout-key-summary">

                            {{-- Calculate amount depends on exchange rate --}}
                            @php

                                // Get default exchange rate
                                $default_exchange_rate = (float)settings('currency')->exchange_rate;

                                // Get total amount
                                $total_amount          = (float)$this->total() + (float)$this->taxes();

                                // Check selected payment method
                                switch ($payment_method) {

                                    // Paypal
                                    case 'paypal':

                                        // Get payment gateway currency
                                        $gateway_currency      = config('paypal.currency');
                                        $gateway_exchange_rate = (float)settings('paypal')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Stripe
                                    case 'stripe':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('stripe')->currency;
                                        $gateway_exchange_rate = (float)settings('stripe')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Wallet
                                    case 'wallet':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('currency')->code;
                                        $gateway_exchange_rate = (float)settings('currency')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount();

                                        break;
                                    
                                    // Offline payment
                                    case 'offline':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('currency')->code;
                                        $gateway_exchange_rate = (float)settings('currency')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount();

                                        break;

                                    // Flutterwave
                                    case 'flutterwave':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('flutterwave')->currency;
                                        $gateway_exchange_rate = (float)settings('flutterwave')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Paystack
                                    case 'paystack':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('paystack')->currency;
                                        $gateway_exchange_rate = (float)settings('paystack')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Cashfree
                                    case 'cashfree':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('cashfree')->currency;
                                        $gateway_exchange_rate = (float)settings('cashfree')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Mollie
                                    case 'mollie':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('mollie')->currency;
                                        $gateway_exchange_rate = (float)settings('mollie')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Xendit
                                    case 'xendit':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('xendit')->currency;
                                        $gateway_exchange_rate = (float)settings('xendit')->exchange_rate;
                                        $exchange_total_amount = ceil($this->calculateExchangeAmount($gateway_exchange_rate));

                                        break;

                                    // Mercadopago
                                    case 'mercadopago':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('mercadopago')->currency;
                                        $gateway_exchange_rate = (float)settings('mercadopago')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Vnpay
                                    case 'vnpay':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('vnpay')->currency;
                                        $gateway_exchange_rate = (float)settings('vnpay')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Paymob
                                    case 'paymob':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('paymob')->currency;
                                        $gateway_exchange_rate = (float)settings('paymob')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Paytabs
                                    case 'paytabs':

                                        // Get payment gateway currency
                                        $gateway_currency      = config('paytabs.currency');
                                        $gateway_exchange_rate = (float)settings('paytabs')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Razorpay
                                    case 'razorpay':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('razorpay')->currency;
                                        $gateway_exchange_rate = (float)settings('razorpay')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Paytr
                                    case 'paytr':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('paytr')->currency;
                                        $gateway_exchange_rate = (float)settings('paytr')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    // Jazzcash
                                    case 'jazzcash':

                                        // Get payment gateway currency
                                        $gateway_currency      = settings('jazzcash')->currency;
                                        $gateway_exchange_rate = (float)settings('jazzcash')->exchange_rate;
                                        $exchange_total_amount = $this->calculateExchangeAmount($gateway_exchange_rate);

                                        break;

                                    default:
                                        break;
                                }
                            @endphp

                            {{-- Summary --}}
                            <div class="w-full mb-8">
                                <div class="bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6 sm:p-6 lg:p-8">
                                    <div class="flow-root w-full">
                                        <dl class="-my-4 text-sm divide-y divide-gray-200 dark:divide-zinc-600">

                                            {{-- Selected payment method --}}
                                            <div class="py-4 flex items-center justify-between">
                                                <dt class="text-gray-600 dark:text-gray-300">
                                                    @lang('messages.t_payment_method')
                                                </dt>
                                                <dd class="font-medium text-gray-900 dark:text-gray-200">
                                                    <div class="flex items-center text-sm text-gray-500 dark:text-gray-300">
                                                        @if ($payment_method === 'wallet')
                                                            <span class="ltr:pl-3 rtl:pr-3 font-bold">
                                                                @lang('messages.t_wallet')
                                                            </span>
                                                        @elseif ($payment_method === 'offline')
                                                            @if (settings('offline_payment')->logo)
                                                                <img src="{{ src(settings('offline_payment')->logo) }}" class="max-w-[50px]">
                                                            @endif
                                                            <span class="ltr:pl-3 rtl:pr-3 font-bold">{{ settings('offline_payment')->name }}</span>
                                                        @else
                                                            @if (settings($payment_method)->logo)
                                                                <img src="{{ src(settings($payment_method)->logo) }}" class="max-w-[50px]">
                                                            @endif
                                                            <span class="ltr:pl-3 rtl:pr-3 font-bold">{{ settings($payment_method)->name }}</span>
                                                        @endif
                                                    </div>
                                                </dd>
                                            </div>

                                            {{-- Total --}}
                                            <div class="py-4 flex items-center justify-between">
                                                <dt class="text-gray-600 dark:text-gray-300">
                                                    @lang('messages.t_total')
                                                </dt>
                                                @if (!in_array($payment_method, ['offline', 'wallet']) && $gateway_exchange_rate != $default_exchange_rate)
                                                    <dd class="font-medium text-gray-500 dark:text-gray-300">
                                                        @money($total_amount, settings('currency')->code, true) 
                                                        <span class="text-lg mx-2">≈</span> 
                                                        @money($exchange_total_amount, $gateway_currency, true) 
                                                        <span class="text-[10px] tracking-widest">({{ $gateway_currency }})</span>
                                                    </dd>
                                                @else
                                                    <dd class="font-medium text-gray-500 dark:text-gray-300">
                                                        @money($total_amount, settings('currency')->code, true) 
                                                    </dd>
                                                @endif
                                            </div>
                                            
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            {{-- PayPal --}}
                            @if ($payment_method === 'paypal' && settings('paypal')->is_enabled)
                                <div class="w-full">

                                    {{-- Paypal button --}}
                                    <div id="paypal-button-container" wire:ignore></div>

                                    <script>
                                        // Render the PayPal button into #paypal-button-container
                                        paypal.Buttons({

                                            // Set up the transaction
                                            createOrder: function(data, actions) {
                                                return actions.order.create({
                                                    purchase_units: [{
                                                        amount: {
                                                            value: '{{ $exchange_total_amount }}'
                                                        }
                                                    }]
                                                });
                                            },

                                            // Finalize the transaction
                                            onApprove: function(data, actions) {

                                                @this.checkout(data.orderID);

                                            }

                                            }).render('#paypal-button-container');
                                    </script>

                                </div>
                            @endif

                            {{-- Stripe --}}
                            @if ($payment_method === 'stripe' && settings('stripe')->is_enabled)
                                <div class="w-full">

                                    {{-- Form --}}
                                    <form id="stripe-payment-form" wire:ignore>

                                        {{-- Stripe form --}}
                                        <div id="stripe-payment-element"></div>
        
                                        {{-- Pay --}}
                                        <div class="mt-8">
                                            <button
                                                type="submit"
                                                id="stripe-payment-button"
                                                class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed dark:disabled:bg-zinc-700 dark:disabled:text-zinc-500"
                                                >
                                                    {{ __('messages.t_pay')    }}
                                            </button>
                                        </div>
                                        
                                    </form>

                                    {{-- Stripe Js --}}
                                    <script>

                                        // Stripe public key
                                        const stripe = Stripe("{{ config('stripe.public_key') }}");

                                        // Payment options
                                        const options = {
                                            clientSecret: '{{ $stripe_intent_secret }}',
                                            appearance  : {
                                                theme: 'night',
                                                variables: {
                                                    colorPrimary   : '#0570de',
                                                    colorBackground: "{{ Cookie::get('dark_mode') === 'enabled' ? '#333' : '#ffffff' }}",
                                                    colorText      : '#30313d',
                                                    colorDanger    : '#df1b41',
                                                    spacingUnit    : '6px',
                                                    borderRadius   : '3px'
                                                }
                                            },
                                        };

                                        const elements = stripe.elements(options);

                                        // Create and mount the Payment Element
                                        const paymentElement = elements.create('payment');
                                        paymentElement.mount('#stripe-payment-element');

                                        const form = document.getElementById('stripe-payment-form');

                                        form.addEventListener('submit', async (event) => {
                                            event.preventDefault();
                                            document.getElementById("stripe-payment-button").disabled = true;
                                            await stripe.confirmPayment({
                                                elements,
                                                confirmParams: {
                                                    return_url: "{{ url('checkout/callback/stripe') }}",
                                                },
                                            }).then((response) => {

                                                // Check if error
                                                if (response.error) {
                                                    window.toast(response.error.message, 'alert');
                                                }

                                                document.getElementById("stripe-payment-button").disabled = false;
                                            }).catch((error) => {
                                                window.toast(error.message, 'alert');
                                                document.getElementById("stripe-payment-button").disabled = false;
                                            });
                                        });
                                    </script>

                                </div>
                            @endif

                            {{-- Wallet --}}
                            @if ($payment_method === 'wallet' && auth()->user()->balance_available >= $exchange_total_amount)
                                <div class="w-full">
                                    <div class="flex items-center justify-center text-2xl text-gray-900 font-black dark:text-white">
                                        @money(auth()->user()->balance_available, settings('currency')->code, true)
                                    </div>
                                    <div class="text-center text-xs mt-2 tracking-wide text-gray-500 dark:text-gray-300">
                                        {{ __('messages.t_available_balance') }}
                                    </div>
        
                                    {{-- Place order button --}}
                                    <div class="mt-8">
                                        <x-forms.button action="checkout" :text="__('messages.t_pay')" :block="true" />
                                    </div>
                                </div>
                            @endif

                            {{-- Offline --}}
                            @if ($payment_method === 'offline' && settings('offline_payment')->is_enabled)
                                <div class="w-full">

                                    {{-- Bank details --}}
                                    <div class="text-sm font-normal mt-2 tracking-wide text-gray-500 dark:text-gray-200">
                                        {!! nl2br(settings('offline_payment')->details) !!}
                                    </div>
        
                                    {{-- Place order button --}}
                                    <div class="mt-8">
                                        <x-forms.button action="checkout" :text="__('messages.t_place_order')" :block="true" />
                                    </div>

                                </div>
                            @endif

                            {{-- Flutterwave --}}
                            @if ($payment_method === 'flutterwave' && settings('flutterwave')->is_enabled)
                                <div class="w-full">

                                    {{-- Flutterwave Js --}}
                                    <script>
                                        window.makeFlutterwavePayment = function() {
                                            FlutterwaveCheckout({
                                                public_key     : "{{ config('flutterwave.public_key') }}",
                                                tx_ref         : "{{ uid(32) }}",
                                                amount         : Number({{ $exchange_total_amount }}),
                                                currency       : "{{ settings('flutterwave')->currency }}",
                                                payment_options: "card, banktransfer, ussd, account, mpesa, mobilemoneyghana, mobilemoneyfranco, mobilemoneyuganda, mobilemoneyrwanda, mobilemoneyzambia, barter, nqr, credit",
                                                redirect_url   : "{{ url('checkout/callback/flutterwave') }}",
                                                customer       : {
                                                    email       : "{{ auth()->user()->email }}",
                                                    name        : "{{ auth()->user()->username }}",
                                                },
                                                customizations: {
                                                    title      : "{{ __('messages.t_checkout') }}",
                                                    logo       : "{{ src(auth()->user()->avatar) }}",
                                                },
                                            });
                                        }
                                    </script>

                                    {{-- Pay --}}
                                    <div class="mt-8">
                                        <button
                                            @click="window.makeFlutterwavePayment"
                                            id="flutterwave-payment-button"
                                            class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed"
                                            >
                                                {{ __('messages.t_pay')    }}
                                        </button>
                                    </div>

                                </div>
                            @endif

                            {{-- Paystack --}}
                            @if ($payment_method === 'paystack' && settings('paystack')->is_enabled)
                                <div class="w-full">

                                    {{-- Paystack Js --}}
                                    <script>
                                        window.makePaystackPayment = function(){
                                            let handler = PaystackPop.setup({
                                                key    : "{{ config('paystack.publicKey') }}",
                                                email  : '{{ auth()->user()->email }}',
                                                amount : Number({{ $exchange_total_amount }}) * 100,
                                                ref    : '{{ uid(32) }}',
                                                onClose: function(){
                                                    
                                                },
                                                callback: function(response){
                                                    @this.checkout(response.reference);
                                                }
                                            });

                                            handler.openIframe();
                                        }
                                    </script>

                                    {{-- Pay --}}
                                    <div class="mt-8">
                                        <button
                                            @click="window.makePaystackPayment"
                                            id="paystack-payment-button"
                                            class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed"
                                            >
                                                {{ __('messages.t_pay')    }}
                                        </button>
                                    </div>

                                </div>
                            @endif

                            {{-- Cashfree --}}
                            @if ($payment_method === 'cashfree' && settings('cashfree')->is_enabled)

                                {{-- Form --}}
                                <div class="w-full">
                                    <div class="grid grid-cols-12 md:gap-x-5 gap-y-5" id="cashfree-payment-card">

                                        {{-- Phone number --}}
                                        <div class="col-span-12">
                                            <label for="cashfree-input-phone" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_phone_number')
                                            </label>
                                            <div class="relative w-full">
                                                <input type="text" id="cashfree-input-phone" minlength="10" maxlength="10" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="00 00 00 00 00" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card holder --}}
                                        <div class="col-span-12">
                                            <label for="cashfree-input-holder" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_holder_name')
                                            </label>
                                            <div class="relative w-full">
                                                <input data-card-holder type="text" id="cashfree-input-holder" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="John Doe" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="7" r="4"></circle><path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card number --}}
                                        <div class="col-span-12">
                                            <label for="cashfree-input-number" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_number')
                                            </label>
                                            <div class="relative w-full">
                                                <input data-card-number type="text" id="cashfree-input-number" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="4111111111111111" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="3"></rect><line x1="3" y1="10" x2="21" y2="10"></line><line x1="7" y1="15" x2="7.01" y2="15"></line><line x1="11" y1="15" x2="13" y2="15"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card expiry month --}}
                                        <div class="col-span-12 md:col-span-4">
                                            <label for="cashfree-input-expiry-mm" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_expiry_month')
                                            </label>
                                            <div class="relative w-full">
                                                <input data-card-expiry-mm type="text" id="cashfree-input-expiry-mm" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><rect x="8" y="15" width="2" height="2"></rect></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card expiry year --}}
                                        <div class="col-span-12 md:col-span-5">
                                            <label for="cashfree-input-expiry-yy" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_expiry_year')
                                            </label>
                                            <div class="relative w-full">
                                                <input data-card-expiry-yy maxlength="2" minlength="2" type="text" id="cashfree-input-expiry-yy" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="27" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card cvv --}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label for="cashfree-input-cvv" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_cvv')
                                            </label>
                                            <div class="relative w-full">
                                                <input data-card-cvv type="text" id="cashfree-input-cvv" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="123" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path><circle cx="12" cy="11" r="1"></circle><line x1="12" y1="12" x2="12" y2="14.5"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Pay --}}
                                        <div class="col-span-12 mt-8">
                                            <button
                                                id="cashfree-payment-button"
                                                class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed dark:disabled:bg-zinc-700 dark:disabled:text-zinc-500"
                                                >
                                                    {{ __('messages.t_pay')    }}
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                {{-- JavaScript --}}
                                <script>
                                    $(document).ready(function (e) {

                                        let isCardReadyToPay = true;

                                        const config = {
                                            onPaymentSuccess: function (data) {
                                                // Success
                                                if (data.order.status == "PAID") {

                                                    // Handle
                                                    @this.checkout(data.order.orderId);

                                                } else {

                                                    // Enable button
                                                    document.getElementById('cashfree-payment-button').disabled    = false;
                                                    document.getElementById('cashfree-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                    // Payment failed
                                                    window.toast("{{ __('messages.t_we_could_not_handle_ur_deposit_payment') }}", "error");

                                                }
                                            },
                                            onPaymentFailure: function (data) {
                                                // Enable button
                                                document.getElementById('cashfree-payment-button').disabled    = false;
                                                document.getElementById('cashfree-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                window.toast(data.transaction.txMsg, "error");
                                            },
                                            onError: function (err) {
                                                // Enable button
                                                document.getElementById('cashfree-payment-button').disabled    = false;
                                                document.getElementById('cashfree-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                window.toast(err.message, "error");
                                            },
                                        };

                                        const cfCheckout = Cashfree.initializeApp(config);

                                        cfCheckout.elements([
                                            {
                                                pay     : document.getElementById("cashfree-payment-card"),
                                                type    : "card",
                                                onChange: cardEventHandler,
                                            },
                                        ]);

                                        function cardEventHandler(data) {
                                            isCardReadyToPay = data.isReadyToPay;
                                        }

                                        // Set empty order token
                                        let order_token = null;

                                        // Handle payment
                                        $("#cashfree-payment-button").click(async function () {

                                            var _this         = this;

                                            // Disable button
                                            _this.disabled    = true;
                                            _this.textContent = "{{ __('messages.t_please_wait_dots') }}";

                                            // Check if card is valid for payment
                                            if (isCardReadyToPay) {
                                                if (!order_token) {                                                  

                                                    $.ajax({
                                                        type   : 'POST',
                                                        data   : { phone: document.getElementById('cashfree-input-phone').value, amount: "{{ $exchange_total_amount }}" },
                                                        url    : "{{ url('checkout/callback/cashfree/token') }}",
                                                        headers: {
                                                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                        },
                                                        success: async function (response) {
                                                            
                                                            // Check response
                                                            if (response && response.success === true && response.order_token) {
                                                                
                                                                // Set order token
                                                                order_token = response.order_token;
                                                                await cfCheckout.pay(order_token, "card");

                                                            } else {

                                                                // Something went wrong
                                                                window.toast("{{ __('messages.t_toast_something_went_wrong') }}", "error");

                                                            }
                                                            
                                                            // Enable button
                                                            _this.disabled    = false;
                                                            _this.textContent = "{{ __('messages.t_pay') }}";

                                                        },
                                                        error: function(request, status, error) {
                                                            
                                                            // Something went wrong
                                                            window.toast(request.responseJSON.message, "error");

                                                            // Enable button
                                                            _this.disabled    = false;
                                                            _this.textContent = "{{ __('messages.t_pay') }}";

                                                        }
                                                    });

                                                } else {
                                                    await cfCheckout.pay(order_token, "card");
                                                }
                                            } else {

                                                // Invalid credit card details
                                                window.toast("{{ __('messages.t_pls_check_ur_inputs_and_try_again') }}", "error");

                                            }
                                        });

                                    });
                                </script>

                            @endif

                            {{-- Mollie --}}
                            @if ($payment_method === 'mollie' && settings('mollie')->is_enabled)
                                <div class="w-full">

                                    {{-- Pay --}}
                                    <x-forms.button action="checkout" :text="__('messages.t_pay')" :block="true" />

                                </div>
                            @endif

                            {{-- Xendit --}}
                            @if ($payment_method === 'xendit' && settings('xendit')->is_enabled)

                                {{-- JavaScript --}}
                                <script type="text/javascript">
                                    window.makeXenditPayment = function() {

                                        // Disable button
                                        document.getElementById('xendit-payment-button').disabled    = true;
                                        document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_please_wait_dots') }}";

                                        // Get credit card info
                                        var cc_number    = document.getElementById('xendit-input-number').value;
                                        var cc_expiry_mm = document.getElementById('xendit-input-expiry-mm').value;
                                        var cc_expiry_yy = document.getElementById('xendit-input-expiry-yy').value;
                                        var cc_cvn       = document.getElementById('xendit-input-cvn').value;

                                        // Validate credit card
                                        if (
                                            Xendit.card.validateCardNumber(cc_number) &&
                                            Xendit.card.validateExpiry(cc_expiry_mm, cc_expiry_yy) &&
                                            Xendit.card.validateCvn(cc_cvn)
                                        ) {
                                            
                                            // Make a payment
                                            Xendit.card.createToken({
                                                amount             : {{ $exchange_total_amount }},
                                                card_number        : cc_number,
                                                card_exp_month     : cc_expiry_mm,
                                                card_exp_year      : cc_expiry_yy,
                                                card_cvn           : cc_cvn,
                                                is_multiple_use    : false,
                                                should_authenticate: true
                                            }, function (err, creditCardToken) {
                                                
                                                // Error
                                                if (err) {

                                                    // Hide iframe
                                                    $('#three-ds-container').hide();
                                                    $('.xendit-overlay').hide();
                                                    
                                                    // Show error message
                                                    window.toast(err.message, "error");

                                                    // Enable button
                                                    document.getElementById('xendit-payment-button').disabled    = false;
                                                    document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                    return;
                                                }

                                                // Success
                                                if (creditCardToken.status === 'APPROVED' || creditCardToken.status === 'VERIFIED') {
                                                    
                                                    // Get the token ID
                                                    var token = creditCardToken.id;

                                                    // Hide iframe
                                                    $('#three-ds-container').hide();
                                                    $('.xendit-overlay').hide();

                                                    // Handle payment
                                                    @this.checkout({token: token, authentication_id: creditCardToken.authentication_id, cvn: cc_cvn});

                                                    // Enable button
                                                    document.getElementById('xendit-payment-button').disabled = false;
                                                    document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                } else if (creditCardToken.status === 'IN_REVIEW') {

                                                    // Open iframe
                                                    window.open(creditCardToken.payer_authentication_url, 'sample-inline-frame');

                                                    // Show iframe
                                                    $('.xendit-overlay').show();
                                                    $('#three-ds-container').show();
                                                    
                                                } else if (creditCardToken.status === 'FRAUD') {

                                                    // Hide iframe
                                                    $('#three-ds-container').hide();
                                                    $('.xendit-overlay').hide();

                                                    // Enable button
                                                    document.getElementById('xendit-payment-button').disabled = false;
                                                    document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                    // Error
                                                    window.toast(creditCardToken.failure_reason, "error");
                                                    
                                                } else if (creditCardToken.status === 'FAILED') {
                                                    
                                                    // Enable button
                                                    document.getElementById('xendit-payment-button').disabled = false;
                                                    document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                                    // Error
                                                    window.toast(creditCardToken.failure_reason, "error");

                                                }

                                            });

                                        } else {

                                            // Invalid credit card info
                                            window.toast("{{ __('messages.t_pls_insert_a_valid_cc_info') }}", "error");

                                            // Enable button
                                            document.getElementById('xendit-payment-button').disabled    = false;
                                            document.getElementById('xendit-payment-button').textContent = "{{ __('messages.t_pay') }}";

                                        }

                                    }
                                </script>

                                {{-- Form --}}
                                <div class="w-full">
                                    <div class="grid grid-cols-12 md:gap-x-5 gap-y-5">

                                        {{-- Card number --}}
                                        <div class="col-span-12">
                                            <label for="xendit-input-number" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_number')
                                            </label>
                                            <div class="relative w-full">
                                                <input type="text" id="xendit-input-number" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="4111111111111111" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="3" y="5" width="18" height="14" rx="3"></rect><line x1="3" y1="10" x2="21" y2="10"></line><line x1="7" y1="15" x2="7.01" y2="15"></line><line x1="11" y1="15" x2="13" y2="15"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card expiry month --}}
                                        <div class="col-span-12 md:col-span-4">
                                            <label for="xendit-input-expiry-mm" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_expiry_month')
                                            </label>
                                            <div class="relative w-full">
                                                <input type="text" id="xendit-input-expiry-mm" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="12" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><rect x="8" y="15" width="2" height="2"></rect></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card expiry year --}}
                                        <div class="col-span-12 md:col-span-5">
                                            <label for="xendit-input-expiry-yy" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_expiry_year')
                                            </label>
                                            <div class="relative w-full">
                                                <input maxlength="4" minlength="4" type="text" id="xendit-input-expiry-yy" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="2027" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><rect x="4" y="5" width="16" height="16" rx="2"></rect><line x1="16" y1="3" x2="16" y2="7"></line><line x1="8" y1="3" x2="8" y2="7"></line><line x1="4" y1="11" x2="20" y2="11"></line><line x1="11" y1="15" x2="12" y2="15"></line><line x1="12" y1="15" x2="12" y2="18"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Card cvv --}}
                                        <div class="col-span-12 md:col-span-3">
                                            <label for="xendit-input-cvn" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                @lang('messages.t_card_cvn')
                                            </label>
                                            <div class="relative w-full">
                                                <input type="text" id="xendit-input-cvn" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="123" required>
                                                <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                    <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 3a12 12 0 0 0 8.5 3a12 12 0 0 1 -8.5 15a12 12 0 0 1 -8.5 -15a12 12 0 0 0 8.5 -3"></path><circle cx="12" cy="11" r="1"></circle><line x1="12" y1="12" x2="12" y2="14.5"></line></svg>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Pay --}}
                                        <div class="col-span-12 mt-8">
                                            <button
                                                @click="makeXenditPayment"
                                                id="xendit-payment-button"
                                                class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed dark:disabled:bg-zinc-700 dark:disabled:text-zinc-500"
                                                >
                                                    {{ __('messages.t_pay')    }}
                                            </button>
                                        </div>

                                    </div>
                                </div>

                            @endif

                            {{-- Mercadopago --}}
                            @if ($payment_method === 'mercadopago' && settings('mercadopago')->is_enabled)

                                {{-- Form --}}
                                <div class="w-full relative">

                                    {{-- Loading --}}
                                    <div class="bg-gray-50 dark:bg-zinc-700 absolute w-full p-6 rounded-xl flex items-center justify-center" id="mercadopago-waiting">
                                        <div role="status">
                                            <svg aria-hidden="true" class="mb-1 w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary-600 mx-auto" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                            <span class="text-xs font-bold tracking-widest text-gray-500 dark:text-gray-200">{{ __('messages.t_please_wait_dots') }}</span>
                                        </div>
                                    </div>

                                    {{-- Form --}}
                                    <div id="cardPaymentBrick_container"></div>

                                </div>

                                {{-- Javascript --}}
                                <script>
                                    const bricksBuilder = mercadopago.bricks();

                                    const renderCardPaymentBrick = async (bricksBuilder) => {

                                        const settings = {
                                            initialization: {
                                                amount: {{ $exchange_total_amount }}
                                            },
                                            customization: {
                                                visual: {
                                                    style: {
                                                        theme: "{{ Cookie::get('dark_mode') === 'enabled' ? 'dark' : 'flat' }}"
                                                    } 
                                                }
                                            },
                                            callbacks: {
                                                onSubmit: (cardFormData) => {

                                                    // Handle payment
                                                    @this.checkout({
                                                        token_id         : cardFormData.token,
                                                        installments     : cardFormData.installments,
                                                        payment_method_id: cardFormData.payment_method_id,
                                                        payer_email      : cardFormData.payer.email
                                                    });

                                                },
                                                onReady: () => {

                                                    // Hide loading
                                                    $('#mercadopago-waiting').hide();

                                                },
                                                onError: (error) => {

                                                    // handle error
                                                    window.toast(error.message, "error");
                                                    
                                                }
                                            }                       
                                        }

                                        await bricksBuilder.create('cardPayment', 'cardPaymentBrick_container', settings);
                                    };

                                    renderCardPaymentBrick(bricksBuilder);
                                </script>

                            @endif

                            {{-- VNPay --}}
                            @if ($payment_method === 'vnpay' && settings('vnpay')->is_enabled)
                                <div class="w-full">

                                    {{-- Pay --}}
                                    <x-forms.button action="checkout" :text="__('messages.t_pay')" :block="true" />

                                </div>
                            @endif

                            {{-- Paymob --}}
                            @if ($payment_method === 'paymob' && settings('paymob')->is_enabled)
                                <div class="w-full">

                                    @if ($paymob_payment_token)
                                        <iframe src="https://accept.paymobsolutions.com/api/acceptance/iframes/{{config('paymob.iframe_id')}}?payment_token={{ $paymob_payment_token }}" width="100%" height="500px"></iframe>
                                    @else
                                        <div class="grid grid-cols-1 gap-y-7 md:gap-x-4">

                                            {{-- Phone number --}}
                                            <div class="col-span-12">
                                                <label for="paymob-input-phone" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                    @lang('messages.t_phone_number')
                                                </label>
                                                <div class="relative w-full">
                                                    <input wire:model.defer="paymob_phone" type="text" id="paymob-input-phone" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="+20" required>
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                        <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path></svg>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Firstname --}}
                                            <div class="col-span-12 md:col-span-6">
                                                <label for="paymob-input-firstname" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                    @lang('messages.t_firstname')
                                                </label>
                                                <div class="relative w-full">
                                                    <input wire:model.defer="paymob_firstname" type="text" id="paymob-input-firstname" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_firstname') }}" required>
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                        <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="10" r="3"></circle><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path></svg>
                                                    </div>
                                                </div>
                                            </div>

                                            {{-- Lastname --}}
                                            <div class="col-span-12 md:col-span-6">
                                                <label for="paymob-input-lastname" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                    @lang('messages.t_lastname')
                                                </label>
                                                <div class="relative w-full">
                                                    <input wire:model.defer="paymob_lastname" type="text" id="paymob-input-lastname" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4 dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="{{ __('messages.t_enter_lastname') }}" required>
                                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3">
                                                        <svg class="w-5 h-5 text-gray-400" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="9"></circle><circle cx="12" cy="10" r="3"></circle><path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path></svg>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            {{-- Get payment token --}}
                                            <div class="col-span-12 mt-6">
                                                <x-forms.button action="getPayMobPaymentKey" :text="__('messages.t_next')" :block="true" />
                                            </div>

                                        </div>

                                    @endif
                                </div>
                            @endif

                            {{-- Paytabs --}}
                            @if ($payment_method === 'paytabs' && settings('paytabs')->is_enabled)
                                <div class="w-full">

                                    {{-- Pay --}}
                                    <x-forms.button action="checkout" :text="__('messages.t_pay')" :block="true" />

                                </div>
                            @endif

                            {{-- Razorpay --}}
                            @if ($payment_method === 'razorpay' && settings('razorpay')->is_enabled)

                                {{-- Form --}}
                                <div class="w-full">
                                    <script>
                                        window.makeRazorpayPayment = function() {

                                            // Set options
                                            var options = {
                                                "key"        : "{{ config('razorpay.key_id') }}",
                                                "amount"     : "{{ $exchange_total_amount * 100 }}",
                                                "currency"   : "{{ settings('razorpay')->currency }}",
                                                "order_id"   : "{{ $razorpay_order_id }}",
                                                "name"       : "{{ auth()->user()->username }}",
                                                "description": "{{ __('messages.t_checkout') }}",
                                                "image"      : "{{ src(auth()->user()->avatar) }}",
                                                "handler"    : function (response){
                                                    
                                                    // Handle payment
                                                    @this.checkout({
                                                        razorpay_payment_id: response.razorpay_payment_id,
                                                        razorpay_order_id  : response.razorpay_order_id,
                                                        razorpay_signature : response.razorpay_signature,
                                                    });

                                                },
                                            };

                                            // Start payment
                                            var rzp1 = new Razorpay(options);

                                            // On Failed
                                            rzp1.on('payment.failed', function (response){
                                                alert(response.error.description);
                                            });

                                            // Open modal
                                            rzp1.open();

                                        }
                                    </script>

                                    {{-- Payment button --}}
                                    <button
                                        @click="window.makeRazorpayPayment"
                                        wire:loading.attr="disabled"
                                        type="button"
                                        class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed"
                                        >
                                            {{ __('messages.t_pay')    }}
                                    </button>
                                    
                                </div>

                            @endif

                            {{-- Paytr --}}
                            @if ($payment_method === 'paytr' && settings('paytr')->is_enabled)
                                
                            @endif

                            {{-- JazzCash --}}
                            @if ($payment_method === 'jazzcash' && settings('jazzcash')->is_enabled)
                                
                            @endif

                        </div>
                    @endif

                </fieldset>

            </div>
        </section>

    </div>
    
</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function LjqGJmYrwJSjIHT() {
            return {

                init() {

                    var _this = this;

                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                    });

                }

            }
        }
        window.LjqGJmYrwJSjIHT = LjqGJmYrwJSjIHT();
    </script> 

@endpush

@push('styles')

    {{-- PayPal SDK --}}
    @if (settings('paypal')->is_enabled)

        {{-- Get client id and curency --}}
        @php
            $paypal_client_id = config('paypal.mode') === 'sandbox' ? config('paypal.sandbox.client_id') : config('paypal.live.client_id');
            $currency         = config('paypal.currency');
        @endphp

        {{-- SDK --}}
        <script src="https://www.paypal.com/sdk/js?client-id={{ $paypal_client_id }}&currency={{ $currency }}"></script>

    @endif

    {{-- Stripe.js --}}
    @if (settings('stripe')->is_enabled)
        <script src="https://js.stripe.com/v3/"></script>
    @endif

    {{-- Flutterwave.js --}}
    @if (settings('flutterwave')->is_enabled)
        <script src="https://checkout.flutterwave.com/v3.js"></script>
    @endif

    {{-- Paystack.js --}}
    @if (settings('paystack')->is_enabled)
        <script src="https://js.paystack.co/v1/inline.js"></script> 
    @endif

    {{-- Cashfree.js --}}
    @if (settings('cashfree')->is_enabled)
        @if (config('cashfree.isLive'))
            <script src="https://sdk.cashfree.com/js/core/1.0.26/bundle.prod.js"></script>
        @else
            <script src="https://sdk.cashfree.com/js/core/1.0.26/bundle.sandbox.js"></script>
        @endif
    @endif

    {{-- Xendit.js --}}
    @if (settings('xendit')->is_enabled)
        <script type="text/javascript" src="https://js.xendit.co/v1/xendit.min.js"></script>

        <script>
            // Init Xenit                                            
            Xendit.setPublishableKey("{{ config('xendit.public_key') }}");
        </script>
    @endif

    {{-- Mercadopago.js --}}
    @if (settings('mercadopago')->is_enabled)
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            var mercadopago = new MercadoPago("{{ config('mercadopago.public_key') }}");
        </script>
    @endif

    {{-- Razorpay.js --}}
    @if (settings('razorpay')->is_enabled)
        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    @endif

@endpush