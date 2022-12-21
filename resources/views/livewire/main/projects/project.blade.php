<div class="w-full" x-data="window.fPXrWRfAGOuzate" x-init="init">
    
    {{-- Section header --}}
    <div class="max-w-3xl mx-auto px-4 sm:px-6 md:flex md:items-center md:justify-between md:space-x-5 lg:max-w-7xl lg:px-8">
        <div class="flex items-center space-x-5 rtl:space-x-reverse">
            <div class="flex-shrink-0">
                <div class="relative">
                    <img class="h-16 w-16 rounded-full object-cover" src="{{ src($project->thumbnail) }}" alt="{{ $project->title }}">
                    <span class="absolute inset-0 shadow-inner rounded-full" aria-hidden="true"></span>
                </div>
            </div>
            <div>
                <h1 class="text-xl font-bold text-gray-900 dark:text-white">{{ $project->title }}</h1>
            </div>
        </div>
        <div class="mt-6 flex flex-col-reverse justify-stretch space-y-4 space-y-reverse sm:flex-row-reverse sm:justify-end sm:space-x-reverse sm:space-y-0 sm:space-x-3 md:mt-0 md:flex-row md:space-x-3 rtl:space-x-reverse lg:rtl:!-ml-[5px]">

            {{-- Video --}}
            @if ($project->project_video)
                <a href="{{ $project->project_video }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 dark:border-zinc-700 shadow-sm text-xs font-medium rounded-sm text-gray-700 dark:text-zinc-400 bg-white dark:bg-zinc-700 dark:hover:bg-zinc-600 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-600">
                    {{ __('messages.t_watch_video') }}
                </a>
            @endif

            {{-- Project link --}}
            @if ($project->project_link)
                <a href="{{ url('redirect?to='. safeEncrypt($project->project_link)) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-xs font-medium rounded-sm shadow-sm text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-primary-600">
                    {{ __('messages.t_live_preview') }}
                </a>
            @endif

        </div>
    </div>

    <div class="mt-8 max-w-3xl mx-auto grid grid-cols-1 gap-6 sm:px-6 lg:max-w-7xl lg:grid-flow-col-dense lg:grid-cols-3">
        <div class="space-y-6 lg:col-start-1 lg:col-span-2">
            
            {{-- Section content --}}
            <section aria-labelledby="applicant-information-title">
                <div class="bg-white dark:bg-zinc-800 shadow sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">

                        {{-- Gallery --}}
                        <div class="mb-8 mt-8" wire:ignore>
                            <div class="project_images_slider md:h-[460px] rounded-lg">
                                @foreach ($project->gallery as $image)
                                    <div class="w-full">
                                        <img src="{{ src($image->image) }}" class="block md:h-[460px] rounded-lg m-auto" alt="{{ $project->title }}">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Description --}}
                        <div class="text-lg max-w-prose mx-auto">
                            <h1>
                                <span class="block text-base text-center text-primary-600 font-black uppercase tracking-widest">{{ __('messages.t_description') }}</span>
                            </h1>
                            <p class="mt-8 text-xl text-gray-500 leading-8">
                                {!! nl2br($project->description) !!}
                            </p>
                        </div>

                        {{-- Share --}}
                        <span class="text-center font-medium text-gray-800 text-sm mb-4 mt-24 flex items-center justify-center">{{ __('messages.t_share_this_project') }}</span>
                        <div class="flex items-center justify-center pb-6">

                            {{-- Share on Facebook --}}
                            <a href="https://www.facebook.com/sharer.php?t={{ $project->title }}&u={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-facebook" class="text-white bg-[#4267B2] hover:bg-[#4267B2]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-facebook text-xl"></i>
                            </a>
                            <div id="project-share-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_facebook') }}
                            </div>

                            {{-- Share on Twitter --}}
                            <a href="https://twitter.com/intent/tweet?text={{ $project->title }}&url={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-twitter" class="text-white bg-[#00acee] hover:bg-[#00acee]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-twitter text-xl"></i>
                            </a>
                            <div id="project-share-twitter" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_twitter') }}
                            </div>

                            {{-- Share on Linkedin --}}
                            <a href="https://www.linkedin.com/shareArticle?title={{ $project->title }}&url={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-linkedin" class="text-white bg-[#0072b1] hover:bg-[#0072b1]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-linkedin text-xl"></i>
                            </a>
                            <div id="project-share-linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_linkedin') }}
                            </div>

                            {{-- Share on Snapchat --}}
                            <a href="https://snapchat.com/scan?attachmentUrl={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-snapchat" class="text-gray-700 bg-[#FFFC00] hover:bg-[#FFFC00]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-snapchat text-xl"></i>
                            </a>
                            <div id="project-share-snapchat" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_snapchat') }}
                            </div>

                            {{-- Share on Pinterest --}}
                            <a href="https://www.pinterest.com/pin/create/button/?description={{ $project->title }}&media=&url={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-pinterest" class="text-white bg-[#E60023] hover:bg-[#E60023]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-pinterest text-xl"></i>
                            </a>
                            <div id="project-share-pinterest" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_pinterest') }}
                            </div>

                            {{-- Share on Whatsapp --}}
                            <a href="https://web.whatsapp.com/send?text={{ url('projects', $project->slug) }}" target="_blank" data-tooltip-target="project-share-whatsapp" class="text-white bg-[#25D366] hover:bg-[#25D366]/80 focus:ring-0 focus:outline-none rounded-full flex items-center justify-center h-12 w-12 mr-2">
                                <i class="si si-whatsapp text-xl"></i>
                            </a>
                            <div id="project-share-whatsapp" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip">
                                {{ __('messages.t_share_on_whatsapp') }}
                            </div>

                        </div>

                    </div>
                </div>
            </section>

        </div>

        {{-- User card --}}
        <section aria-labelledby="timeline-title" class="lg:col-start-3 lg:col-span-1">
            <div class="bg-white dark:bg-zinc-800 px-4 py-5 shadow sm:rounded-lg sm:px-6">
                <div class="md:flex">
                    <div class="w-full p-2 py-10">
                    
                        <div class="flex justify-center">
                            <div class="relative">
                
                                {{-- User avatar --}}
                                <img src="{{ src($project->user->avatar) }}" alt="{{ $project->user->username }}" class="rounded-full w-20 h-20 object-cover">

                                {{-- User status --}}
                                @if ($project->user->isOnline() && !$project->user->availability)
                                    {{-- Online --}}
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-green-400 rounded-full"></span>
                                @elseif ($project->user->availability)
                                    {{-- Online --}}
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-gray-600 rounded-full"></span>
                                @else
                                    {{-- Offline --}}
                                    <span class="absolute border-white border-4 h-5 w-5 top-12 left-16 bg-red-600 rounded-full"></span>
                                @endif
                        
                            </div>
                        </div>
            
                        <div class="flex flex-col text-center mt-3 mb-4">
                            <span class="text-md font-extrabold text-gray-800 dark:text-zinc-200 flex items-center justify-center">
                                {{ $project->user->username }}
                                @if ($project->user->status === 'verified')
                                    <svg data-tooltip-target="account-verified-badge" class="ltr:ml-0.5 rtl:mr-0.5" width="17px" height="17px" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g id="web-app" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"> <g id="check-verified" fill="#26abff"> <path d="M4.25203497,14 L4,14 C2.8954305,14 2,13.1045695 2,12 C2,10.8954305 2.8954305,10 4,10 L4.25203497,10 C4.44096432,9.26595802 4.73145639,8.57268879 5.10763818,7.9360653 L4.92893219,7.75735931 C4.1478836,6.97631073 4.1478836,5.70998077 4.92893219,4.92893219 C5.70998077,4.1478836 6.97631073,4.1478836 7.75735931,4.92893219 L7.9360653,5.10763818 C8.57268879,4.73145639 9.26595802,4.44096432 10,4.25203497 L10,4 C10,2.8954305 10.8954305,2 12,2 C13.1045695,2 14,2.8954305 14,4 L14,4.25203497 C14.734042,4.44096432 15.4273112,4.73145639 16.0639347,5.10763818 L16.2426407,4.92893219 C17.0236893,4.1478836 18.2900192,4.1478836 19.0710678,4.92893219 C19.8521164,5.70998077 19.8521164,6.97631073 19.0710678,7.75735931 L18.8923618,7.9360653 C19.2685436,8.57268879 19.5590357,9.26595802 19.747965,10 L20,10 C21.1045695,10 22,10.8954305 22,12 C22,13.1045695 21.1045695,14 20,14 L19.747965,14 C19.5590357,14.734042 19.2685436,15.4273112 18.8923618,16.0639347 L19.0710678,16.2426407 C19.8521164,17.0236893 19.8521164,18.2900192 19.0710678,19.0710678 C18.2900192,19.8521164 17.0236893,19.8521164 16.2426407,19.0710678 L16.0639347,18.8923618 C15.4273112,19.2685436 14.734042,19.5590357 14,19.747965 L14,20 C14,21.1045695 13.1045695,22 12,22 C10.8954305,22 10,21.1045695 10,20 L10,19.747965 C9.26595802,19.5590357 8.57268879,19.2685436 7.9360653,18.8923618 L7.75735931,19.0710678 C6.97631073,19.8521164 5.70998077,19.8521164 4.92893219,19.0710678 C4.1478836,18.2900192 4.1478836,17.0236893 4.92893219,16.2426407 L5.10763818,16.0639347 C4.73145639,15.4273112 4.44096432,14.734042 4.25203497,14 Z M9,10 L7,12 L11,16 L17,10 L15,8 L11,12 L9,10 Z" id="Shape"></path> </g> </g></svg>
                                    <div id="account-verified-badge" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-xs font-medium text-white bg-gray-900 rounded-sm shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        {{ __('messages.t_account_verified') }}
                                    </div>
                                @endif
                            </span>
                            <span class="text-sm text-gray-400">{{ $project->user->headline }}</span>
                        </div>
            
                        <p class="px-16 text-center text-sm text-gray-500 italic">
                            {{ $project->user->description }}
                        </p>

                        {{-- Actions --}}
                        <div class="px-14 mt-8">

                            {{-- Contact user --}}
                            <a href="{{ url('messages/new', $project->user->username) }}" class="flex items-center justify-center h-12 bg-primary-600 w-full text-white text-sm font-medium rounded hover:shadow hover:bg-primary-700 {{ auth()->check() && auth()->id() !== $project->user->id ? '' : '' }}">{{ __('messages.t_contact_me') }}</a>
                            
                        </div>
                        
                    </div>
                
                </div>
            </div>
        </section>

    </div>
</div>

@push('scripts')

    {{-- Slick Plugin --}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $('.project_images_slider').slick({
            autoplay: true,
            dots    : false,
            arrows  : false
        });
    </script>
    
    {{-- AlpineJs --}}
    <script>
        function fPXrWRfAGOuzate() {
            return {

                // Init
                init() {
                    
                }

            }
        }
        window.fPXrWRfAGOuzate = fPXrWRfAGOuzate();
    </script>

@endpush

@push('styles')
    {{-- Simple icons plugin --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/simple-icons-font@v5/font/simple-icons.min.css" type="text/css">

    {{-- Slick Plugin --}}
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
@endpush