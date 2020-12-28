@extends('frontend.layouts.app')

@section('title', 'Privacy and Policy')

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .container-content {
            max-width: 1140px;
        }
        #hero-banner {
            max-height: 300px;
            background: rgba(0, 0, 0, 0.5) url("/images/frontend/universes/multitheme.png") no-repeat center center;
            background-size: cover;
            overflow: hidden;
        }
        #hero-banner .d-flex {
            max-height: 300px;
        }
        #hero-banner .captions {
            position: relative;
        }
        #hero-banner h1 {
            font-size: 3.125rem;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #FFF;
        }
        #hero-banner img {
            min-height: 300px;
        }
        footer.mt-4 {
            margin-top: 0 !important;
        }
        #privacy {
            background-color: #FFF;
            z-index: 10;
        }
        #privacy h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #privacy span {
            color: #FECE51;
        }
        #privacy .container {
            position: relative;
            padding: 65px 75px;
            background-color: #FFF;
        }
        #privacy .container-content {
            margin: 0 auto;
        }
        #privacy p,
        #privacy ul li {
            text-align: justify;
            font-family: 'Oxygen', sans-serif;
        }
        @media (max-width: 1199px) {
            html {
                font-size:14px;
            }
        }
        @media (max-width: 991px) {
            #hero-banner h1 {
                font-size: 2.5rem;
                width: 370px;
            }
        }
    </style>
@endsection

@section('body', 'frontend universe')

