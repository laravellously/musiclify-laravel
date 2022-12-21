<div class="w-full relative md:pt-16">

    {{-- Session error message --}}
    @if (session()->has('error'))
        <div class="mb-6 sm:max-w-md sm:w-full sm:mx-auto sm:overflow-hidden">
            <div class="rounded-md bg-red-100 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" x-description="Heroicon name: solid/x-circle" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                    </div>
                    <div class="ltr:ml-3 rtl:mr-3">
                        <p class="text-sm font-medium text-red-800">{{ session()->get('error') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
    
    <div class="bg-white dark:bg-zinc-800 sm:max-w-md sm:w-full sm:mx-auto sm:rounded-lg sm:overflow-hidden shadow-sm border dark:border-zinc-700">
        <div class="">
            <div class="px-4 py-5 sm:p-6">

                {{-- Section title --}}
                <div class="mb-6 text-center">
                    <p class="text-base font-black text-gray-700 dark:text-gray-100 text-center mb-2">
                        {{ __('messages.t_resend_verification_email') }}
                    </p>
    
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">
                        {{ __('messages.t_resend_verification_email_subtitle') }}
                    </p>
                </div>

                <div class="mt-12">
                    <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">
    
                        {{-- E-mail address --}}
                        <div class="col-span-12">
                            <x-forms.text-input
                                :label="__('messages.t_email_address')"
                                :placeholder="__('messages.t_enter_email_address')"
                                model="email"
                                type="email"
                                icon="at" />
                        </div>

                        {{-- Send --}}
                        <div class="col-span-12 mt-2">
                            <x-forms.button action="request" :text="__('messages.t_send')" :block="true" />
                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- Footer --}}
        <div class="px-4 py-6 bg-gray-50 dark:bg-zinc-700 border-t-2 border-gray-200 dark:border-zinc-700 sm:px-6 text-center">
            <a href="{{ url('auth/login') }}" class="text-xs leading-5 text-gray-600 dark:text-gray-300 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 17l-5-5m0 0l5-5m-5 5h12"/></svg>
                <span class="font-medium">{{ __('messages.t_back_to_sign_in') }}</span>
            </a>
        </div>

    </div>
</div>