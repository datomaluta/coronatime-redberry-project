<x-message-layout>
    <div class="flex flex-col items-center mt-64 mb-24">
        <x-svgs.circle-check/>
        <p class="text-lg text-dark-100 mt-4 sm:text-base text-center px-16">Your account is confirmed, you can sign in</p>
    </div>

    <div class="w-[24.5rem] sm:w-[21.45rem] sm:flex sm:flex-grow sm:items-end">
        <a href="{{route('login')}}">Sign in</a>
    </div>

</x-message-layout>