@section('content')
    <div id="privacy">
        <div class="load-background" v-if="loading">
            <div class="load">
                <?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text">
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <section id="hero-banner">
            <div class="d-flex">
                <div class="captions">
                    <img src="{{ asset('images/frontend/hero-banner.png') }}" class="img-fluid" alt="Emotion As Gift" />
                    <h1 class="font-weight-bold">Privacy and Policy</h1>
                </div>
            </div>
        </section>
        <section id="event">
            <div class="container">
                <div class="container-content">
                    <div id="listBoxes">
{{--                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid" />--}}
                        <h1 class="center-align">Blissbox Privacy and Policy</h1>
                        <p>
                            Blissbox PTE LTD(" Blissbox") issues gift vouchers to its customers via its website. Each voucher is an opportunity to suggest an appropriate experience for the recipient of the voucher but if the recipient would prefer a different experience, the voucher can also be redeemed by the recipient for a range of other activities. Whilst every effort is made to ensure the descriptions and pictures contained within the website and on gift vouchers are a true reflection of the events in respect of which the voucher may be redeemed, these do not form part of a contract. If on contacting the operator to redeem your voucher you feel that the activity taking place no longer accurately represents the activity shown on the Blissbox website, Blissbox will exchange the voucher or refund the purchase price. Once a specific date has been booked, you will automatically become bound by the terms and conditions that individual operator may have. Please note that experiences are subject to change without notice. This does not affect your statutory rights.
                        </p>

                        <h1 class="center-align">Our Values</h1>
                        <p>At Blissbox, we build our company’s foundation wiith following core values:</p>
                        <ol class="collection" type="1">
                            <li class="collection-item">
                                <h5>Prices</h5>
                                <p>
                                    The prices of specific experiences against which gift vouchers can be redeemed which are displayed on our website are correct to the best of our knowledge and maintained on a daily basis. In the event of a voucher being issued at or redeemed against an accidental incorrect price, we will endeavour to inform the purchaser of the error within seven days of the voucher purchase / voucher redemption being made, we will allow the recipient to either obtain a full refund against the voucher or choose to pay the additional difference in price. Promotional discount codes can only be redeemed against certain Blissbox experiences.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Availability</h5>
                                <p>
                                    Blissbox sells vouchers which are valid for 12 months from the date of issue (unless otherwise stated) and each recipient is free to book their preferred date for their chosen experience. The experiences in respect of which vouchers may be redeemed are subject to availability and in some cases, subject to weather conditions on the day. In order to avoid disappointment, we recommend that you book the experience in respect of which the voucher will be redeemed well in advance and DO NOT organise travel or accommodation until the booking has been confirmed by the operator.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Booking</h5>
                                <p>
                                    Please do not arrive at a venue expecting to redeem your gift voucher without first obtaining a booking confirmation letter or number from the operator. Blissbox will not be held liable for your costs incurred if you do not follow the procedure set out in these Terms and Conditions and in your voucher pack.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Event Duration</h5>
                                <p>
                                    Details of event duration given on the website and gift voucher are to be used as a guide only. Most events will be 'open' days, meaning that other members of the public will be taking part too. This could mean taking your turn with other members of the public. The information on our website and voucher is meant as an indication of what to expect at the session in respect of which your voucher is redeemed. As Blissbox vouchers can be redeemed in return for multi-location experiences, session lengths, agendas, vehicles used, numbers of participants and other factors specific to that experience may vary from location to location. Delays, curtailments and breakdowns are not within our control and therefore we cannot be held liable.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Safety</h5>
                                <p>
                                    The undertaking of these activities may involve some personal risk. With some events you may be required to sign a disclaimer on the day, please read these documents carefully. Some personal insurance policies may not cover some of the experiences in respect of which our vouchers may be redeemed. Please check with the operator and your insurer well in advance of your day. Note that operators usually require participants to comply with specified safety procedures. Please listen and take note if they ask you to do something - it is usually for your own safety.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Validity</h5>
                                <p>
                                    Each gift voucher is valid for a maximum of twelve months from the date of issue unless otherwise stated. A voucher will be deemed to be invalid if it is out of date (the validity date is clearly stated on the digital voucher, the validity date can be checked upon registration on Blissbox website www.blissbox.asia). All experiences should be booked and taken before the expiry date on the voucher.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Choosing the right experience</h5>
                                <p>
                                    Many of the vouchers offered may be redeemed for experiences which have some type of restriction applied to them; these restrictions are not decided by us but by the individual operator. These restrictions could include age, health, physical and size restrictions. Please read all the information provided for each experience, to ensure that your initial suggested voucher is the right one for the recipient. If you are unsure of the suitability of a particular event please contact us with your query and we will advise you accordingly.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Complaints</h5>
                                <p>
                                    The easiest way to resolve any problems that you may experience is to speak to the operator on the day. They will ensure that any issues are rectified. If you are still not satisfied, please send in details of your complaint (including your voucher reference number and the name of the person you spoke to on the day) to: Customer Services, Blissbox Pte LTD, 16 Stanley Street #03-01, Singapore 068735. Alternatively, you can contact us. Please remember that the operator will have the opportunity to respond as well. Similarly, we would like to hear any positive feedback. Email us on feedback@ Blissbox.asia
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Cancellations</h5>
                                <p>
                                    Once you book a specific date with an operator you are bound by their terms and conditions regarding cancellations. Once a date is confirmed with an operator it is not possible to change this date unless the operator agrees to the change. Where a date cannot be altered by an operator it will not be possible to issue a refund. In the unlikely event that one of our operators needs to cancel the experience after you have booked a date, they will contact you. We strongly recommend however, that you contact the operator on the day before you depart for your experience. In the event of cancellation, Blissbox will not be held liable for the cost of lost insurance premiums, travel expenses, pre-booked accommodation costs or any other costs incurred.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Operators & liability</h5>
                                <p>
                                    When redeeming your voucher and booking an experience with an operator you will be entering into a separate agreement with the operator and will be bound by their own terms and conditions, including any restrictions applied by that operator. Although Blissbox has sought to select highly experienced operators of 'once in a lifetime' experiences, Blissbox cannot be responsible for the safety standards or the quality or delivery of the experience, or any loss or damage suffered by you whilst participating in the experience for which the Operator shall be solely responsible. By purchasing a Blissbox voucher, booking an experience with a supplier, you acknowledge that the experience in respect of which the voucher will be redeemed is dependent on certain factors beyond the control of Blissbox and you agree that neither Blissbox nor any operator shall be liable for the cancellation, postponement or alteration of any experience for reasons beyond its reasonable control, including weather-related reasons, mechanical failure, location changes or otherwise. We do not undertake any technical examination of equipment, facilities or services in order to minimise personal risk. If mechanical machinery breaks down, you should ask the operator for reasonable substitutions without notice. The total liability of Blissbox for any claim whatsoever in connection with the Blissbox voucher or any experience in respect of which a voucher is redeemed shall be limited to the price paid for the experience voucher. We have tried to ensure that the descriptions and images used on all marketing material are accurate. However, images are intended to give a general idea of the experience described and do not form part of any contract between the purchaser and / or the recipient of the voucher and Blissbox.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Spectators</h5>
                                <p>
                                    Most operators will allow you to bring spectators to watch you participate in your selected experience. When redeeming your voucher and booking your date please inform the operator that you wish to bring other people. Some operators may request a nominal payment for spectators. Spectators are required to comply with the operators' terms, conditions and expectations of conduct. Any spectators deemed under the influence of drugs or alcohol will not be permitted on site.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Data Protection</h5>
                                <p>
                                    Your privacy is our highest priority - Your details will only be used to process orders, gather feedback & data regarding our products & services and to send you promotional material (if opted into this service). Sub contractors may also be used to fulfil tasks on our behalf, included but not limited to points referred to in this section.
                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Privacy Policy</h5>
                                <p>
                                    How we may we use your information:
                                    In addition to using your information to provide you with content, products, services, tailored and personalised recommendations and general account management, and the management of traffic across our network, we may also use your information in the following ways: To monitor, improve and protect our content, products and services, work with our agents and business partners to improve the products and services we offer, and develop new content, products and services..

                                </p>
                            </li>
                            <li class="collection-item">
                                <h5>Social Network Guidelines</h5>
                                <p>
                                    User Conduct: You agree not to upload, post, email or otherwise transmit: (a) any User Content or other data that is false, inaccurate, unlawful, harmful, threatening, abusive, defamatory, vulgar, obscene, invasive of another's privacy, hateful, or that otherwise degrades or intimidates an individual or group of individuals on the basis of religion, gender, sexual orientation, race, ethnicity, age or disability; (b) any unsolicited or unauthorised advertising, promotional materials, "junk mail," "spam," or any other form of solicitation; or (c) any material that contains software viruses or any other computer code, files or programs designed to interrupt, damage, destroy or limit the functionality of any computer software or hardware or telecommunications equipment.

                                    Content posted by you: You acknowledge that you are responsible for all the information, data, text, software, photographs, graphics, video, messages and other materials ("User Content"), whether publicly posted or privately transmitted, which you upload, post, email or otherwise transmit via the website and/or social network services. With respect to all User Content you elect to post, you grant us the royalty-free, perpetual, irrevocable, non-exclusive and fully sub-licensable right and licence to use, reproduce, modify, adapt, publish, translate, create derivate works from, distribute, perform and display such User Content (in whole or part) worldwide and/or to incorporate it in other works in any form, media, or technology now known or later developed. We shall have the right (but not the obligation) in our sole discretion to refuse, move or remove any User Content that violates these terms and conditions or is otherwise objectionable.

                                </p>
                            </li>
                            <!--    <li class="collection-item">Strong judgement and instinct</li>
                               <li class="collection-item">Curiosity</li>
                               <li class="collection-item">Always listening to people and gain their trust</li>
                               <li class="collection-item">Think big</li>
                               <li class="collection-item">High Quality rather than big quantity</li>
                               <li class="collection-item">Hire the best – “A” game players</li>
                               <li class="collection-item">True family - supporting each other</li> -->
                        </ol>
                        <p>If you have any concerns or questions please contact us by <a href="{{ url('/contact') }}">clicking here</a></p>
                        <b>Blissbox Pte LTD</b>
                        <p>A16 Stanley Street #03-01, Singapore 068735</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/common.js') }}"></script>
@endsection