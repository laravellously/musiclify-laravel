<div class="container mx-auto" x-data="window.TBhqVNUmCYEnOEj">
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
        <nav class="" x-data="{ open:false }">
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
                    <h1 class="mt-2 text-xl font-bold leading-7 text-gray-900 dark:text-gray-100 sm:text-2xl sm:truncate">{{ __('messages.t_order_details') }}</h1>

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

                @if (!$order->is_finished && $order->order->invoice->status !== 'pending')
                    <div class="mt-5 flex xl:mt-0 xl:ltr:ml-4 xl:rtl:mr-4">

                        {{-- Cancel order --}}
                        @if ($order->status === 'pending')
                            <span class="block ltr:mr-3 rtl:ml-4">
                                <button x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_cancel_order') }}') ? $wire.cancel() : ''" wire:loading.attr="disabled" wire:target="cancel()" type="button" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-500 rounded-sm shadow-sm text-[13px] font-medium text-gray-700 dark:text-zinc-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-50 focus:ring-primary-600">
                                    {{ __('messages.t_cancel_order') }}
                                </button>
                            </span>
                        @endif
            
                        {{-- Start the order --}}
                        @if ($order->status === 'pending')
                            <span class="block ltr:mr-3 rtl:ml-4">
                                <button x-on:click="start" type="button" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                                    {{ __('messages.t_start_the_order') }}
                                </button>
                            </span>
                        @endif

                        {{-- Deliver work --}}
                        @if ($order->status === 'proceeded' || ($order->status === 'delivered' && !$order->is_finished))
                            <span class="block ltr:mr-3 rtl:ml-4">
                                <a href="{{ url('seller/orders/deliver', $order->uid) }}" type="button" class="inline-flex items-center px-4 py-2 border border-primary-600 rounded-sm shadow-sm text-[13px] font-medium text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-primary-50 focus:ring-primary-600">
                                    {{ __('messages.t_deliver_work') }}
                                </a>
                            </span>
                        @endif
                        
                    </div>
                @endif
                
            </div>
        </header>
      
        {{-- Section content --}}
        <div class="bg-white dark:bg-zinc-800 rounded-b-md">

            {{-- Gig details --}}
            <div class="bg-white dark:bg-zinc-800 dark:border-zinc-700 px-4 py-5 border-b border-gray-200 sm:px-10">
                <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="{{ src($order->gig->thumbnail) }}" alt="">
                            </div>
                            <div class="ltr:ml-4 rtl:mr-4">
                                <h3 class="text-sm leading-6 font-medium text-gray-700 dark:text-gray-50">
                                    {{ $order->gig->title }}
                                </h3>
                                <div class="mt-1 text-xs space-x-2 rtl:space-x-reverse">

                                    {{-- View gig --}}
                                    <a href="{{ url('service', $order->gig->slug) }}" target="_blank" class="text-primary-600 font-medium">
                                        {{ __('messages.t_view_gig') }}
                                    </a>

                                    <span class="text-gray-500 dark:text-gray-300 font-black">·</span>

                                    {{-- Edit gig --}}
                                    <a href="{{ url('seller/gigs/edit', $order->gig->uid) }}" target="_blank" class="text-primary-600 font-medium">
                                        {{ __('messages.t_edit_gig') }}
                                    </a>

                                </div>
                            </div>
                    </div>
                  </div>

                    {{-- Quick info --}}
                    <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0 flex">
                        <div class="flex text-gray-500 text-xs space-x-4 lg:space-x-12 rtl:space-x-reverse">

                            {{-- Item total price --}}
                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_total') }}</p>
                                    <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-100 font-medium">
                                        @money($order->profit_value, settings('currency')->code, true)
                                    </p>
                                </div>
                            </span>

                            {{-- Item quantity --}}
                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_quantity') }}</p>
                                    <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-100 font-medium">
                                        {{ $order->quantity }}
                                    </p>
                                </div>
                            </span>

                            {{-- Expected delivery date --}}
                            <span class="flex">
                                <div class="text-center">
                                    <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_expected_delivery_date') }}</p>
                                    <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-100 font-medium">
                                        @if ($order->expected_delivery_date)
                                            {{ format_date($order->expected_delivery_date, 'F j, Y h:i A') }}
                                        @else
                                            —
                                        @endif
                                    </p>
                                </div>
                            </span>

                        </div>
                    </div>

                </div>
            </div>
            
            <div class="w-full rounded-b-md">
                <dl>

                    {{-- Placed at --}}
                    <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10">
                        <dt class="text-sm font-medium text-black dark:text-gray-400">{{ __('messages.t_date_placed') }}</dt>
                        <dd class="mt-1 text-sm text-gray-500 dark:text-gray-200 sm:mt-0 sm:col-span-2">
                            {{ format_date($order->placed_at, 'F j, Y h:i A') }}
                        </dd>
                    </div>

                    {{-- Status --}}
                    <div class="bg-white dark:bg-zinc-600 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10">
                        <dt class="text-sm font-medium text-black dark:text-gray-400">{{ __('messages.t_status') }}</dt>
                        <dd class="mt-1 sm:mt-0 sm:col-span-2">
                            @if ($order->order->invoice->status === 'pending')
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">
                                    {{ __('messages.t_pending_payment') }}
                                </span>
                            @else
                                @switch($order->status)

                                    {{-- Pending --}}
                                    @case('pending')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                            {{ __('messages.t_pending') }}
                                        </span>
                                        @break
                                    
                                    {{-- Delivered --}}
                                    @case('delivered')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            {{ __('messages.t_delivered') }}
                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4">{{ format_date($order->delivered_at, 'F j, Y') }}</span>
                                        @break

                                    {{-- Refunded --}}
                                    @case('refunded')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                            {{ __('messages.t_refunded') }}
                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4">{{ format_date($order->refunded_at, 'F j, Y') }}</span>
                                        @break

                                    {{-- Proceeded --}}
                                    @case('proceeded')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            {{ __('messages.t_in_the_process') }}
                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4">{{ format_date($order->proceeded_at, 'F j, Y') }}</span>
                                        @break

                                    {{-- Canceled --}}
                                    @case('canceled')
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            {{ __('messages.t_canceled') }}
                                        </span>
                                        <span class="text-sm text-gray-400 ltr:ml-4 rtl:mr-4">{{ format_date($order->canceled_at, 'F j, Y') }}</span>
                                        @break

                                    @default
                                        
                                @endswitch
                            @endif
                        </dd>
                    </div>

                    {{-- List of upgrades --}}
                    @if ($order->has('upgrades'))
                        <div class="bg-gray-50 dark:bg-zinc-700 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-10 rounded-b-md">
                            <dt class="text-sm font-medium text-black dark:text-gray-400">{{ __('messages.t_upgrades') }}</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                <fieldset class="space-y-5">
                                    @foreach ($order->upgrades as $upgrade)
                                        <div class="relative flex items-start">
                                            <div class="flex items-center h-5">
                                                <input type="checkbox" class="h-4 w-4 text-gray-300 border-gray-200 border-2 rounded-sm cursor-not-allowed pointer-events-none dark:disabled:bg-zinc-500" checked disabled>
                                            </div>
                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                <label class="font-medium text-gray-500 dark:text-gray-200 text-xs">{{ $upgrade->title }}</label>
                                                <p class="font-normal text-gray-400">
                                                    <div class="mt-1 flex text-sm">
                                                        <p class="text-gray-400 text-xs">+ @money($upgrade->price, settings('currency')->code, true)</p>
                                    
                                                        @if ($upgrade->extra_days)
                                                            <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]) }}
                                                            </p>
                                                        @else
                                                            <p class="ltr:ml-4 ltr:pl-4 ltr:border-l rtl:mr-4 rtl:pr-4 rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                {{ __('messages.t_no_changes_delivery_time') }}
                                                            </p>
                                                        @endif
                                                    </div>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </fieldset>
                            </dd>
                        </div>
                    @endif

                </dl>
            </div>
        </div>
        
    </div>
