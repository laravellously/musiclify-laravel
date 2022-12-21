<footer class="bg-white dark:bg-zinc-800 px-4 sm:px-6 lg:px-60 pt-20 pb-10 lg:pb-20 relative z-10" x-data="window.vZeNLeukZPSQcld">
    <div class="container mx-auto px-4">

        {{-- Grid (PAGES) --}}
        <div class="grid grid-cols-1 md:gap-x-6 gap-y-6 mb-10 lg:grid-cols-12 md:grid-cols-6 sm:grid-cols-2">

            {{-- Column 1 --}}
            <div class="col-span-3">

                {{-- Column title --}}
                <div class="font-bold text-sm text-gray-700 mb-4 uppercase dark:text-white tracking-widest">
                    {{ __('messages.t_footer_column_1') }}
                </div>

                {{-- Column pages --}}
                @if (count($pages))
                    <ul>
                        @foreach ($pages as $page)
                            @if ($page->column == 1)
                                <li>
                                    @if ($page->is_link && $page->link)
                                        <a href="{{ $page->link }}" target="_blank" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @else
                                        <a href="{{ url('page', $page->slug) }}" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

            </div>

            {{-- Column 2 --}}
            <div class="col-span-3">
                
                {{-- Column title --}}
                <div class="font-bold text-sm text-gray-700 mb-4 uppercase dark:text-white tracking-widest">
                    {{ __('messages.t_footer_column_2') }}
                </div>
                
                {{-- Column pages --}}
                @if (count($pages))
                    <ul>
                        @foreach ($pages as $page)
                            @if ($page->column == 2)
                                <li>
                                    @if ($page->is_link && $page->link)
                                        <a href="{{ $page->link }}" target="_blank" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @else
                                        <a href="{{ url('page', $page->slug) }}" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

            </div>

            {{-- Column 3 --}}
            <div class="col-span-3">
                
                {{-- Column title --}}
                <div class="font-bold text-sm text-gray-700 mb-4 uppercase dark:text-white tracking-widest">
                    {{ __('messages.t_footer_column_3') }}
                </div>

                {{-- Column pages --}}
                @if (count($pages))
                    <ul>
                        @foreach ($pages as $page)
                            @if ($page->column == 3)
                                <li>
                                    @if ($page->is_link && $page->link)
                                        <a href="{{ $page->link }}" target="_blank" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @else
                                        <a href="{{ url('page', $page->slug) }}" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

            </div>

            {{-- Column 4 --}}
            <div class="col-span-3">
                
                {{-- Column title --}}
                <div class="font-bold text-sm text-gray-700 mb-4 uppercase dark:text-white tracking-widest">
                    {{ __('messages.t_footer_column_4') }}
                </div>

                {{-- Column pages --}}
                @if (count($pages))
                    <ul>
                        @foreach ($pages as $page)
                            @if ($page->column == 4)
                                <li>
                                    @if ($page->is_link && $page->link)
                                        <a href="{{ $page->link }}" target="_blank" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @else
                                        <a href="{{ url('page', $page->slug) }}" class="block font-normal text-gray-400 hover:text-gray-600 hover:underline dark:text-gray-100 dark:hover:text-gray-50 text-sm mb-2">
                                            {{ $page->title }}
                                        </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif

                @if (settings('footer')->is_language_switcher && settings('appearance')->is_dark_mode)
                    <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 sm:gap-x-2">
                        
                        {{-- Change language --}}
                        @if (settings('footer')->is_language_switcher)
                            <button @click="languages = !languages" class="inline-flex items-center px-2.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 dark:bg-zinc-600 dark:text-gray-300 dark:border-zinc-600 dark:focus:ring-offset-zinc-600 dark:hover:bg-zinc-800">
                                <img src="{{ url('public/img/flags/rounded/'. strtolower($default_country_code) .'.svg') }}" alt="" class="w-4 h-4 ltr:mr-3 rtl:ml-3">
                                <span class="text-xs font-semibold text-gray-500 dark:text-gray-300 whitespace-nowrap">{{ $default_language_name }}</span>
                                <i class="mdi mdi-chevron-down ltr:ml-1 rtl:mr-1"></i>
                            </button>
                        @endif
        
                        {{-- Dark mode --}}
                        @if (settings('appearance')->is_dark_mode && (Cookie::get('dark_mode') === 'disabled' || is_null(Cookie::get('dark_mode'))))
                            <button 
                                wire:click="toggleDarkMode"
                                wire:loading.attr="disabled" 
                                class="inline-flex items-center px-2.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600  disabled:cursor-not-allowed">
        
                                {{-- Loading indicator --}}
                                <div wire:loading wire:target="toggleDarkMode">
                                    <svg role="status" class="w-4 h-4 ltr:mr-3 rtl:ml-3 block text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                </div>
        
                                {{-- Dark mode icon --}}
                                <div wire:loading.remove wire:target="toggleDarkMode">
                                    <svg class="w-4 h-4 ltr:mr-3 rtl:ml-3" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M9.822 2.238a9 9 0 0 0 11.94 11.94C20.768 18.654 16.775 22 12 22 6.477 22 2 17.523 2 12c0-4.775 3.346-8.768 7.822-9.762zm8.342.053L19 2.5v1l-.836.209a2 2 0 0 0-1.455 1.455L16.5 6h-1l-.209-.836a2 2 0 0 0-1.455-1.455L13 3.5v-1l.836-.209A2 2 0 0 0 15.29.836L15.5 0h1l.209.836a2 2 0 0 0 1.455 1.455zm5 5L24 7.5v1l-.836.209a2 2 0 0 0-1.455 1.455L21.5 11h-1l-.209-.836a2 2 0 0 0-1.455-1.455L18 8.5v-1l.836-.209a2 2 0 0 0 1.455-1.455L20.5 5h1l.209.836a2 2 0 0 0 1.455 1.455z"></path></g></svg>
                                </div>
        
                                <span class="text-xs font-semibold text-gray-500 whitespace-nowrap">@lang('messages.t_dark_mode')</span>
        
                            </button>
                        @elseif (settings('appearance')->is_dark_mode && Cookie::get('dark_mode') === 'enabled' )
                            <button 
                                wire:click="toggleDarkMode"
                                wire:loading.attr="disabled" 
                                class="inline-flex items-center px-2.5 py-2 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600  disabled:cursor-not-allowed dark:bg-zinc-600 dark:text-gray-300 dark:border-zinc-600 dark:focus:ring-offset-zinc-600 dark:hover:bg-zinc-800">
        
                                {{-- Loading indicator --}}
                                <div wire:loading wire:target="toggleDarkMode">
                                    <svg role="status" class="w-4 h-4 ltr:mr-3 rtl:ml-3 block text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                    </svg>
                                </div>
        
                                {{-- Dark mode icon --}}
                                <div wire:loading.remove wire:target="toggleDarkMode">
                                    <svg class="w-4 h-4 ltr:mr-3 rtl:ml-3" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><g><path fill="none" d="M0 0h24v24H0z"></path><path d="M12 18a6 6 0 1 1 0-12 6 6 0 0 1 0 12zM11 1h2v3h-2V1zm0 19h2v3h-2v-3zM3.515 4.929l1.414-1.414L7.05 5.636 5.636 7.05 3.515 4.93zM16.95 18.364l1.414-1.414 2.121 2.121-1.414 1.414-2.121-2.121zm2.121-14.85l1.414 1.415-2.121 2.121-1.414-1.414 2.121-2.121zM5.636 16.95l1.414 1.414-2.121 2.121-1.414-1.414 2.121-2.121zM23 11v2h-3v-2h3zM4 11v2H1v-2h3z"></path></g></svg>
                                </div>
        
                                <span class="text-xs font-semibold text-gray-300 whitespace-nowrap">@lang('messages.t_light_mode')</span>
        
                            </button>
                        @endif

                    </div>
                @endif


            </div>

        </div>
        
        <div class="grid md:flex justify-center md:justify-between items-center border-t-2 border-gray-50 dark:border-zinc-700 pt-4">

            {{-- Logo --}}
            <div class="flex items-center justify-center md:justify-items-start mb-4 md:mb-0">

                {{-- Logo --}}
                <div>
                    <a href="{{ url('/') }}" class="h-full">
                        <img src="{{ src(settings('footer')->logo) }}" alt="{{ settings('general')->title }}" class="py-2.5 max-h-20">
                    </a>
                </div>

            </div>

            {{-- Social media --}}
            <div>
                <div class="flex items-center space-x-2">

                    {{-- Facebook --}}
                    @if (settings('footer')->social_facebook)
                        <a href="{{ settings('footer')->social_facebook }}" target="_blank" data-tooltip-target="tooltip-follow-us-facebook" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group rtl:ml-2">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#4267B2]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M15,3C8.373,3,3,8.373,3,15c0,6.016,4.432,10.984,10.206,11.852V18.18h-2.969v-3.154h2.969v-2.099c0-3.475,1.693-5,4.581-5 c1.383,0,2.115,0.103,2.461,0.149v2.753h-1.97c-1.226,0-1.654,1.163-1.654,2.473v1.724h3.593L19.73,18.18h-3.106v8.697 C22.481,26.083,27,21.075,27,15C27,8.373,21.627,3,15,3z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_facebook') }}
                        </div>
                    @endif
    
                    {{-- Twitter --}}
                    @if (settings('footer')->social_twitter)
                        <a href="{{ settings('footer')->social_twitter }}" target="_blank" data-tooltip-target="tooltip-follow-us-twitter" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#1DA1F2]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M28,6.937c-0.957,0.425-1.985,0.711-3.064,0.84c1.102-0.66,1.947-1.705,2.345-2.951c-1.03,0.611-2.172,1.055-3.388,1.295 c-0.973-1.037-2.359-1.685-3.893-1.685c-2.946,0-5.334,2.389-5.334,5.334c0,0.418,0.048,0.826,0.138,1.215 c-4.433-0.222-8.363-2.346-10.995-5.574C3.351,6.199,3.088,7.115,3.088,8.094c0,1.85,0.941,3.483,2.372,4.439 c-0.874-0.028-1.697-0.268-2.416-0.667c0,0.023,0,0.044,0,0.067c0,2.585,1.838,4.741,4.279,5.23 c-0.447,0.122-0.919,0.187-1.406,0.187c-0.343,0-0.678-0.034-1.003-0.095c0.679,2.119,2.649,3.662,4.983,3.705 c-1.825,1.431-4.125,2.284-6.625,2.284c-0.43,0-0.855-0.025-1.273-0.075c2.361,1.513,5.164,2.396,8.177,2.396 c9.812,0,15.176-8.128,15.176-15.177c0-0.231-0.005-0.461-0.015-0.69C26.38,8.945,27.285,8.006,28,6.937z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_twitter') }}
                        </div>
                    @endif

                    {{-- Instagram --}}
                    @if (settings('footer')->social_instagram)
                        <a href="{{ settings('footer')->social_instagram }}" target="_blank" data-tooltip-target="tooltip-follow-us-instagram" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#E1306C]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M 9.9980469 3 C 6.1390469 3 3 6.1419531 3 10.001953 L 3 20.001953 C 3 23.860953 6.1419531 27 10.001953 27 L 20.001953 27 C 23.860953 27 27 23.858047 27 19.998047 L 27 9.9980469 C 27 6.1390469 23.858047 3 19.998047 3 L 9.9980469 3 z M 22 7 C 22.552 7 23 7.448 23 8 C 23 8.552 22.552 9 22 9 C 21.448 9 21 8.552 21 8 C 21 7.448 21.448 7 22 7 z M 15 9 C 18.309 9 21 11.691 21 15 C 21 18.309 18.309 21 15 21 C 11.691 21 9 18.309 9 15 C 9 11.691 11.691 9 15 9 z M 15 11 A 4 4 0 0 0 11 15 A 4 4 0 0 0 15 19 A 4 4 0 0 0 19 15 A 4 4 0 0 0 15 11 z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-instagram" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_instagram') }}
                        </div>
                    @endif

                    {{-- Pinterest --}}
                    @if (settings('footer')->social_pinterest)
                        <a href="{{ settings('footer')->social_pinterest }}" target="_blank" data-tooltip-target="tooltip-follow-us-pinterest" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#E60023]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M15,3C8.373,3,3,8.373,3,15c0,5.084,3.163,9.426,7.627,11.174c-0.105-0.949-0.2-2.406,0.042-3.442 c0.218-0.936,1.407-5.965,1.407-5.965s-0.359-0.719-0.359-1.781c0-1.669,0.967-2.914,2.171-2.914c1.024,0,1.518,0.769,1.518,1.69 c0,1.03-0.655,2.569-0.994,3.995c-0.283,1.195,0.599,2.169,1.777,2.169c2.133,0,3.772-2.249,3.772-5.495 c0-2.873-2.064-4.882-5.012-4.882c-3.414,0-5.418,2.561-5.418,5.208c0,1.031,0.397,2.137,0.893,2.739 c0.098,0.119,0.112,0.223,0.083,0.344c-0.091,0.379-0.293,1.194-0.333,1.361c-0.052,0.22-0.174,0.266-0.401,0.16 c-1.499-0.698-2.436-2.889-2.436-4.649c0-3.785,2.75-7.262,7.929-7.262c4.163,0,7.398,2.966,7.398,6.931 c0,4.136-2.608,7.464-6.227,7.464c-1.216,0-2.359-0.632-2.75-1.378c0,0-0.602,2.291-0.748,2.853 c-0.271,1.042-1.002,2.349-1.492,3.146C12.57,26.812,13.763,27,15,27c6.627,0,12-5.373,12-12S21.627,3,15,3z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-pinterest" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_pinterest') }}
                        </div>
                    @endif

                    {{-- Linkedin --}}
                    @if (settings('footer')->social_linkedin)
                        <a href="{{ settings('footer')->social_linkedin }}" target="_blank" data-tooltip-target="tooltip-follow-us-linkedin" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#0072b1]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M24,4H6C4.895,4,4,4.895,4,6v18c0,1.105,0.895,2,2,2h18c1.105,0,2-0.895,2-2V6C26,4.895,25.105,4,24,4z M10.954,22h-2.95 v-9.492h2.95V22z M9.449,11.151c-0.951,0-1.72-0.771-1.72-1.72c0-0.949,0.77-1.719,1.72-1.719c0.948,0,1.719,0.771,1.719,1.719 C11.168,10.38,10.397,11.151,9.449,11.151z M22.004,22h-2.948v-4.616c0-1.101-0.02-2.517-1.533-2.517 c-1.535,0-1.771,1.199-1.771,2.437V22h-2.948v-9.492h2.83v1.297h0.04c0.394-0.746,1.356-1.533,2.791-1.533 c2.987,0,3.539,1.966,3.539,4.522V22z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_linkedin') }}
                        </div>
                    @endif

                    {{-- Github --}}
                    @if (settings('footer')->social_github)
                        <a href="{{ settings('footer')->social_github }}" target="_blank" data-tooltip-target="tooltip-follow-us-github" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-gray-800" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_github') }}
                        </div>
                    @endif

                    {{-- Youtube --}}
                    @if (settings('footer')->social_youtube)
                        <a href="{{ settings('footer')->social_youtube }}" target="_blank" data-tooltip-target="tooltip-follow-us-youtube" class="w-10 h-10 flex items-center justify-center bg-gray-100 dark:bg-zinc-600 rounded-md group">
                            <svg class="h-6 w-6 fill-gray-500 dark:fill-gray-300 group-hover:fill-[#FF0000]" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 30 30"> <path d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z"></path></svg>
                        </a>
                        <div id="tooltip-follow-us-youtube" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            {{ __('messages.t_follow_us_on_youtube') }}
                        </div>
                    @endif

                </div>
            </div>

        </div>

        {{-- Copyrights & Quick links --}}
        <div class="text-center mt-10">
                
            {{-- Copyrights --}}
            <div class="text-gray-400 dark:text-gray-200 font-normal text-sm mb-2">
                {!! settings('footer')->copyrights !!}
            </div>

            {{-- Quick links --}}
            <div class="flex space-x-4 justify-center rtl:space-x-reverse">

                {{-- Contact --}}
                <a href="{{ url('help/contact') }}" class="text-xs font-medium uppercase text-gray-600 dark:text-gray-400 dark:hover:text-gray-100 hover:underline rtl:ml-4">{{ __('messages.t_contact_us') }}</a>

                {{-- Privacy policy --}}
                @if (settings('footer')->privacy)
                    <a href="{{ url('page', settings('footer')->privacy->slug) }}" class="text-xs font-medium uppercase text-gray-600 dark:text-gray-400 dark:hover:text-gray-100 hover:underline">{{ __('messages.t_privacy_policy') }}</a>
                @endif

                {{-- Terms --}}
                @if (settings('footer')->terms)
                    <a href="{{ url('page', settings('footer')->terms->slug) }}" class="text-xs font-medium uppercase text-gray-600 dark:text-gray-400 dark:hover:text-gray-100 hover:underline rtl:!ml-0">{{ __('messages.t_terms_of_service') }}</a>
                @endif

                {{-- Blog --}}
                @if (settings('blog')->enable_blog)
                    <a href="{{ url('blog') }}" class="text-xs font-medium uppercase text-gray-600 dark:text-gray-400 dark:hover:text-gray-100 hover:underline rtl:!ml-0">{{ __('messages.t_blog') }}</a>
                @endif

            </div>

        </div>

    </div>

    {{-- Languages --}}
    @if (settings('footer')->is_language_switcher)
        <div @keydown.window.escape="languages = false" x-show="languages" class="fixed z-50 inset-0 overflow-y-auto" aria-labelledby="modal-languages" aria-modal="true" x-cloak>
            <div class="flex md:items-end justify-center md:min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            
                <div x-show="languages" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" @click="languages = false" aria-hidden="true" x-cloak></div>
    
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">​</span>
            
                <div x-show="languages" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="relative inline-block align-bottom bg-white rounded-sm text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full sm:max-w-lg" x-cloak>
                
                    <div class="grid grid-cols-2 gap-2 sm:p-6">

                        @foreach (supported_languages() as $lang)
                            <div @if ($default_language_code !== $lang->language_code) wire:click="setLocale('{{ $lang->language_code }}')" @endif class="py-2 px-4 rounded-sm inline-flex items-center cursor-pointer justify-between {{ $default_language_code === $lang->language_code ? 'bg-blue-50 text-blue-600' : 'hover:bg-gray-50' }} focus:outline-none">
                                <div class="inline-flex items-center">
                                    <img src="{{ url('public/img/flags/rounded/' . $lang->country_code . '.svg') }}" alt="{{ $lang->name }}" class="w-5 ltr:mr-3 rtl:ml-3">
                                    <span class="font-normal text-xs">{{ $lang->name }}</span>
                                </div>
                                @if ($default_language_code === $lang->language_code)
                                    <div class="block">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                    </div>
                                @else
                                    <div wire:loading wire:target="setLocale('{{ $lang->language_code }}')">
                                        <svg role="status" class="block w-4 h-4 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/> <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/> </svg>
                                    </div>
                                @endif
                            </div>
                        @endforeach

                    </div>

                    {{-- Footer --}}
                    <div class="bg-gray-50 px-4 py-3 flex justify-center items-center">
                        <button type="button" class="w-full inline-flex justify-center px-4 py-2 bg-transparent text-xs font-medium text-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-600 sm:w-auto" @click="languages = false">
                            {{ __('messages.t_close') }}
                        </button>
                    </div>
                    

                </div>
                
            
            </div>
        </div>
    @endif

</footer>

@push('scripts')
    
    {{-- AlpineJs --}}
    <script>
        function vZeNLeukZPSQcld() {
            return {
                languages: false
            }
        }
        window.vZeNLeukZPSQcld = vZeNLeukZPSQcld();
    </script>

@endpush