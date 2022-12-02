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