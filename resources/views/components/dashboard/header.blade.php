<header class="flex justify-between items-center border-b border-neutral-100 pb-5">
    <div class="">
        <x-svgs.logo />
    </div>

    <nav class="flex text-base text-dark-100 items-center ">
        <div x-data="{show: false}" @click.away="show=false">
            <button class="mr-12 sm:mr-10 text-base flex items-center gap-1" @click="show = !show">
                {{app()->getLocale()=='en'?'English':'ქართული'}}
                <x-svgs.lang-arrow />
            </button>
        

            <div x-show="show" class="absolute bg-neutral-200 w-[4.5rem] rounded-sm"  style="display: none">
                @foreach (Config::get('languages') as $lang => $language)
                <a class="block py-1 pl-2 hover:bg-neutral-300 {{$lang == App::getLocale() ? 'bg-blue-600 text-white hover:bg-blue-600':'bg-transparent '}}" href="{{ route('lang.switch', $lang) }}">
                    {{ $lang }}</a>
            @endforeach
            </div>
        </div>

        <div class="hidden relative sm:flex sm:items-center sm:justify-center" x-data="{show:false}" @click.away="show=false">
            <button @click="show = !show">
                <x-svgs.burger />
            </button>

            <div x-show="show" class="absolute top-5 right-0 w-[3.5rem] rounded-sm text-center bg-neutral-200">
                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="text-sm hover: hover:text-red-500" type="submit">{{__('dashboard.log_out')}}</button>
                </form>
            </div>
        </div>

        <p class="font-bold pr-4 border-r border-neutral-200 mr-4 sm:hidden">{{Auth::user()->username}}</p>
        <form id="logout-form" method="POST" action="{{ route('logout') }}" class="sm:hidden">
            @csrf
            <button type="submit">{{__('dashboard.log_out')}}</button>
        </form>

    </nav>
</header>