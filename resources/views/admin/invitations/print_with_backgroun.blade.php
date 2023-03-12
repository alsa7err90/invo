<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .print_div {
            background-image: url(/main-print.jpg);
            background-position: center !important;
            background-size: cover !important;
            -webkit-print-color-adjust: exact !important;
            background-size: contain;
            width: 400px;
            height: 800px;
            background-position: center !important;
            background-size: cover !important;
            -webkit-print-color-adjust: exact !important;
            background-color: white;
            width: 8.8cm;
            height: 11.83cm;
            margin-right: 0px;
            margin-top: 0px;
            border: 0px solid grey;
            position: relative;
            -webkit-print-color-adjust: exact;
            float: right;
            text-align: center;
        }
        .name{
            margin-top: 226px;
        }
        .qrcode{
            margin-top: 26px;
        }
    </style>
</head>

<body>
    <div class="print_div">
       <div class="name">
            <h2> {{ $invo->surname }} {{ $invo->surname2 }} </h2>
           <h2> {{ $invo->name }}</h2>
       </div>
       <div class="qrcode">
       {{ QrCode::size(75)->generate($invo->id) }}
       </div>
    </div>
</body>

</html>
