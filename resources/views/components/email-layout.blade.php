<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap');

        @media (max-width: 600px) {
            a {
                font-size: 14px !important;
                padding: 16px 0 !important;
            }

            .img-box {
                margin-bottom: 40px !important;
            }

            h1 {
                font-size: 20px !important;
                margin-bottom: 8px !important;
            }

            p {
                font-size: 16px !important;
            }
        }
    </style>
</head>


<body style="width: 100%;">
    <div style="padding:16px; max-width:520px; margin:0 auto;">
        {{ $slot }}
    </div>
</body>

</html>
