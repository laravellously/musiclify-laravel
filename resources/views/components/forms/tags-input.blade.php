@props(['label', 'placeholder', 'model', 'tags' => []])

<div x-data="window.XsPKiJSnOYqVlZD" @click.away="clear()" @keydown.escape="clear()">

    {{-- Label --}}
    <label for="tags-input-component-id-{{ $model }}" class="block text-xs font-semibold tracking-wide {{ $errors->first($model) ? 'text-red-600' : 'text-gray-700 dark:text-gray-100' }}">{{ htmlspecialchars_decode($label) }}</label>
    
    {{-- Form --}}
    <div class="mt-2 relative">

        {{-- Input --}}
        <input type="text" :disabled="tags.length === maximum ? true : false" maxlength="20" x-model="value" x-ref="value" @keyup.enter="addTag(value)" id="tags-input-component-id-{{ $model }}" placeholder="{{ htmlspecialchars_decode($placeholder) }}" class=" dark:bg-transparent block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal {{ $errors->first($model) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 dark:border-zinc-600 placeholder-gray-400 dark:placeholder-gray-200 focus:ring-primary-600 focus:border-primary-600 dark:text-gray-100' }}" {{ $attributes }}>

    </div>

    {{-- Error --}}
    @error($model)
        <p class="mt-1 text-xs text-red-600">{{ $errors->first($model) }}</p>
    @enderror

    {{-- List of tags --}}
    <template x-for="(tag, index) in tags">
        <div class="bg-gray-200 dark:bg-zinc-700 inline-flex items-center text-sm rounded mt-2 mr-1">
            <span class="ltr:ml-2 ltr:mr-1 rtl:mr-2 rtl:ml-1 leading-relaxed truncate max-w-xs text-xs dark:text-zinc-300" x-text="tag"></span>
            <button @click.prevent="removeTag(index, tag)" class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z"/></svg>
            </button>
        </div>
    </template>

    {{-- Helper --}}
    <p class="mt-1 text-xs text-gray-300">{{ __('messages.t_max_tags_letters_numbers_only', ['max' => settings("publish")->max_tags]) }}</p>

</div>

@push('scripts')
    <script>
        function XsPKiJSnOYqVlZD() {
            return {
                maximum: Number("{{ settings('publish')->max_tags }}"),
                value  : '',
                tags   : @js($tags),
                
                addTag() {
                    if (this.value != "" && !this.hasTag(this.value) && this.isValid(this.value)) {
                        if (this.tags.length < this.maximum) {
                            @this.addTag(this.value)
                            this.tags.push( this.value )
                        }
                    }
                    this.clear()
                    this.$refs.value.focus()
                },
                
                hasTag(tag) {
                    var tag = this.tags.find(e => {
                        return e.toLowerCase() === tag.toLowerCase()
                    })
                    return tag != undefined
                },

                isValid(tag) {

                    const r = /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

                    const regex = new RegExp(r);

                    return regex.test(tag) ? false : true;

                },

                removeTag(index, tag) {
                    @this.removeTag(tag)
                    this.tags.splice(index, 1)
                },
                
                clear() {
                    this.value = ''
                }
            }
        }
        window.XsPKiJSnOYqVlZD = XsPKiJSnOYqVlZD();
    </script>
@endpush