@props(['name', 'type' => 'text', 'placeholder', 'label' => false])

<x-form.field>
    @if (!$label)
        <x-form.label name="{{ $name }}" />
    @else
        <x-form.label name="{{ $label }}" />
    @endif

    <input
        class="block w-full h-14 px-6 rounded-lg placeholder-zinc-500 bg-transparent border border-neutral-200 outline-none transition-all focus:border-brand-primary focus:shadow focus:shadow-blue-100 font-inherit"
        type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder}}" required>
    @error($name)
        <span class="text text-red-500">{{ $message }}</span>
    @enderror
</x-form.field>
