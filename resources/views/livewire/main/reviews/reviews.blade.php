<div class="container max-w-2xl mx-auto lg:max-w-7xl" x-data="window.rlJJlyfiXvZQNki" x-cloak>

    <div class="px-4 lg:px-8 sm:px-6 text-2xl font-black text-gray-700 dark:text-gray-100 tracking-wide">
        {{ __('messages.t_customer_reviews') }}
    </div>

    <div class="">
        <div class="py-16 px-4 sm:py-24 sm:px-6 lg:py-16 lg:px-8 lg:grid lg:grid-cols-12 lg:gap-x-8">
            <div class="lg:col-span-4">

                {{-- Gig preview --}}
                <div class="block mb-10">
                    @livewire('main.cards.gig', ['gig' => $gig])
                </div>

                {{-- Rating --}}
                <div class="mt-3 flex items-center">
                    <div id="main-rating"></div>
                    <p class="ltr:ml-2 rtl:mr-2 text-sm italic text-gray-600 dark:text-gray-200">{{ __('messages.t_based_on_number_reviews', ['number' => $gig->counter_reviews]) }}

                        @if ($rating)
                            <a href="{{ url('reviews', $gig->uid) }}" class="ml-3 not-italic font-medium text-primary-600 text-xs">{{ __('messages.t_reset_filter') }}</a>
                        @endif

                    </p>
                </div>

                <div class="mt-6">
                    <h3 class="sr-only">Review data</h3>
                    <dl class="space-y-3">

                        {{-- 5 Stars --}}
                        <a href="{{ url('reviews/' . $gig->uid . '?rating=5') }}" class="flex items-center text-sm">

                            @php
                                $percentage_5 = $gig->reviews()->active()->where('rating', 5)->count() * 100 / $gig->counter_reviews;
                            @endphp

                            <dt class="flex-1 flex items-center">
                                <p class="w-3 font-bold text-xs text-gray-800 dark:text-amber-400">5</p>
                                <div aria-hidden="true" class="ltr:ml-1 rtl:mr-1 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-4 w-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                    <div class="ltr:ml-3 rtl:mr-3 relative flex-1">
                                        <div class="h-2 bg-gray-100 border border-gray-200 rounded-full"></div>
                                        @if ($percentage_5)
                                            <div style="width: {{ $percentage_5 }}%" class="absolute inset-y-0 bg-amber-400 border border-amber-400 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </dt>
                            <dd class="ltr:ml-3 rtl:mr-3 w-10 text-right tabular-nums text-xs text-gray-900 font-bold dark:text-gray-400">
                                
                                {{ $percentage_5 }}%
                            </dd>
                        </a>

                        {{-- 4 Stars --}}
                        <a href="{{ url('reviews/' . $gig->uid . '?rating=4') }}" class="flex items-center text-sm">

                            @php
                                $percentage_4 = $gig->reviews()->active()->where('rating', 4)->count() * 100 / $gig->counter_reviews;
                            @endphp

                            <dt class="flex-1 flex items-center">
                                <p class="w-3 font-bold text-xs text-gray-800 dark:text-amber-400">4</p>
                                <div aria-hidden="true" class="ltr:ml-1 rtl:mr-1 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-4 w-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                    <div class="ltr:ml-3 rtl:mr-3 relative flex-1">
                                        <div class="h-2 bg-gray-100 border border-gray-200 rounded-full"></div>
                                        @if ($percentage_4)
                                            <div style="width: {{ $percentage_4 }}%" class="absolute inset-y-0 bg-amber-400 border border-amber-400 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </dt>
                            <dd class="ltr:ml-3 rtl:mr-3 w-10 text-right tabular-nums text-xs text-gray-900 font-bold dark:text-gray-400">
                                
                                {{ $percentage_4 }}%
                            </dd>
                        </a>

                        {{-- 3 Stars --}}
                        <a href="{{ url('reviews/' . $gig->uid . '?rating=3') }}" class="flex items-center text-sm">

                            @php
                                $percentage_3 = $gig->reviews()->active()->where('rating', 3)->count() * 100 / $gig->counter_reviews;
                            @endphp

                            <dt class="flex-1 flex items-center">
                                <p class="w-3 font-bold text-xs text-gray-800 dark:text-amber-400">3</p>
                                <div aria-hidden="true" class="ltr:ml-1 rtl:mr-1 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-4 w-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                    <div class="ltr:ml-3 rtl:mr-3 relative flex-1">
                                        <div class="h-2 bg-gray-100 border border-gray-200 rounded-full"></div>
                                        @if ($percentage_3)
                                            <div style="width: {{ $percentage_3 }}%" class="absolute inset-y-0 bg-amber-400 border border-amber-400 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </dt>
                            <dd class="ltr:ml-3 rtl:mr-3 w-10 text-right tabular-nums text-xs text-gray-900 font-bold dark:text-gray-400">
                                
                                {{ $percentage_3 }}%
                            </dd>
                        </a>

                        {{-- 2 Stars --}}
                        <a href="{{ url('reviews/' . $gig->uid . '?rating=2') }}" class="flex items-center text-sm">

                            @php
                                $percentage_2 = $gig->reviews()->active()->where('rating', 2)->count() * 100 / $gig->counter_reviews;
                            @endphp

                            <dt class="flex-1 flex items-center">
                                <p class="w-3 font-bold text-xs text-gray-800 dark:text-amber-400">2</p>
                                <div aria-hidden="true" class="ltr:ml-1 rtl:mr-1 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-4 w-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                    <div class="ltr:ml-3 rtl:mr-3 relative flex-1">
                                        <div class="h-2 bg-gray-100 border border-gray-200 rounded-full"></div>
                                        @if ($percentage_2)
                                            <div style="width: {{ $percentage_2 }}%" class="absolute inset-y-0 bg-amber-400 border border-amber-400 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </dt>
                            <dd class="ltr:ml-3 rtl:mr-3 w-10 text-right tabular-nums text-xs text-gray-900 font-bold dark:text-gray-400">
                                
                                {{ $percentage_2 }}%
                            </dd>
                        </a>

                        {{-- 1 Stars --}}
                        <a href="{{ url('reviews/' . $gig->uid . '?rating=1') }}" class="flex items-center text-sm">

                            @php
                                $percentage_1 = $gig->reviews()->active()->where('rating', 1)->count() * 100 / $gig->counter_reviews;
                            @endphp

                            <dt class="flex-1 flex items-center">
                                <p class="w-3 font-bold text-xs text-gray-800 dark:text-amber-400">1</p>
                                <div aria-hidden="true" class="ltr:ml-1 rtl:mr-1 flex-1 flex items-center">
                                    <svg class="flex-shrink-0 h-4 w-4 text-amber-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/> </svg>
                                    <div class="ltr:ml-3 rtl:mr-3 relative flex-1">
                                        <div class="h-2 bg-gray-100 border border-gray-200 rounded-full"></div>
                                        @if ($percentage_1)
                                            <div style="width: {{ $percentage_1 }}%" class="absolute inset-y-0 bg-amber-400 border border-amber-400 rounded-full"></div>
                                        @endif
                                    </div>
                                </div>
                            </dt>
                            <dd class="ltr:ml-3 rtl:mr-3 w-10 text-right tabular-nums text-xs text-gray-900 font-bold dark:text-gray-400">
                                
                                {{ $percentage_1 }}%
                            </dd>
                        </a>
                        
                    </dl>
                </div>
            </div>

            {{-- Recent reviews --}}
            <div class="mt-16 lg:mt-0 lg:col-start-5 lg:col-span-8 bg-white dark:bg-zinc-800 rounded-2xl shadow-sm border border-gray-50 dark:border-zinc-700 h-fit">
                <h3 class="sr-only">Recent reviews</h3>
                <div class="flow-root py-6">
                    <div class="-my-8 divide-y divide-gray-100 dark:divide-zinc-700">

                        @foreach ($reviews as $review)
                            <div class="py-6 px-5">
                                <div class="flex items-center">
                                    <img src="{{ src($review->user->avatar) }}" alt="{{ $review->user->username }}" class="h-8 w-8 rounded-full">
                                    <div class="ltr:ml-4 rtl:mr-4 group">
                                        <a href="{{ url('profile', $review->user->username) }}" target="_blank" class="text-sm font-bold text-gray-900 dark:text-gray-200 flex items-center group-hover:text-primary-600">
                                            {{ $review->user->username }}
                                            @if ($review->user->status === 'verified')
                                                <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5 -mt-px" width="16px" height="16px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                                <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    {{ __('messages.t_account_verified') }}
                                                </div>
                                            @endif

                                            {{-- Country --}}
                                            @if ($review->user->country)
                                                <div class="ltr:ml-2 rtl:mr-2">
                                                    <img src="{{ countryFlag($review->user->country?->code) }}" alt="{{ $review->user->country?->name }}" class="h-3 -mt-px rounded-sm">
                                                </div>
                                            @endif

                                        </a>
                                        <div class="mt-1 flex items-start">
                                            <div class="review-rating-el" data-rating-value="{{ $review->rating }}" wire:ignore></div>

                                            <span class="ltr:ml-2 rtl:mr-2 text-[11px] font-normal text-gray-400"><span class="ltr:pr-2 rtl:pl-2 text-gray-300 dark:text-gray-500">•</span> {{ format_date($review->created_at, 'ago') }}</span>
                                        </div>
                                    </div>
                                </div>
                    
                                {{-- Message --}}
                                @if ($review->message)
                                    <div class="mt-4 space-y-6 text-sm italic text-gray-600 dark:text-gray-300">
                                        <p>{{ $review->message }}</p>
                                    </div>
                                @endif

                            </div>
                        @endforeach
                        
                    </div>
                </div>

                {{-- Pages --}}
                @if ($reviews->hasPages())
                    <div class="flex justify-center pt-12">
                        {!! $reviews->links('pagination::tailwind') !!}
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>

