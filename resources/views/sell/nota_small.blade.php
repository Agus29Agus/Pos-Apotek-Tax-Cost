<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nota Small</title>

    <?php
    $style = '
    <style>
        * {
            font-family: "consolas", sans-serif;
        }
        p {
            display: block;
            margin: 3px;
            font-size: 10pt;
        }
        table td {
            font-size: 9pt;
        }
        .text-center {
            text-align: center;
        }
        .text-right {
            text-align: right;
        }

        @media print {
            @page {
                margin: 0;
                size: 75mm 
    ';
    ?>
    <?php 
    $style .= 
        ! empty($_COOKIE['innerHeight'])
            ? $_COOKIE['innerHeight'] .'mm; }'
            : '}';
    ?>
    <?php
    $style .= '
            html, body {
                width: 70mm;
            }
            .btn-print {
                display: none;
            }
        }
    </style>
    ';
    ?>

    {!! $style !!}
</head>
<body onload="window.print()">
    <button class="btn-print" style="position: absolute; right: 1rem; top: rem;" onclick="window.print()">Print</button>
    <div class="text-center">
        <h3 style="margin-bottom: 5px;">{{ strtoupper($setting->name_company) }}</h3>
        <p>{{ strtoupper($setting->address) }}</p>
    </div>
    <br>
    <div>
        <p style="float: left;">{{ date('d-m-Y') }}</p>
        <p style="float: right">{{ strtoupper(auth()->user()->name) }}</p>
    </div>
    <div class="clear-both" style="clear: both;"></div>
    <p>No: {{ add_zero_front($sell->id_sell, 10) }}</p>
    <p class="text-center">===================================</p>
    
    <br>
    <table width="100%" style="border: 0;">
        @foreach ($detail as $item)
            <tr>
                <td colspan="3">{{ $item->product->name_product }}</td>
            </tr>
            <tr>
                <td>{{ $item->total }} x {{ money_format($item->sell_price) }}</td>
                <td></td>
                <td class="text-right">{{ money_format($item->total * $item->sell_price) }}</td>
            </tr>
        @endforeach
    </table>
    <p class="text-center">-----------------------------------</p>

    <table width="100%" style="border: 0;">
        <tr>
            <td>Total Price :</td>
            <td class="text-right">{{ money_format($sell->total_price) }}</td>
        </tr>
        <tr>
            <td>Total Item :</td>
            <td class="text-right">{{ money_format($sell->total_item) }}</td>
        </tr>
        <tr>
            <td>Discount :</td>
            <td class="text-right">{{ money_format($sell->discount) }}</td>
        </tr>
        <tr>
            <td>Total Payments :</td>
            <td class="text-right">{{ money_format($sell->pay) }}</td>
        </tr>
        <tr>
            <td>Received :</td>
            <td class="text-right">{{ money_format($sell->receive) }}</td>
        </tr>
        <tr>
            <td>Change :</td>
            <td class="text-right">{{ money_format($sell->receive - $sell->pay) }}</td>
        </tr>
    </table>

    <p class="text-center">===================================</p>
    <p class="text-center">-- THANK YOU --</p>
    <p class="text-center">Mr.\Mrs. {{ $sell->member->name ?? ''}}</p>

    <script>
        let body = document.body;
        let html = document.documentElement;
        let height = Math.max(
                body.scrollHeight, body.offsetHeight,
                html.clientHeight, html.scrollHeight, html.offsetHeight
            );

        document.cookie = "innerHeight=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "innerHeight="+ ((height + 50) * 0.264583);
    </script>
</body>
</html>