</div>

@push('scripts')

    {{-- SweetAlert2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- AlpineJs --}}
    <script>
        function TBhqVNUmCYEnOEj() {
            return {

                // Start the order
                start() {
                    const is_requirements_sent = @js($order->is_requirements_sent);

                    if (!is_requirements_sent) {
                        Swal.fire({
                            title             : "<span class='text-lg font-bold text-black'>{{ __('messages.t_attention_needed') }}</span>",
                            html              : "<p class='text-sm text-gray-500 font-normal overflow-hidden px-12'>{{ __('messages.t_buyer_didnt_send_requirements_yet_continue') }}</p>",
                            showCancelButton  : true,
                            cancelButtonText  : "{{ __('messages.t_cancel') }}",
                            confirmButtonText : "{{ __('messages.t_i_have_all_info_needed') }}",
                            confirmButtonColor: '',
                            focusConfirm      : false,
                            allowOutsideClick : false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                @this.start();
                            }
                        });
                    } else {

                        @this.start();

                    }
                }

            }
        }
        window.TBhqVNUmCYEnOEj = TBhqVNUmCYEnOEj();
    </script>

@endpush

@push('styles')
    <style>
        .application .swal2-styled.swal2-cancel {
            background-color: transparent !important;
            color: #8f8f8f;
        }
        .application .swal2-actions button {
            font-size: 13px;
            font-weight: 400;
            letter-spacing: .2px;
        }
    </style>
@endpush