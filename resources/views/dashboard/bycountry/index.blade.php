<x-dashboard-layout>
    <form method="GET" action="#" class="mt-10 sm:mt-6">
        <div class="relative">
            <input type="text" name="search" placeholder="Search by country" value="{{request('search')}}"
                class="border border-neutral-200 py-4 rounded-lg pl-14 sm:pl-10 sm:border-none sm:text-sm sm:py-2">
            <x-svgs.search class="absolute left-6 top-1/2 -translate-y-1/2 sm:left-1" />
        </div>
    </form>

    <div
        class="h-[38rem] mt-10 sm:mt-6  rounded-lg overflow-hidden shadow-lg pb-16 mb-14 text-sm sm:absolute sm:left-0 sm:right-0 ">
        <div class="flex bg-neutral-100 py-5 pl-10 lg:pl-2 pr-[3rem] lg:pr-0 sm:pl-0">
            <a href="{{ route('dashboard.country', ['location' => request('location') == 'desc' ? 'asc' : 'desc','search'=>request('search')]) }}"
                class="flex items-center w-1/4 font-semibold">{{ __('dashboard.location') }}
                <x-svgs.sort query="location" />
            </a>
            <a href="{{ route('dashboard.country', ['confirmed' => request('confirmed') == 'desc' ? 'asc' : 'desc','search'=>request('search')]) }}"
                class="flex items-center  w-1/4 font-semibold">{{ __('dashboard.new_cases') }}
                <x-svgs.sort query="confirmed"/>
            </a>
            <a href="{{ route('dashboard.country', ['deaths' => request('deaths') == 'desc' ? 'asc' : 'desc','search'=>request('search')]) }}"
                class="flex items-center gap-1 sm:gap-0 sm:break-all w-1/4 sm:justify-center font-semibold">
                {{ __('dashboard.deaths') }}
                <x-svgs.sort query="deaths"/>
            </a>
            <a  href="{{ route('dashboard.country', ['recovered' => request('recovered') == 'desc' ? 'asc' : 'desc','search'=>request('search')]) }}"
                class="flex items-center gap-1 sm:gap-0 sm:break-all w-1/4 font-semibold">{{ __('dashboard.recovered') }}
                <x-svgs.sort query="recovered"/>
            </a>
        </div>

        <div class="h-full sm:pb-4 overflow-y-scroll scrollbar-thin scrollbar-thumb-rounded scrollbar-thumb-zinc-500 ">
            <div class="flex py-4 px-10 lg:px-2 border-b border-neutral-100">
                <p class=" w-1/4">{{ __('dashboard.worldwide') }}</p>
                <p class=" w-1/4">{{ number_format($worldwideData['confirmed']) }}</p>
                <p class=" w-1/4 sm:text-center sm:pr-5">{{ number_format($worldwideData['deaths']) }}</p>
                <p class=" w-1/4 sm:pl-3">{{ number_format($worldwideData['recovered']) }}</p>
            </div>

            @foreach ($data as $country)
                <div class="flex py-4 px-10 lg:px-2 border-b border-neutral-100 break-words">
                    <p class="w-1/4 sm:pr-2">{{ ucwords($country->name) }}</p>
                    <p class="w-1/4">{{ $country->confirmed }}</p>
                    <p class="w-1/4 sm:pl-3">{{ $country->deaths }}</p>
                    <p class="w-1/4 sm:pl-3">{{ $country->recovered }}</p>
                </div>
            @endforeach
        </div>

    </div>
</x-dashboard-layout>
