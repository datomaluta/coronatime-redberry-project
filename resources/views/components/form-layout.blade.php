<div class="w-[90rem] h-[56.3rem] flex  justify-between sm:h-full lg:w-auto items-center">
    <div class=" px-28 py-10 flex-grow sm:px-4 sm:py-6">
        <div class="w-[24.5rem] lg:mx-auto py-14 sm:w-[21.45rem]">
            {{ $slot }}
        </div>
    </div>
    <div class="lg:hidden">
        <img class="h-full" src="{{ url('images/covid.png') }}" alt="covid">
    </div>
</div>
