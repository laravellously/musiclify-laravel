<div x-data="window.XnbzELJbXoSEFED" x-init="init()">

    {{-- Button --}}
    <button x-on:click="cart_open = !cart_open" type="button" class="text-gray-500 hover:text-primary-600 dark:text-gray-100 dark:hover:text-white transition-colors duration-300 py-2 relative {{ auth()->check() ? 'md:mx-4' : 'ltr:ml-4 rtl:mr-4' }}">
        <svg class="text-gray-400 hover:text-gray-700 h-6 w-6 dark:text-gray-100 dark:hover:text-white" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"></path></g></svg>
        @if ($cart)
            <span class="flex absolute h-2 w-2 top-0 ltr:right-0 rtl:left-0 mt-0 ltr:-mr-1 rtl:-ml-1">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-primary-500"></span>
            </span>
        @endif
    </button>

    {{-- Cart --}}
    <div @keydown.window.escape="cart_open = false" x-show="cart_open" class="fixed inset-0 overflow-hidden z-50" x-ref="dialog" aria-modal="true" x-cloak>
        <div class="absolute inset-0 overflow-hidden">

            {{-- Backdrop --}}
            <div 
                x-show="cart_open" 
                x-transition:enter="ease-in-out duration-500" 
                x-transition:enter-start="opacity-0" 
                x-transition:enter-end="opacity-100" 
                x-transition:leave="ease-in-out duration-500" 
                x-transition:leave-start="opacity-100" 
                x-transition:leave-end="opacity-0" 
                class="absolute inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="cart_open = false" aria-hidden="true">
            </div>

            {{-- Menu --}}
            <div class="pointer-events-none fixed inset-y-0 ltr:right-0 rtl:left-0 flex max-w-full ltr:pl-10 rtl:pr-10">
                <div 
                    x-show="cart_open" 
                    x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700" x-transition:enter-start="ltr:translate-x-full rtl:-translate-x-full" 
                    x-transition:enter-end="ltr:translate-x-0 rtl:-translate-x-0" 
                    x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700" x-transition:leave-start="ltr:translate-x-0 rtl:-translate-x-0" 
                    x-transition:leave-end="ltr:translate-x-full rtl:-translate-x-full" 
                    class="pointer-events-auto w-screen max-w-xs lg:max-w-sm">
                    <div class="flex h-full flex-col bg-white dark:bg-zinc-700 shadow-xl">
                        <div class="flex-1 overflow-y-auto overflow-x-hidden py-6 px-4 sm:px-6">
                            <div class="flex items-start justify-between rtl:flex-row-reverse">
                                <h2 class="text-base tracking-wide font-extrabold text-gray-900 dark:text-gray-200"> {{ __('messages.t_my_shopping_cart') }} </h2>
                                <div class="ml-3 flex h-7 items-center">
                                    <button type="button" class="-m-2 p-2 text-gray-400 hover:text-gray-500" @click="cart_open = false">
                                        <span class="sr-only">Close panel</span>
                                        <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            @if (count($cart))
                                <div class="mt-12">
                                    <div class="flow-root">
                                        <ul role="list" class="-my-6 divide-y divide-gray-200 dark:divide-zinc-600">

                                            @foreach ($cart as $key => $item)
                                                <li class="flex py-6" wire:key="shopping-cart-nav-item-{{ $key }}">
                                                    <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md">
                                                        <img src="{{ $item['gig']['thumbnail'] }}" alt="{{ $item['gig']['title'] }}" class="h-full w-full object-cover object-center">
                                                    </div>
                                                    <div class="ltr:ml-4 rtl:mr-4 flex flex-1 flex-col">
                                                        <div>
                                                            <div class="flex justify-between text-sm font-medium text-gray-900 dark:text-white">
                                                                <h3 class="ltr:pr-2 rtl:pl-2 truncate max-w-[150px] lg:w-auto">
                                                                    <a href="{{ url('service', $item['gig']['slug']) }}" target="_blank" class="hover:text-primary-600 font-bold truncate w-52 block"> {{ $item['gig']['title'] }} </a>
                                                                </h3>
                                                                <p class="ltr:ml-5 rtl:mr-5  font-black text-gray-500 dark:text-gray-300 pt-0.5">@money($this->itemTotalPrice($item['id']), settings('currency')->code, true)</p>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-1 items-end justify-between text-xs">
                                                            <p class="text-gray-500 dark:text-gray-400">{{ __('messages.t_quantity_number', ['number' => $item['quantity']]) }}</p>
                                                            <div class="flex">
                                                                <button type="button" wire:click="remove('{{ $item["id"] }}')" wire:loading.attr="disabled" wire:target="remove('{{ $item["id"] }}')" class="font-medium text-red-600 hover:text-red-500"> 

                                                                    {{-- Loading indicator --}}
                                                                    <div wire:loading wire:target="remove('{{ $item["id"] }}')">
                                                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                        </svg>
                                                                    </div>

                                                                    {{-- Button text --}}
                                                                    <div wire:loading.remove wire:target="remove('{{ $item["id"] }}')">
                                                                        {{ __('messages.t_remove') }}
                                                                    </div>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="py-14 px-6 text-center sm:px-14 border-2 border-dashed mt-24 dark:border-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-7 w-7 text-gray-400 dark:text-gray-300" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                                    <p class="mt-4 font-semibold text-gray-900 text-base dark:text-white">{{ __('messages.t_ur_cart_is_empty') }}</p>
                                    <p class="mt-2 text-gray-500 text-sm font-normal dark:text-gray-300">{{ __('messages.t_ur_cart_is_empty_subtitle') }}</p>
                                </div>
                            @endif

                        </div>
                        @if (count($cart))
                            <div class="border-t border-gray-200 dark:border-zinc-600 py-6 px-4 sm:px-6">
                                <div class="flex justify-between text-base font-medium text-gray-900 dark:text-gray-200">
                                    <p>{{ __('messages.t_subtotal') }}</p>
                                    <p class="font-black">@money($this->total(), settings('currency')->code, true)</p>
                                </div>
                                <p class="mt-0.5 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_tax_fees_calculated_at_checkout') }}</p>
                                <div class="mt-6">
                                    <a href="{{ url('cart') }}" class="flex items-center justify-center rounded-md border border-transparent bg-primary-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-primary-700">{{ __('messages.t_view_cart') }}</a>
                                </div>
                                <div class="mt-6 flex justify-center text-center text-sm text-gray-500 dark:text-gray-300">
                                    <p>
                                        {{ __('messages.t_or') }} <button type="button" class="font-medium text-primary-600 hover:text-primary-600" @click="cart_open = false">{{ __('messages.t_continue_shopping') }}<span aria-hidden="true"> →</span></button>
                                    </p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        function XnbzELJbXoSEFED() {
            return {
                cart_open: false,

                init() {
                    window.addEventListener('cart-updated', () => {
                        Livewire.emit('cart-updated')
                    });
                }
            }
        }
        window.XnbzELJbXoSEFED = XnbzELJbXoSEFED();
    </script>
@endpush