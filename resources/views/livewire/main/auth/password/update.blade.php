<div class="w-full relative md:pt-12">
    <div class="bg-white dark:bg-zinc-800 sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden shadow-sm border dark:border-zinc-700">
        <div class="px-4 py-8 sm:px-10">

            <div class="mb-6 text-center">
                <p class="text-base font-black text-gray-700 dark:text-gray-100 text-center mb-2">
                    {{ __('messages.t_update_password') }}
                </p>

                <p class="text-xs font-normal text-gray-400 dark:text-gray-300">
                    {{ __('messages.t_update_password_subtitle') }}
                </p>
            </div>

            <div class="mt-12">
                <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                    {{-- Password --}}
                    <div class="col-span-12">
                        <x-forms.text-input
                            :label="__('messages.t_password')"
                            :placeholder="__('messages.t_enter_password')"
                            model="password"
                            type="password"
                            icon="lock" />
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="col-span-12">
                        <x-forms.text-input
                            :label="__('messages.t_password_confirmation')"
                            :placeholder="__('messages.t_enter_password_confirmation')"
                            model="password_confirmation"
                            type="password"
                            icon="lock" />
                    </div>

                    {{-- Update --}}
                    <div class="col-span-12 mt-2">
                        <x-forms.button action="update" :text="__('messages.t_update')" :block="true" />
                    </div>

                </div>
                
            </div>
        </div>

    </div>
</div>