<div class="w-full bg-white shadow rounded-lg">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_publish_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_publish_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">

                {{-- Auto approve gigs --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_gigs')"
                        model="auto_approve_gigs" />
                </div>

                {{-- Auto approve portfolio --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_auto_approve_user_portfolio')"
                        model="auto_approve_portfolio" />
                </div>

                {{-- Enable gig video --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_videos_for_gigs')"
                        model="is_video_enabled" />
                </div>

                {{-- Enable documents --}}
                <div class="col-span-12 lg:col-span-6">
                    <x-forms.checkbox
                        :label="__('messages.t_allow_documents_in_gigs')"
                        model="is_documents_enabled" />
                </div>

                {{-- Max tags per gig --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_max_tags')"
                        :placeholder="__('messages.t_enter_max_tags')"
                        model="max_tags"
                        icon="tag" />
                </div>

                {{-- Max docs --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_documents')"
                        :placeholder="__('messages.t_enter_max_docs_allowed')"
                        model="max_documents"
                        icon="file-pdf-box" />
                </div>

                {{-- MAx doc size --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_document_size')"
                        :placeholder="__('messages.t_enter_max_size_per_document_mb')"
                        model="max_document_size"
                        icon="sd" />
                </div>

                {{-- max gig images --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_images_per_gig')"
                        :placeholder="__('messages.t_enter_max_images_per_gig')"
                        model="max_images"
                        icon="image" />
                </div>

                {{-- max size per image --}}
                <div class="col-span-12 md:col-span-6">
                    <x-forms.text-input
                        :label="__('messages.t_max_size_per_image')"
                        :placeholder="__('messages.t_enter_max_size_per_image')"
                        model="max_image_size"
                        icon="database" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>    