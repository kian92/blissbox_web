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

        @media (max-width: 420px) {
            div[class]
        }
    </style>
</head>

<body>
<div class="container"
     style="width: 800px; max-width:800px;box-sizing:content-box;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;">
    <table class="table" style="width: 800px; border-collapse:collapse; table-layout: fixed;">
        <tbody>
        <tr>
            <td colspan="2" class="text-center caption"
                style="font-family:'Quicksand', sans-serif;border-top-style:none !important;text-align:center !important;font-size:0.875rem;padding-top:1rem;padding-bottom:1rem;padding-right:0;padding-left:0;">
                We create a gifting experience that is second to none
            </td>
        </tr>
        <tr class="logo-wrapper" style="position:relative;line-height:0;">
            <td class="text-center"
                style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-top-style:none !important;text-align:center !important;"
                colspan="2">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/blissbox.png"
                     width="350">
                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/border.png"
                     width="100%">
            </td>
        </tr>
        <tr class="body"
            style="font-family:'Quicksand', sans-serif;font-size:1.6rem;padding-top:1rem;padding-bottom:1rem;padding-right:1rem;padding-left:1rem;box-sizing:border-box;">
            <td class="thank-you-message"
                style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-top-style:none !important;"
                colspan="2">
                <table style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-collapse:collapse; width: 100%;">
                    <tr>
                        <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:2rem;padding-bottom:2rem;padding-right:0;padding-left:0;text-align:center;font-size:2rem !important;">
                            Thank you for choosing Blissbox.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="payee-details"
                style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-top-style:none !important;padding-top:1.5rem;padding-bottom:1.5rem;padding-right:1.5rem;padding-left:1.5rem;"
                colspan="2">
                <h5 class="text-center"
                    style="font-family:'Quicksand', sans-serif;text-align:center !important;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:1.3rem;color:#7C7E82;">
                    <b>Customer Receipt #{{ $invoice }}</b></h5>
                <table class="payee-details-table"
                       style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-collapse:collapse;margin-top:1rem;margin-bottom:1rem;margin-right:auto;margin-left:auto;width: 100%;">
                    <tr class="gray"
                        style="font-family:'Quicksand', sans-serif;font-size:1.6rem;background-color:#F2F2F2;">
                        <td class="text-left"
                            style="border-top-style:none !important;text-align:left !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            Name
                        </td>
                        <td class="col"
                            style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            {{ $name }}
                        </td>
                    </tr>
                    <tr>
                        <td class="text-left"
                            style="border-top-style:none !important;text-align:left !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            Pay By
                        </td>
                        <td class="col"
                            style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            {{ $order['pay_by'] }}
                        </td>
                    </tr>
                    <tr class="gray"
                        style="font-family:'Quicksand', sans-serif;font-size:1.6rem;background-color:#F2F2F2;">
                        <td class="text-left"
                            style="border-top-style:none !important;text-align:left !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            Address
                        </td>
                        <td class="col"
                            style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:0.875rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;">
                            {{ $address }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="purchase-details"
                style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-top-style:none !important;padding-top:1.5rem;padding-bottom:1.5rem;padding-right:1.5rem;padding-left:1.5rem;"
                colspan="2">
                <h5 class="text-center"
                    style="font-family:'Quicksand', sans-serif;text-align:center !important;margin-top:0;margin-bottom:0;margin-right:0;margin-left:0;font-size:1.3rem;color:#7C7E82;">
                    <b>Purchase Details</b></h5>
                <table class="purchase-details-table"
                       style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-collapse:collapse;margin-top:1rem;margin-bottom:1rem;margin-right:auto;margin-left:auto;width:100%;">
                    <thead>
                    <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;background-color:#F2F2F2;">
                        <td width="150"
                            style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:1rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-weight:700;">
                            Giftbox Name
                        </td>
                        <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:1rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-weight:700;">
                            Quantity
                        </td>
                        <td width="80"
                            style="border-top-style:none !important;font-family:'Roboto', sans-serif;font-size:1rem !important;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-weight:700;">
                            Price
                        </td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $sub_total = 0; ?>
                    @foreach($order_details AS $detail)
                        <?php $sub_total += $detail['price']; ?>
                        <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#F2F2F2;">
                            <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                                {{ $detail['items'][0]->name }}
                            </td>
                            <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                                {{ $detail['count'] }}
                            </td>
                            <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                            <span class="currency"
                                  style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">SGD</span>
                                <span class="total text-right"
                                      style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ number_format($detail['price'] / 100, 2, '.', '') }}</span>
                            </td>
                        </tr>
                    @endforeach
                    <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#F2F2F2;">
                        <td colspan="2" class="text-right bold"
                            style="border-top-style:none !important;font-weight:bold;text-align:right !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;background-color:#F2F2F2;;border-bottom: 1px solid #FFF">
                            Total
                        </td>
                        <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                            <span class="currency"
                                  style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">SGD</span>
                            <span class="total text-right"
                                  style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ number_format($sub_total / 100, 2, '.', '') }}</span>
                        </td>
                    </tr>
                    @if ($delivery_cost !== 0)
                        <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#F2F2F2;">
                            <td colspan="2" class="text-right bold"
                                style="border-top-style:none !important;font-weight:bold;text-align:right !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;background-color:#F2F2F2;;border-bottom: 1px solid #FFF">
                                Deliver Cost
                            </td>
                            <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                            <span class="currency"
                                  style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">SGD</span>
                                <span class="total text-right"
                                      style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ number_format($delivery_cost, 2, '.', '') }}</span>
                            </td>
                        </tr>
                    @endif
                    @if(!is_null($order['coupon_id']))
                        <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#F2F2F2;">
                            <td colspan="2" class="text-right bold"
                                style="border-top-style:none !important;font-weight:bold;text-align:right !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;background-color:#F2F2F2;;border-bottom: 1px solid #FFF">
                                Applied Promo Code
                            </td>
                            <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                            <span class="code"
                                  style="font-size:0.875rem !important;float:left;display:block;font-family:'Quicksand', sans-serif;font-weight:bold;margin-bottom:10px;margin-right:0;margin-left:0;">{{ $coupon['code'] }}</span>
                                @if($coupon['type_id'] === 1)
                                    <span class="currency"
                                          style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">%</span>

                                    <span class="total text-right"
                                          style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ $coupon['value'] }}</span>
                                @else
                                    <span class="currency"
                                          style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">SGD</span>

                                    <span class="total text-right"
                                          style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ number_format($coupon['value'], 2, '.', '') }}</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                    <tr style="font-family:'Quicksand', sans-serif;font-size:1.6rem;border-bottom-width:1px;border-bottom-style:solid;border-bottom-color:#F2F2F2;">
                        <td colspan="2" class="text-right bold"
                            style="border-top-style:none !important;font-weight:bold;text-align:right !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;background-color:#F2F2F2;border-bottom: 1px solid #FFF">
                            Grand Total
                        </td>
                        <td style="border-top-style:none !important;font-family:'Roboto', sans-serif;padding-top:0.5rem;padding-bottom:0.5rem;padding-right:1rem;padding-left:1rem;font-size:0.875rem !important;">
                            <span class="currency"
                                  style="font-family:'Quicksand', sans-serif;font-size:0.875rem !important;display:inline-block;float:left;">SGD</span>
                            <span class="total text-right"
                                  style="font-family:'Quicksand', sans-serif;text-align:right !important;font-size:0.875rem !important;display:inline-block;float:right;">{{ number_format(($order->total + $delivery_cost) / 100, 2, '.', '') }}</span>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        <tr class="footer" style="background-color:#111821;min-height:100%;color:#FFF;">
            <td class="text-center" colspan="2">
                <table style="border-collapse:collapse;border-style:none !important;outline-style:none !important;margin: 0 auto;">
                    <tr style="text-align: center;">
                        <td style="padding-top:13px;padding-bottom:8px;padding-right:0;padding-left:0;font-size:0.875rem !important;">
                            <a href="https://www.facebook.com/blissboxasia/" target="_blank"
                               style="text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/003-facebook-logo-button.png"
                                     alt="Facebook"
                                     style="display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;"
                                >
                            </a>
                            <a href="https://www.instagram.com/blissboxasia/" target="_blank"
                               style="text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/002-instagram-logo.png"
                                     alt="Instagram" style="font-family:'Quicksand',
                                sans-serif;font-size:1.6rem;display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;"
                                >
                            </a>
                            <a href="https://sg.linkedin.com/company/blissbox-asia" target="_blank"
                               style="font-family:'Quicksand', sans-serif;font-size:1.6rem;text-decoration:none;text-transform:uppercase;">
                                <img src="https://storage.googleapis.com/blissbox-175105.appspot.com/Email%20Template/001-linkedin-logo-button.png"
                                     alt="Linkedin" style="font-family:'Quicksand',
                                sans-serif;font-size:1.6rem;display:inline-block;margin-top:0;margin-bottom:0;margin-right:25px;margin-left:25px;"
                                >
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="text-center copyright-wrapper"
                            style="padding-bottom:8px;padding-right:0;padding-left:0;font-size:0.875rem !important;padding-top:0;text-align: center;">
                            <p class="copyright"
                               style="font-family:'Quicksand', sans-serif;margin-top:15px;margin-bottom:15px;margin-right:0;margin-left:0;font-size:0.65rem;text-align: center;">
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