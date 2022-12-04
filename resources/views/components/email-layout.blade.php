<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');
        body {
            height:100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif;
        }

        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 16px;
            max-width: 520px;
        }
    
        .img-box {
            margin-bottom: 56px;
        }

        .img-box img{
            width: 100%;
        }
    
        h1{
            margin-bottom: 16px;
            color: #00000;
            font-size:25px;
            font-weight:900;
        }
    
        p{
            font-size: 18px;
            text-align: center;
        }
    
        .link {
            background-color: #0FBA68;
            padding: 20px 0;
            width: 392px;
            text-align: center;
            color: #fff;
            text-decoration: none;
            text-transform:uppercase;
            font-weight: bold;
            border-radius: 8px;
            display: inline-block;
        }

        @media only screen and (max-width: 600px) {
            .link {
                width: 100%;
                font-size: 14px;
                padding: 16px 0;
            }

            .img-box{
                margin-bottom: 40px;
            }

            h1{
                font-size: 20px;
                margin-bottom: 8px;
            }
            p{
                font-size: 16px;
            }
        }
    </style>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container">
        {{$slot}}
    </div>

</body>


</html>

