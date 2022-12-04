<x-email-layout>
    <div class="img-box">
        <img src="{{ $message->embed(public_path().'/images/email_confirm.png') }}" alt="email"/>
    </div>

    <h1>{{__('reset.recover_password')}}</h1>

    <p>{{__('reset.click')}}</p>

    <a class="link" style="color:#fff"  href="{{route('reset.password.get', $token)}}">{{__('reset.recover_password')}}</a>
</x-email-layout>