@push('scripts')

    {{-- Splide Plugin --}}
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/js/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/js/splide-extension-video.min.js"></script>

    {{-- AlpineJs --}}
    <script>
        function rlJJlyfiXvZQNki() {
            return {

                // Init component
                init() {
                    
                    // Init splidejs
                    window.splidejs();

                    // Init rating
                    this.rating();
                    
                },

                rating() {

                    // Main
                    $('#main-rating').rateYo({
                        rating    : "{{ $gig->rating }}",
                        starWidth : "18px",
                        ratedFill : "#ffbf46",
                        normalFill: "#d2d2d2",
                        halfStar  : true,
                        readOnly  : true,
                        "starSvg": '<svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>'
                    });

                    // All
                    const elements = document.getElementsByClassName('review-rating-el');
      
                    for (let index = 0; index < elements.length; index++) {

                        const element = elements[index];

                        $(element).rateYo({
                            rating    : element.getAttribute('data-rating-value'),
                            starWidth : "16px",
                            ratedFill : "#ffbf46",
                            normalFill: "#d2d2d2",
                            halfStar  : true,
                            readOnly  : true,
                            "starSvg": '<svg class="flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"> <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path> </svg>'
                        });
                    }

                }

            }
        }
        window.rlJJlyfiXvZQNki = rlJJlyfiXvZQNki();
    </script>

@endpush

@push('styles')

    {{-- Splide Plugin --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/splide-core.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.0.7/dist/css/themes/splide-default.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-video@0.7.1/dist/css/splide-extension-video.min.css">

@endpush