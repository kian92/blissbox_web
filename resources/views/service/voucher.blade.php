<!DOCTYPE html>
<html lang="en">
    <body>
        <style>
            @page {
                size:  29.7cm 21cm;
                margin: 10px;
            }
            body {
                margin: 20px 0;
            }
            * {
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
            h1 {
                font-size: 20px !important;
            }
            p {
                font-size: 14px !important;
            }
            .text-center {
                text-align: center;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                table-layout:fixed;
            }
            table td {
                width: 50%;
                vertical-align: top;
            }
            img {
                max-width: 100%;
                height: auto;
            }
        </style>
        <div class="container">
            <table>
                <tr style="max-height: 200px; height: 200px;">
                    <td>
                        <img src="{{ public_path() . '/images/frontend/pdf/voucher_hero_banner.jpg' }}" alt="Enjoy Gifting" />
                    </td>
                    <td>
                        <img src="{{ public_path() . '/images/frontend/pdf/enjoy_experience.jpg' }}" alt="Enjoy Gifting" />
                    </td>
                </tr>
                <tr style="max-height: 200px; height: 200px;">
                    <td>
                        <h1 class="text-center">Gift Message</h1>
                        <p>
                            {{ $gift_message }}
                        </p>
                    </td>
                    <td class="text-center">
                        <h1 class="text-center">How To Use?</h1>
                        <img src="{{ public_path() . '/images/frontend/pdf/how_to_use.jpg' }}" alt="How to Use"/>
                        <table style="width: 100%; margin-top: 30px;">
                            <tr>
                                <td style="width: 50%; margin: 0 auto;">
                                    <img src="data:image/png;base64, {{ $barcode }} " alt="barcode" />
                                    <p>{{ $voucher['code'] }}</p>
                                </td>
                                <td style="width: 50%;">
                                    <table>
                                        <tr>
                                            <td>
                                                Reference Code:
                                            </td>
                                            <td>
                                                {{ $voucher['code'] }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
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
                    </td>
                </tr>
            </table>
        </div>
    </body>
</html>