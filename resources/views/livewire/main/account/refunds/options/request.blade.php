<main class="w-full">
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
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_request_refund') }}
                            </h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_request_refund_subtitle') }}</p>
                        </div>

                        {{-- Section content --}}
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            {{-- Item details --}}
                            <div class="col-span-12 mb-10">
                                <div class="bg-white dark:bg-zinc-700 border-gray-200 dark:border-zinc-600 border-dashed border-2 rounded-md">
                                    <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
                                        <div class="sm:flex lg:col-span-7">
                                            <div class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-28 sm:h-28">
                                                <img src="{{ src($item->gig->thumbnail) }}" alt="{{ $item->gig->title }}" class="w-full h-full object-center object-cover sm:w-full sm:h-full">
                                            </div>

                                            <div class="mt-6 sm:mt-0 sm:ltr:ml-6 sm:rtl:mr-6">
                                                <h3 class="text-base font-medium text-gray-900 dark:text-gray-100 dark:hover:text-primary-600 hover:text-primary-600">
                                                    <a href="{{ url('service', $item->gig->slug) }}" target="_blank">{{ $item->gig->title }}</a>
                                                </h3>
                                                @if ($item->has('upgrades'))
                                                    <div class="mt-3 text-sm text-gray-600 dark:text-gray-400">
                                                        <fieldset class="space-y-5">

                                                            @foreach ($item->upgrades as $upgrade)
                                                                <div class="relative flex items-start">
                                                                    <div class="flex items-center h-5">
                                                                        <input type="checkbox" class="h-4 w-4 text-gray-300 border-gray-200 dark:border-zinc-600 border-2 rounded-sm cursor-not-allowed pointer-events-none" checked disabled>
                                                                    </div>
                                                                    <div class="ltr:ml-3 rtl:mr-3 text-sm mt-[-3px]">
                                                                        <label class="font-medium text-gray-500 text-xs">{{ $upgrade->title }}</label>
                                                                        <p class="font-normal text-gray-400">
                                                                            <div class="mt-1 flex text-sm">
                                                                                <p class="text-gray-400 text-xs">+ @money($upgrade->price, settings('currency')->code, true)</p>
                                                            
                                                                                @if ($upgrade->extra_days)
                                                                                    <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
                                                                                        {{ __('messages.t_extra_days_delivery_time_short', ['time' => delivery_time_trans($upgrade->extra_days)]) }}
                                                                                    </p>
                                                                                @else
                                                                                    <p class="ltr:ml-4 rtl:mr-4 ltr:pl-4 rtl:pr-4 ltr:border-l rtl:border-r border-gray-200 text-gray-400 text-xs">
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

                                        <div class="mt-6 lg:mt-0 lg:col-span-5">
                                            <dl class="grid grid-cols-2 gap-x-6 text-sm">
                                                <div>
                                                    <dt class="font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_amount') }}</dt>
                                                    <dd class="mt-3 text-gray-500 dark:text-gray-300">
                                                        <span class="block">@money($item->total_value, settings('currency')->code, true)</span>
                                                    </dd>
                                                </div>
                                                <div>
                                                    <dt class="font-medium text-gray-900 dark:text-gray-200">{{ __('messages.t_quantity') }}</dt>
                                                    <dd class="mt-3 text-gray-500 dark:text-gray-300 space-y-3">
                                                        {{ $item->quantity }}
                                                    </dd>
                                                </div>
                                            </dl>
                                        </div>
                                    </div>

                                    <div class="border-t-2 border-dashed border-gray-200 dark:border-zinc-600 py-6 px-4 sm:px-6 lg:p-8">
                                        <h4 class="sr-only">Status</h4>
                                        <p class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('messages.t_expected_delivery_date_on_date', ['date' => format_date($item->expected_delivery_date, 'F j, Y h:i A')]) }}</p>
                                        <div class="mt-6" aria-hidden="true">

                                            @php
                                                if ($item->status === 'pending') {
                                                    $width = "10%";
                                                } else if ($item->status === 'proceeded') {
                                                    $width = "50%";
                                                } else if ($item->status === 'delivered') {
                                                    $width = "100%";
                                                }
                                                    
                                            @endphp

                                            <div class="bg-gray-200 dark:bg-zinc-500 rounded-full overflow-hidden">
                                                <div class="h-2 bg-primary-600 rounded-full"
                                                    style="width: {{ $width }};"></div>
                                            </div>
                                            <div class="hidden sm:grid grid-cols-3 text-sm font-medium text-gray-600 mt-6">
                                                <div class="text-primary-600">{{ __('messages.t_order_placed') }}</div>
                                                <div class="text-center {{ in_array($item->status, ['proceeded', 'delivered']) ? 'text-primary-600' : '' }}">{{ __('messages.t_processing') }}</div>
                                                <div class="ltr:text-right rtl:text-left {{ $item->status === 'delivered' ? 'text-primary-600' : '' }}">{{ __('messages.t_delivered') }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Reason --}}
                            <div class="col-span-12">
                                <x-forms.textarea 
                                    label="{{ __('messages.t_reason') }}"
                                    placeholder="{{ __('messages.t_enter_refund_reason') }}" 
                                    model="reason"
                                    :rows="18" 
                                    icon="card-text-outline" />
                            </div>

                            {{-- Button --}}
                            <div class="col-span-12">
                                <x-forms.button action="request" :text="__('messages.t_request_refund')" :block="true" />
                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</main>
