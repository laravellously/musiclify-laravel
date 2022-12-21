<div class="container mx-auto" 
        x-data="window.TBhqVNUmCYEnOEj"
        x-init="init()"
        x-on:livewire-upload-start="uploadStart()"
        x-on:livewire-upload-finish="uploadFinish()"
        x-on:livewire-upload-error="uploadError()"
        x-on:livewire-upload-progress="uploadingProgress = $event.detail.progress">

    <div class="min-h-full bg-white dark:bg-zinc-800 shadow rounded-md">
        
        @php
            
            // Set links
            $links = [
                ['href' => "seller/home", 'text' => __('messages.t_home'), 'active' => false],
                ['href' => "seller/orders", 'text' => __('messages.t_orders_history'), 'active' => true],
                ['href' => "seller/gigs", 'text' => __('messages.t_my_gigs'), 'active' => false],
                ['href' => "seller/reviews", 'text' => __('messages.t_reviews'), 'active' => false],
                ['href' => "seller/portfolio", 'text' => __('messages.t_portfolio'), 'active' => false],
                ['href' => "seller/earnings", 'text' => __('messages.t_earnings'), 'active' => false],
                ['href' => "seller/withdrawals", 'text' => __('messages.t_withdrawals'), 'active' => false],
                ['href' => "seller/refunds", 'text' => __('messages.t_refunds'), 'active' => false],
            ]

        @endphp
        
        {{-- Section Navbar --}}
        <nav class="" x-data="{ open: false }">
            <div class="mx-auto border-b border-gray-200 dark:border-zinc-700 px-4 sm:px-6 lg:px-8">
                <div class="relative h-16 flex items-center justify-between">

                    {{-- Header links (Desktop) --}}
                    <div class="flex items-center">
                        <div class="hidden lg:block lg:ml-10">
                            <div class="flex space-x-4 rtl:space-x-reverse">

                                @foreach ($links as $link)
                                    <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-100 dark:bg-zinc-700' : 'hover:text-gray-700 hover:bg-gray-50 dark:hover:bg-zinc-700 dark:hover:text-gray-200' }} px-3 py-2 rounded-md text-sm font-medium text-gray-900 dark:text-gray-300" aria-current="page">{{ $link['text'] }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
        
                    {{-- Header links mobile --}}
                    <div class="flex lg:hidden">
                        
                        {{-- Burger menu button --}}
                        <button type="button" class="bg-gray-50 dark:bg-zinc-700 p-2 inline-flex items-center justify-center rounded-md text-gray-400 dark:text-gray-400 hover:text-gray-500 dark:hover:text-gray-200 hover:bg-gray-100 dark:hover:bg-zinc-600 focus:outline-none" @click="open = !open" aria-expanded="true" x-bind:aria-expanded="open.toString()">
                            <span class="sr-only">Open main menu</span>
                            <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 hidden" :class="{'hidden': open, 'block': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> <svg x-state:on="Menu open" x-state:off="Menu closed" class="h-6 w-6 block" :class="{'block': open, 'hidden': !(open)}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path> </svg>
                        </button>

                          
                    </div>
        
                    {{-- Pending orders --}}
                    @if (auth()->user()->sales->where('status', 'pending')->count())
                        <div class="hidden lg:block">
                            <span class="relative inline-flex">
                                <span class="inline-flex items-center px-4 py-2 font-medium leading-6 text-xs transition ease-in-out duration-150 text-amber-600">
                                    {{ __('messages.t_number_pending_orders', ['number' => number_format(auth()->user()->sales->where('status', 'pending')->count())]) }}
                                </span>
                                <span class="flex absolute h-3 w-3 top-[13px] ltr:-left-1 rtl:-right-1">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-500 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-600"></span>
                                </span>
                            </span>
                        </div>
                    @endif

                </div>
            </div>

            {{-- Mobile menu --}}
            <div class="bg-gray-100 dark:bg-zinc-700 border-b border-gray-200 dark:border-zinc-700 lg:hidden" x-show="open">
                <div class="px-2 pt-2 pb-3 space-y-1">
                  
                    @foreach ($links as $link)
                        <a href="{{ url($link['href']) }}" class="{{ $link['active'] ? 'bg-gray-200 dark:bg-zinc-600' : 'hover:bg-gray-200 dark:hover:bg-zinc-600' }} block px-3 py-2 rounded-md font-bold tracking-wide text-gray-900 dark:text-gray-200 text-xs">
                            {{ $link['text'] }}
                        </a>
                    @endforeach
                  
                </div>
            </div>

        </nav>
      
        {{-- Section heading --}}
        <header class="bg-gray-50 dark:bg-zinc-700 py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 xl:flex xl:items-center xl:justify-between">
                <div class="flex-1 min-w-0">

                    {{-- Breadcrumb --}}
                    <nav class="flex" aria-label="Breadcrumb">
                        <ol role="list" class="flex items-center space-x-4 rtl:space-x-reverse">

                            {{-- Main homepage --}}
                            <li>
                                <div>
                                    <a href="{{ url('/') }}" class="text-sm font-medium text-gray-500 dark:text-gray-300 dark:hover:text-gray-200 hover:text-gray-700">{{ __('messages.t_home') }}</a>
                                </div>
                            </li>

                            {{-- Seller dashboard --}}
                            <li>
                                <div class="flex items-center">

                                    {{-- LTR --}}
                                    <svg class="hidden ltr:block flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>

                                    {{-- RTL --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="hidden rtl:block flex-shrink-0 h-5 w-5 text-gray-400 viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>

                                    <a href="{{ url('seller/home') }}" class="ltr:ml-4 rtl:mr-4 text-sm font-medium text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-gray-200">{{ __('messages.t_dashboard') }}</a>
                                </div>
                            </li>
                        </ol>
                    </nav>

                    {{-- Title --}}
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_deliver_completed_work') }}</h1>

                    {{-- Quick stats --}}
                    <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-8 rtl:space-x-reverse">

                        {{-- User level --}}
                        <div class="mt-2 flex items-center text-xs font-medium" style="color: {{ auth()->user()->level->level_color }}">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4" style="color: {{ auth()->user()->level->level_color }};margin-top: -3px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd"/> <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z"/> </svg>
                            {{ auth()->user()->level->title }}
                        </div>

                        {{-- Succeeded sales --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"/></svg>
                            {{ __('messages.t_total_sales_number', ['number' => number_format(auth()->user()->sales->where('status', 'delivered')->where('is_finished', true)->count())]) }}
                        </div>

                        {{-- Country --}}
                        @if (auth()->user()->country)
                            <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                                <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/> </svg>
                                {{ auth()->user()->country->name }}
                            </div>
                        @endif

                        {{-- Sign up date --}}
                        <div class="mt-2 flex items-center text-xs text-gray-500 font-medium">
                            <svg class="flex-shrink-0 ltr:mr-1.5 rtl:ml-1.5 h-4 w-4 -mt-[2px] text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/> </svg>
                            {{ __('messages.t_signed_up_on_date', ['date' => format_date(auth()->user()->created_at, 'F j, Y')]) }}
                        </div>
                    
                    </div>

                </div>

                <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                    {{-- Order details --}}
                    <span class="block ltr:mr-3 rtl:ml-4">
                        <a href="{{ url('seller/orders/details', $order->uid) }}" type="button" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                            {{ __('messages.t_order_details') }}
                        </a>
                    </span>
                    
                </div>
                
            </div>
        </header>
      
        {{-- Section content --}}
        <div class="bg-white dark:bg-zinc-800 rounded-b-md">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 divide-x rtl:divide-x-reverse dark:divide-zinc-700">

                {{-- Submit work --}}
                <div class="col-span-12 lg:col-span-6">

                    {{-- Section title --}}
                    <div class="w-full p-6 mb-10">
                        <h3 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">
                            {{ __('messages.t_deliver_completed_work') }}
                        </h3>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">
                            {{ __('messages.t_deliver_completed_work_subtitle') }}
                        </p>
                    </div>

                    {{-- Check if already submitted work --}}
                    @if ($order->delivered_work)
                    
                        {{-- Check if have files --}}
                        @if ($order->delivered_work->attached_work)
                            
                            <div class="py-4 flex items-center justify-between space-x-3 rtl:space-x-reverse lg:ltr:pl-6 lg:rtl:pr-6 mb-10 px-4">
                                <div class="min-w-0 flex-1 flex items-center space-x-3 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <svg class="w-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path style="fill:#ECEDEF;" d="M100.641,0c-14.139,0-25.6,11.461-25.6,25.6v460.8c0,14.139,11.461,25.6,25.6,25.6h375.467c14.139,0,25.6-11.461,25.6-25.6V85.333L416.375,0H100.641z"/><path style="fill:#D9DCDF;" d="M441.975,85.333h59.733L416.375,0v59.733C416.375,73.872,427.836,85.333,441.975,85.333z"/><path style="fill:#C6CACF;" d="M399.308,42.667H75.041v153.6h324.267c4.713,0,8.533-3.821,8.533-8.533V51.2C407.841,46.487,404.02,42.667,399.308,42.667z"/><path style="fill:#FFC44F;" d="M382.241,179.2H18.843c-7.602,0-11.41-9.191-6.034-14.567L75.041,102.4L12.809,40.167C7.433,34.791,11.241,25.6,18.843,25.6h363.398c4.713,0,8.533,3.821,8.533,8.533v136.533C390.775,175.379,386.954,179.2,382.241,179.2z"/><g><path style="fill:#FFFFFF;" d="M194.508,128H170.06l31.003-37.203c2.119-2.544,2.577-6.084,1.173-9.083c-1.405-2.998-4.417-4.914-7.728-4.914h-42.667c-4.713,0-8.533,3.821-8.533,8.533s3.821,8.533,8.533,8.533h24.448l-31.003,37.203c-2.119,2.544-2.577,6.084-1.173,9.083c1.405,2.998,4.417,4.914,7.728,4.914h42.667c4.713,0,8.533-3.821,8.533-8.533S199.22,128,194.508,128z"/><path style="fill:#FFFFFF;" d="M220.108,76.8c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-51.2C228.641,80.621,224.82,76.8,220.108,76.8z"/><path style="fill:#FFFFFF;" d="M279.841,76.8h-34.133c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h25.6c4.713,0,8.533-3.821,8.533-8.533v-25.6C288.375,80.621,284.554,76.8,279.841,76.8z M271.308,102.4h-17.067v-8.533h17.067V102.4z"/></g><path style="fill:#A1A7AF;" d="M416.37,332.8c-1.927,0-3.863-0.649-5.458-1.978l-51.2-42.667c-1.946-1.621-3.071-4.023-3.071-6.556s1.125-4.934,3.071-6.556l51.2-42.667c3.62-3.017,9.001-2.527,12.018,1.092c3.018,3.621,2.528,9.002-1.092,12.019L378.504,281.6l43.333,36.111c3.621,3.018,4.111,8.398,1.092,12.019C421.243,331.755,418.815,332.8,416.37,332.8z"/><g><path style="fill:#55606E;" d="M313.975,315.733c-4.713,0-8.533-3.821-8.533-8.533v-25.6c0-4.713,3.821-8.533,8.533-8.533s8.533,3.821,8.533,8.533v25.6C322.508,311.913,318.687,315.733,313.975,315.733z"/><path style="fill:#55606E;" d="M365.175,273.067h-17.067V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533s-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-17.067c-4.713,0-8.533,3.821-8.533,8.533c0,4.713,3.821,8.533,8.533,8.533h42.667V307.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h34.133V307.2c0,4.713,3.821,8.533,8.533,8.533s8.533-3.821,8.533-8.533v-17.067h93.867c4.713,0,8.533-3.821,8.533-8.533C373.708,276.887,369.887,273.067,365.175,273.067z"/><path style="fill:#55606E;" d="M365.175,349.333c-4.419,0-8-3.582-8-8V281.6c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v59.733C373.175,345.751,369.594,349.333,365.175,349.333z"/></g><path style="fill:#F79F4D;" d="M333.54,364.434l25.6-25.6c3.332-3.332,8.736-3.332,12.068,0l25.6,25.6c1.6,1.6,2.499,3.771,2.499,6.034V460.8c0,4.713-3.821,8.533-8.533,8.533h-51.2c-4.713,0-8.533-3.821-8.533-8.533v-90.332C331.041,368.205,331.94,366.034,333.54,364.434z"/><polygon style="fill:#FFC44F;" points="339.575,460.8 339.575,370.467 365.175,344.867 390.775,370.467 390.775,460.8 "/><g><path style="fill:#BF722A;" d="M365.175,451.733c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,448.151,369.594,451.733,365.175,451.733z"/><path style="fill:#BF722A;" d="M365.175,400.533c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,396.951,369.594,400.533,365.175,400.533z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-200 truncate pb-2">
                                            {{ $order->delivered_work->attached_work['id'] }}.{{ $order->delivered_work->attached_work['extension'] }}
                                        </p>
                                        <p class="text-xs font-[400] text-gray-400 truncate">
                                            {{ human_filesize($order->delivered_work->attached_work['size']) }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <a href="{{ url('uploads/delivered/' . $order->order->uid . '/' . $order->uid . '/' . $order->delivered_work->id . '/' . $order->delivered_work->attached_work['id']) }}" target="_blank" class="inline-flex items-center py-2 px-4 border border-transparent rounded-full bg-gray-100 hover:bg-gray-200 dark:bg-zinc-700 dark:hover:bg-zinc-600 focus:outline-none focus:ring-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-2 rtl:ml-2 h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                        <span class="text-sm font-medium text-gray-700 dark:text-zinc-300">
                                            {{ __('messages.t_download') }}
                                        </span>
                                    </a>
                                </div>
                            </div>

                        @endif

                        {{-- Check if have quick response --}}
                        @if ($order->delivered_work->quick_response)
                        
                            <div class="flex flex-col space-y-4 overflow-y-auto ltr:pl-6 rtl:pr-6 mb-6">
                                <div class="flex items-center">
                                    <div class="flex flex-col space-y-2 text-sm ltr:ml-2 rtl:mr-2 order-2 items-center">
                                    <div><span class="px-4 py-2 rounded-lg italic inline-block bg-gray-100 text-gray-900 dark:bg-zinc-700 dark:text-zinc-300 w-full">{!! nl2br($order->delivered_work->quick_response) !!}</span></div>
                                    </div>
                                    <img src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}" class="w-10 h-10 rounded-full order-1 object-cover">
                                </div>
                            </div>

                        @endif

                        {{-- Resubmit work --}}
                        @if (!$order->is_finished)
                            <div class="lg:ltr:pl-6 lg:rtl:pr-6 px-4 mt-12 mb-4">
                                <button x-on:click="confirm('{{ __("messages.t_are_u_sure_u_want_to_resubmit_work_again") }}') ? $wire.resubmit() : ''" type="button" class="text-white w-full bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-0 font-medium rounded-md text-sm px-5 py-4 text-center inline-flex items-center justify-center" wire:loading.attr="disabled" wire:target="resubmit">

                                    {{-- Loading indicator --}}
                                    <div wire:loading wire:target="resubmit">
                                        <svg role="status" class="inline w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div>

                                    {{-- Button text --}}
                                    <div wire:loading.remove wire:target="resubmit">
                                        {{ __('messages.t_resubmit_work_again') }}
                                    </div>
                                    
                                </button>
                            </div>
                        @endif

                    @elseif (!$order->is_finished)
                        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 px-6">

                            {{-- Upload work --}}
                            <div class="col-span-12">
                                <label class="block text-sm font-semibold text-gray-900 dark:text-gray-200">
                                    {{ __('messages.t_upload_work') }}
                                </label>
                                <div class="mt-2 relative">
                                    <input x-on:change="fileInputChanged" type="file" accept="application/zip" class="block w-full text-xs text-gray-700 font-medium bg-gray-100 dark:bg-zinc-700 dark:text-gray-200 dark:border-zinc-700 rounded-md cursor-pointer focus:ring-0 focus:outline-none" />
                                </div>
                                <span class="text-xs text-gray-400 font-normal">
                                    {{ __('messages.t_only_zip_allowed_max_size', ['size' => settings('media')->delivered_work_max_size]) }}
                                </span>
                            </div>

                            {{-- Quick response --}}
                            <div class="col-span-12">
                                <label for="deliver-work-quick-response" class="block text-sm font-semibold text-gray-900 dark:text-gray-200">
                                    {{ __('messages.t_quick_response') }}
                                </label>
                                <div class="mt-2 relative">
                                    <textarea placeholder="{{ __('messages.t_describe_ur_delivery_in_detail') }}" wire:model.defer="quick_response" rows="8" id="deliver-work-quick-response" class="dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3 font-normal resize-none border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600 dark:border-zinc-700 dark:placeholder-gray-300 dark:text-gray-200" maxlength="2500"></textarea>
                                    <div class="absolute inset-y-0 ltr:right-0 rtl:left-0 ltr:pr-3 rtl:pl-3 flex items-center pointer-events-none">
                                        <i class="mdi mdi-file text-gray-400"></i>
                                    </div>
                                </div>
                            </div>

                            {{-- Submit --}}
                            <div class="col-span-12 mt-10 mb-8">
                                <x-forms.button action="submit" :text="__('messages.t_submit')" :block="true" />
                            </div>

                        </div>
                    @endif

                </div>

                {{-- Conversation --}}
                <div class="col-span-12 lg:col-span-6">
                    <div class="flex flex-col w-full h-full">

                        {{-- Buyer --}}
                        <div class="w-full">
                            <div class="mx-auto">
                                <div class="py-6 md:flex md:items-center md:justify-between lg:border-b lg:border-gray-200 lg:dark:border-zinc-700">
                                    <div class="flex-1 min-w-0 px-6">
                                        <div class="flex items-center">
                                            <img class="hidden h-10 w-10 rounded-full sm:block object-cover" src="{{ src($order->order->buyer->avatar) }}" alt="{{ $order->order->buyer->username }}">
                                            <div>
                                                <div class="flex items-center">
                                                    <h1 class="ltr:ml-3 rtl:mr-3 text-base font-bold leading-7 text-gray-900 dark:text-gray-200 sm:leading-9 sm:truncate">
                                                        {{ $order->order->buyer->username }}
                                                    </h1>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 flex space-x-3 rtl:space-x-reverse md:mt-0 md:ltr:mr-4 md:rtl:ml-4 ltr:ml-6 rtl:mr-6">
                                        <a href="{{ url('profile', $order->order->buyer->username) }}" target="_blank" class="inline-flex items-center px-4 py-2 border border-gray-300 shadow-sm text-sm font-medium rounded-sm text-gray-700 bg-white hover:bg-gray-50 dark:bg-zinc-700 dark:hover:bg-zinc-600 dark:text-zinc-300 dark:border-zinc-700 focus:outline-none focus:ring-0">
                                            {{ __('messages.t_view_profile') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Conversation --}}
                        <div class="w-full">
                            <ul role="list" class="p-6">

                                @foreach ($order->conversation as $message)
                                    <li wire:key="seller-deliver-order-msg-id-{{ $message->id }}">
                                        <div class="relative pb-8">
                                            @if (!$loop->last)
                                                <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200 dark:bg-zinc-700" aria-hidden="true"></span>
                                            @endif
                                        <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                            <div class="relative">
                                                <img class="h-10 w-10 rounded-md bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-transparent object-cover" src="{{ src($message->from->avatar) }}" alt="{{ $message->from->username }}">
                                            </div>
                                            <div class="min-w-0 flex-1">
                                            <div>
                                                <div class="text-sm">
                                                    <a href="{{ url('profile', $message->from->username) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-100">{{ $message->from->username }}</a>
                                                </div>
                                                <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ format_date($message->created_at, 'ago') }}</p>
                                            </div>
                                            <div class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                                                <p>{!! nl2br($message->msg_content) !!}</p>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </li>
                                @endforeach
    
                            </ul>
                        </div>

                        {{-- Send message --}}
                        @if (!$order->is_finished)
                            <div class="mt-auto w-full px-6 py-10 border-t bg-gray-50 dark:bg-zinc-700 dark:border-zinc-700 rounded-br-md">
                                <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                    <div class="flex-shrink-0">
                                        <img class="inline-block h-10 w-10 rounded-full object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="relative">
                                            <div class="border border-gray-300 dark:border-zinc-600 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                                <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200" placeholder="{{ __('messages.t_type_ur_message_here') }}"></textarea>
                                                <div class="py-2" aria-hidden="true">
                                                    <div class="py-px">
                                                        <div class="h-9"></div>
                                                    </div>
                                                </div>
                                            </div>
                                    
                                            <div class="absolute bottom-0 inset-x-0 ltr:pl-3 rtl:pr-3 ltr:pr-2 rtl:pl-2 py-2 flex justify-between">
                                                <div></div>
                                                <div class="flex-shrink-0">
                                                    <button wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600">{{ __('messages.t_send') }}</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        </div>
        
    </div>

    {{-- Uploading modal --}}
    <div id="uploading-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full" wire:ignore.self>
        <div class="relative w-full h-full max-w-md p-4 md:h-auto">
            <div class="relative bg-white dark:bg-zinc-800 rounded-lg shadow">
                <div class="p-6 text-center">
                    <h3 class="mb-6 text-base font-bold text-gray-600 dark:text-gray-200">
                        {{ __('messages.t_pls_wait_until_uploading_finish') }}
                    </h3>

                    {{-- Uploader progress --}}
                    <div>
                        <div class="flex justify-between mb-1">
                            <span class="text-sm font-medium text-primary-600 dark:text-white">{{ __('messages.t_uploading') }}</span>
                            <span class="text-sm font-medium text-primary-600 dark:text-white" x-text="uploadText()"></span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-primary-600 h-2.5 rounded-full" :style="{ width: uploadingProgress + '%' }"></div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</div>

@push('scripts')

    {{-- AlpineJs --}}
    <script>
        function TBhqVNUmCYEnOEj() {
            return {

                isUploading      : false,
                uploadingProgress: 0,
                uploadingModal   : null,

                init() {

                    // set the modal menu element
                    const targetEl      = document.getElementById('uploading-modal');

                    // options with default values
                    const options       = {
                        placement      : 'center-center',
                        backdropClasses: 'bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40 overflow-x-hidden',
                        onHide         : () => {},
                        onShow         : () => {},
                        onToggle       : () => {}
                    };

                    // Generate modal
                    const modal         = new Modal(targetEl, options);

                    // Set modal
                    this.uploadingModal = modal;

                },

                // Upload start
                uploadStart() {
                    this.isUploading = true;
                    this.uploadingModal.show();
                },

                // Upload finish
                uploadFinish() {
                    this.isUploading       = false;
                    this.uploadingProgress = 0;
                    this.uploadingModal.hide();
                },

                // Upload error
                uploadError() {
                    this.isUploading       = false;
                    this.uploadingProgress = 0;
                    this.uploadingModal.hide();
                    window.toast("{{ __('messages.t_error_while_uploading_your_file') }}", 'error');
                },

                // Upload text
                uploadText() {
                    return this.uploadingProgress + " %";
                },

                // Listen when file changed
                fileInputChanged(e) {
                    
                    // Get maximum file size
                    const max_size  = Number('{{ settings("media")->delivered_work_max_size }}');

                    // Get file name
                    const file_name = e.target.files[0].name;

                    // Get selected file size
                    const file_size = e.target.files[0].size / 1024 / 1024;

                    // Check if extension is valid
                    if (!this.isValidExtension(file_name)) {
                        
                        // Show error
                        window.toast("{{ __('messages.t_selected_file_extension_is_not_allowed') }}", 'error');

                        e.preventDefault();
                        e.stopPropagation();
                        return;

                    }

                    // Validate file size
                    if (file_size > max_size) {
                        
                        // Show error
                        window.toast("{{ __('messages.t_selected_file_size_big') }}", 'error');

                        e.preventDefault();
                        e.stopPropagation();
                        return;

                    }

                    // File is good upload it
                    @this.upload('work', e.target.files[0], (uploadedFilename) => {
                        
                        this.uploadFinish();

                    }, () => {
                        
                        this.uploadError();

                    }, (event) => {
                        this.uploadStart();
                        this.uploadingProgress = event.detail.progress;
                    });

                },

                // Validate extension
                isValidExtension(filename) {

                    // Check file name
                    if (filename.length > 0) {
                        
                        // Check extension
                        if (filename.substr(filename.length - 4, 4).toLowerCase() == ".zip") {
                            return true;
                        }

                        return false;

                    } else {

                        // Invalid file name
                        return false;

                    }

                }

            }
        }
        window.TBhqVNUmCYEnOEj = TBhqVNUmCYEnOEj();
    </script>

@endpush