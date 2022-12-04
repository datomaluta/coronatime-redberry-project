<x-email-layout>
    <div class="img-box">
        <img src="{{ $message->embed(public_path().'/images/email_confirm.png') }}" alt="email"/>
    </div>

    <h1>{{__('auth.confirm_email')}}</h1>

    <p>{{__('auth.click_button')}}</p>

    <a class="link" style="color:#fff"  href="{{ route('user.verify', $token) }}">{{__('auth.verify_account')}}</a>
</x-email-layout>
