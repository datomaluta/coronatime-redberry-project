<div class="w-full h-full flex sm:h-full lg:w-auto ">
    <div class="py-10 flex-grow sm:px-4 sm:py-6">
        <div class="lg:mx-auto w-max sm:w-[21.45rem] ml-[6.8rem]">
            {{ $slot }}
        </div>
    </div>
    <div class="h-full lg:hidden">
        <img class="h-full" src="{{ url('images/covid.png') }}" alt="covid">
    </div>
</div>
