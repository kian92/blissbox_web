<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
    <style>
        /**
         * Default Template
         */

        /* vietnamese */
        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/NUrn2XQrRfyGZp5MknntaRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        /* latin-ext */
        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/s2PXW4WrV3VLrOUpHiqsfRJtnKITppOI_IvcXXDNrsc.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }
        /* latin */

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/sKd0EMYPAh5PYCRKSryvW1tXRa8TVwTICgirnJhmVJw.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        html {
            font-size: 16px;
            line-height: 1.15;
        }

        * {
            font-family: 'Quicksand', sans-serif;
            font-size: 1.6rem;
        }

        .text-center {
            text-align: center;
        }

        .white {
            background-color: #FFF;
        }

        .navyblue {
            background-color: #111821;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            border-top: none !important;
        }

        table td.caption {
            font-size: 0.875rem;
            padding: 1rem 0;
        }

        .container {
            max-width: 800px;
            width: 100%;
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .logo-wrapper {
            display: block;
            position: relative;
            line-height: 0;
        }

        .logo-wrapper > td {
            display: block;
        }

        .img-logo {
            margin: 0 auto;
        }

        .footer {
            display: block;
            background-color: #111821;
            min-height: 100%;
            color: #FFF;
        }

        .footer > td {
            display: block;
            margin: 0 auto;
        }

        .footer table {
            border: none !important;
            outline: none !important;
        }

        .footer table td {
            padding: 13px 0 8px 0;
            font-size: 0.875rem !important;
        }

        .footer ul {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .footer a img {
            display: inline-block;
            margin: 0 25px;
        }

        .footer .copyright-wrapper {
            padding-top: 0;
        }

        .footer .copyright {
            font-size: 0.65rem;
        }

        .body {
            padding: 1rem;
            box-sizing: border-box;
            display: block;
        }

        .body > td {
            display: block;
        }

        h1, h2, h3, p {
            margin: 15px 0;
        }

        h1 {
            font-size: 2.5rem;
        }

        h2 {
            font-size: 2rem;
        }

        h3 {
            font-size: 1.75rem;
        }

        p {
            font-size: 1.125rem;
        }

        a {
            text-decoration: none;
            text-transform: uppercase;
        }

        .btn {
            background-color: #FECE51;
            padding: 10px 35px;
            border-radius: 23px;
            color: #45474C;
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border: 1px solid transparent;
            font-size: 1rem;
            line-height: 1.5;
            transition: background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }

        /**
         * Custom Styling
         */
        .btn {
            margin: 1rem auto;
        }

        @media (max-width: 420px) {
            html {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>
<div class="container">
    <table class="table">
        <tbody>
        <tr>
            <td colspan="2" class="text-center caption">We create a gifting experience that is second to none</td>
        </tr>
        <tr class="logo-wrapper">
            <td class="text-center">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" width="350">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/border.png" width="100%">
            </td>
        </tr>
        <tr class="body text-center">
            <td colspan="2">
                <h3>Hi <b>User</b>,</h3>
                <p>We got a request to reset your Blissbox password</p>
                <div class="text-center">
                    <a href="" class="btn">Reset Your Password</a>
                </div>
                <p>Please let us know if you never request for password reset.</p>
            </td>
        </tr>
        <tr class="footer">
            <td class="text-center">
                <table>
                    <tr>
                        <td>
                            <a href="https://www.facebook.com/blissboxasia/" target="_blank">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/003-facebook-logo-button.png" alt="Facebook"">
                            </a>
                            <a href="https://www.instagram.com/blissboxasia/" target="_blank">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/002-instagram-logo.png" alt="Instagram"">
                            </a>
                            <a href="https://sg.linkedin.com/company/blissbox-asia" target="_blank">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/001-linkedin-logo-button.png" alt="Linkedin"">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center copyright-wrapper">
                            <p class="copyright">Copyright &copy; 2017</p>
                            <p>Blissbox Pte Ltd</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>