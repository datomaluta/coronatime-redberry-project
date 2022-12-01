@props(['name','count'])

<div
    {{ $attributes->merge(['class' => 'h-64 bg-opacity-[.08] rounded-2xl flex flex-col items-center justify-center']) }}>
    <div class="mb-6 h-12">
        {{ $slot }}
    </div>
    <h1 class="text-xl text-dark-100 font-medium mb-4 sm:text-base">{{__("dashboard.$name")}}</h1>
    <p style="background: transparent" {{ $attributes->merge(['class' => 'text-[2.45rem] font-black sm:text-2xl']) }}>{{$count}}</p>
</div>
