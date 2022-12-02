<x-message-layout>
    <form class="sm:h-full" action="{{route('reset.password.post', $token)}}" method="POST">
        @csrf

    
    <div class="w-[24.5rem] sm:h-full lg:mx-auto sm:w-[21.45rem] mx-auto flex flex-col items-center sm:flex-grow">
        <h1 class="text-dark-100 text-2xl font-extrabold mb-14 mt-36 sm:mt-11">{{__('reset.reset_password')}}</h1>

        <div class="mb-14 w-full">
            <x-form.input name="password" placeholder="enter_new_password" label="new_password" type='password'/>
            <x-form.input name="repeat_password" placeholder="repeat_password" label="repeat_password" type='password' />
        </div>

        <div class="w-full flex  sm:items-end sm:flex-grow">
            <x-form.button>{{__('reset.save_changes')}}</x-form.button>
        </div>

    </div>
</form>
</x-message-layout>
