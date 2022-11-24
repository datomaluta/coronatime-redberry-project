<x-layout>
    <x-form-layout>
        <form action="/register" method="POST">
            @csrf
            <div class="mb-16 sm:mb-11">
                <x-svgs.logo />
            </div>

            <div class="mb-6">
                <h1 class="text-dark-100 font-extrabold text-2xl sm:text-xl">Welcome</h1>
                <p class="text-dark-60 text-xl mt-2 sm:text-base">Please enter required info to sign up</p>
            </div>

            <x-form.input name="username" placeholder="Enter unique username" />
            <x-form.input name="email" type="email" placeholder="Enter your email" />
            <x-form.input name="password" type="password" placeholder="Fill in password" />
            <x-form.input name="repeat_password" type="password" placeholder="Repeat password"
                label="Repeat password" />


            <div class="flex justify-between mb-6 items-center">
                <div class="flex items-center gap-2">
                    <input type="checkbox" name="remember" id="remember" class="hidden">
                    <label for="remember"
                        class="w-[1.25rem] h-[1.25rem] border border-dark-60 rounded cursor-pointer flex items-center justify-center">
                        <x-svgs.check class="hidden" />
                    </label>
                    <label for="remember"
                        class="text-dark-100 text-[0.875rem] font-semibold cursor-pointer">Remember this device</label>
                </div>
            </div>

            <x-form.button>Sign up</x-form.button>

            <div class="mt-6 flex justify-center text-base sm:text-sm">
                <a class="text-dark-100 font-bold" href="#">
                    <span class="text-dark-60 font-normal ">Already have an account?</span>
                    Log in</a>
            </div>
        </form>
    </x-form-layout>
</x-layout>
