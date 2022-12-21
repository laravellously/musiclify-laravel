<div class="relative w-full mx-auto" x-data="window.VyGMKRicvJxArRU" x-init="initialize()">
    <div class="flex flex-row gap-10 place-content-center justify-center">
        <div class="w-full lg:basis-2/3">

            {{-- Cart has items --}}
            @if (is_array($cart) && count($cart))
                <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border dark:border-zinc-700">
                    
                    {{-- Section title --}}
                    <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                        <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                            <div class="ml-4 mt-4">
                                <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-800 dark:text-gray-100">{{ __('messages.t_shopping_cart') }}</h3>
                                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_review_your_cart_before_proceed_to_checkout') }}</p>
                            </div>
                            <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0">
                                <a href="{{ url('/') }}" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                    <span class="text-xs font-medium text-primary-600 hover:text-primary-600"> 
                                        {{ __('messages.t_continue_shopping') }}
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
            
                    {{-- Section content --}}
                    <div class="px-8">
                        <div class="mt-12 lg:grid lg:grid-cols-12 lg:gap-x-12 lg:items-start xl:gap-x-16">

                            {{-- Cart items --}}
                            <section aria-labelledby="cart-heading" class="lg:col-span-12 mb-6">
                                <ul role="list" class="border-gray-200 divide-y divide-gray-200 dark:border-zinc-700 dark:divide-zinc-700">
                    
                                    @foreach ($cart as $key => $item)
                                        <li class="flex py-6 sm:py-10" wire:key="shopping-cart-item-id-{{ $key }}">
                    
                                            {{-- Thumbnail --}}
                                            <div class="flex-shrink-0 hidden sm:block">
                                                <img src="{{ $item['gig']['thumbnail'] }}" alt="{{ $item['gig']['title'] }}" class="w-24 h-24 rounded-md object-center object-cover sm:w-24 sm:h-24">
                                            </div>
                            
                                            <div class="ltr:ml-0 rtl:mr-0 flex-1 flex flex-col justify-between ltr:sm:ml-6 rtl:sm:mr-6">
                                                <div class="relative ltr:pr-9 rtl:pl-9 sm:grid sm:grid-cols-2 sm:gap-x-6 ltr:sm:pr-0 rtl:sm:pl-0">

                                                    {{-- Gig / Upgrades --}}
                                                    <div>

                                                        {{-- Title --}}
                                                        <div class="flex justify-between">
                                                            <h3 class="text-sm">
                                                                <a href="{{ url('service', $item['gig']['slug']) }}" target="_blank" class="font-medium text-gray-700 dark:text-gray-200 hover:text-primary-600 dark:hover:text-primary-600"> {{ $item['gig']['title'] }} </a>
                                                            </h3>
                                                        </div>

                                                        {{-- Upgrades --}}
                                                        @if (is_array($item['upgrades']) && count($item['upgrades']))
                                                            <div class="mt-3 mb-4 flex text-xs">
                                                                <fieldset class="space-y-5">
                        
                                                                    @foreach ($item['upgrades'] as $index => $upgrade)
                                                                        <div class="relative flex items-start" wire:key="shopping-cart-upgrade-id-{{ $key }}-{{ $index }}">
                                                                            <div class="flex items-center h-5">
                                                                                <input id="shopping-cart-upgrade-id-{{ $upgrade['id'] }}" wire:model="cart.{{ $key }}.upgrades.{{ $index }}.checked" type="checkbox" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-200 border-2 rounded-sm">
                                                                            </div>
                                                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                                                <label for="shopping-cart-upgrade-id-{{ $upgrade['id'] }}" class="font-medium text-gray-500 dark:text-gray-200 text-xs cursor-pointer">{{ $upgrade['title'] }}</label>
                                                                                <p class="font-normal text-gray-400">
                                                                                    <div class="mt-1 flex text-sm">
                                                                                        <p class="text-gray-400 text-xs">+ @money($upgrade['price'], settings('currency')->code, true)</p>
                                                                    
                                                                                        @if ($upgrade['delivery'])
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-700 text-gray-400 text-xs">
                                                                                                {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade['delivery'])]) }}
                                                                                            </p>
                                                                                        @else
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-700 text-gray-400 text-xs">
                                                                                                {{ __('messages.t_no_changes_delivery_time') }}
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                    
                                                                </fieldset>
                                                            </div>
                                                        @endif
                                                        
                                                    </div>
                                    
                                                    {{-- Quantity / Remove --}}
                                                    <div class="mt-4 sm:mt-0 sm:pr-9 text-center">

                                                        {{-- Quantity --}}
                                                        <label for="shopping-cart-quantity-id-{{ $key }}" class="sr-only">Quantity</label>
                                                        <select id="shopping-cart-quantity-id-{{ $key }}" wire:model="cart.{{ $key }}.quantity" class="max-w-full rounded-md border border-gray-300 py-1.5 text-base leading-5 font-medium text-gray-700 text-left shadow-sm focus:outline-none focus:ring-1 focus:ring-primary-600 focus:border-primary-600 sm:text-sm">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                            <option value="6">6</option>
                                                            <option value="7">7</option>
                                                            <option value="8">8</option>
                                                            <option value="9">9</option>
                                                            <option value="10">10</option>
                                                        </select>

                                                        <p class="mt-1 text-sm font-medium text-gray-900 dark:text-gray-300">@money($this->itemTotalPrice($item['id']), settings('currency')->code, true)</p>
                                    
                                                        {{-- Remove --}}
                                                        <div class="absolute top-0 ltr:right-0 rtl:left-0">
                                                            <button wire:click="remove('{{ $item['id'] }}')" type="button" class="-m-2 p-2 inline-flex text-gray-400 hover:text-gray-500" wire:loading.attr="disabled" wire:target="remove('{{ $item['id'] }}')">
                                                                <span class="sr-only">Remove</span>

                                                                {{-- Remove icon --}}
                                                                <div wire:loading.remove wire:target="remove('{{ $item['id'] }}')">
                                                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                                    </svg>
                                                                </div>

                                                                {{-- Loading indicator --}}
                                                                <div wire:loading wire:target="remove('{{ $item['id'] }}')">
                                                                    <svg role="status" class="h-5 w-5 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                    </svg>
                                                                </div>

                                                            </button>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </li>
                                        
                                    @endforeach
                                    
                                </ul>
                            </section>
                    
                            {{-- Cart summary --}}
                            <section aria-labelledby="summary-heading" class="my-16 bg-gray-50 dark:bg-zinc-700 rounded-lg px-4 py-6 sm:p-6 lg:p-8 lg:mt-0 lg:col-span-12">
                            <h2 id="summary-heading" class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_cart_summary') }}</h2>
                    
                            <dl class="mt-6 space-y-4">

                                {{-- Subtotal --}}
                                <div class="flex items-center justify-between">
                                    <dt class="text-sm text-gray-600 dark:text-gray-300">{{ __('messages.t_subtotal') }}</dt>
                                    <dd class="text-sm font-medium text-gray-900 dark:text-gray-200">@money($this->subtotal(), settings('currency')->code, true)</dd>
                                </div>

                                {{-- Taxes --}}
                                @if (settings('commission')->enable_taxes)
                                    <div class="border-t border-gray-200 dark:border-zinc-600 pt-4 flex items-center justify-between">
                                        <dt class="flex text-sm text-gray-600 dark:text-gray-300">
                                            <span>{{ __('messages.t_tax_estimate') }}</span>
                                            <button type="button" data-tooltip-target="tooltip-tax-estimate" class="ltr:ml-2 rtl:mr-2 flex-shrink-0 text-gray-400 hover:text-gray-500">
                                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"/> </svg>
                                            </button>
                                            <div id="tooltip-tax-estimate" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                {{ __('messages.t_these_fees_cover_costs_tooltip') }}
                                            </div>
                                        </dt>
                                        <dd class="text-sm font-medium text-gray-900 dark:text-gray-200">@money($this->taxes(), settings('currency')->code, true)</dd>
                                    </div>
                                @endif

                                {{-- Total --}}
                                <div class="border-t border-gray-200 dark:border-zinc-600 pt-4 flex items-center justify-between">
                                    <dt class="text-base font-medium text-gray-900 dark:text-white">{{ __('messages.t_total') }}</dt>
                                    <dd class="text-base font-medium text-gray-900 dark:text-white">@money($this->total() + $this->taxes(), settings('currency')->code, true)</dd>
                                </div>

                            </dl>
                    
                            <div class="mt-6">
                                <x-forms.button action="checkout" text="{{ __('messages.t_checkout') }}" :block="true" />
                            </div>
                            </section>
                        </div>
                    </div>
                    
                </div>
            @else

                {{-- Cart has no items --}}
                <div class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex-shrink-0 flex justify-center">
                      <div class="inline-flex h-32 w-32 rounded-full bg-gray-100 p-6 items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/></svg>
                      </div>
                    </div>
                    <div class="py-12">
                      <div class="text-center">
                        <h1 class="mt-2 text-2xl md:text-4xl font-extrabold text-gray-900 tracking-tight sm:text-4xl">{{ __('messages.t_ur_cart_is_empty') }}</h1>
                        <p class="mt-2 text-base text-gray-500">{{ __('messages.t_ur_cart_is_empty_subtitle') }}</p>
                        <div class="mt-6">
                          <a href="{{ url('/') }}" class="text-base font-medium text-primary-600 hover:text-primary-600">{{ __('messages.t_continue_shopping') }}<span aria-hidden="true"> →</span></a>
                        </div>
                      </div>
                    </div>
                </div>

            @endif
        </div>
    </div>
</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function VyGMKRicvJxArRU() {
            return {

                // Init
                initialize() {

                }

            }
        }
        window.VyGMKRicvJxArRU = VyGMKRicvJxArRU();
    </script>

@endpush