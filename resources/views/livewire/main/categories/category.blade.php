<div class="w-full" x-data="window.AxZSIHcEeIYErvQ" x-init="init()" @keydown.window.escape="open = false" x-cloak>
    
    {{-- Mobile filters --}}
    <div x-show="open" class="fixed inset-0 flex z-40 lg:hidden" x-ref="dialog" aria-modal="true">
    
        <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Off-canvas menu overlay, show/hide based on off-canvas menu state." class="fixed inset-0 bg-black bg-opacity-25" @click="open = false" aria-hidden="true" style="display: none;">
        </div>

    
        <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform" x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0" x-transition:leave="transition ease-in-out duration-300 transform" x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full" class="ml-auto relative max-w-xs w-full h-full bg-white dark:bg-zinc-800 shadow-xl py-4 pb-12 flex flex-col overflow-y-auto" style="display: none;">

            <div class="px-4 flex items-center justify-between">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_filter') }}</h2>
                <button type="button" class="ltr:-mr-2 rtl:-ml-2 w-10 h-10 bg-white dark:bg-zinc-700 p-2 rounded-md flex items-center justify-center text-gray-400 dark:text-gray-300" @click="open = false">
                <span class="sr-only">Close menu</span>
                <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                </button>
            </div>

            {{-- Filter --}}
            <div class="mt-4 border-t border-gray-200 dark:border-zinc-700">

                {{-- Rating --}}
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900">{{ __('messages.t_rating') }}</span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            {{-- 5 stars --}}
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-5" name="rating" value="5" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-5" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        @for ($i = 0; $i < 5; $i++)
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                    </div>
                                </label>
                            </div>

                            {{-- 4 stars --}}
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-4" name="rating" value="4" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-4" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        @for ($i = 0; $i < 4; $i++)
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                        <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                    </div>
                                </label>
                            </div>

                            {{-- 3 stars --}}
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-3" name="rating" value="3" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-3" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        @for ($i = 0; $i < 3; $i++)
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                        @for ($i = 0; $i < 2; $i++)
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                    </div>
                                </label>
                            </div>

                            {{-- 2 stars --}}
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-2" name="rating" value="2" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-2" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        @for ($i = 0; $i < 2; $i++)
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                        @for ($i = 0; $i < 3; $i++)
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                    </div>
                                </label>
                            </div>

                            {{-- 1 stars --}}
                            <div class="flex items-center">
                                <input wire:model.defer="rating" id="filter-rating-1" name="rating" value="1" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                <label for="filter-rating-1" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                    <div class="flex items-center">
                                        @for ($i = 0; $i < 1; $i++)
                                            <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                        @for ($i = 0; $i < 4; $i++)
                                            <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                        @endfor
                                    </div>
                                </label>
                            </div>
                        
                        </div>
                    </div>
                </div>

                {{-- Price --}}
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900">{{ __('messages.t_price') }}</span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            <div class="rounded-md shadow-sm -space-y-px">
                                <div>
                                    <input type="integer" wire:model.defer="min_price" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_min_price') }}">
                                </div>
                                <div>
                                    <input type="integer" wire:model.defer="max_price" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_max_price') }}">
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>

                {{-- Delivery time --}}
                <div x-data="{ open: true }" class="py-3">
                    <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-700 px-4">
                        <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                            <span class="font-medium text-gray-900">{{ __('messages.t_delivery_time') }}</span>
                            <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                            </span>
                        </button>
                    </h3>
                    <div class="pt-6 px-4" x-show="open" style="display: none;">
                        <div class="space-y-4">

                            @foreach ($delivery_times as $key => $time)
                                <div class="flex items-center">
                                    <input wire:model.defer="delivery_time" id="filter-delivery-time-{{ $key }}" value="{{ $time['value'] }}" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                    <label for="filter-delivery-time-{{ $key }}" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                        {{ $time['text'] }}
                                    </label>
                                </div>
                            @endforeach
                        
                        </div>
                    </div>
                </div>

                {{-- Action buttons --}}
                <div class="py-6 px-4">

                    {{-- Filter --}}
                    <x-forms.button action="filter" :text="__('messages.t_filter')" :block="true" />

                    {{-- Reset --}}
                    @if ($rating || $delivery_time || $min_price || $max_price)
                        <span wire:click="resetFilter" class="hover:underline text-xs font-medium text-gray-600 hover:text-gray-800 mt-4 text-center block cursor-pointer">{{ __('messages.t_reset_filter') }}</span>
                    @endif
                    
                </div>

            </div>

        </div>
    
    </div>
    
    {{-- Category Container --}}
    <main class="max-w-7xl mx-auto">

        {{-- Section title --}}
        <div class="flex justify-between items-center mb-2 bg-transparent py-2 ltr:pr-6 rtl:pl-6 ltr:border-l-8 rtl:border-r-8 ltr:pl-4 rtl:pr-4 border-primary-600 rounded">

            {{-- Category name --}}
            <div>
                <span class="font-extrabold text-base text-gray-800 dark:text-gray-100 pb-1 block tracking-wider">{{ $category->name }}</span>
                <p class="text-sm text-gray-400">{{ $category->description }}</p>
            </div>

            {{-- Actions --}}
            <div>
                <div class="flex items-center">

                    {{-- Sort by --}}
                    <div x-data="Components.menu({ open: false })" x-init="init()" @keydown.escape.stop="open = false; focusButton()" @click.away="onClickAway($event)" class="relative inline-block ltr:text-left rtl:text-right">

                        {{-- Sort by button --}}
                        <div>
                            <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-200" id="menu-button" x-ref="button" @click="onButtonClick()" @keyup.space.prevent="onButtonEnter()" @keydown.enter.prevent="onButtonEnter()" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()">
                                {{ __('messages.t_sort_by') }}
                                <svg class="flex-shrink-0 ltr:-mr-1 rtl:-ml-1 ltr:ml-1 rtl:mr-1 h-5 w-5 text-gray-400 dark:text-gray-300 group-hover:text-gray-500 dark:group-hover:text-gray-200 dark:hover:text-gray-200" x-description="Heroicon name: solid/chevron-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path> </svg>
                            </button>
                        </div>
        
                        {{-- Sort by menu --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="ltr:origin-top-right rtl:origin-top-left absolute ltr:right-0 rtl:left-0 mt-2 w-40 rounded-md shadow-sm bg-white dark:bg-zinc-800 ring-1 ring-black ring-opacity-5 focus:outline-none z-50" x-ref="menu-items" x-bind:aria-activedescendant="activeDescendant" role="menu" aria-orientation="vertical" tabindex="-1" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" @keydown.tab="open = false" @keydown.enter.prevent="open = false; focusButton()" @keyup.space.prevent="open = false; focusButton()" style="display: none;">
                            <div class="py-1" role="none">
                            
                                {{-- Most popular --}}
                                <button wire:click="$set('sort_by', 'popular')" type="button" class="{{ $sort_by === 'popular' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_most_popular') }}
                                </button>

                                {{-- Best rating --}}
                                <button wire:click="$set('sort_by', 'rating')" type="button" class="{{ $sort_by === 'rating' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_best_rating') }}
                                </button>

                                {{-- Best selling --}}
                                <button wire:click="$set('sort_by', 'sales')" type="button" class="{{ $sort_by === 'sales' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_most_selling') }}
                                </button>

                                {{-- Newest first --}}
                                <button wire:click="$set('sort_by', 'newest')" type="button" class="{{ $sort_by === 'newest' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_newest_first') }}
                                </button>

                                {{-- Price: Low to High --}}
                                <button wire:click="$set('sort_by', 'price_low_high')" type="button" class="{{ $sort_by === 'price_low_high' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_price_low_to_high') }}
                                </button>

                                {{-- Price: High to Low --}}
                                <button wire:click="$set('sort_by', 'price_high_low')" type="button" class="{{ $sort_by === 'price_high_low' ? 'text-gray-900' : 'text-gray-500' }} block px-4 py-3 text-xs font-medium hover:bg-gray-100 dark:hover:bg-zinc-700 dark:text-gray-400 w-full ltr:text-left rtl:text-right">
                                    {{ __('messages.t_price_high_to_low') }}
                                </button>
                            
                            </div>
                        </div>
                    
                    </div>
        
                    {{-- Filter (Mobile) --}}
                    <button type="button" class="p-2 -m-2 ltr:ml-4 rtl:mr-4 ltr:sm:ml-6 rtl:sm:mr-6 text-gray-400 hover:text-gray-500 lg:hidden" @click="open = true">
                        <svg class="w-4 h-4" aria-hidden="true" x-description="Heroicon name: solid/filter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M3 3a1 1 0 011-1h12a1 1 0 011 1v3a1 1 0 01-.293.707L12 11.414V15a1 1 0 01-.293.707l-2 2A1 1 0 018 17v-5.586L3.293 6.707A1 1 0 013 6V3z" clip-rule="evenodd"></path> </svg>
                    </button>

                </div>
            </div>

        </div>

        {{-- Section content --}}
        <section aria-labelledby="products-heading" class="pt-6 pb-24">
            <div class="grid grid-cols-1 lg:grid-cols-3 xl:grid-cols-4 gap-x-6 gap-y-10">

                {{-- Filter --}}
                <div>

                    {{-- Filters --}}
                    <div class="hidden lg:block bg-white dark:bg-zinc-700 shadow-sm border rounded-md border-gray-100 dark:border-zinc-600 h-fit">
                        
                        {{-- Rating --}}
                        <div x-data="{ open: true }" class="py-3">
                            <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4 rounded-t-md">
                                <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                    <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_rating') }}</span>
                                    <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6 px-4" x-show="open" style="display: none;">
                                <div class="space-y-4">
    
                                    {{-- 5 stars --}}
                                    <div class="flex items-center">
                                        <input wire:model.defer="rating" id="filter-rating-5" name="rating" value="5" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                        <label for="filter-rating-5" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                            </div>
                                        </label>
                                    </div>
    
                                    {{-- 4 stars --}}
                                    <div class="flex items-center">
                                        <input wire:model.defer="rating" id="filter-rating-4" name="rating" value="4" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                        <label for="filter-rating-4" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 4; $i++)
                                                    <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                                <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                            </div>
                                        </label>
                                    </div>
    
                                    {{-- 3 stars --}}
                                    <div class="flex items-center">
                                        <input wire:model.defer="rating" id="filter-rating-3" name="rating" value="3" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                        <label for="filter-rating-3" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 3; $i++)
                                                    <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                                @for ($i = 0; $i < 2; $i++)
                                                    <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                            </div>
                                        </label>
                                    </div>
    
                                    {{-- 2 stars --}}
                                    <div class="flex items-center">
                                        <input wire:model.defer="rating" id="filter-rating-2" name="rating" value="2" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                        <label for="filter-rating-2" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 2; $i++)
                                                    <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                                @for ($i = 0; $i < 3; $i++)
                                                    <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                            </div>
                                        </label>
                                    </div>
    
                                    {{-- 1 stars --}}
                                    <div class="flex items-center">
                                        <input wire:model.defer="rating" id="filter-rating-1" name="rating" value="1" type="radio" class="h-4 w-4 border-gray-300 rounded-full text-primary-600 focus:ring-primary-600">
                                        <label for="filter-rating-1" class="ltr:ml-3 rtl:mr-3 text-sm text-gray-600">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 1; $i++)
                                                    <svg class="text-amber-400 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                                @for ($i = 0; $i < 4; $i++)
                                                    <svg class="text-gray-300 flex-shrink-0 h-5 w-5" x-description="Heroicon name: solid/star" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>
                                                @endfor
                                            </div>
                                        </label>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
    
                        {{-- Price --}}
                        <div x-data="{ open: true }" class="py-3">
                            <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                    <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_price') }}</span>
                                    <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6 px-4" x-show="open" style="display: none;">
                                <div class="space-y-4">
    
                                    <div class="rounded-md shadow-sm -space-y-px">
                                        <div>
                                            <input type="integer" wire:model.defer="min_price" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-t-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_min_price') }}">
                                        </div>
                                        <div>
                                            <input type="integer" wire:model.defer="max_price" required="" class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 dark:placeholder-gray-200 dark:text-gray-100 text-gray-900 rounded-b-md focus:outline-none focus:ring-primary-600 focus:border-primary-600 focus:z-10 sm:text-sm font-medium dark:bg-transparent dark:border-zinc-600" placeholder="{{ __('messages.t_max_price') }}">
                                        </div>
                                    </div>
                                
                                </div>
                            </div>
                        </div>
    
                        {{-- Delivery time --}}
                        <div x-data="{ open: true }" class="py-3">
                            <h3 class="-my-3 flow-root bg-gray-50 dark:bg-zinc-600 px-4">
                                <button @click="open = !open" type="button" class="py-3 w-full flex items-center justify-between text-sm text-gray-400 hover:text-gray-500 outline-none focus:outline-none">
                                    <span class="font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_delivery_time') }}</span>
                                    <span class="ltr:ml-6 rtl:mr-6 flex items-center">
                                        <svg class="h-5 w-5" x-description="Expand icon, show/hide based on section open state. Heroicon name: solid/plus-sm" x-show="!(open)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path> </svg>
                                        <svg class="h-5 w-5" x-description="Collapse icon, show/hide based on section open state. Heroicon name: solid/minus-sm" x-show="open" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" style="display: none;"> <path fill-rule="evenodd" d="M5 10a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1z" clip-rule="evenodd"></path> </svg>
                                    </span>
                                </button>
                            </h3>
                            <div class="pt-6 px-4" x-show="open" style="display: none;">
                                <div class="space-y-4">
    
                                    @foreach ($delivery_times as $key => $time)
                                        <div class="flex items-center">
                                            <input wire:model.defer="delivery_time" id="filter-delivery-time-{{ $key }}" value="{{ $time['value'] }}" name="delivery_time" type="radio" class="focus:ring-primary-600 h-4 w-4 text-primary-600 border-gray-300">
                                            <label for="filter-delivery-time-{{ $key }}" class="ltr:ml-3 rtl:mr-3 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                                {{ $time['text'] }}
                                            </label>
                                        </div>
                                    @endforeach
                                
                                </div>
                            </div>
                        </div>
    
                        {{-- Action buttons --}}
                        <div class="py-6 px-4">
    
                            {{-- Filter --}}
                            <x-forms.button action="filter" :text="__('messages.t_filter')" :block="true" />
    
                            {{-- Reset --}}
                            @if ($rating || $delivery_time || $min_price || $max_price)
                                <span wire:click="resetFilter" class="hover:underline text-xs font-medium text-gray-600 hover:text-gray-800 mt-4 text-center block cursor-pointer">{{ __('messages.t_reset_filter') }}</span>
                            @endif
    
                        </div>
                        
                    </div>

                </div>

                {{-- List of gigs --}}
                <div class="lg:col-span-2 xl:col-span-3">
                    <div class="grid grid-cols-12 sm:gap-x-6 gap-y-6">

                        @forelse ($gigs as $gig)
                            
                            {{-- Gig item --}}
                            <div class="col-span-12 lg:col-span-6 xl:col-span-4 md:col-span-6 sm:col-span-6" wire:key="gigs-list-{{ $gig->uid }}">
                                @livewire('main.cards.gig', ['gig' => $gig], key("gig-item-" . $gig->uid))
                            </div>

                        @empty
                            
                            <div class="col-span-12">
                                <div class="py-14 px-6 text-center text-sm sm:px-14 border-dashed border-2">
                                    <svg class="mx-auto h-6 w-6 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/> </svg>
                                    <p class="mt-4 font-semibold text-gray-900">{{ __('messages.no_results_found') }}</p>
                                    <p class="mt-2 text-gray-500">{{ __('messages.t_we_couldnt_find_anthing_search_term') }}</p>
                                </div>
                            </div>

                        @endforelse

                        {{-- Pages --}}
                        @if ($gigs->hasPages())
                            <div class="col-span-12">
                                <div class="flex justify-center mx-auto pt-12">
                                    {!! $gigs->links('pagination::tailwind') !!}
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </section>

    </main>
</div>

@push('scripts')

    {{-- Splide Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>

    {{-- AlpineJs --}}
    <script>
        function AxZSIHcEeIYErvQ() {
            return {

                open: false,

                // Init component
                init() {

                    // Init splidejs
                    window.splidejs();
                    
                }

            }
        }
        window.AxZSIHcEeIYErvQ = AxZSIHcEeIYErvQ();
    </script>

@endpush

@push('styles')

    {{-- Splide Plugin --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

@endpush