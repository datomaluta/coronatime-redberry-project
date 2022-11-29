<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        font-family: 'sans-serif';
        padding: 100px;
    }

    div {
        margin-bottom: 56px;
    }

    h1{
        margin-bottom: 16px;
        color: #00000;
        font-size:25px;
        font-weight:900;
    }

    p{
        font-size: 18px;
    }

    a {
        background-color: #0FBA68;
        padding: 20px;
        width: 392px;
        text-align: center;
        color: #fff;
        text-decoration: none;
        text-transform:uppercase;
        font-weight: bold;
        border-radius: 10px;
    }
</style>

<body>
    <div>
        <img src="{{asset('images/email_confirm.png')}}" alt="email">
    </div>

    <h1>{{__('auth.confirm_email')}}</h1>

    <p>{{__('auth.click_button')}}</p>

    <a style="color:#fff"  href="{{ route('user.verify', $token) }}">{{__('auth.verify_account')}}</a>
</body>

