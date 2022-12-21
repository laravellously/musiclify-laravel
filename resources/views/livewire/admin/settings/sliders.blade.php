<div class="max-w-3xl mx-auto bg-white shadow rounded-lg">

    {{-- Loading --}}
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
    <div class="col-span-12 lg:col-span-7" wire:key="section_images">
        <div class="px-8 py-6 mb-10">

            {{-- Section title --}}
            <div class="mb-4 flex justify-between items-center">
                <div>
                    <h2 class="text-sm tracking-wider leading-6 font-bold text-gray-900">
                        {{ __('messages.t_upload_new_slider') }}
                    </h2>
                </div>
            </div>

            {{-- Section content --}}
            <div class="w-full mb-10">

                {{-- Sliders uploader --}}
                <div wire:ignore>
                    <x-forms.uploader model="image" id="uploader_sliders" :extensions="['jpg', 'jpeg', 'png']"
                        accept="image/jpg, image/jpeg, image/png" :size="25" :max="1" />
                </div>

            </div>

            {{-- Section title --}}
            <div class="mt-14 mb-4">
                <h2 class="text-sm tracking-wider leading-6 font-bold text-gray-900">
                    {{ __('messages.t_sliders') }}</h2>
                </p>
            </div>

            {{-- Old images --}}
            <div class="fileuploader fileuploader-theme-thumbnails">
                <div class="fileuploader-items">
                    <ul class="!grid !grid-cols-12 sm:!gap-x-6 gap-y-6 !m-auto fileuploader-items-list">

                        @foreach (sliders() as $img)
                            <li
                                wire:key="gallery-image-item-{{ $img->id }}"
                                class="!col-span-12 sm:!col-span-6 md:!col-span-4 lg:!col-span-3 !w-full h-36 !m-auto fileuploader-item file-type-image file-ext-png file-has-popup rounded-[6px]">
                                <div class="fileuploader-item-inner">
                                    <div class="type-holder">{{ $img->image->file_extension }}</div>
                                    <div class="actions-holder">
                                        <button type="button"
                                            x-on:click="confirm('{{ __('messages.t_are_u_sure_delete_this_image') }}') ? $wire.removeSlider('{{ $img->id }}') : ''" 
                                            wire:loading.attr="disabled" 
                                            wire:target="removeSlider('{{ $img->id }}')"
                                            class="fileuploader-action fileuploader-action-remove"
                                            title="{{ __('messages.t_delete') }}">
                                            <i class="fileuploader-icon-remove"></i>
                                        </button>
                                    </div>
                                    <div class="thumbnail-holder">
                                        <div class="fileuploader-item-image">
                                            <img src="{{ src($img->image) }}" draggable="false">
                                        </div>
                                        <span class="fileuploader-action-popup"></span>
                                    </div>
                                    <div class="content-holder">
                                        <span>{{ human_filesize($img->image->file_size) }}</span>
                                    </div>
                                    <div class="progress-holder"></div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>    