@props(['label', 'placeholder', 'model', 'options', 'isDefer', 'isAssociative', 'componentId', 'value', 'text', 'selected' => null, 'class' => null])

<div class="relative {{ $errors->first($model) ? 'select2-custom-has-error' : '' }}">
    <label class="text-xs font-medium block mb-2 {{ $errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-700 dark:text-white' }}">{{ $label }}</label>

    <select data-pharaonic="select2" data-component-id="{{ $componentId }}" wire:model{{ $isDefer ? '.defer' : '' }}="{{ $model }}" id="select2-id-{{ $model }}" data-placeholder="{{ $placeholder }}" data-search-off class="{{ $class ? $class : 'select2' }}" {{ $attributes }} data-dir="{{ config()->get('direction') }}">
        <option value=""></option>
        @foreach ($options as $key => $option)

            {{-- Check if type of array associative --}}
            @if (!$isAssociative)
                <option value="{{ $option[$value] }}" {{ $selected && $selected === $option[$value] ? "selected" : "" }}>{{ $option[$text] }}</option>  
            @else
                <option value="{{ $key }}" {{ $selected && $selected === $key ? "selected" : "" }}>{{ $key }}</option>
            @endif

        @endforeach
    </select>
    @error($model)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($model) }}</p>
    @enderror

</div>