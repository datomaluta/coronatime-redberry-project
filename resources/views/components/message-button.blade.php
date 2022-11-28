@props(['href'])

<a href="{{$href}}" class="uppercase bg-brand-secondary w-full flex justify-center items-center  rounded-lg text-base text-white
 font-extrabold h-14 sm:py-4"
    type="submit">
    {{ $slot }}
</a>
