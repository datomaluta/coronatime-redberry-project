<x-message-layout>
    <form action="{{route('forget.password.post')}}" method="POST">
        @csrf
    
    <div class="w-[24.5rem] lg:mx-auto sm:w-[21.45rem] mx-auto flex flex-col items-center sm:flex-grow">
        <h1 class="text-dark-100 text-2xl font-extrabold mb-14 mt-36 sm:mt-11 ">{{__('reset.reset_password')}}</h1>

        <div class="mb-14 w-full">
            <x-form.input  name="email" placeholder="enter_your_email" />
        </div>


        <div class=" w-full flex  sm:items-end sm:flex-grow">
            <x-form.button>{{__('reset.reset_password')}}</x-form.button>
        </div>
    </div>
</form>
</x-message-layout>
