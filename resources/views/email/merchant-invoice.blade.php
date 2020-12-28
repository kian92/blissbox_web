@extends ('email.layouts.app')

@section('email-content')
<table style="width: 100%; font-family:'Quicksand', sans-serif;font-size:1.6rem; line-height: 1.5;">
    <!-- Merchant Information -->
    <tr style="padding-top: 20px; display: block">
        <td colspan="2">
            <table>
                <tr>
                    <td><b>Bill From:</b></td>
                </tr>
                <tr>
                    <td>
                        Merchant Company Name
                    </td>
                </tr>
                <tr>
                    <td>
                        Address                                
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Blissbox Information -->
    <tr style="display: block; padding-top: 20px">
        <td style="width: 80vw">
            <table style="width: 100%">
                <tr>
                    <td><b>Bill To:</b></td>
                </tr>
                <tr>
                    <td>Blissbox Pte Ltd</td>
                </tr>
                <tr>
                    <td>
                        16 Stanley St. Level 3, <span style="display: block">Singapore 06873</span>
                    </td>
                </tr>
            </table>
        </td>
        <td style="width: 20vw">
            <table style="width: 100%">
                <tr>
                    <td><b>Invoice No:</b></td>
                </tr>
                <tr>
                    <td>INVBB000001</td>
                </tr>
                <tr>
                    <td><b>Invoice Date:</b></td>
                </tr>
                <tr>
                    <td>Febuary 2018, 20</td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- Item Information -->
    <tr style="display: block; margin: 20px 0; border-top: #DEDEDE">
        <td style="display: block;">
            <table style="width: 100%; border-collapse: collapse;">
                <tr>
                    <th style="padding: 10px; text-align: left; background-color: #DEDEDE; text-align: center;">
                        <b>Box Name</b>
                    </th>
                    <th style="padding: 10px; text-align: left; background-color: #DEDEDE;">
                        <b>Price</b>
                    </th>
                    <th style="padding: 10px; text-align: left; background-color: #DEDEDE;">
                        <b>GST</b>
                    </th>
                    <th style="padding: 10px; text-align: left; background-color: #DEDEDE;">
                        <b>Amount to Refund</b>
                    </th>
                </tr>
                <tr>
                    <td style="padding: 10px; border-top: 2px solid #DCDCDC; border-bottom: 4px solid #DCDCDC">
                        Enjoy Gifting - Absolute Skin Treatment
                    </td>
                    <td style="padding: 10px; border-top: 2px solid #DCDCDC; border-bottom: 4px solid #DCDCDC; text-align: right;">
                        SGD 44.90
                    </td>
                    <td style="padding: 10px; border-top: 2px solid #DCDCDC; border-bottom: 4px solid #DCDCDC">
                        NO
                    </td>
                    <td style="padding: 10px; border-top: 2px solid #DCDCDC; border-bottom: 4px solid #DCDCDC; text-align: right;">
                        SGD 31.43
                    </td>
                </tr>
                <tr>
                    <td style="padding: 10px;" colspan="2"></td>
                    <td style="padding: 10px;"><b>Sub-total</b></td>
                    <td style="padding: 10px; text-align: right;">SGD 30.00</td>
                </tr>
                <tr>
                    <td style="padding: 10px;" colspan="2"></td>
                    <td style="padding: 10px;"><b>GST (7%)</b></td>
                    <td style="padding: 10px; text-align: right;">SGD 0.00</td>
                </tr>
                <tr>
                    <td style="padding: 10px;" colspan="2"></td>
                    <td style="padding: 10px;"><b>Grand Total</b></td>
                    <td style="padding: 10px; text-align: right;">SGD 100.00</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
@endsection