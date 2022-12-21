<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_create_language') }}</h2>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- language name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_language_name')"
                        :placeholder="__('messages.t_enter_language_name')"
                        model="name"
                        icon="format-title" />
                </div>

                {{-- Language code --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_language_code')"
                        :placeholder="__('messages.t_enter_language_code')"
                        model="language_code"
                        icon="flag-triangle" />
                </div>

                {{-- Country code --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_country_code')"
                        :placeholder="__('messages.t_enter_country_code')"
                        model="country_code"
                        icon="flag-variant" />
                </div>

                {{-- Language status --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_this_language')"
                        model="is_active" />
                </div>

                {{-- Language direction --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_force_rtl_for_this_language')"
                        model="force_rtl" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="create" text="{{ __('messages.t_create') }}" :block="false"  />
        </div>                    

    </div>

</div>    