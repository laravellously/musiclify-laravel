<div class="w-full">

    {{-- Section title --}}
    <div>
        <h3 class="text-lg font-black text-gray-900 sm:text-xl ">
            {{ __('messages.t_subscription_plans') }}
        </h3>
        <p class="mt-2 text-sm font-medium text-gray-500">
            {{ __('messages.t_projects_subscription_plans_subtitle') }}
        </p>
    </div>

    <div class="mt-12 space-y-4 sm:mt-16 sm:space-y-0 sm:grid sm:grid-cols-2 sm:gap-6 lg:max-w-4xl lg:mx-auto xl:max-w-none xl:mx-0 xl:grid-cols-4">

        {{-- List of subscriptions --}}
        @foreach ($subscriptions as $s)
            <div class="bg-white border border-gray-200 rounded-lg shadow-sm" wire:key="projects-subscriptions-{{ $s->id }}">
                <div class="p-6">

                    {{-- Badge --}}
                    <h3 class="inline-flex px-4 py-2 rounded-full text-xs font-semibold tracking-wide uppercase" style="color: {{ $s->badge_text_color }};background-color: {{ $s->badge_bg_color }};">
                        {{ $s->title }}
                    </h3>

                    {{-- Description --}}
                    <p class="mt-4 text-sm text-gray-500 h-24 overflow-y-auto">
                        {{ $s->description }}
                    </p>

                    {{-- Price --}}
                    <p class="mt-8">
                        <span class="text-3xl font-extrabold text-gray-900 ">
                            {{ _price($s->price) }}
                        </span>
                        @if ($s->days)
                            <span class="text-xs font-medium text-gray-500 lowercase">/ {{ $s->days }} {{ __('messages.t_days') }}</span>
                        @endif
                    </p>

                    {{-- Actions --}}
                    <div class="border-t border-gray-100 flex divide-x divide-gray-100 -mx-6 mt-6 -mb-6">

                        {{-- Activate --}}
                        @if (!$s->is_active)
                            <div class="w-0 flex-1 flex">
                                <button 
                                    wire:click="activate('{{ $s->id }}')"
                                    wire:loading.class="cursor-not-allowed "
                                    wire:loading.attr="disabled"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    
                                    {{-- Loading --}}
                                    <div wire:loading wire:target="activate('{{ $s->id }}')">
                                        <svg role="status" class="w-5 h-5 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div> 

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="activate('{{ $s->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>

                                    <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_enable') }}</span>
                                </button>
                            </div>
                        @endif

                        {{-- Disable --}}
                        @if ($s->is_active)
                            <div class="w-0 flex-1 flex">
                                <button 
                                    wire:click="disable('{{ $s->id }}')"
                                    wire:loading.class="cursor-not-allowed "
                                    wire:loading.attr="disabled"
                                    class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                    
                                    {{-- Loading --}}
                                    <div wire:loading wire:target="disable('{{ $s->id }}')">
                                        <svg role="status" class="w-5 h-5 text-gray-700 animate-spin" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="#E5E7EB"/>
                                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentColor"/>
                                        </svg>
                                    </div> 

                                    {{-- Icon --}}
                                    <div wire:loading.remove wire:target="disable('{{ $s->id }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    </div>

                                    <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_disable') }}</span>
                                </button>
                            </div>
                        @endif

                        {{-- Edit --}}
                        <div class="ltr:-ml-px rtl:-mr-px w-0 flex-1 flex">
                            <a href="{{ admin_url('projects/subscriptions/edit/' . $s->id) }}" class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                                <span class="ltr:ml-3 rtl:mr-3">{{ __('messages.t_edit') }}</span>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        @endforeach
        
    </div>
</div>