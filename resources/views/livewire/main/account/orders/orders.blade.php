<main class="w-full" x-data>
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-zinc-800 rounded-lg shadow overflow-hidden">
            <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:grid lg:grid-cols-12 lg:divide-y-0 lg:divide-x rtl:divide-x-reverse">

                {{-- Sidebar --}}
                <aside class="lg:col-span-3 py-6" wire:ignore>
                    <x-main.account.sidebar />
                </aside>

                {{-- Section content --}}
                <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">

                    {{-- Form --}}
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        {{-- Section header --}}
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_orders_history') }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_orders_history_subtitle') }}</p>
                        </div>

                        {{-- Session flash message --}}
                        @if (session()->has('message'))
                            <div class="bg-yellow-100 ltr:border-l-4 rtl:border-r-4 border-yellow-400 p-4 mb-6">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/> </svg>
                                    </div>
                                    <div class="ltr:ml-3 rtl:mr-3">
                                        <p class="text-sm text-yellow-700 font-medium">
                                            {{ session()->get('message') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        {{-- Section content --}}
                        <div class="w-full mb-6">
                            @forelse ($orders as $order)

                                {{-- List of orders --}}
                                <div class="bg-white dark:bg-zinc-700 border border-gray-200 dark:border-zinc-600 rounded-md mb-10" wire:key="orders-{{ $order->uid }}">
                                    <div class="bg-gray-50 dark:bg-zinc-600 border-b sm:rounded-t-md flex items-center p-4 sm:p-6 sm:grid sm:grid-cols-4 sm:gap-x-6 dark:border-zinc-600">

                                        {{-- Order quick stats --}}
                                        <dl class="flex-1 grid grid-cols-2 gap-x-6 text-sm sm:col-span-3 sm:grid-cols-2 lg:col-span-2">

                                            {{-- Date placed --}}
                                            <div>
                                                <dt class="font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_date_placed') }}</dt>
                                                <dd class="mt-2 text-gray-500 dark:text-gray-50 text-xs">{{ format_date($order->placed_at, 'F j, Y h:i A') }}</dd>
                                            </div>

                                            {{-- Total amount --}}
                                            <div>
                                                <dt class="font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_total_amount') }}</dt>
                                                <dd class="mt-1 font-medium text-gray-900 dark:text-white">@money($order->total_value, settings('currency')->code, true)</dd>
                                            </div>

                                        </dl>

                                    </div>

                                    {{-- List of gigs in this order --}}
                                    <ul role="list" class="divide-y divide-gray-200 dark:divide-zinc-600">

                                        @foreach ($order->items as $item)
                                            <li class="p-4 sm:p-6">
                                                <div class="flex items-center sm:items-start">

                                                    {{-- Gig thumbnail --}}
                                                    <div class="flex-shrink-0 w-24 h-24 bg-gray-200 dark:bg-zinc-600 rounded-lg overflow-hidden hidden md:block">
                                                        <img src="{{ src($item->gig->thumbnail) }}" alt="{{ $item->gig->title }}" class="w-full h-full object-center object-cover">
                                                    </div>

                                                    {{-- Gig title  / Upgrades --}}
                                                    <div class="flex-1 ltr:md:ml-6 rtl:md:mr-6 text-sm">
                                                        <div class="md:flex md:items-center md:justify-between md:space-x-4 rtl:space-x-reverse xl:pb-4">
                                                            <div>

                                                                {{-- Item title --}}
                                                                <h1 class="text-base font-bold text-gray-900 hover:text-primary-600 mb-2 dark:text-white">
                                                                    <a href="{{ url('service', $item->gig->slug) }}" target="_blank">{{ $item->gig->title }}</a>
                                                                </h1>

                                                                {{-- Item quick stats --}}
                                                                <div class="inline-block md:!flex text-gray-500 dark:text-gray-300 text-xs space-y-4 md:space-y-0 md:space-x-6 lg:space-x-12 rtl:space-x-reverse">

                                                                    {{-- Item total price --}}
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_total') }}</p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                @money($item->total_value, settings('currency')->code, true)
                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    {{-- Item quantity --}}
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_quantity') }}</p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                {{ $item->quantity }}
                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    {{-- Expected delivery date --}}
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_expected_delivery_date') }}</p>
                                                                            <p class="mt-2 text-[11px] text-gray-600 dark:text-gray-200 font-medium">
                                                                                @if ($item->expected_delivery_date)
                                                                                    {{ format_date($item->expected_delivery_date, 'F j, Y h:i A') }}
                                                                                @else
                                                                                    —
                                                                                @endif
                                                                            </p>
                                                                        </div>
                                                                    </span>

                                                                    {{-- Status --}}
                                                                    <span class="flex">
                                                                        <div class="md:text-center">
                                                                            <p class="text-[10px] tracking-widest text-gray-400 dark:text-gray-300 uppercase">{{ __('messages.t_status') }}</p>

                                                                            {{-- Has refund opened --}}
                                                                            @if ($item->refund && $item->refund->status === 'pending')
                                                                                <p class="mt-2 text-[11px] text-red-500 font-medium">
                                                                                    {{ __('messages.t_dispute_opened') }}
                                                                                </p>
                                                                            @elseif ($item->order->invoice->status === 'pending')
                                                                                <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                                    {{ __('messages.t_pending_payment') }}
                                                                                </p>
                                                                            @else

                                                                                @switch($item->status)

                                                                                    {{-- Pending --}}
                                                                                    @case('pending')
                                                                                        <p class="mt-2 text-[11px] text-amber-500 font-medium">
                                                                                            {{ __('messages.t_pending') }}
                                                                                        </p>
                                                                                        @break

                                                                                    {{-- In progress --}}
                                                                                    @case('proceeded')
                                                                                        <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-proceeded" class="mt-2 text-[11px] text-blue-500 font-medium cursor-pointer">
                                                                                            {{ __('messages.t_in_the_process') }}
                                                                                        </p>
                                                                                        <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-proceeded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            {{ format_date($item->proceeded_at, 'F j, Y h:i A') }}
                                                                                        </div>
                                                                                        @break

                                                                                    {{-- Delivered --}}
                                                                                    @case('delivered')
                                                                                        <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-delivered" class="mt-2 text-[11px] text-green-500 font-medium cursor-pointer">
                                                                                            {{ __('messages.t_delivered') }}
                                                                                        </p>
                                                                                        <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-delivered" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            {{ format_date($item->delivered_at, 'F j, Y h:i A') }}
                                                                                        </div>
                                                                                        @break

                                                                                    {{-- Canceled --}}
                                                                                    @case('canceled')
                                                                                        <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-canceled" class="mt-2 text-[11px] text-gray-500 font-medium cursor-pointer">
                                                                                            {{ __('messages.t_canceled') }}
                                                                                        </p>
                                                                                        <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-canceled" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            {{ format_date($item->canceled_at, 'F j, Y h:i A') }}
                                                                                        </div>
                                                                                        @break
                                                                                    
                                                                                    {{-- Refunded --}}
                                                                                    @case('refunded')
                                                                                        <p data-tooltip-target="orders-{{ $order->uid }}-item-{{ $item->id }}-status-refunded" class="mt-2 text-[11px] text-red-500 font-medium cursor-pointer">
                                                                                            {{ __('messages.t_refunded') }}
                                                                                        </p>
                                                                                        <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-status-refunded" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                                                            {{ format_date($item->refunded_at, 'F j, Y h:i A') }}
                                                                                        </div>
                                                                                        @break
                                                                                        
                                                                                    @default
                                                                                        
                                                                                @endswitch

                                                                            @endif

                                                                            
                                                                        </div>
                                                                    </span>
                                                                    
                                                                </div>

                                                            </div>

                                                            {{-- Item actions --}}
                                                            <div class="mt-4 flex space-x-3 md:mt-0">
                                                                <button type="button" data-dropdown-toggle="orders-{{ $order->uid }}-item-{{ $item->id }}-actions-dropdown" data-dropdown-placement="left-start" class="inline-flex justify-center px-2 py-2 border border-gray-200 dark:border-zinc-700 shadow-sm text-xs font-medium rounded-full text-gray-700 dark:text-gray-300 bg-white dark:bg-zinc-800 hover:bg-gray-50 dark:hover:bg-zinc-900 focus:outline-none focus:ring-0">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z"/></svg>
                                                                </button>
                                                                <div id="orders-{{ $order->uid }}-item-{{ $item->id }}-actions-dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-48 dark:bg-zinc-800">
                                                                    <ul class="text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">

                                                                        {{-- Contact seller --}}
                                                                        <li>
                                                                            <a href="{{ url('messages/new', $item->owner?->username) }}" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-t">
                                                                                <i class="mdi mdi-email-fast text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_contact_seller') }}</span>
                                                                            </a>
                                                                        </li>
                                                                        
                                                                        @php
                                                                            
                                                                            // Check expected delivery date
                                                                            if ($item->expected_delivery_date && !$item->is_finished) {
                                                                                
                                                                                // Parse expected delivery date
                                                                                $parsed = \Carbon\Carbon::parse($item->expected_delivery_date);

                                                                                // Check if date is past
                                                                                if ($parsed->isPast()) {
                                                                                    
                                                                                    // Date in past, check item status
                                                                                    if (in_array($item->status, ['delivered', 'proceeded', 'pending'])) {
                                                                                        
                                                                                        // Can request refund
                                                                                        $can_refund = true;

                                                                                    } else {

                                                                                        // Cannot request refund
                                                                                        $can_refund = false;

                                                                                    }

                                                                                } else if ($item->status === 'delivered' && !$item->is_finished) {
                                                                                    
                                                                                    // Can refund
                                                                                    $can_refund = true;

                                                                                } else {

                                                                                    // Cannot request refund
                                                                                    $can_refund = false;

                                                                                }

                                                                            } else {

                                                                                $can_refund = false;

                                                                            }

                                                                        @endphp

                                                                        {{-- View refund --}}
                                                                        @if ($item->refund)
                                                                            
                                                                            <li>
                                                                                <a href="{{ url('account/refunds/details', $item->refund->uid) }}" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                    <i class="mdi mdi-cash-refund text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_refund_details') }}</span>
                                                                                </a>
                                                                            </li>

                                                                        @else
                                                                            
                                                                            {{-- Request refund --}}
                                                                            @if ($can_refund)
                                                                                <li>
                                                                                    <a href="{{ url('account/refunds/request', $item->uid) }}" target="_blank" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                        <i class="mdi mdi-cash-refund text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                        <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_request_refund') }}</span>
                                                                                    </a>
                                                                                </li>
                                                                            @endif

                                                                        @endif

                                                                        {{-- Delivered work --}}
                                                                        @if (in_array($item->status, ['proceeded', 'delivered']))
                                                                            <li>
                                                                                <a href="{{ url('account/orders/files?orderId=' . $order->uid . '&itemId=' . $item->uid) }}"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700">
                                                                                    <i class="mdi mdi-tray-arrow-down text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_delivered_work') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endif

                                                                        {{-- Cancel service --}}
                                                                        @if ($item->status === 'pending' && $item->order->invoice->status === 'paid')
                                                                            <li>
                                                                                <button type="button" x-on:click="confirm('{{ __('messages.t_are_u_sure_u_want_to_cancel_service') }}') ? $wire.cancel('{{ $item->uid }}') : ''" wire:loading.attr="disabled" wire:target="cancel('{{ $item->uid }}')" class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 w-full">

                                                                                    {{-- Loading indicator --}}
                                                                                    <div wire:loading wire:target="cancel('{{ $item->uid }}')">
                                                                                        <svg role="status" class="ltr:mr-3 rtl:ml-3 inline w-5 h-5 text-gray-500 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                                                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                                                                        </svg>
                                                                                    </div>

                                                                                    {{-- Icon --}}
                                                                                    <div wire:loading.remove wire:target="cancel('{{ $item->uid }}')">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="ltr:mr-3 rtl:ml-3 h-5 w-5 text-gray-500 group-hover:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"/></svg>
                                                                                    </div>

                                                                                    <span class="text-xs font-medium">{{ __('messages.t_cancel_service') }}</span>
                                                                                    
                                                                                </button>
                                                                            </li>
                                                                        @endif

                                                                        {{-- Send requirements --}}
                                                                        @if (($item->status === 'pending' || $item->status === 'proceeded') && $item->order->invoice->status === 'paid')
                                                                            <li>
                                                                                <a href="{{ url('account/orders/requirements?order=' . $order->uid . '&item=' . $item->uid) }}"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-b">
                                                                                    <i class="mdi mdi-send text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_send_requirements') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endif

                                                                        {{-- Make review --}}
                                                                        @if ( $item->status === 'delivered' && $item->is_finished )
                                                                            <li>
                                                                                <a href="{{ url('account/reviews/create/' . $item->uid) }}"  class="flex items-center px-4 py-2 hover:bg-gray-100 dark:hover:bg-zinc-700 rounded-b">
                                                                                    <i class="mdi mdi-star text-[20px] ltr:mr-3 rtl:ml-3 text-gray-500"></i>
                                                                                    <span class="text-xs font-medium text-gray-700 dark:text-gray-300">{{ __('messages.t_make_a_review') }}</span>
                                                                                </a>
                                                                            </li>
                                                                        @endif

                                                                    </ul>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        {{-- Upgrades --}}
                                                        @if ($item->has('upgrades'))
                                                            <div class="mt-4">
                                                                <fieldset class="space-y-5">

                                                                    @foreach ($item->upgrades as $upgrade)
                                                                        <div class="relative flex items-start">
                                                                            <div class="flex items-center h-5">
                                                                                <input type="checkbox" class="h-4 w-4 text-gray-300 dark:text-gray-400 border-gray-200 dark:border-zinc-600 dark:disabled:bg-zinc-600 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
                                                                            </div>
                                                                            <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                                                <label class="font-medium text-gray-500 dark:text-gray-100 text-xs">
                                                                                    {{ $upgrade->title }}
                                                                                </label>
                                                                                <p class="font-normal text-gray-400">
                                                                                    <div class="mt-1 flex text-sm">
                                                                                        <p class="text-gray-400 dark:text-gray-300 text-xs">+ @money($upgrade->price, settings('currency')->code, true)</p>
                                                                    
                                                                                        @if ($upgrade->extra_days)
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-600 text-gray-400 dark:text-gray-300 text-xs">
                                                                                                {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]) }}
                                                                                            </p>
                                                                                        @else
                                                                                            <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 dark:border-zinc-600 text-gray-400 dark:text-gray-300 text-xs">
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

                                                </div>

                                                <div class="mt-6 sm:flex sm:justify-between">

                                                    {{-- You have to send requirements to seller asap --}}
                                                    @if ( $item->order->invoice->status === 'paid' && $item->status === 'pending' )
                                                        @if (!$item->gig->requirements()->exists() || !$item->is_requirements_sent)
                                                            <div class="flex items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M20.618 5.984A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016zM12 9v2m0 4h.01"/></svg>
                                                                <p class="ltr:ml-2 rtl:mr-2 text-xs font-medium text-amber-600">
                                                                    {{ __('messages.t_u_have_send_reqs_asap_to_seller') }}
                                                                </p>
                                                            </div>
                                                        @else
                                                            <div></div>
                                                        @endif
                                                    @else
                                                        <div></div>
                                                    @endif

                                                    {{-- Footer actions --}}
                                                    <div class="mt-6 border-t border-gray-200 pt-4 flex items-center space-x-4 divide-x divide-gray-200 dark:divide-zinc-600 rtl:divide-x-reverse text-sm font-medium sm:mt-0 sm:ltr:ml-4 sm:rtl:mr-4 sm:border-none sm:pt-0 rtl:space-x-reverse">

                                                        {{-- View gig --}}
                                                        <div class="flex-1 flex justify-center">
                                                            <a href="{{ url('service', $item->gig->slug) }}" target="_blank" class="text-primary-600 whitespace-nowrap hover:text-primary-600">{{ __('messages.t_view_gig') }}</a>
                                                        </div>

                                                        {{-- Send requirements --}}
                                                        @if (($item->status === 'pending' || $item->status === 'proceeded') && $item->order->invoice->status === 'paid')
                                                            <div class="flex-1 ltr:pl-4 rtl:pr-4 flex justify-center">
                                                                <a href="{{ url('account/orders/requirements?order=' . $order->uid . '&item=' . $item->uid) }}" class="text-primary-600 whitespace-nowrap hover:text-primary-600">{{ __('messages.t_send_requirements') }}</a>
                                                            </div>
                                                        @endif
                                                        
                                                    </div>

                                                </div>
                                                    
                                            </li>
                                        @endforeach

                                    </ul>

                                </div>

                                {{-- Pages --}}
                                @if ($orders->hasPages())
                                    <div class="bg-white border-t border-b border-gray-200 shadow-sm sm:rounded-lg sm:border px-4 py-5 sm:px-6 flex justify-center">
                                        {!! $orders->links('pagination::tailwind') !!}
                                    </div>
                                @endif

                            @empty
                                
                                {{-- No orders yet --}}
                                <div class="rounded-md bg-blue-50 p-4">
                                    <div class="flex">
                                        <div class="flex-shrink-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor"> <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"/></svg>
                                        </div>
                                    <div class="ltr:ml-3 rtl:mr-3 flex-1 md:flex md:justify-between">
                                        <p class="text-sm text-blue-700 font-medium">
                                            {{ __('messages.t_ur_orders_history_is_empty_right_now') }}
                                        </p>
                                        <p class="mt-3 text-sm md:mt-0 md:ltr:ml-6 md:rtl:mr-6">
                                            <a href="{{ url('/') }}" class="whitespace-nowrap font-medium text-blue-700 hover:text-blue-600">{{ __('messages.t_go_shopping') }} <span aria-hidden="true">&rarr;</span></a>
                                        </p>
                                    </div>
                                    </div>
                                </div>

                            @endforelse
                        </div>

                    </div>                  

                </div>

            </div>
        </div>
    </div>
</main>