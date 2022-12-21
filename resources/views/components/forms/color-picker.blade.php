@props(['label', 'model'])

<div>

    {{-- Label --}}
    <label for="color-picker-component-id-{{ $model }}" class="block text-xs font-medium tracking-wide {{ $errors->first($model) ? 'text-red-600 dark:text-red-500' : 'text-gray-700' }}">{{ htmlspecialchars_decode($label) }}</label>

    {{-- Form --}}
    <div class="mt-2 relative color-picker-wrapper">
        <input type="text" wire:model.defer="{{ $model }}" id="color-picker-component-id-{{ $model }}" class="color-picker-input cursor-pointer block w-full text-xs rounded border-2 ltr:pr-10 ltr:pl-3 rtl:pl-10 rtl:pr-3 py-3  font-normal {{ $errors->first($model) ? 'border-red-500 text-red-600 placeholder-red-400 focus:ring-red-500 focus:border-red-500' : 'border-gray-200 placeholder-gray-400 focus:ring-primary-600 focus:border-primary-600' }}" {{ $attributes }}>
    </div>

    {{-- Error --}}
    @error($model)
        <p class="mt-1 text-xs text-red-600 dark:text-red-500">{{ $errors->first($model) }}</p>
    @enderror

</div>