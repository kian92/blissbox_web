<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Company Form</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <style>
        * {
            font-family: 'Quicksand', sans-serif !important;
            color: #000;
            font-size: 14px !important;
        }
        .container {
            margin-right: auto;
            margin-left: auto;
            padding-right: 15px;
            padding-left: 15px;
            width: 100%;
            max-width: 1140px;
        }
        .blue {
            color: #89D1E4;
        }
        .logo {
            display: block;
            text-center: center;
        }
        h2 {
            margin: 50px 0;
            font-size: 20px !important;
        }
        ol > li {
            margin: 10px 0;
        }
        p {
            margin-top: 20px;
            margin-bottom: 5px;
        }
        .text-center {
            text-align: center;
            font-family: "Quicksand", sans-serif;
        }
    </style>
</head>
<body>
<?php $image_path = '/images/logo.png'; ?>
<div class="container">
    <table>
        <tr>
            <td colspan="3" align="center">
                <img src="{{ public_path() . $image_path }}" alt="Logo Company" width="300px" class="logo" />
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <h2 class="text-center blue">How to redeem an experience:</h2>

                <ol>
                    <li>Explore the countless experiences through the booklet or
                        via our website at www.blissbox.asia.</li>
                    <li>Activate your experience through our website at www.
                        blissbox.asia by inputting the reference code and pin.
                        Book an experience directly with our experience partner
                        for a date that is suitable for you from the contact
                        details given.</li>
                    <li>Enjoy your fabulous experience! Don’t forget to review it
                        on our Blissbox page, we love to hear from you again!</li>
                </ol>
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <p class="text-center blue">
                    We are adding new experiences everyday, <br/>
                    remember to check out our full listing at
                </p>
                <h2 class="text-center blue" style="margin: auto">
                    www.blissbox.asia
                </h2>
            </td>
        </tr>
        <tr>
            <td valign="top" align="center" style="margin-top: 120px !important;">
                <img src="data:image/png;base64, {{ $barcode }} " alt="barcode" />
                <p>{{ $voucher['code'] }}</p>
            </td>
            <td></td>
            <td valign="top" style="margin-top: 120px !important;">
                <table>
                    <tr>
                        <td width="100px">
                            Voucher Number:
                        </td>
                        <td>
                            {{ $voucher['code'] }}
                        </td>
                    </tr>
                    <tr>
                        <td width="100px">
                            Pin Code:
                        </td>
                        <td>
                            {{ $voucher['pin'] }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>