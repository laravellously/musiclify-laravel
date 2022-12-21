<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_projects_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_projects_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Enable projects section --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_projects_section')"
                        model="is_enabled" />
                </div>

                {{-- Auto approve projects --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_projects')"
                        model="auto_approve_projects" />
                </div>

                {{-- Enable free posting --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_free_posting')"
                        model="is_free_posting" />
                </div>

                {{-- Enable premium posting --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_premium_posting')"
                        model="is_premium_posting" />
                </div>

                {{-- Commission type --}}
                <div class="col-span-12">
                    <div class="w-full" wire:ignore>
                        <x-forms.select2
                            :label="__('messages.t_commission_type')"
                            :placeholder="__('messages.t_choose_commission_type')"
                            model="commission_type"
                            :options="[ ['text' => __('messages.t_percentage_amount'), 'value' => 'percentage'], ['text' => __('messages.t_fixed_amount'), 'value' => 'fixed'] ]"
                            :isDefer="true"
                            :isAssociative="false"
                            :componentId="$this->id"
                            value="value"
                            text="text" />
                    </div>
                </div>

                {{-- Commission from publisher --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_commission_from_publisher')"
                        :placeholder="__('messages.t_enter_commission_value')"
                        model="commission_from_publisher"
                        icon="school" />
                </div>

                {{-- Commission from freelancer --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_commission_from_freelancer')"
                        :placeholder="__('messages.t_enter_commission_value')"
                        model="commission_from_freelancer"
                        icon="account" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    