<main class="w-full">

    {{-- Loading --}}
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading wire:target="handle">
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

    <div class="px-4 sm:px-6 lg:px-8" id="scroll-to-deposit-container">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="lg:col-span-9">
                    <div class="max-w-lg mx-auto py-12">

                        {{-- Success deposit --}}
                        @if ($isSucceeded)
                            <div class="text-center">

                                {{-- Icon --}}
                                <div class="h-28 w-28 border-2 border-green-100 bg-green-100 rounded-full flex items-center justify-center mx-auto">
                                    <svg class="mx-auto h-9 w-9 text-green-500" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg"><desc></desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 11 12 14 20 6"></polyline><path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9"></path></svg>
                                </div>

                                {{-- Texts --}}
                                <h2 class="mt-4 text-base font-bold text-gray-700">{{ __('messages.t_deposit_successful') }}</h2>
                                <p class="mt-1 text-sm text-gray-400">{{ __('messages.t_deposit_success_subtitle') }}</p>

                                {{-- Transactions history --}}
                                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-x-4 mt-14">

                                    {{-- Go shopping --}}
                                    <div class="w-full">
                                        <a href="{{ url('/') }}" class="w-full justify-center text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-bold uppercase tracking-widest rounded-md text-[10px] px-5 py-4 text-center inline-flex items-center dark:focus:ring-gray-500 mr-2 mb-2">
                                            @lang('messages.t_go_shopping')
                                        </a>
                                    </div>

                                    {{-- View history --}}
                                    <div class="w-full">
                                        <a href="{{ url('account/deposit/history') }}" class="w-full justify-center text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-600 font-bold uppercase tracking-widest rounded-md text-[10px] px-5 py-4 text-center inline-flex items-center dark:focus:ring-primary-500 mr-2 mb-2">
                                            @lang('messages.t_view_history')
                                        </a>
                                    </div>

                                </div>

                            </div>
                        @endif

                        {{-- Deposit form --}}
                        @if (!$isSucceeded)
                            
                            {{-- Empty state --}}
                            <div class="text-center">

                                {{-- Icon --}}
                                <div class="h-28 w-28 border-2 border-gray-100 dark:border-zinc-600 bg-gray-50 dark:bg-zinc-700 rounded-full flex items-center justify-center mx-auto">
                                    <svg class="mx-auto h-8 w-8 text-gray-400 dark:text-gray-300" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path d="M1023.65 290.48c.464-23.664-5.904-78.848-77.84-98.064L223.394 47.794c-52.944 0-96 43.055-96 96v128.704l-32-.08c-52.752.223-95.632 43.15-95.632 95.967v511.808c0 52.945 43.056 96 96 96h832.464c52.945 0 96-43.055 96-96zM191.393 143.793c0-16.72 12.88-30.463 29.216-31.871l706 142.88c.256.128-5.248 17.935-30.88 17.6H191.393zM960.24 880.21c0 17.664-14.336 32-32 32H95.76c-17.664 0-32-14.336-32-32V368.386c0-17.664 14.336-32 32-32h800.064c31.408 0 64.4-10.704 64.4-31.888V880.21h.016zM191.824 560.498c-35.344 0-64 28.656-64 64s28.656 64 64 64 64-28.656 64-64-28.656-64-64-64z"></path></svg>
                                </div>

                                {{-- Texts --}}
                                <h2 class="mt-4 text-base font-bold text-gray-700 dark:text-gray-100">{{ __('messages.t_add_funds') }}</h2>
                                <p class="mt-1 text-sm text-gray-400 dark:text-gray-300">{{ __('messages.t_add_funds_subtitle') }}</p>

                                {{-- Transactions history --}}
                                <a rel="nofollow" class="text-[13px] font-medium mt-4 text-primary-600 hover:underline dark:text-primary-500" href="{{ url('account/deposit/history') }}">
                                    @lang('messages.t_transactions_history')
                                </a>

                            </div>

                            {{-- Available payment methods --}}
                            @if (is_null($selected))
                                <div class="relative grid grid-cols-3 sm:gap-4 gap-y-4 mt-14" wire:key="deposit-key-select">

                                    {{-- Loading --}}
                                    <div class="bg-black dark:bg-zinc-300 dark:bg-opacity-20 absolute w-full h-full rounded-lg bg-opacity-60" wire:loading>
                                        <div role="status" class="flex items-center justify-center w-full h-full">
                                            <svg aria-hidden="true" class="mr-2 w-8 h-8 text-gray-200 animate-spin dark:text-gray-100 fill-primary-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                            </svg>
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </div>

                                    {{-- Stripe --}}
                                    @if (settings('stripe')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'stripe')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'stripe' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('stripe')->logo)
                                                <img src="{{ src(settings('stripe')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('stripe')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('stripe')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Paypal --}}
                                    @if (settings('paypal')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'paypal')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'paypal' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('paypal')->logo)
                                                <img src="{{ src(settings('paypal')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paypal')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('paypal')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Offline payment --}}
                                    @if (settings('offline_payment')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'offline_payment')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'offline_payment' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('offline_payment')->logo)
                                                <img src="{{ src(settings('offline_payment')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('offline_payment')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('offline_payment')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Flutterwave --}}
                                    @if (settings('flutterwave')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'flutterwave')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'flutterwave' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('flutterwave')->logo)
                                                <img src="{{ src(settings('flutterwave')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('flutterwave')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('flutterwave')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Paystack --}}
                                    @if (settings('paystack')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'paystack')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'paystack' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('paystack')->logo)
                                                <img src="{{ src(settings('paystack')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paystack')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('paystack')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Cashfree --}}
                                    @if (settings('cashfree')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'cashfree')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'cashfree' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('cashfree')->logo)
                                                <img src="{{ src(settings('cashfree')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('cashfree')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('cashfree')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Mollie --}}
                                    @if (settings('mollie')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'mollie')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'mollie' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('mollie')->logo)
                                                <img src="{{ src(settings('mollie')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('mollie')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('mollie')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Xendit --}}
                                    @if (settings('xendit')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'xendit')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'xendit' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('xendit')->logo)
                                                <img src="{{ src(settings('xendit')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('xendit')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('xendit')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Mercadopago --}}
                                    @if (settings('mercadopago')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'mercadopago')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'mercadopago' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('mercadopago')->logo)
                                                <img src="{{ src(settings('mercadopago')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('mercadopago')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('mercadopago')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Vnpay --}}
                                    @if (settings('vnpay')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'vnpay')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'vnpay' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('vnpay')->logo)
                                                <img src="{{ src(settings('vnpay')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('vnpay')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('vnpay')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Paymob --}}
                                    @if (settings('paymob')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'paymob')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'paymob' ? 'ring-primary-600 border border-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('paymob')->logo)
                                                <img src="{{ src(settings('paymob')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paymob')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('paymob')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Paytabs --}}
                                    @if (settings('paytabs')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'paytabs')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'paytabs' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('paytabs')->logo)
                                                <img src="{{ src(settings('paytabs')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paytabs')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('paytabs')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Paytr --}}
                                    @if (settings('paytr')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'paytr')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'paytr' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('paytr')->logo)
                                                <img src="{{ src(settings('paytr')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('paytr')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('paytr')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Razorpay --}}
                                    @if (settings('razorpay')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'razorpay')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'razorpay' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('razorpay')->logo)
                                                <img src="{{ src(settings('razorpay')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('razorpay')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('razorpay')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                    {{-- Jazzcash --}}
                                    @if (settings('jazzcash')->is_enabled)
                                        <div 
                                            wire:click="$set('selected', 'jazzcash')" 
                                            class="py-4 px-1 bg-white dark:bg-zinc-700 rounded-lg ring-2 cursor-pointer grid items-center justify-center text-center transition-all duration-200 {{ $selected === 'jazzcash' ? 'ring-primary-600' : 'ring-transparent hover:ring-primary-600 border border-gray-200 dark:border-zinc-600 shadow-sm' }}">

                                            {{-- Logo --}}
                                            @if (settings('jazzcash')->logo)
                                                <img src="{{ src(settings('jazzcash')->logo) }}" class="w-8/12 mx-auto p-1 mt-2">
                                            @endif

                                            <div class="w-6/12 h-px bg-gray-100 dark:bg-zinc-600 my-4 mx-auto rounded-sm"></div>

                                            {{-- Name --}}
                                            <span class="text-[13px] text-gray-500 dark:text-gray-100 font-bold mb-2">{{ settings('jazzcash')->name }}</span>

                                            {{-- Deposit fee --}}
                                            <span class="text-green-400 text-xs">{{ settings('jazzcash')->deposit_fee }}% {{ __('messages.t_fee') }}</span>

                                        </div>
                                    @endif

                                </div>
                            @endif

                            {{-- Order summary --}}
                            @if (in_array($selected, ['cashfree', 'flutterwave', 'mercadopago', 'mollie', 'offline_payment', 'paymob', 'paypal', 'paystack', 'paytabs', 'paytr', 'razorpay', 'stripe', 'vnpay', 'xendit', 'jazzcash']))
                                <div class="w-full mt-14" wire:key="deposit-key-summary">

                                    {{-- Get payment gateway default currency --}}
                                    @php
                                        switch ($selected) {

                                            // PayPal
                                            case 'paypal':
                                                $currency = config('paypal.currency');
                                                break;

                                            // Cashfree
                                            case 'cashfree':
                                                $currency = settings('cashfree')->currency;
                                                break;

                                            // Flutterwave
                                            case 'flutterwave':
                                                $currency = settings('flutterwave')->currency;
                                                break;

                                            // Mercadopago
                                            case 'mercadopago':
                                                $currency = settings('mercadopago')->currency;
                                                break;

                                            // Mollie
                                            case 'mollie':
                                                $currency = settings('mollie')->currency;
                                                break;

                                            // Offline payment
                                            case 'offline_payment':
                                                $currency = settings('currency')->code;
                                                break;

                                            // Paymob
                                            case 'paymob':
                                                $currency = settings('paymob')->currency;
                                                break;

                                            // Paystack
                                            case 'paystack':
                                                $currency = settings('paystack')->currency;
                                                break;

                                            // Paytabs
                                            case 'paytabs':
                                                $currency = config('paytabs.currency');
                                                break;

                                            // Paytr
                                            case 'paytr':
                                                $currency = settings('paytr')->currency;
                                                break;

                                            // Razorpay
                                            case 'razorpay':
                                                $currency = settings('razorpay')->currency;
                                                break;

                                            // Stripe
                                            case 'stripe':
                                                $currency = settings('stripe')->currency;
                                                break;

                                            // Vnpay
                                            case 'vnpay':
                                                $currency = settings('vnpay')->currency;
                                                break;

                                            // Xendit
                                            case 'xendit':
                                                $currency = settings('xendit')->currency;
                                                break;

                                            // Jazzcash
                                            case 'jazzcash':
                                                $currency = settings('jazzcash')->currency;
                                                break;
                                            
                                            default:
                                                $currency = 'USD';
                                                break;
                                        }
                                    @endphp

                                    {{-- Form --}}
                                    @if (!$is_third_step)
                                        <div class="w-full">
                                            <div class="grid grid-cols-12 md:gap-x-5 gap-y-5">

                                                {{-- Amount --}}
                                                <div class="col-span-12">
                                                    <label for="deposit-amount-input" class="block mb-2 text-xs font-bold text-gray-900 dark:text-white">
                                                        @lang('messages.t_amount')
                                                    </label>
                                                    <div class="relative w-full">
                                                        <input wire:model.debounce.500ms="amount" type="text" id="deposit-amount-input" class="border border-gray-300 text-gray-900 text-sm rounded-lg font-medium focus:ring-primary-500 focus:border-primary-500 block w-full ltr:pr-12 rtl:pl-12 p-4  dark:bg-zinc-700 dark:border-zinc-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="0.00" required>
                                                        <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 flex items-center ltr:pr-3 rtl:pl-3 font-bold text-xs tracking-widest dark:text-gray-300">
                                                            {{ $currency }}
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Paymob --}}
                                                @if ($selected === 'paymob')
                                                
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

                                                @endif


                                            </div>
                                        </div>
                                    @endif

                                    {{-- Summary --}}
                                    <div class="mt-10 w-full">
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
                                                                @if (settings($selected)->logo)
                                                                    <img src="{{ src(settings($selected)->logo) }}" class="max-w-[50px]">
                                                                @endif
                                                                <span class="ltr:pl-3 rtl:pr-3 font-bold">{{ settings($selected)->name }}</span>
                                                            </div>
                                                        </dd>
                                                    </div>
        
                                                    {{-- Total --}}
                                                    @if ($is_third_step)
                                                        <div class="py-4 flex items-center justify-between">
                                                            <dt class="text-gray-600 dark:text-gray-300">
                                                                @lang('messages.t_total')
                                                            </dt>
                                                            <dd class="font-medium text-gray-500 dark:text-gray-300">
                                                                {{ number_format($amount, 2, '.', ' ') }} {{ $currency }}
                                                            </dd>
                                                        </div>
                                                    @endif

                                                    {{-- Fee --}}
                                                    <div class="py-4 flex items-center justify-between">
                                                        <dt class="text-gray-600 dark:text-gray-300">
                                                            @lang('messages.t_fee')
                                                        </dt>
                                                        <dd class="font-medium text-gray-500 dark:text-gray-300">
                                                            @if ($fee)
                                                                {{ number_format($fee, 2, '.', ' ') }} {{ $currency }}
                                                            @else
                                                                0.00 {{ $currency }}
                                                            @endif
                                                        </dd>
                                                    </div>
                                                    
                                                    {{-- You will get --}}
                                                    <div class="py-4 flex items-center justify-between">
                                                        <dt class="text-sm font-bold text-gray-900 dark:text-gray-100">
                                                            @lang('messages.t_u_will_get')
                                                        </dt>
                                                        <dd class="text-sm font-bold text-gray-900 dark:text-white">
                                                            @if ($amount)
                                                                {{ number_format($amount - $fee, 2, '.', ' ') }} {{ $currency }}
                                                            @else
                                                                0.00 {{ $currency }}
                                                            @endif
                                                        </dd>
                                                    </div>
                                                </dl>
                                            </div>
                                        </div>

                                        {{-- Actions buttons --}}
                                        @if (!$is_third_step)

                                            {{-- Next --}}
                                            <div class="mt-10">
                                                <button
                                                    wire:click="next"
                                                    wire:loading.attr="disabled"
                                                    type="button"
                                                    class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 dark:disabled:bg-zinc-700 disabled:text-gray-600 dark:disabled:text-zinc-500 disabled:cursor-not-allowed"
                                                    >
                                                        {{ __('messages.t_next')    }}
                                                </button>
                                            </div>
                                
                                            {{-- Go back --}}
                                            <div class="mt-6 text-sm text-center text-gray-500">
                                                <button wire:click="back" type="button" class="text-primary-600 font-medium hover:text-primary-500">
                                                    @lang('messages.t_back')
                                                </button>
                                            </div>
                                        @endif

                                    </div>

                                </div>
                            @endif

                            {{-- Tirth step --}}
                            @if ($is_third_step)
                                <div class="mt-10 w-full" wire:key="deposit-key-third">
                                    
                                    {{-- PayPal --}}
                                    @if ($selected === 'paypal' && settings('paypal')->is_enabled)
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
                                                                    value: '{{ $amount }}'
                                                                }
                                                            }]
                                                        });
                                                    },
            
                                                    // Finalize the transaction
                                                    onApprove: function(data, actions) {
            
                                                        @this.handle(data.orderID);

                                                    }
            
                                                    }).render('#paypal-button-container');
                                            </script>
            
                                        </div>
                                    @endif

                                    {{-- Stripe --}}
                                    @if ($selected === 'stripe' && settings('stripe')->is_enabled)
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
                                                            return_url: "{{ url('account/deposit/callback/stripe') }}",
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

                                    {{-- Offline payment --}}
                                    @if ($selected === 'offline_payment' && settings('offline_payment')->is_enabled)
                                        <div class="w-full bg-gray-50 dark:bg-zinc-700 dark:text-gray-200 rounded-lg px-4 py-6 sm:p-6 lg:p-8">
                                            {!! settings('offline_payment')->details !!}
                                        </div>
                                        <div class="mt-8">
                                            <button
                                                wire:click="handle"
                                                wire:loading.attr="disabled"
                                                class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed"
                                                >
                                                    {{ __('messages.t_place_order')    }}
                                            </button>
                                        </div>
                                    @endif

                                    {{-- Flutterwave --}}
                                    @if ($selected === 'flutterwave' && settings('flutterwave')->is_enabled)
                                        <div class="w-full">

                                            {{-- Flutterwave Js --}}
                                            <script>
                                                window.makeFlutterwavePayment = function() {
                                                    FlutterwaveCheckout({
                                                        public_key     : "{{ config('flutterwave.public_key') }}",
                                                        tx_ref         : "{{ uid(32) }}",
                                                        amount         : Number({{ $amount }}),
                                                        currency       : "{{ settings('flutterwave')->currency }}",
                                                        payment_options: "card, banktransfer, ussd, account, mpesa, mobilemoneyghana, mobilemoneyfranco, mobilemoneyuganda, mobilemoneyrwanda, mobilemoneyzambia, barter, nqr, credit",
                                                        redirect_url   : "{{ url('account/deposit/callback/flutterwave') }}",
                                                        customer       : {
                                                            email       : "{{ auth()->user()->email }}",
                                                            name        : "{{ auth()->user()->username }}",
                                                        },
                                                        customizations: {
                                                            title      : "{{ __('messages.t_add_funds') }}",
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
                                    @if ($selected === 'paystack' && settings('paystack')->is_enabled)
                                        <div class="w-full">

                                            {{-- Paystack Js --}}
                                            <script>
                                                window.makePaystackPayment = function(){
                                                    let handler = PaystackPop.setup({
                                                        key    : "{{ config('paystack.publicKey') }}",
                                                        email  : '{{ auth()->user()->email }}',
                                                        amount : Number({{ $amount }}) * 100,
                                                        ref    : '{{ uid(32) }}',
                                                        onClose: function(){
                                                            
                                                        },
                                                        callback: function(response){
                                                            @this.handle(response.reference);
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
                                    @if ($selected === 'cashfree' && settings('cashfree')->is_enabled)

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
                                                        if (data.order.status == "PAID") {

                                                            $.ajax({
                                                                type   : 'POST',
                                                                data   : { order_id: data.order.orderId },
                                                                url    : "{{ url('account/deposit/callback/cashfree') }}",
                                                                headers: {
                                                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                                },
                                                                success: function(response) {
                                                                    window.location.replace(response.redirect);
                                                                },
                                                                error: function(error) {
                                                                    window.toast(error, "error");
                                                                }
                                                            });

                                                        } else {

                                                            // Payment failed
                                                            window.toast("{{ __('messages.t_we_could_not_handle_ur_deposit_payment') }}", "error");

                                                        }
                                                    },
                                                    onPaymentFailure: function (data) {
                                                        window.toast(data.transaction.txMsg, "error");
                                                    },
                                                    onError: function (err) {
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
                                                                data   : { phone: document.getElementById('cashfree-input-phone').value, amount: "{{ $amount }}" },
                                                                url    : "{{ url('account/deposit/callback/cashfree/token') }}",
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

                                    {{-- Xendit --}}
                                    @if ($selected === 'xendit' && settings('xendit')->is_enabled)

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
                                                        amount             : "{{ $amount }}",
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
                                                            @this.handle({token: token, authentication_id: creditCardToken.authentication_id, cvn: cc_cvn});

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
                                    @if ($selected === 'mercadopago' && settings('mercadopago')->is_enabled)

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
                                                        amount: {{ $amount }}
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
                                                            @this.handle({
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

                                    {{-- Paymob --}}
                                    @if ($selected === 'paymob' && settings('paymob')->is_enabled)
                                        <div class="w-full">
                                            <iframe src="https://accept.paymobsolutions.com/api/acceptance/iframes/{{config('paymob.iframe_id')}}?payment_token={{ $paymob_payment_token }}"></iframe>
                                        </div>
                                    @endif

                                    {{-- Razorpay --}}
                                    @if ($selected === 'razorpay' && settings('razorpay')->is_enabled)

                                        {{-- Form --}}
                                        <div class="w-full">
                                            <script>
                                                window.makeRazorpayPayment = function() {

                                                    // Set options
                                                    var options = {
                                                        "key"        : "{{ config('razorpay.key_id') }}",
                                                        "amount"     : "{{ $this->amount * 100 }}",
                                                        "currency"   : "{{ settings('razorpay')->currency }}",
                                                        "order_id"   : "{{ $razorpay_order_id }}",
                                                        "name"       : "{{ auth()->user()->username }}",
                                                        "description": "{{ __('messages.t_add_funds') }}",
                                                        "image"      : "{{ src(auth()->user()->avatar) }}",
                                                        "handler"    : function (response){
                                                            
                                                            // Handle payment
                                                            @this.handle({
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

                                    {{-- JazzCash --}}
                                    @if ($selected === 'jazzcash' && settings('jazzcash')->is_enabled)
                                        <div class="w-full">
                                            <form name="redirect-to-payment-gateway" method="POST" action="{{ config("jazzcash.". config('jazzcash.environment') .".endpoint") }}">
                                                @foreach($jazzcash_request as $key => $value)
                                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                                @endforeach

                                                 {{-- Payment button --}}
                                                <button
                                                    wire:loading.attr="disabled"
                                                    type="submit"
                                                    class="w-full text-sm font-medium flex justify-center py-5 px-8 rounded tracking-wide focus:outline-none focus:shadow-outline bg-primary-600 hover:bg-primary-700 text-white cursor-pointer disabled:bg-gray-200 disabled:text-gray-600 disabled:cursor-not-allowed"
                                                    >
                                                        {{ __('messages.t_pay')    }}
                                                </button>

                                            </form>
                                        </div>
                                    @endif

                                </div>
                            @endif

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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