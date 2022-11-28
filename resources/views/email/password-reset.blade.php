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
    }
</style>

<body>
    <div>
        <img src="{{asset('images/emailimg.png')}}" alt="email">
    </div>

    <h1>{{__('reset.recover password')}}</h1>

    <p>{{__('reset.click')}}</p>

    <a style="color:#fff"  href="{{route('reset.password.get', $token)}}">{{__('reset.recover password')}}</a>
</body>

