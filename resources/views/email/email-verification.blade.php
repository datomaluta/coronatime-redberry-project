<x-email-layout>
    <div style="width:100%; margin-bottom: 56px;" class="img-box">
        <img style="width:100%;" src="{{ $message->embed(public_path() . '/images/email_confirm.png') }}" alt="email" />
    </div>

    <h1
        style="font-family: 'Inter', sans-serif; font-size: 25px; color: #000; font-weight: 900; width: max-content; margin:0 auto; margin-bottom: 16px;">
        {{ __('auth.confirm_email') }}</h1>

    <p
        style="font-family: 'Inter', sans-serif; font-size: 18px; color: #000; width: max-content; margin: 0 auto; margin-bottom: 40px;">
        {{ __('auth.click_button') }}</p>


    <a style="background-color: #0FBA68; text-decoration: none; 
    padding-bottom:20px; padding-top:20px; max-width:392px; 
    border-radius:8px; color: #fff; text-transform:uppercase; 
    font-weight:700; display:block; font-family: 'Inter', sans-serif;
    margin:0 auto; text-align:center; font-size: 16px;"
        href="{{ route('user.verify', $token) }}">
        {{ __('auth.verify_account') }}
    </a>

</x-email-layout>
