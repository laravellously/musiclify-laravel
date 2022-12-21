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
                    <div class="py-6 px-4 sm:p-6 lg:pb-8">

                        {{-- Section header --}}
                        <div class="mb-14 lg:flex lg:items-center lg:justify-between">
                            <div class="flex-1 min-w-0">
                                <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_delivered_work') }}</h2>
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_download_received_files_from_seller') }}</p>
                            </div>
                            @if (!$item->is_finished && $item->status === 'delivered')
                                <div class="mt-5 flex lg:mt-0 lg:ltr:ml-4 lg:rtl:mr-4">
                                
                                    {{-- Request refund --}}
                                    @if (!$item->refund)
                                        <span class="block">
                                            <a href="{{ url('account/refunds/request', $item->uid) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-zinc-600 rounded-sm shadow-sm text-xs font-bold tracking-wide text-gray-700 dark:text-gray-200 bg-white dark:bg-zinc-600 hover:bg-gray-50 dark:hover:bg-zinc-800 focus:outline-none focus:ring-2 focus:ring-offset-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4 text-gray-500 dark:text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
                                                {{ __('messages.t_request_refund') }}
                                            </a>
                                        </span>
                                    @endif
                                
                                    {{-- Job completed --}}
                                    <span class="ltr:ml-3 rtl:mr-3">
                                        <button x-on:click='confirm("{{ __('messages.t_are_sure_completed_work_buyer') }}") ? $wire.completed() : "" ' wire:loading.attr="disabled" wire:target="completed" type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-sm shadow-sm text-xs font-bold tracking-wide text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500">
                                            <svg class="ltr:-ml-1 ltr:mr-2 rtl:-mr-1 rtl:ml-2 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/> </svg>
                                            {{ __('messages.t_work_completed') }} 
                                        </button>
                                    </span>

                                </div>
                            @endif
                        </div>

                        {{-- Notification --}}
                        @if (!$item->is_finished)
                            <div class="flex items-center mb-8 text-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-xs font-medium tracking-wide ltr:ml-2 rtl:mr-2">{{ __('messages.t_order_item_will_mark_done_after_1_week', ['date' => format_date($item->delivered_at, 'F j, Y')]) }}</span>
                            </div>
                        @endif
                        
                        {{-- Section content --}}
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            {{-- Chat with the seller --}}
                            <div class="col-span-12 xl:col-span-6">
                                <section>
                                    <div class="rounded-lg bg-white dark:bg-zinc-700 overflow-hidden border border-gray-200 dark:border-zinc-600">
                                        
                                        {{-- Section title --}}
                                        <div class="bg-gray-50 dark:bg-zinc-600 px-8 py-4 rounded-t-md">
                                            <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                                <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_conversation_with_seller') }}</h3>
                                                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_communicate_with_seller_about_changes') }}</p>
                                                </div>
                                                <div class="ltr:ml-4 rtl:mr-4 mt-4 flex-shrink-0">
                                                    <a href="{{ url('account/orders') }}" class="inline-flex items-center py-2 px-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-600 ltr:mr-2 rtl:ml-2" " fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                                                        <span class="text-xs font-medium text-primary-600 hover:text-primary-600"> 
                                                            {{ __('messages.t_back_to_orders') }}
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                        <div>

                                            {{-- Chat messages --}}
                                            <div class="w-full">
                                                <ul role="list" class="py-6 px-8">

                                                    @foreach ($item->conversation as $message)
                                                        <li wire:key="seller-deliver-order-msg-id-{{ $message->id }}">
                                                            <div class="relative pb-8">
                                                                @if (!$loop->last)
                                                                    <span class="absolute top-5 ltr:left-5 rtl:right-5 ltr:-ml-px rtl:-mr-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                                @endif
                                                                <div class="relative flex items-start space-x-3 rtl:space-x-reverse">
                                                                    <div class="relative">
                                                                        <img class="h-10 w-10 rounded-md bg-gray-400 flex items-center justify-center ring-8 ring-white dark:ring-zinc-700 object-cover" src="{{ src($message->from->avatar) }}" alt="{{ $message->from->username }}">
                                                                    </div>
                                                                    <div class="min-w-0 flex-1">
                                                                    <div>
                                                                        <div class="text-sm">
                                                                            <a href="{{ url('profile', $message->from->username) }}" target="_blank" class="font-medium text-gray-900 dark:text-gray-100">{{ $message->from->username }}</a>
                                                                        </div>
                                                                        <p class="mt-1 text-xs text-gray-500">{{ format_date($message->created_at, 'ago') }}</p>
                                                                    </div>
                                                                    <div class="mt-2 text-sm text-gray-700 dark:text-gray-100">
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
                                            @if (!$item->is_finished)
                                                <div class="mt-auto w-full px-8 py-10 border-t bg-gray-50 dark:border-zinc-700 dark:bg-zinc-600 rounded-br-md">
                                                    <div class="flex items-start space-x-4 rtl:space-x-reverse">
                                                        <div class="flex-shrink-0">
                                                            <img class="inline-block h-10 w-10 rounded-full object-cover" src="{{ src(auth()->user()->avatar) }}" alt="{{ auth()->user()->username }}">
                                                        </div>
                                                        <div class="min-w-0 flex-1">
                                                            <div class="relative">
                                                                <div class="border border-gray-300 dark:border-zinc-500 rounded-lg shadow-sm overflow-hidden focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                                                                    <textarea rows="3" maxlength="750" wire:model.defer="message" class="block w-full py-3 border-0 resize-none focus:ring-0 sm:text-sm dark:bg-transparent dark:text-gray-200 dark:placeholder-gray-300" placeholder="{{ __('messages.t_type_ur_message_here') }}"></textarea>
                                                                    <div class="py-2" aria-hidden="true">
                                                                        <div class="py-px">
                                                                            <div class="h-9"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        
                                                                <div class="absolute bottom-0 inset-x-0 ltr:pl-3 ltr:pr-2 rtl:pr-3 rtl:pl-2 py-2 flex justify-between">
                                                                    <div></div>
                                                                    <div class="flex-shrink-0">
                                                                        <button wire:click="sendMessage" wire:loading.attr="disabled" wire:target="sendMessage" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-primary-600 hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-700 dark:ring-offset-primary-600">{{ __('messages.t_send') }}</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>

                                    </div>
                                </section>
                            </div>

                            {{-- Delivered work --}}
                            <div class="col-span-12 xl:col-span-6">

                                {{-- Download files --}}
                                @if ($item->delivered_work)
                                    <section class="mb-6">
                                        <div class="rounded-lg bg-white dark:bg-zinc-700 overflow-hidden border border-gray-200 dark:border-zinc-600">
                                            <div class="bg-gray-50 dark:bg-zinc-600 px-8 py-4 rounded-t-md">
                                                <div class="ltr:-ml-4 rtl:-mr-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                                                    <div class="ltr:ml-4 rtl:mr-4 mt-4">
                                                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-100">{{ __('messages.t_download_files') }}</h3>
                                                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_always_scan_files_before_open_delivered_work') }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="px-8 py-5">
                                                
                                                {{-- File details --}}
                                                @if ($item->delivered_work->attached_work)
                                                    <div class="flex items-center justify-between space-x-3 mb-6 rtl:space-x-reverse">
                                                        <div class="min-w-0 flex-1 flex items-center space-x-3 rtl:space-x-reverse">
                                                            <div class="flex-shrink-0">
                                                                <svg class="w-10" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve"><path style="fill:#ECEDEF;" d="M100.641,0c-14.139,0-25.6,11.461-25.6,25.6v460.8c0,14.139,11.461,25.6,25.6,25.6h375.467c14.139,0,25.6-11.461,25.6-25.6V85.333L416.375,0H100.641z"></path><path style="fill:#D9DCDF;" d="M441.975,85.333h59.733L416.375,0v59.733C416.375,73.872,427.836,85.333,441.975,85.333z"></path><path style="fill:#C6CACF;" d="M399.308,42.667H75.041v153.6h324.267c4.713,0,8.533-3.821,8.533-8.533V51.2C407.841,46.487,404.02,42.667,399.308,42.667z"></path><path style="fill:#FFC44F;" d="M382.241,179.2H18.843c-7.602,0-11.41-9.191-6.034-14.567L75.041,102.4L12.809,40.167C7.433,34.791,11.241,25.6,18.843,25.6h363.398c4.713,0,8.533,3.821,8.533,8.533v136.533C390.775,175.379,386.954,179.2,382.241,179.2z"></path><g><path style="fill:#FFFFFF;" d="M194.508,128H170.06l31.003-37.203c2.119-2.544,2.577-6.084,1.173-9.083c-1.405-2.998-4.417-4.914-7.728-4.914h-42.667c-4.713,0-8.533,3.821-8.533,8.533s3.821,8.533,8.533,8.533h24.448l-31.003,37.203c-2.119,2.544-2.577,6.084-1.173,9.083c1.405,2.998,4.417,4.914,7.728,4.914h42.667c4.713,0,8.533-3.821,8.533-8.533S199.22,128,194.508,128z"></path><path style="fill:#FFFFFF;" d="M220.108,76.8c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-51.2C228.641,80.621,224.82,76.8,220.108,76.8z"></path><path style="fill:#FFFFFF;" d="M279.841,76.8h-34.133c-4.713,0-8.533,3.821-8.533,8.533v51.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h25.6c4.713,0,8.533-3.821,8.533-8.533v-25.6C288.375,80.621,284.554,76.8,279.841,76.8z M271.308,102.4h-17.067v-8.533h17.067V102.4z"></path></g><path style="fill:#A1A7AF;" d="M416.37,332.8c-1.927,0-3.863-0.649-5.458-1.978l-51.2-42.667c-1.946-1.621-3.071-4.023-3.071-6.556s1.125-4.934,3.071-6.556l51.2-42.667c3.62-3.017,9.001-2.527,12.018,1.092c3.018,3.621,2.528,9.002-1.092,12.019L378.504,281.6l43.333,36.111c3.621,3.018,4.111,8.398,1.092,12.019C421.243,331.755,418.815,332.8,416.37,332.8z"></path><g><path style="fill:#55606E;" d="M313.975,315.733c-4.713,0-8.533-3.821-8.533-8.533v-25.6c0-4.713,3.821-8.533,8.533-8.533s8.533,3.821,8.533,8.533v25.6C322.508,311.913,318.687,315.733,313.975,315.733z"></path><path style="fill:#55606E;" d="M365.175,273.067h-17.067V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533s-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-34.133V256c0-4.713-3.821-8.533-8.533-8.533c-4.713,0-8.533,3.821-8.533,8.533v17.067h-17.067c-4.713,0-8.533,3.821-8.533,8.533c0,4.713,3.821,8.533,8.533,8.533h42.667V307.2c0,4.713,3.821,8.533,8.533,8.533c4.713,0,8.533-3.821,8.533-8.533v-17.067h34.133V307.2c0,4.713,3.821,8.533,8.533,8.533s8.533-3.821,8.533-8.533v-17.067h93.867c4.713,0,8.533-3.821,8.533-8.533C373.708,276.887,369.887,273.067,365.175,273.067z"></path><path style="fill:#55606E;" d="M365.175,349.333c-4.419,0-8-3.582-8-8V281.6c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v59.733C373.175,345.751,369.594,349.333,365.175,349.333z"></path></g><path style="fill:#F79F4D;" d="M333.54,364.434l25.6-25.6c3.332-3.332,8.736-3.332,12.068,0l25.6,25.6c1.6,1.6,2.499,3.771,2.499,6.034V460.8c0,4.713-3.821,8.533-8.533,8.533h-51.2c-4.713,0-8.533-3.821-8.533-8.533v-90.332C331.041,368.205,331.94,366.034,333.54,364.434z"></path><polygon style="fill:#FFC44F;" points="339.575,460.8 339.575,370.467 365.175,344.867 390.775,370.467 390.775,460.8 "></polygon><g><path style="fill:#BF722A;" d="M365.175,451.733c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,448.151,369.594,451.733,365.175,451.733z"></path><path style="fill:#BF722A;" d="M365.175,400.533c-4.419,0-8-3.582-8-8v-17.067c0-4.418,3.581-8,8-8c4.419,0,8,3.582,8,8v17.067C373.175,396.951,369.594,400.533,365.175,400.533z"></path></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                                                            </div>
                                                            <div class="min-w-0 flex-1">
                                                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate pb-2">
                                                                    {{ $item->delivered_work->attached_work['id'] }}.{{ $item->delivered_work->attached_work['extension'] }}
                                                                </p>
                                                                <p class="text-xs font-[400] text-gray-400 truncate">
                                                                    {{ human_filesize($item->delivered_work->attached_work['size']) }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                {{-- Download button --}}
                                                @if ($item->delivered_work->attached_work)
                                                    <a href="{{ url('uploads/delivered/' . $item->order->uid . '/' . $item->uid . '/' . $item->delivered_work->id . '/' . $item->delivered_work->attached_work['id']) }}" target="_blank" class="w-full inline-flex items-center justify-center py-3 px-4 border border-transparent rounded-full bg-gray-100 dark:bg-zinc-800 dark:hover:bg-zinc-900 hover:bg-gray-200 focus:outline-none focus:ring-0 mb-6">
                                                        <span class="text-sm font-medium text-gray-700 dark:text-gray-400">
                                                            {{ __('messages.t_download') }}
                                                        </span>
                                                    </a>
                                                @endif

                                                {{-- Message from seller --}}    
                                                @if ($item->delivered_work->quick_response)
                                                    <div class="flex flex-col space-y-4 overflow-y-auto">
                                                        <div class="flex items-center">
                                                            <div class="flex flex-col space-y-2 text-sm ltr:ml-2 rtl:mr-2 order-2 items-center">
                                                                <div>
                                                                    <span class="px-4 py-2 rounded-lg italic inline-block bg-gray-100 dark:bg-zinc-600 text-gray-900 dark:text-gray-200 w-full">
                                                                        {{ $item->delivered_work->quick_response }}
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <img src="{{ src($item->owner->avatar) }}" alt="{{ $item->owner->username }}" class="w-10 h-10 rounded-full order-1 object-cover">
                                                        </div>
                                                    </div>
                                                @endif
                                                
                                            </div>
                                        </div>
                                    </section>
                                @endif

                            </div>

                        </div>

                    </div>                  

                </div>

            </div>
        </div>
    </div>
</main>