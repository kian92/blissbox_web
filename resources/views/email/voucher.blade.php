<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email Template</title>
    <style>
        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/NUrn2XQrRfyGZp5MknntaYX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/s2PXW4WrV3VLrOUpHiqsfYX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 400;
            src: local('Quicksand Regular'), local('Quicksand-Regular'), url(https://fonts.gstatic.com/s/quicksand/v7/sKd0EMYPAh5PYCRKSryvW5Bw1xU1rKptJj_0jans920.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 500;
            src: local('Quicksand Medium'), local('Quicksand-Medium'), url(https://fonts.gstatic.com/s/quicksand/v7/FRGja7LlrG1Mypm0hCq0DvgrLsWo7Jk1KvZser0olKY.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 500;
            src: local('Quicksand Medium'), local('Quicksand-Medium'), url(https://fonts.gstatic.com/s/quicksand/v7/FRGja7LlrG1Mypm0hCq0DojoYw3YTyktCCer_ilOlhE.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 500;
            src: local('Quicksand Medium'), local('Quicksand-Medium'), url(https://fonts.gstatic.com/s/quicksand/v7/FRGja7LlrG1Mypm0hCq0Dhampu5_7CjHW5spxoeN3Vs.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 700;
            src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v7/32nyIRHyCu6iqEka_hbKsvgrLsWo7Jk1KvZser0olKY.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 700;
            src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v7/32nyIRHyCu6iqEka_hbKsojoYw3YTyktCCer_ilOlhE.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Quicksand';
            font-style: normal;
            font-weight: 700;
            src: local('Quicksand Bold'), local('Quicksand-Bold'), url(https://fonts.gstatic.com/s/quicksand/v7/32nyIRHyCu6iqEka_hbKshampu5_7CjHW5spxoeN3Vs.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/sTdaA6j0Psb920Vjv-mrzH-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/uYECMKoHcO9x1wdmbyHIm3-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/tnj4SB6DNbdaQnsM8CFqBX-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/_VYFx-s824kXq_Ul2BHqYH-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/NJ4vxlgWwWbEsv18dAhqnn-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/Ks_cVxiCiwUWVsFWFA3Bjn-_kf6ByYO6CLYdB4HQE-Y.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 400;
            src: local('Roboto'), local('Roboto-Regular'), url(https://fonts.gstatic.com/s/roboto/v18/oMMgfZMQthOryQo9n22dcuvvDin1pK8aKteLpeZ5c0A.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/ZLqKeelYbATG60EpZBSDy4X0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/oHi30kwQWvpCWqAhzHcCSIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/rGvHdJnr2l75qb0YND9NyIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/mx9Uck6uB63VIKFYnEMXrYX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/mbmhprMH69Zi6eEPBYVFhYX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/oOeFwZNlrTefzLYmlVV1UIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 500;
            src: local('Roboto Medium'), local('Roboto-Medium'), url(https://fonts.gstatic.com/s/roboto/v18/RxZJdnzeo3R5zSexge8UUZBw1xU1rKptJj_0jans920.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/77FXFjRbGzN4aCrSFhlh3oX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/isZ-wbCXNKAbnjo6_TwHToX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/UX6i4JxQDm3fVTc1CPuwqoX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/jSN2CGVDbcVyCnfJfjSdfIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/PwZc-YbIL414wB9rB1IAPYX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/97uahxiqZRoncBaCEI3aW4X0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 700;
            src: local('Roboto Bold'), local('Roboto-Bold'), url(https://fonts.gstatic.com/s/roboto/v18/d-6IYplOFocCacKzxwXSOJBw1xU1rKptJj_0jans920.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/s7gftie1JANC-QmDJvMWZoX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/3Y_xCyt7TNunMGg0Et2pnoX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/WeQRRE07FDkIrr29oHQgHIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+1F00-1FFF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/jyIYROCkJM3gZ4KV00YXOIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0370-03FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/phsu-QZXz1JBv0PbFoPmEIX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0102-0103, U+1EA0-1EF9, U+20AB;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/9_7S_tWeGDh5Pq3u05RVkoX0hVgzZQUfRDuZrPvH3D8.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'Roboto';
            font-style: normal;
            font-weight: 900;
            src: local('Roboto Black'), local('Roboto-Black'), url(https://fonts.gstatic.com/s/roboto/v18/mnpfi9pxYH-Go5UiibESIpBw1xU1rKptJj_0jans920.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }

        /* latin */
        @font-face {
            font-family: 'Lobster Two';
            font-style: normal;
            font-weight: 400;
            src: local('Lobster Two'), local('LobsterTwo'), url(https://fonts.gstatic.com/s/lobstertwo/v10/Law3VVulBOoxyKPkrNsAaIgp9Q8gbYrhqGlRav_IXfk.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }


        @font-face {
            font-family: 'PT Sans';
            font-style: normal;
            font-weight: 400;
            src: local('PT Sans'), local('PTSans-Regular'), url(https://fonts.gstatic.com/s/ptsans/v9/fhNmDCnjccoUYyU4ZASaLVKPGs1ZzpMvnHX-7fPOuAc.woff2) format('woff2');
            unicode-range: U+0460-052F, U+20B4, U+2DE0-2DFF, U+A640-A69F;
        }

        @font-face {
            font-family: 'PT Sans';
            font-style: normal;
            font-weight: 400;
            src: local('PT Sans'), local('PTSans-Regular'), url(https://fonts.gstatic.com/s/ptsans/v9/BJVWev7_auVaQ__OU8Qih1KPGs1ZzpMvnHX-7fPOuAc.woff2) format('woff2');
            unicode-range: U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;
        }

        @font-face {
            font-family: 'PT Sans';
            font-style: normal;
            font-weight: 400;
            src: local('PT Sans'), local('PTSans-Regular'), url(https://fonts.gstatic.com/s/ptsans/v9/oysROHFTu1eTZ74Hcf8V-VKPGs1ZzpMvnHX-7fPOuAc.woff2) format('woff2');
            unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
        }

        @font-face {
            font-family: 'PT Sans';
            font-style: normal;
            font-weight: 400;
            src: local('PT Sans'), local('PTSans-Regular'), url(https://fonts.gstatic.com/s/ptsans/v9/CWlc_g68BGYDSGdpJvpktgLUuEpTyoUstqEm5AMlJo4.woff2) format('woff2');
            unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
        }
    </style>
</head>

<body>
<div class="container" style="max-width:800px;box-sizing:border-box;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;">
    <table class="table" style="border-collapse:collapse;">
        <tbody>
        <tr>
            <td colspan="2" class="text-center caption" style="font-family:'Quicksand', sans-serif;border-top-style:none !important;text-align:center !important;font-size:0.875rem;padding-top:1rem;padding-bottom:1rem;padding-right:0;padding-left:0;">
                We create a gifting experience that is second to none
            </td>
        </tr>
        <tr class="logo-wrapper" style="display:block;position:relative;line-height:0;">
            <td class="text-center" style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-top-style:none !important;text-align:center !important;display:block;">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png" width="350">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/border.png" width="100%">
            </td>
        </tr>
        <tr>
            <td>
                <table style="border-collapse: collapse; margin: 20px 0;">
                    <tr style="background-color: #fdf5e6;">
                        <td colspan="4" style="margin-bottom: 20px; font-family: 'Lobster', cursive; font-weight: bold; font-size: 28px;">
                            @if ($recipient)
                            <p style="text-align: center; margin-top: 10px;">Dear, {{ $recipient }}</p>
                            <p style="text-align: center; margin-top: 10px; font-size: 24px; font-weight: normal;">{{ $gift_message }}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="margin-bottom: 20px; font-family: 'Roboto', sans-serif; font-weight: bold; font-size: 28px;">
                            <p style="text-align: center; margin-top: 28px;">How to use?</p>
                        </td>
                    </tr>
                    <tr>
                        <th style="display: table-cell; width: 192.5px; border-left: 1px solid #FFF; border-right: 1px solid #FFF; word-break: break-word; vertical-align: middle; font-family: 'Quicksand', sans-serif; background-color: #FECE51; min-height: 50px; padding: 10px;">
                            <span style="display: inline-block; width: 20%; font-size: 30px; vertical-align: top;">&#9312;</span>
                            <span style="display: inline-block; width: 77%; text-align: left; margin-top: 10px;">Login</span>
                        </th>
                        <th style="display: table-cell; width: 192.5px; border-left: 1px solid #FFF; border-right: 1px solid #FFF; word-break: break-word; vertical-align: middle; font-family: 'Quicksand', sans-serif; background-color: #FECE51; min-height: 50px; padding: 10px;">
                            <span style="display: inline-block; width: 20%; font-size: 30px; vertical-align: top;">&#9313;</span>
                            <span style="display: inline-block; width: 77%; text-align: left;">Register Voucher</span>
                        </th>
                        <th style="display: table-cell; width: 192.5px; border-left: 1px solid #FFF; border-right: 1px solid #FFF; word-break: break-word; vertical-align: middle; font-family: 'Quicksand', sans-serif; background-color: #FECE51; min-height: 50px; padding: 10px;">
                            <span style="display: inline-block; width: 20%; font-size: 30px; vertical-align: top;">&#9314;</span>
                            <span style="display: inline-block; width: 77%; text-align: left;">Make Reservation</span>
                        </th>
                        <th style="display: table-cell; width: 192.5px; border-left: 1px solid #FFF; border-right: 1px solid #FFF; word-break: break-word; vertical-align: middle; font-family: 'Quicksand', sans-serif; background-color: #FECE51; min-height: 50px; padding: 10px;">
                            <span style="display: inline-block; width: 20%; font-size: 30px; vertical-align: top;">&#9315;</span>
                            <span style="display: inline-block; width: 77%; text-align: left; padding-top: 10px;">Enjoy</span>
                        </th>
                    </tr>
                    <tr>
                        <td colspan="4" style="margin-bottom: 20px; font-family: 'Roboto', sans-serif; font-weight: bold; font-size: 28px;">
                            <p style="text-align: center; margin-top: 28px;">eBox Information</p>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <table style="width: 100%">
                                <tr>
                                    <td style="font-family: Quicksand, sans-serif">
                                        <div style="text-align: center">
                                            {{--<img src="data:image/png;base64,{{ $barcode }}" alt="barcode" />--}}
                                            <img src="{{ $message->embed('storage/vouchers/' . $barcode) }}" alt="Barcode">
                                        </div>
                                        <table style="width: 100%; margin-top: 50px; font-size: 20px;">
                                            <tr>
                                                <td style="width: 50%">Reference Code:</td>
                                                <td style="width: 50%">{{ $voucher['code'] }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pin</td>
                                                <td style="width: 50%">{{ $voucher['pin'] }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align: center; background-color: #FECE51;">
                                        <a href="#" style="width: 100%; height: 100%; display: block; text-decoration: none; color: #000000; font-family: Quicksand, sans-serif; font-weight: bold">Go To Website</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="margin-bottom: 20px; font-family: 'Roboto', sans-serif; font-weight: normal; font-size: 16px;">
                            <p style="text-align: center; margin-bottom: 0px;">Please contact us at
                                <a href="mailto:support@blissbox.asia">support@blissbox.asia</a> if you have any question.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr class="footer" style="display:block;background-color:#111821;min-height:100%;color:#FFF;">
            <td class="text-center" style="width: 100%;display: block;">
                <table style="width:100%;border-collapse:collapse;border-style:none !important;outline-style:none !important;">
                    <tr style="text-align: center;">
                        <td style="padding-top:13px;padding-bottom:8px;padding-right:0;padding-left:0;font-size:0.875rem !important;">
                            <a href="https://www.facebook.com/blissboxasia/" target="_blank" style="text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/003-facebook-logo-button.png" alt="Facebook"
                                     style="display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;">
                            </a>
                            <a href="https://www.instagram.com/blissboxasia/" target="_blank" style="text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/002-instagram-logo.png" alt="Instagram"
                                     style="font-family:'Quicksand',
                                sans-serif;font-size:1.6rem;display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;">
                            </a>
                            <a href="https://sg.linkedin.com/company/blissbox-asia" target="_blank" style="font-family:'Quicksand', sans-serif;font-size:1.6rem;text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/001-linkedin-logo-button.png" alt="Linkedin"
                                     style="font-family:'Quicksand',
                                sans-serif;font-size:1.6rem;display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;">
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center copyright-wrapper" style="padding-bottom:8px;padding-right:0;padding-left:0;font-size:0.875rem !important;padding-top:0;text-align: center;">
                            <p class="copyright" style="font-family:'Quicksand', sans-serif;margin-top:15px;margin-bottom:15px;margin-right:0;margin-left:0;font-size:0.65rem;text-align: center;">
                                Copyright &copy; 2017</p>
                            <p style="font-family:'Quicksand', sans-serif;margin-top:15px;margin-bottom:15px;margin-right:0;margin-left:0;font-size:1.125rem;text-align: center;">
                                Blissbox Pte Ltd</p>
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