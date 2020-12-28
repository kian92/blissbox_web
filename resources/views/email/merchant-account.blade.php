<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>

    <title>Merchant Credentials</title>

    <style>
        body{
            font-family: 'Quicksand', serif;
            color:black;

        }
        table{
            padding-left: 15px;
            padding-right: 15px;
        }
        img{
            width: 90%;
        }
        #invoice-header{
            font-size: 200%;
        }
        .label{
            font-size: 90%;
        }
        .below-label{
            font-size: 100%;
        }
        body{
        }
    </style>

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
</head>
<body>

<table>
    <tbody>
    <tr>
        <td>
            <div id="header" style="text-align: center;"><img style="width: 50%;" src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" alt="Logo.png" /><hr id="header-divider" style="height: 3px; width: 100%; background: linear-gradient(90deg, #ffce51, #f4821e, #dc1c4d, #f8a491, #d76eab, #9752a0, #53489e, #0776bd, #7fc6ee, #7fc6ee, #35c2d6, #05ac89, #7ecdc3);" /></div>
        </td>
    </tr>
    <tr>
        <td>
            <div id="page-top">
                <h1 id="invoice-header" style="text-align: center;"><strong>Welcome to Blissbox</strong></h1>
                <br />
                <p>Dear Partner,</p>
                <p><b>WE ARE LIVE!</b></p>
                <p>Bring out the champagne and join us in a toast to the launch of our first gift Blissbox " Enjoy Gifting"! The website is live and also the start of sales through various platforms.  It's such exciting times! Soon, you will start to see our Blissbox vouchers being redeemed at your outlet.</p>
                <p>Here in this email, there is a step by step PDF instructions for you to login via our merchant platform to make reservations, validate the voucher, and also to get your payment from us.</a>.</p>
                <p>Should there be any questions regarding the access to our site, please do not hesitate to contact your account manager.</p>
                <table class="table-responsive" style="margin-left: 10px; margin-right: 10px; border-collapse: collapse;" border="1px solid">
                    <tbody>
                    <tr>
                        <td colspan="2">Merchant Login</td>
                    </tr>
                    <tr>
                        <td colspan="2">Website: <a href="https://www.blissbox.asia">www.blissbox.asia</a></td>
                    </tr>
                    <tr>
                        <th style="padding: 5px;">Username</th>
                        <th style="padding: 5px;">Password</th>
                    </tr>
                    <tr>
                        <td style="padding: 5px;">{{ $user }}</td>
                        <td style="padding: 5px;">password</td>
                    </tr>
                    </tbody>
                </table>
                <br/>
                <a href="https://issuu.com/blissboxpteltd/docs/partner_user_manual_fv">Partner User Manual</a>
                <p>*Do note that merchants are not able to purchase gift boxes under the merchant's account.</p>
                <p>For any system or technical error, please feedback it to <a href="mailto:developer@blissbox.asia">developer@blissbox.asia</a></p>
                <p><a href="https://www.blissbox.asia/login">https://www.blissbox.asia/login</a></p>
                <p>Thank you.</p>
                <p>Have a great day!</p>
                <p>Regards,</p>
                <p>Michel Saliba</p>
                <p>COO Blissbox</p>
            </div>
            <hr id="header-divider" style="height: 3px; width: 100%; background: linear-gradient(90deg, #ffce51, #f4821e, #dc1c4d, #f8a491, #d76eab, #9752a0, #53489e, #0776bd, #7fc6ee, #7fc6ee, #35c2d6, #05ac89, #7ecdc3);" /></td>
    </tr>
    </tbody>
</table>
</table>
</body>
</html>