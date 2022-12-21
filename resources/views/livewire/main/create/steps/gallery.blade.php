<div class="w-full" x-data="window.HtBWuUxgpMyrQEM" x-init="initialize">

    {{-- Please wait dialog --}}
    <div class="fixed top-0 left-0 z-50 bg-black w-full h-full opacity-80" wire:loading>
        <div class="w-full h-full flex items-center justify-center">
            <div role="status">
                <svg aria-hidden="true" class="mx-auto w-12 h-12 text-gray-500 animate-spin dark:text-gray-600 fill-white" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                </svg>
                <span class="text-xs font-medium tracking-wider text-white mt-4 block">{{ __('messages.t_please_wait_dots') }}</span>
            </div>
        </div>
    </div>

    {{-- Images --}}
    <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_images">

        {{-- Section title --}}
        <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
            <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                <div class="ml-4 mt-4">
                    <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_images') }}</h3>
                    <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_get_noticed_by_right_buyers_images') }}</p>
                </div>
                @if (!$video_link)
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button id="modal-add-youtube-video-button" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary-600 hover:text-primary-700 ltr:mr-2 rtl:ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            <span class="text-xs font-medium text-primary-600 hover:text-primary-700"> 
                                {{ __('messages.t_add_a_video') }}
                            </span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        {{-- Section content --}}
        <div class="w-full mb-6 px-8 py-6">

            {{-- Thumbnail --}}
            <div class="w-full mb-12" wire:ignore>
                <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100">{{ __('messages.t_upload_thumbnail') }}</span>
                <x-forms.uploader
                    model="thumbnail"
                    id="uploader_thumbnail"
                    :extensions="['jpg', 'jpeg', 'png']"
                    accept="image/jpg, image/jpeg, image/png"
                    size="{{ settings('publish')->max_image_size }}"
                    max="1" />
            </div>

            {{-- Images uploader --}}
            <div wire:ignore>
                <span class="mb-2 text-xs font-semibold tracking-wide flex items-center text-gray-700 dark:text-gray-100">{{ __('messages.t_upload_gig_images') }}</span>
                <x-forms.uploader
                    model="images"
                    id="uploader_images"
                    :extensions="['jpg', 'jpeg', 'png']"
                    accept="image/jpg, image/jpeg, image/png"
                    size="{{ settings('publish')->max_image_size }}"
                    max="{{ settings('publish')->max_images }}" />
            </div>

        </div>

    </div>

    {{-- Video --}}
    @if ($video_link)
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_video">

            {{-- Section title --}}
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_video') }}</h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_capture_buyer_attention_with_video') }}</p>
                    </div>
                    <div class="ltr:ml-4 rtl:mr-4 flex-shrink-0 mt-4">
                        <button wire:click="removeVideo" class="inline-flex items-center py-2 ltr:md:pl-3 rtl:md:pr-3 border border-transparent rounded-full bg-transparent hover:bg-transparent focus:outline-none focus:ring-0">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-red-500 hover:text-red-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"> <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                            <span class="text-xs font-medium text-red-500 hover:text-red-600"> 
                                {{ __('messages.t_remove_video') }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- Section content --}}
            <div class="w-full mb-6 px-8 py-6">

                {{-- Youtube preview --}}
                <div class="bg-white rounded-md shadow-sm w-full h-52 md:w-[calc(25%-16px)] md:h-[173.23px]">
                    <div class="aspect-square rounded-md z-10 overflow-hidden w-full h-full">
                        <iframe src="https://www.youtube.com/embed/{{ youtubeId($video_link) }}" height="100%" width="100%" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>

            </div>

        </div>
    @endif

    {{-- Documents --}}
    @if (settings('publish')->is_documents_enabled)
        <div class="mb-6 bg-white dark:bg-zinc-800 shadow-sm rounded-md border border-b-0 border-gray-200 dark:border-zinc-700" wire:key="section_documents">

            {{-- Section title --}}
            <div class="bg-gray-50 dark:bg-zinc-700 px-8 py-4 rounded-t-md">
                <div class="-ml-4 -mt-4 flex justify-between items-center flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-4">
                        <h3 class="text-sm leading-6 font-semibold tracking-wide text-gray-600 dark:text-gray-200">{{ __('messages.t_documents') }}</h3>
                        <p class="text-xs font-normal text-gray-400 dark:text-gray-300">{{ __('messages.t_show_some_of_best_work_doc_pdfs_only') }}</p>
                    </div>
                </div>
            </div>

            {{-- Section content --}}
            <div class="w-full mb-6 px-8 py-6">

                {{-- Documents uploader --}}
                <div wire:ignore>
                    <x-forms.uploader
                        model="documents"
                        id="uploader_documents"
                        :extensions="['pdf']"
                        accept="application/pdf"
                        size="{{ settings('publish')->max_document_size }}"
                        max="{{ settings('publish')->max_documents }}" />
                </div>

            </div>

        </div>
    @endif

    {{-- Actions --}}
    <div class="flex justify-between">
        <x-forms.button action="back" text="{{ __('messages.t_back') }}" active="bg-white dark:bg-zinc-700 dark:hover:zinc-800 shadow-sm hover:bg-gray-300 text-gray-900 dark:text-gray-300"  />
        <x-forms.button action="save" text="{{ __('messages.t_save_and_continue') }}" />
    </div>

    {{-- Youtube video modal --}}
    <x-forms.modal id="modal-add-youtube-video-container" target="modal-add-youtube-video-button" uid="modal_{{ uid() }}" placement="center-center" size="max-w-md">

        {{-- Header --}}
        <x-slot name="title">{{ __('messages.t_add_youtube_video') }}</x-slot>

        {{-- Content --}}
        <x-slot name="content">
            <div class="grid grid-cols-12 md:gap-x-6 gap-y-6">

                {{-- Link --}}
                <div class="col-span-12">
                    <div class="relative">
                
                        {{-- Input --}}
                        <input type="text" placeholder="{{ __('messages.t_youtube_placeholder') }}" wire:model.defer="video_link" class="block w-full text-xs rounded border-2 pr-10 py-3 pl-3 font-normal {{ $errors->first('video_link') ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}">
                
                        {{-- Icon --}}
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="mdi mdi-youtube {{ $errors->first('video_link') ? 'text-red-400' : 'text-gray-400' }}"></i>
                        </div>
                
                    </div>
                
                    {{-- Error --}}
                    @error('video_link')
                        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first('video_link') }}</p>
                    @enderror
                
                </div>

            </div>
        </x-slot>

        {{-- Footer --}}
        <x-slot name="footer">
            <x-forms.button action="addVideo" text="{{ __('messages.t_add') }}" :block="0"  />
        </x-slot>

    </x-forms.modal>

</div>


@push('scripts')

    {{-- AlpineJS --}}
    <script>
        function HtBWuUxgpMyrQEM() {
            return {

                initialize() {
                }

            }
        }
        window.HtBWuUxgpMyrQEM = HtBWuUxgpMyrQEM();
    </script>

@endpush