@props(['name', 'type' => 'text', 'placeholder', 'label' => false])

<x-form.field>
    @if (!$label)
        <x-form.label name="{{ $name }}" />
    @else
        <x-form.label name="{{ $label }}" />
    @endif

    <div class="relative">
        <input
            class="block w-full h-14 px-6 rounded-lg placeholder-zinc-500 bg-transparent border border-neutral-200 
        outline-none transition-all focus:border-brand-primary focus:shadow focus:shadow-blue-100 font-inherit
        {{ $errors->first($name) ? ' border-red-error' : '' }}"
            type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            placeholder="{{ __("auth.$placeholder") }}" required {{ $attributes(['value' => old($name)]) }}>
        <x-svgs.validation-check id="{{ $name }}-check" />
    </div>
    <x-form.error name="{{ $name }}" />

</x-form.field>
