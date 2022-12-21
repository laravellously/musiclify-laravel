<div class="w-full" x-data="window.krLSMcHnnEKMpVx" x-init="initialize" id="component-create-gig-pricing">

    {{-- Pricing --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700">

        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_pricing') }}</h3>
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_create_gig_pricing_subtitle') }}</p>
                </div>
                <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                    <button wire:key="add-upgrade-btn" id="modal-add-service-upgrade-button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/></svg>
                        <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                            {{ __('messages.t_add_service_upgrade') }}
                        </span>
                    </button>
                </div>
            </div>
        </div>

        {{-- Section content --}}
        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

            {{-- Service price --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.text-input 
                    label="{{ __('messages.t_price') }}" 
                    placeholder="{{ __('messages.t_price_placeholder_0_00') }}" 
                    model="price"
                    suffix="{{ $currency_symbol }}" />
            </div>

            {{-- Delivery time --}}
            <div class="col-span-12 md:col-span-6">
                <x-forms.select2
                    :label="__('messages.t_delivery_time')"
                    :placeholder="__('messages.t_choose_delivery_time')"
                    model="delivery_time"
                    :options="$available_deliveries"
                    :isDefer="true"
                    :isAssociative="false"
                    :componentId="$this->id"
                    value="value"
                    text="text"
                    class="select2_pricing" />
            </div>

        </div>

    </div>

    {{-- List of upgrades --}}
    @foreach ($upgrades as $key => $upgrade)
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" id="scroll-to-upgrade-id-{{ $key }}" wire:key="create-gig-pricing-upgrade-id-{{ $key }}">

            {{-- Upgrade title --}}
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-sm leading-6 font-bold tracking-wide text-gray-900 dark:text-gray-100">{{ __('messages.t_upgrade_number', ['number' => $key+1]) }}</h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ $upgrade['title'] }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button wire:click="removeUpgrade({{ $key }})" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                {{ __('messages.t_remove_upgrade') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Upgrade form --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 px-8 py-6">

                {{-- Upgrade title --}}
                <div class="col-span-12" wire:key="{{ uid() }}">
                    <x-forms.text-input 
                        label="{{ __('messages.t_upgrade_title') }}" 
                        placeholder="{{ __('messages.t_enter_upgrade_title') }}" 
                        model="upgrades.{{ $key }}.title"
                        icon="format-title" />
                </div>
        
                {{-- Upgrade price --}}
                <div class="col-span-12 md:col-span-6" wire:key="{{ uid() }}">
                    <x-forms.text-input 
                        label="{{ __('messages.t_price') }}" 
                        placeholder="{{ __('messages.t_price_placeholder_0_00') }}" 
                        model="upgrades.{{ $key }}.price"
                        suffix="{{ $currency_symbol }}" />
                </div>

                {{-- Delivery time --}}
                <div class="col-span-12 md:col-span-6" wire:key="{{ uid() }}">
                    <div class="relative {{ $errors->first('upgrades.' . $key . '.extra_days') ? 'select2-custom-has-error' : '' }}">
                        <label class="text-xs font-semibold block mb-2 {{ $errors->first('upgrades.' . $key . '.extra_days') ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-gray-100' }}">{{ __('messages.t_delivery_time') }}</label>
                        <select x-data="initSelect2DeliveryTime('select2-id-upgrades-{{ $key }}-extra_days', {{ $key }})" data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:model.defer="upgrades.{{ $key }}.extra_days" id="select2-id-upgrades-{{ $key }}-extra_days" data-placeholder="{{ __('messages.t_choose_delivery_time') }}" data-search-off class="select2_pricing" x-on:change="changed">
                            <option value=""></option>
                            @foreach ($available_deliveries as $key => $option)
                                    <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                        @error('upgrades.' . $key . '.extra_days')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('upgrades.' . $key . '.extra_days') }}</p>
                        @enderror
                    
                    </div>
                </div>
            </div>

        </div>
    @endforeach
        
    {{-- Actions --}}
    <div class="flex justify-between">
        <x-forms.button action="back" text="{{ __('messages.t_back') }}" active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300"  />
        <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
    </div> 

    {{-- ** Modal ** --}}
    <x-forms.modal id="modal-add-service-upgrade-container" target="modal-add-service-upgrade-button" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_add_service_upgrade') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Upgrade title --}}
                <div class="col-span-12" wire:key="{{ uid() }}">
                    <div class="flex-grow relative">
                        <span class="absolute top-2/4 left-3 -translate-y-1/2 z-10 text-xs font-normal {{ $errors->first('add_upgrade.title') ? 'text-red-600' : 'text-black dark:text-gray-100' }}">{{ __('messages.t_i_will') }}</span>
                        <div class="w-full inline-block relative">
                            <div class="relative">
                                <input wire:model.defer="add_upgrade.title" class="indent-7 dark:bg-transparent block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal {{ $errors->first('add_upgrade.title') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100' }}" type="text" placeholder="{{ __('messages.t_describe_ur_offering') }}">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <i class="mdi mdi-format-title {{ $errors->first('add_upgrade.title') ? 'text-red-400' : 'text-gray-400' }}"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Error --}}
                    @error('add_upgrade.title')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_upgrade.title') }}</p>
                    @enderror
                </div>

                {{-- Upgrade price --}}
                <div class="col-span-12" wire:key="{{ uid() }}">
                    <div class="flex-grow relative">
                        <input wire:model.defer="add_upgrade.price" class="dark:bg-transparent block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal {{ $errors->first('add_upgrade.price') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100' }}" type="text" placeholder="{{ __('messages.t_for_and_extra_price') }}">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="{{ $errors->first('add_upgrade.price') ? 'text-red-400' : 'text-gray-400' }}">{{ $currency_symbol }}</span>
                        </div>
                    </div>
                    {{-- Error --}}
                    @error('add_upgrade.price')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_upgrade.price') }}</p>
                    @enderror
                </div>

                {{-- Upgrade extra days --}}
                <div class="col-span-12" wire:key="{{ uid() }}">
                    <div class="relative {{ $errors->first('add_upgrade.extra_days') ? 'select2-custom-has-error' : '' }}">
                    
                        <select data-pharaonic="select2" data-component-id="{{ $this->id }}" wire:model.defer="add_upgrade.extra_days" id="select2-id-add_upgrade.extra_days" data-placeholder="{{ __('messages.t_and_an_additional_days') }}" data-search-off class="select2_pricing">
                            <option value=""></option>
                            @foreach ($available_deliveries as $key => $option)
                                    <option value="{{ $option['value'] }}">{{ $option['text'] }}</option>
                            @endforeach
                        </select>
                        @error('add_upgrade.extra_days')
                            <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('add_upgrade.extra_days') }}</p>
                        @enderror
                    
                    </div>
                </div>

            </div>
        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-forms.button action="addUpgrade" text="{{ __('messages.t_add') }}" :block="0"  />
        </x-slot>

    </x-forms.modal>

</div>


@push('scripts')
    
    {{-- AlpineJS --}}
    <script>
        function krLSMcHnnEKMpVx() {
            return {

                initSelect2DeliveryTime(id, key) {
                    $('#' + id).select2().on('change', function(){
                        @this.set('upgrades.' + key + '.extra_days', $(this).val());
                    });
                },

                initialize() {

                }

            }
        }
        window.krLSMcHnnEKMpVx = krLSMcHnnEKMpVx();
    </script>

@endpush