<x-layout>
    <x-form-layout>
        <div class="mb-16 sm:mb-11">
            <x-svgs.logo />
        </div>

        <div class="mb-6">
            <h1 class="text-dark-100 font-extrabold text-2xl sm:text-xl">{{ __('auth.welcome back') }}</h1>
            <p class="text-dark-60 text-xl mt-4 sm:text-base">{{ __('auth.please enter your details') }}</p>
        </div>
        <form class="w-[24.5rem] sm:w-[21.45rem]" action="{{ route('login.post') }}" method="POST">
            @csrf

            <x-form.input name="username" placeholder="enter unique username or email" />
            <x-form.input name="password" placeholder="fill in password" type="password" />

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
                    class="text-brand-primary text-[0.875rem] font-semibold ">{{ __('auth.forgot password?') }}</a>
            </div>

            <x-form.button>{{ __('auth.log in') }}</x-form.button>

            <div class="mt-6 flex justify-center text-base sm:text-sm">
                <a class="text-dark-100 font-bold" href="{{ route('register') }}">
                    <span class="text-dark-60 font-normal ">{{ __("auth.don't have an account?") }}</span>
                    {{ __('auth.sign up for free') }}</a>
            </div>
        </form>
    </x-form-layout>
</x-layout>
