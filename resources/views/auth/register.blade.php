<x-layout>
    <x-form-layout>
        <div class="mb-16 sm:mb-11 flex gap-6 items-center">
            <x-svgs.logo />
            <x-dashboard.lang-switcher/>
        </div>

        <div class="mb-6">
            <h1 class="text-dark-100 font-extrabold text-2xl sm:text-xl">{{__('auth.welcome')}}</h1>
            <p class="text-dark-60 text-xl mt-2 sm:text-base">{{__('auth.please_enter')}}</p>
        </div>
        <form class="w-[24.5rem] sm:w-[21.45rem]" action="{{route('register.post')}}" method="POST">
            @csrf
           

            <x-form.input name="username" placeholder="enter_unique_username" />
            <x-form.input name="email" type="email" placeholder="enter_your_email" />
            <x-form.input name="password" type="password" placeholder="fill_in_password" />
            <x-form.input name="repeat_password" type="password" placeholder="repeat_password"
                label="repeat_password" />

            <x-form.button>{{(__('auth.sign_up'))}}</x-form.button>

            <div class="mt-6 flex justify-center text-base sm:text-sm">
                <a class="text-dark-100 font-bold" href="{{route('login')}}">
                    <span class="text-dark-60 font-normal ">{{__('auth.already_account')}}</span>
                    {{__('auth.log_in')}}</a>
            </div>
        </form>
    </x-form-layout>
</x-layout>
