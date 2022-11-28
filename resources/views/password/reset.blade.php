<x-message-layout>
    <form action="{{route('reset.password.post', $token)}}" method="POST">
        @csrf

    
    <div class="w-[24.5rem] lg:mx-auto sm:w-[21.45rem] mx-auto flex flex-col items-center sm:flex-grow">
        <h1 class="text-dark-100 text-2xl font-extrabold mb-14 mt-36 sm:mt-11">Reset Password</h1>

        <div class="mb-14 w-full">
            <x-form.input name="password" placeholder="enter new password" label="new password" />
            <x-form.input name="repeat_password" placeholder="repeat password" label="repeat password" />
        </div>

        <div class="w-full flex  sm:items-end sm:flex-grow">
            <x-form.button>save changes</x-form.button>
        </div>

    </div>
</form>
</x-message-layout>
