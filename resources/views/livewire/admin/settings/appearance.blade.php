<div class="w-full bg-white shadow rounded-lg" x-data="window.fweXqTeRXrFVxql">

    <div class="divide-y divide-gray-200 dark:divide-zinc-700 lg:col-span-9">
        <div class="py-10 px-12">

            {{-- Section header --}}
            <div class="mb-14">
                <h2 class="text-sm leading-6 font-bold text-gray-900">{{ __('messages.t_appearance_settings') }}</h2>
                <p class="mt-1 text-xs text-gray-500">{{ __('messages.t_appreance_settings_subtitle') }}</p>
            </div>
            
            {{-- Section content --}}
            <div class="grid grid-cols-12 md:gap-x-8 gap-y-8 mb-6">
                
                {{-- Primary color --}}
                <div class="col-span-12" wire:ignore>
                    <x-forms.color-picker
                        :label="__('messages.t_primary_color')"
                        model="primary_color" />
                </div>

                {{-- Dark mode --}}
                <div class="col-span-12">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_dark_mode')"
                        model="is_dark_mode" />
                </div>

                {{-- Logo height --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_logo_height')"
                        :placeholder="__('messages.t_enter_logo_height')"
                        model="logo_desktop_height"
                        icon="file-jpg-box"
                        :hint="__('messages.t_logo_height_hint')" />
                </div>

                {{-- Custom fonts --}}
                <div class="col-span-12">
                    <x-forms.textarea
                        :label="__('messages.t_custom_google_fonts_html')"
                        :placeholder="__('messages.t_enter_links_from_google_fonts')"
                        model="font_link"
                        icon="google"
                        :rows="6"
                        hint="e.g: <link href='https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap' rel='stylesheet'>" />
                </div>

                {{-- Font name --}}
                <div class="col-span-12">
                    <x-forms.text-input
                        :label="__('messages.t_font_name')"
                        :placeholder="__('messages.t_enter_font_name')"
                        model="font_family"
                        icon="format-font"
                        :hint="__('messages.t_font_family_hint')" />
                </div>

                {{-- Enable home sliders --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_enable_home_sliders')"
                        model="is_sliders" />
                </div>

                {{-- Enable featured categories --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_show_featured_categories')"
                        model="is_featured_categories" />
                </div>

                {{-- Enable best sellers --}}
                <div class="col-span-12 md:col-span-4">
                    <x-forms.checkbox
                        :label="__('messages.t_show_best_sellers')"
                        model="is_best_sellers" />
                </div>

            </div>

        </div>

        {{-- Actions --}}
        <div class="py-4 px-4 flex justify-end sm:px-12 bg-gray-50 rounded-bl-lg rounded-br-lg">
            <x-forms.button action="update" text="{{ __('messages.t_update') }}" :block="false"  />
        </div>                    

    </div>

</div>  

@push('scripts')

    {{-- Color Picker --}}
    <script src="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.js"></script>
    <script>
        document.querySelectorAll('.color-picker-input').forEach(input => {
            Coloris({
                el   : '#' + input.id,
                theme: 'large'
            });
        });
    </script>
    
    {{-- AlpineJs --}}
    <script>
        function fweXqTeRXrFVxql() {
            return {

                selected: 'sliders'

            }
        }
        window.fweXqTeRXrFVxql = fweXqTeRXrFVxql();
    </script>

@endpush

@push('styles')
    
    {{-- Color picker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/mdbassit/Coloris@latest/dist/coloris.min.css"/>

@endpush