<x-layout>
    <x-form-layout>
        <div class="mb-16 sm:mb-11 flex items-center gap-6">
            <x-svgs.logo />
            <x-dashboard.lang-switcher/>
        </div>

        <div class="mb-6">
            <h1 class="text-dark-100 font-extrabold text-2xl sm:text-xl">{{ __('auth.welcome_back') }}</h1>
            <p class="text-dark-60 text-xl mt-4 sm:text-base">{{ __('auth.please_enter_your_details') }}</p>
        </div>
        <form class="w-[24.5rem] sm:w-[21.45rem]" action="{{ route('login.post') }}" method="POST">
            @csrf

            <x-form.input name="username" placeholder="enter_unique_username_or_email" />
            <x-form.input name="password" placeholder="fill_in_password" type="password" />

            <div class="flex justify-between mb-6 items-center">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="hidden">
                    <label for="remember"
                        class="w-[1.25rem] h-[1.25rem] border border-dark-60 rounded cursor-pointer flex items-center justify-center">
                        <x-svgs.check class="hidden" />
                    </label>
                    <label for="remember"
                        class="text-dark-100 text-[0.875rem] font-semibold cursor-pointer">{{ __('auth.remember') }}</label>
                </div>
                <a href="{{ route('forget.password.get') }}"
                    class="text-brand-primary text-[0.875rem] font-semibold ">{{ __('auth.forgot_password?') }}</a>
            </div>

            <x-form.button>{{ __('auth.log_in') }}</x-form.button>

            <div class="mt-6 flex justify-center text-base sm:text-sm">
                <a class="text-dark-100 font-bold" href="{{ route('register') }}">
                    <span class="text-dark-60 font-normal ">{{ __("auth.dont_have_an_account?") }}</span>
                    {{ __('auth.sign_up_for_free') }}</a>
            </div>
        </form>
    </x-form-layout>
</x-layout>
