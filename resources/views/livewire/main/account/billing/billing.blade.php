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
                    <div class="py-6 px-4 sm:p-6 lg:pb-8 h-[calc(100%-80px)]">

                        {{-- Section header --}}
                        <div class="mb-14">
                            <h2 class="text-base leading-6 font-bold text-gray-900 dark:text-gray-100">{{ __('messages.t_billing_information') }}</h2>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">{{ __('messages.t_billing_information_subtitle') }}</p>
                        </div>
                        
                        {{-- Section content --}}
                        <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                            {{-- Session flash message --}}
                            @if (session()->has('message'))
                                <div class="col-span-12 mb-10">
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
                                </div>
                            @endif

                            {{-- Firstname --}}
                            <div class="col-span-12 md:col-span-6">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_firstname') }}" 
                                    placeholder="{{ __('messages.t_enter_firstname') }}" 
                                    model="firstname"
                                    icon="account" />
                            </div>

                            {{-- Lastname --}}
                            <div class="col-span-12 md:col-span-6">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_lastname') }}" 
                                    placeholder="{{ __('messages.t_enter_lastname') }}" 
                                    model="lastname"
                                    icon="account" />
                            </div>

                            {{-- Company --}}
                            <div class="col-span-12">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_company') }}" 
                                    placeholder="{{ __('messages.t_enter_company_optional') }}" 
                                    model="company"
                                    icon="domain" />
                            </div>

                            {{-- City --}}
                            <div class="col-span-12 md:col-span-6">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_city') }}" 
                                    placeholder="{{ __('messages.t_enter_city') }}" 
                                    model="city"
                                    icon="city" />
                            </div>

                            {{-- Zip --}}
                            <div class="col-span-12 md:col-span-6">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_zip') }}" 
                                    placeholder="{{ __('messages.t_enter_zip') }}" 
                                    model="zip"
                                    icon="mailbox" />
                            </div>

                            {{-- Country --}}
                            <div class="col-span-12">
                                <div class="w-full" wire:ignore>
                                    <x-forms.select2
                                        :label="__('messages.t_country')"
                                        :placeholder="__('messages.t_choose_country')"
                                        model="country"
                                        :options="$countries"
                                        :isDefer="true"
                                        :isAssociative="false"
                                        :componentId="$this->id"
                                        value="id"
                                        text="name" />
                                </div>
                            </div>

                            {{-- Address --}}
                            <div class="col-span-12">
                                <x-forms.textarea 
                                    label="{{ __('messages.t_address') }}" 
                                    placeholder="{{ __('messages.t_enter_address') }}" 
                                    model="address"
                                    rows="8"
                                    icon="map-marker" />
                            </div>

                            {{-- VAT number --}}
                            <div class="col-span-12">
                                <x-forms.text-input 
                                    label="{{ __('messages.t_vat_number') }}" 
                                    placeholder="{{ __('messages.t_enter_vat_number_optional') }}" 
                                    model="vat_number"
                                    icon="percent" />
                            </div>

                        </div>

                    </div>

                    {{-- Actions --}}
                    <div class="py-4 px-4 flex justify-end sm:px-6 bg-gray-50 dark:bg-zinc-700 h-20">
                        <x-forms.button action="update" text="{{ __('messages.t_update') }}"  />
                    </div>                    

                </div>

            </div>
        </div>
    </div>
</main>