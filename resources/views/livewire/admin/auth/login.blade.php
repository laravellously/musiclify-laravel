<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-3">
        <div class="grid grid-cols-12 md:gap-x-6 gap-y-6 mt-16">

            {{-- Alert --}}
            @if ($message)
                <div class="col-span-12">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <p class="text-sm text-red-500 font-medium">{{ $message }}</p>
                            </div>
                        </div>
                    </div>  
                </div>
            @endif
    
            {{-- Check if still has attempts --}}
            @if ($attemptsLeft > 0)

                {{-- E-mail address --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_email_address')"
                        :placeholder="__('messages.t_enter_email_address')"
                        model="email"
                        type="email"
                        icon="at" />
                </div>

                {{-- Password --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_password')"
                        :placeholder="__('messages.t_enter_password')"
                        model="password"
                        type="password"
                        icon="lock" />
                </div>

                {{-- Login --}}
                <div class="col-span-12 mt-2">
                    <x-forms.button action="login" :text="__('messages.t_login')" :block="true" />
                </div>

                {{-- reCaptcha --}}
                @if (settings('security')->is_recaptcha)
                    <div class="col-span-12">
                        <x-honey recaptcha/>
                    </div>
                @endif
                
            @else
            
                {{-- Failed attempts --}}
                <div class="col-span-12">
                    <div class="bg-red-50 border-l-4 border-red-400 p-4">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-400" viewBox="0 0 20 20" fill="currentColor"> <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd"/></svg>
                            </div>
                            <div class="ltr:ml-3 rtl:mr-3">
                                <p class="text-sm text-red-500 font-medium">{!! __('messages.t_too_many_login_attempts_pls_try_after_seconds', ['seconds' => $retryAfter]) !!}</p>
                            </div>
                        </div>
                    </div>  
                </div>

            @endif

        </div>
    </div>
</div>  

@if ($attemptsLeft < 0)
    @push('scripts')
        <script>
                var timeleft = {{ $retryAfter }};
                var timer    = setInterval(function(){
                    if(timeleft === 0){
                        clearInterval(timer);
                        // Refresh the page
                        window.location.reload();
                    } else {
                        document.getElementById("countdown-seconds").innerHTML = timeleft;
                    }
                    timeleft -= 1;
                }, 1000);
        </script>
    @endpush
@endif