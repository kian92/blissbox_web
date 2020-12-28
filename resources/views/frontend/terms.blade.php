@extends('frontend.layouts.app')

@section('title', 'Terms and Conditions')

@section('inline-style')
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
        #terms {
            background-color: #FFF;
            z-index: 10;
        }
        #terms h1 {
            font-family: 'Quicksand', sans-serif;
            font-size: 3.125rem;
            font-weight: bolder;
        }
        #terms span {
            color: #FECE51;
        }
        #terms .container {
            position: relative;
            padding: 65px 20px;
            background-color: #FFF;
        }
        #terms .container-content {
            margin: 0 auto;
        }
        #terms p,
        #terms ul li {
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
    <div id="about">
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
                    <h1 class="font-weight-bold">Terms and Conditions</h1>
                </div>
            </div>
        </section>
        <section id="terms">
            <div class="container">
                <div class="container-content">
{{--                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid mb-5" />--}}
                        <p>
                            Access to Blissbox’s website currently accessible at the URL: http://www.blissbox.asia
                            (“Website”) and any of its pages is granted, the Gift Boxes are sold, and redemption of
                            the Gift Vouchers are facilitated by Blissbox Pte Ltd (Company Registration Number:
                            201617504N) (“Blissbox”, “we”, and “us”, with “our” having the corresponding meaning)
                            subject to the following terms and conditions (“General T&Cs”).
                        </p>
                        <p>
                            By accessing the Website and continuing to do the same, purchasing a Gift Box, and/or
                            redeeming a Gift Voucher, you agree to be unconditionally bound by these General T&Cs
                            which may be updated by us in our sole discretion from time to time without notice to you.
                            If you do not agree to any of these General T&Cs, please discontinue your access, desist
                            from purchasing a Gift Box, and/or desist from redeeming a Gift Voucher. You agree that
                            your continued access of the Website, purchase of any Gift Box, and/or redemption of any
                            Gift Voucher after such update shall constitute your acceptance of and agreement to be
                            bound by the updated General T&Cs.
                        </p>
                        <p>
                            Use of the products or services described on the Website or the distribution of the Website’s
                            materials may be restricted or prohibited by law in certain jurisdictions, and we make no
                            representation that the products, services, materials and information contained herein
                            are appropriate or available for use in other locations/jurisdictions other than Singapore.
                        </p>
                        <p>
                            It is your responsibility to find out what those restrictions or prohibitions are and observe
                            them. The Website does not constitute an offer on our part to provide products or services
                            described therein to persons or entities resident in countries where local law or regulation
                            does not permit their use. In the event that the laws of the jurisdiction you are in do not
                            permit or impose restrictions on the access to the contents of the Website, you shall
                            forthwith discontinue access or comply with such restrictions (as the case may be).
                            You shall ensure at all times that your use of the Website and of the products or services
                            described on the Website complies with applicable laws.
                        </p>

                        <h1 class="center-align">A. WEBSITE T&Cs</h1>
                        <p>This <b>Section A</b> shall apply to all users of the Website.</p>
                        <ul class="collection">
                            <li class="collection-item">

                                <b>1. INFORMATION AND MATERIALS,</b><br/>
                                <hr>
                                <p>The information and materials contained in the Website including any services, products,
                                    information, data, text, graphics, audio, video, links or other items - are provided “as is”,
                                    and “as available”. We do not warrant the accuracy, adequacy or completeness of such
                                    information and materials and expressly disclaims liability for errors or omissions in such
                                    information and materials. Products and services (including those of any third party
                                    providers) are available only at our discretion, subject to the respective products’ and
                                    services’ terms and conditions and any relevant disclaimers on which they are offered, and
                                    such products and services may be withdrawn or amended at any time without notice. For
                                    details of the products and/or services offered by the Partner Merchants as included in
                                    the Gift Box and described in the Guide, one of which may be redeemed with a Gift Voucher
                                    accepted by the relevant Partner Merchant (“Products/Services”), please contact the
                                    Partner Merchant providing such Products/Services.</p>

                                <p>Downloading (save as provided below), reproduction, derivation, modification, distribution,
                                    republication, display, broadcast, transmission or storage, of any material on the Website
                                    and any website hyperlinked on the Website, in any manner and by any means, and in any
                                    media whatsoever, is expressly prohibited without our prior written approval, which may
                                    be granted or refused at our sole discretion, and if granted may be subject to compliance
                                    with such terms and conditions as we may impose. No right to or licence of the Intellectual
                                    Property Rights is granted, save that you are authorised to download the content of
                                    this Website solely for your personal, non-commercial and lawful use for the purpose of
                                    considering whether to purchase any of the Gift Boxes offered and for the actual purchase
                                    of the Gift Boxes. For the avoidance of doubt, you may not reproduce, modify, display, sell,
                                    or distribute any of the material on the Website, or use it in any other way for any purpose.
                                    This prohibition shall include without limitation copying or adapting the HTML code used
                                    to generate the pages on the Website. Hyperlinking the Website on any other website
                                    or mirroring any of the information in the Website on any other server is also expressly
                                    prohibited without our prior written approval. In particular, we prohibit linking to or framing
                                    in any site containing inappropriate, profane, defamatory, infringing, obscene, indecent or
                                    unlawful topics, names, material or information, or material or information that violates any
                                    applicable Intellectual Property Rights or proprietary, privacy or publicity rights.</p>
                                <p>The information and materials are provided as of the effective date stated above and do
                                    not reflect any changes in law, events or practice since that date. We do not undertake any
                                    obligation to update the information and materials or to correct any inaccuracy that may
                                    become apparent at a later time. All information, opinions and statements expressed are
                                    subject to change without notice, and we may at our sole discretion modify unilaterally the
                                    presentation and configuration of the Website and the Gift Boxes, their contents and information.</p>

                                <p>The materials may be taken or compiled from sources that we believe to be reliable. While
                                    all reasonable care has been taken in preparing the materials, we neither represent nor
                                    warrant that the materials are accurate, useful, adequate, timely or complete and they
                                    should not be relied upon as such, and no responsibility or liability is accepted for any loss
                                    arising directly or indirectly in connection with or as a result of any person acting on any
                                    information, opinion or statement expressed in the materials contained on the Website. You
                                    should always consult primary or more accurate or more up-to-date sources of information.</p></li>
                            <li class="collection-item"><b>2. USER CONTENT</b><br/><hr>
                                <p>All material including without limitation text, logos, designs, photographs, graphics, pictures,
                                    documents, reviews, posts and comments and any works or other subject matter, which you
                                    upload, post, email or otherwise transmit via, on or to the Website (through any website
                                    forums or otherwise) or directly to us (“User Content”) are your sole responsibility. You,
                                    and not us, are solely and entirely responsible for the form, content and accuracy of all
                                    User Content. We do not assume any obligation to remove, validate, screen, verify or edit
                                    User Content, but may in our sole discretion remove, modify or reject any User Content, or
                                    restrict, refuse or ban you from any and all future use of any other services provided by us.</p>
                                <p>To the extent that you provide Blissbox with any User Content, you represent and warrant
                                    that you own or have obtained all necessary rights, consents and permissions to provide
                                    such material to Blissbox for the purposes envisaged under these General T&Cs, and that
                                    your User Content constitute your own original works and creations and/or in any case
                                    does not and shall not infringe the Intellectual Property Rights or other rights of any
                                    third party.</p>
                                <p>You hereby grant us a worldwide, irrevocable, perpetual, non-exclusive, royalty-free,
                                    sub-licensable, transferable licence to do all acts comprised in the Intellectual Property
                                    Rights in respect of User Content for any purpose we deem fit, including without limitation
                                    the rights to use, exercise, reproduce, display, modify, communicate, transmit, adapt,
                                    perform, publish, distribute or develop the same in all forms of media whether now known
                                    or in the future invented, for the purposes of operating the Website, providing the products
                                    and services relating to the Website, advertising, marketing, promotional and any other
                                    business-related purposes.</p>
                                <p>You agree that we shall not be under any obligation of confidentiality to you regarding
                                    any such User Content transmitted to us using the Website unless agreed otherwise in a
                                    separate direct contract between you and us or required by law.</p>
                            </li>

                            <li class="collection-item"><b>3. NO ILLEGAL OR HARMFUL USE</b><br><hr><p>
                                    You may not use the Website or transmit, distribute, link, market, publish, display or sell any
                                    User Content which is harmful in nature or in violation of any laws or regulations (foreign
                                    or domestic) or to commit, engage in, perpetuate or abet any breach of security, fraud,
                                    criminal act, offence. The kinds of illegal or harmful conduct which are prohibited includes
                                    but is not limited to the following:<br/><br/>
                                    <b>(a)</b> impersonating or falsely stating or otherwise misrepresenting your affiliation with any
                                    person or entity;<br/>
                                    <b>(b)</b> forging headers or otherwise manipulating any identifying information in order to
                                    disguise and/or with the effect of disguising the origin of any User Content
                                    transmitted through the Website;<br/>

                                    <b>(c)</b> transmitting User Content that is unlawful, libellous, defamatory, indecent, harassing,
                                    threatening, harmful, invasive of privacy or publicity rights, abusive, inflammatory or
                                    otherwise objectionable;<br/>
                                    <b>(d)</b> infringement of Intellectual Property Rights or other proprietary rights without
                                    proper authorization;<br/>
                                    <b>(e)</b> offering or disseminating fraudulent goods, services, schemes, or promotions;<br/>
                                    <b>(f)</b> fraudulent submission or use of personal or financial information or engaging in any
                                    practice that constitutes an unfair or deceptive trade practice;<br/>
                                    <b>(g)</b> transmitting any unsolicited or unauthorized advertising, promotional materials, junk
                                    mail, spam, chain letters, pyramid schemes, or any other form of solicitation;<br/>
                                    <b>(h)</b> transmitting any User Content that you do not have a right to transmit
                                    under any law or under any contractual or fiduciary relationships (such as inside
                                    information, proprietary and confidential information learned or disclosed as part of
                                    employment relationships or under non-disclosure agreements); or<br/>
                                    <b>(i)</b> stalking or otherwise harassing another person.
                                    We may restrict or prohibit any and all activities, conduct or User Content (or delete, move
                                    or edit the same) that we determine in our sole discretion to be potentially harmful to our
                                    systems, network, reputation, goodwill, our other customers, or any third party.</p></li>
                            <li class="collection-item"><b>4. RISKS</b><br/><hr>
                                <p>You acknowledge that your use of the Website may, at any time, be adversely affected by
                                    problems with your computer (or such other access or electronic device including but not
                                    limited to cellular telephones, smart phones and tablets), the internet and the cellular phone
                                    network, including, without limitation, interference to the network coverage, undeliverable

                                    messages or delay in transmission due to any reason such as excessive network traffic,
                                    service interruption or incorrect data transmission.</p>
                                <p>We may contract with one or more third parties to provide, maintain and host the products
                                    or services on the Website. Therefore, any information which you transmit or User Content
                                    may be placed and stored on a computer server maintained by a third party.
                                    You acknowledge that such information or content could pass through and may be stored in
                                    servers outside our control. You agree that we have no liability or responsibility for any such
                                    pass-through or storage of the same.</p>
                                <p>You acknowledge that all transmissions (whether by email or otherwise) to and from
                                    this Website cannot be guaranteed to be completely secure or error-free and that such
                                    transmissions could arrive late, be intercepted, corrupted, lost, destroyed or incomplete,
                                    contain viruses, and/or may not be received by the intended recipient. Consequently, you
                                    understand that you should not post or transmit any private or confidential User Content
                                    or information (whether yours or the recipient’s) unless you want it to be available publicly.
                                    You are aware that the User Content may be subsequently forwarded to a third party by
                                    the recipient. You further understand that as we cannot control or prevent the transmission
                                    of your private or confidential User Content by a third party, we cannot be responsible or
                                    held liable for the same. Accordingly, we do not warrant the privacy and/or security of any
                                    transmissions (whether by email or otherwise) to and from the Website. You shall keep your
                                    password secure and not permit any other person to use your password or account, or
                                    attempt to assign use of your account to any other person, or share your account with any
                                    other person. You shall notify us and provide us with full particulars of any security breach
                                    including without limitation access of your account by another person, whether by acquiring
                                    your password or otherwise.</p></li>
                            <li class="collection-item"><b>5. DISCLAIMERS AND EXCLUSIONS</b><br/><hr>
                                <p>We neither make nor provide any representation or warranty of any kind whether express,
                                    implied or statutory (including but not limited to any warranties of title, non-infringement of
                                    third party rights, merchantability, satisfactory quality, fitness for a particular purpose and
                                    freedom from viruses, worms, trojan horses, software bombs and malicious, destructive or
                                    corrupting codes, agents, programs or macros and spyware or similar items or processes)
                                    in conjunction with the Website, or any information and materials contained or referred to
                                    on each page associated with the Website. We do not warrant that access to the same on
                                    the Website, or the Website as a whole will be provided uninterrupted or free from errors or
                                    that any identified defect will be corrected.</p>
                                <p>You understand and agree that your use of the Website is at your own risk and to the
                                    maximum extent permitted by law, we shall not be responsible or liable to you for
                                    any claims, actions, proceedings, expenses, losses, costs, damages, liabilities or other
                                    consequences of whatsoever nature and howsoever arising, including but not limited to loss
                                    of data, profits, goodwill, anticipated savings, reputation, business or business opportunity,
                                    and/or any indirect, economic or consequential loss or damage of any kind, regardless of
                                    the cause thereof (“Losses”), which may be brought against or suffered or incurred directly
                                    or indirectly by you even if we, our agents or employees are advised of the possibility of
                                    such Losses, including without limitation such Losses arising from or in connection with:</p>
                                <b>(a)</b> any maintenance, breakdown, fault or non-availability of any part of the Website or
                                any inability to access or use any part of the same;<br/>

                                <b>(b)</b> any telecommunication problems, power supply problems, internet- or network-
                                related problems, problems with the services rendered by third party vendors or

                                service providers;<br/>

                                <b>(c)</b> any system, server or connection failure, error, omission, interruption, delay in
                                transmission, or viruses (including but not limited to any difficulties experienced by
                                your internet service provider(s), network provider(s) or telecommunications
                                provider(s) or operator(s));<br/>
                                <b>(d)</b> any access or use of any part of the Website, or reliance on the contents of the same;<br/>
                                <b>(e)</b> any defect, error, imperfection, fault, mistake or inaccuracy with the Website, its
                                contents or associated services;<br/>
                                <b>(f)</b> problems caused by any remedial or preventative measure which may be taken by us
                                in the event of any occurrence of the foregoing;<br/>
                                <b>(g)</b> any use of or access to any other website linked to the Website;<br/>
                                <b>(h)</b> any services, products, information, data, software or other material obtained from
                                the Website or from any other website linked to the Website; or
                                <b>(i)</b> any software downloaded from the Website<br/></li>
                            <li class="collection-item"><b>6. HYPERLINKS</b><br/><hr>
                                Any hyperlinks on the Website exist only for information purposes and are for your
                                convenience only. We accept no liability for any Losses arising directly or indirectly from
                                the accuracy or otherwise of materials or information contained on the pages of such
                                websites or loss arising directly or indirectly from defects with such websites. Our inclusion
                                of hyperlinks does not imply any warranty, endorsement or verification of the material on
                                such websites and such websites should only be accessed at your own risks.</li>
                            <li class="collection-item"><b>7. THIRD PARTY SERVICES</b><br/><hr>
                                We cannot be responsible for any services through which you access the Website or for any
                                Losses you may suffer as a result of you using any third party service. You must comply
                                with all the terms and conditions of such a service and pay all the charges connected with it.</li>
                        </ul>
                        <h1 class="center-align">B. ONLINE PURCHASE T&Cs</h1>
                        <p>This <b>Section B</b> This Section B shall apply to all persons who purchase a Gift Box (“Purchasers”) directly
                            from Blissbox via the Website, and where the context otherwise requires, such other person
                            including but not limited to recipients of Gift Boxes.</p>
                        <ul class="collection">
                            <li class="collection-item">
                                <b>8. PAYMENT</b><br/><hr>
                                <p>You may make payment for each order for Gift Boxes only either through PayPal or by
                                    credit or debit card (Nets, Visa, Mastercard or AMEX), and shall provide the relevant
                                    payment details to Blissbox. The total amount of the order may be deducted from the
                                    PayPal account or credit or debit card on the day the order is placed. Blissbox may cancel
                                    the order in the event that PayPal or the relevant bank does not authorise the payment.</p>
                                <p>You may make payment for Gift Boxes using coupons issued by Blissbox (“Blissbox
                                    Coupons”), by entering the relevant Blissbox Coupon details on the Website. Upon
                                    verification by Blissbox that such Blissbox Coupon is valid, Blissbox may deduct its value
                                    from the price of the Gift Box and inform you of the remaining amount payable via the
                                    Website. If the price of the ordered Gift Box exceeds the value of such Blissbox Coupon, you
                                    may pay the remainder through PayPal or by credit or debit card. If the price of the ordered
                                    Gift Box is lower than the value of such Blissbox Coupon, the remaining balance after
                                    payment may be used for future orders of Gift Boxes.</p>

                                <p>To protect you and Partner Merchants from fraud, we may in our sole discretion interrupt
                                    orders and request information by way of an automated data procedure process, by email,
                                    by post, by telephone, or otherwise for verification purposes, which may include without
                                    limitation proof of address, personal identity, bank details, or details of the PayPal account
                                    or credit or debit card used for payment. In the event of any inconsistency between such
                                    information provided and your information or that of the person intended to receive the
                                    ordered Gift Box, as provided in the course of the order or as previously stated, we may
                                    contact either you or the person intended to receive the ordered Gift Box. Any refusal to
                                    comply with our verification requests may result in the cancellation of your order.</p>
                            </li>
                            <li class="collection-item"><b>9. ORDER CONFIRMATION</b><br/><hr>
                                <p>The Gift Box prices are set out on the Website, and are subject to change at our sole
                                    discretion. In the event of such change, the new prices will be updated on the Website.
                                    The stated Gift Box prices are exclusive of applicable taxes and delivery or other charges.</p>
                                <p>Your offer to purchase a Gift Box shall be made after entering your PayPal details or
                                    credit or debit card details as the selected means of payment, by clicking on the “Confirm
                                    payment” option or such other similar or equivalent option made available on the Website.
                                    We shall be deemed to have accepted your offer to purchase only after we send you a
                                    confirmation email stating the details of your order and enclosing an acknowledgement of
                                    receipt of payment for the purchase of the Gift Box.</p>
                                <p>You acknowledge and agree that the information contained in the confirmation email
                                    sent to you, stating the details of your order placed on the Website and enclosing an
                                    acknowledgement of receipt of payment for the purchase of the Gift Box, shall be valid and
                                    conclusive evidence of the details of such purchase, which shall be binding on the Purchaser.</p></li>
                            <li class="collection-item"><b>10. DELIVERY</b><br/><hr>
                                <p>
                                    The Gift Boxes shall be delivered only to Singapore and other Countries (“Relevant
                                    Countries”), to the delivery address provided by you in your order, by a third party service
                                    provider which is engaged as an independent contractor and is not related to us. The
                                    delivery service is subject to the terms and conditions of the third party delivery service
                                    provider. To the furthest extent permitted by applicable laws, we shall not be liable for
                                    any Losses suffered or delays incurred arising out of or in connection with the third party
                                    delivery service provider’s conduct, performance or non-performance of its obligations,
                                    negligence and/or any failure to deliver the Gift Boxes, any non-delivery of a Gift Box due
                                    to the absence of the intended recipient at the delivery address, any mistake made by you
                                    in the course of entering the details of the delivery address while placing the order, or any
                                    reason which is not solely attributable to us. Nevertheless, we shall exercise reasonable
                                    endeavours to assist in addressing delays in delivery where such delay is deemed in our sole
                                    determination to be our fault.</p>
                                <p>In the event that any Gift Box cannot be successfully delivered for the reasons specified
                                    above, a redelivery surcharge to be determined by the third party service provider is
                                    applicable for a subsequent re-delivery of such Gift Box, to be arranged by you contacting
                                    us. For the avoidance of doubt, you shall not be entitled to any refund if you fail to arrange
                                    for re-delivery of the Gift Box.</p>
                                <p>Delivery of the Gift Boxes may be made either by standard delivery or express delivery, and
                                    the approximate timelines for delivery to urban locations in each Relevant Country can be
                                    found at Service Provider URL which will be communicated before payment confirmation. In
                                    respect of Gift Boxes to be delivered to rural locations, delivery timelines may be extended.
                                </p>
                            </li>
                            <li class="collection-item"><b>11. TITLE AND RISK</b><br/><hr>
                                <p>
                                    The title to and risk in any Gift Box purchased in accordance with Clause 9 shall pass to the
                                    recipient of such Gift Box upon delivery of such Gift Box to the third party delivery service
                                    provider in accordance with Clause 10. For the avoidance of doubt, we shall be under no
                                    obligation to provide any refund in respect of any damage, loss or theft of any Gift Box
                                    after it has been delivered to the third party delivery service provider in accordance with
                                    Clause 10.
                                </p>
                                <p>
                                    In the event of any error, fault, defect, partial or total damage, and/or shortfall in the
                                    delivered Gift Box(es), you shall at the point of receipt indicate on the invoice provided by
                                    the third party delivery service provider the existence of such matter(s), and also separately
                                    notify the third party delivery service provider and us of such matter(s) in writing with
                                    full particulars within three (3) days on which commercial banks are open for business in
                                    Singapore (other than Saturdays, Sundays or public holidays) (“Business Days”) of receiving
                                    the Gift Box(es), failing which you shall be deemed to have accepted the Gift Box(es) and
                                    neither you nor the person who presents a Gift Voucher to a Partner Merchant to redeem
                                    the Products/Services (who for the avoidance of doubt is not necessarily a Purchaser) (“Gift
                                    Voucher Holder”), shall have any claim against us in relation to any such error, fault, defect,
                                    partial or total damage, and/or shortfall in the Gift Box(es). We may in our sole discretion
                                    and without admission of liability make arrangements to send (a) new Gift Box(es) in
                                    replacement and at no additional cost to you, only in the event that such matter(s) are
                                    solely attributable to us.
                                </p>
                            </li>
                            <li class="collection-item">
                                <b>11. TITLE AND RISK</b><br/><hr>
                                <p>The title to and risk in any Gift Box purchased in accordance with Clause 9 shall pass to the
                                    recipient of such Gift Box upon delivery of such Gift Box to the third party delivery service
                                    provider in accordance with Clause 10. For the avoidance of doubt, we shall be under no
                                    obligation to provide any refund in respect of any damage, loss or theft of any Gift Box
                                    after it has been delivered to the third party delivery service provider in accordance with
                                    Clause 10.</p>
                                <p>In the event of any error, fault, defect, partial or total damage, and/or shortfall in the
                                    delivered Gift Box(es), you shall at the point of receipt indicate on the invoice provided by
                                    the third party delivery service provider the existence of such matter(s), and also separately
                                    notify the third party delivery service provider and us of such matter(s) in writing with
                                    full particulars within three (3) days on which commercial banks are open for business in
                                    Singapore (other than Saturdays, Sundays or public holidays) (“Business Days”) of receiving
                                    the Gift Box(es), failing which you shall be deemed to have accepted the Gift Box(es) and
                                    neither you nor the person who presents a Gift Voucher to a Partner Merchant to redeem
                                    the Products/Services (who for the avoidance of doubt is not necessarily a Purchaser) (“Gift
                                    Voucher Holder”), shall have any claim against us in relation to any such error, fault, defect,
                                    partial or total damage, and/or shortfall in the Gift Box(es). We may in our sole discretion
                                    and without admission of liability make arrangements to send (a) new Gift Box(es) in
                                    replacement and at no additional cost to you, only in the event that such matter(s) are
                                    solely attributable to us.</p>
                            </li>
                            <li class="collection-item">
                                <b>12. CANCELLATION / REFUND / REPLACEMENT</b><br/><hr>
                                <p>In the event that you have made payment for a Gift Box and are informed that such Gift
                                    Box is no longer available, you may elect to receive either (a) a refund for the amount paid

                                    within thirty (30) days from the date of our receipt of payment; or (b) another Gift Box,
                                    subject to payment of an administrative fee which we may impose in our sole discretion.</p>
                                <p>If you are not satisfied with the purchase and delivery of a Gift Box and wish to receive a
                                    refund of the price paid for a Gift Box, and provided that the Partner Merchant’s Products/
                                    Services were not denied to the Gift Voucher Holder in connection with any non-compliance
                                    with the Partner Merchant’s terms and conditions, you may cancel such purchase by filling
                                    up the cancellation form which can be found at: http://blissbox.asia/mygift and returning
                                    the Gift Box Voucher to us at your own expense in a condition acceptable in our sole
                                    determination, within ten (10) Business Days from the date of purchase.</p>
                                <p>You acknowledge that any refund or replacement Gift Box provided is provided without
                                    admission of liability on our part and shall constitute your sole and exclusive remedy in
                                    either of the events identified above in this Clause.</p>
                            </li>

                        </ul>

                        <h1 class="center-align">C. RETAIL PURCHASE T&Cs</h1>
                        <p>This <b>Section C</b> shall apply to all Purchasers who purchase Gift Boxes from Authorised
                            Distributors, and where the context otherwise requires, such other person including but not
                            limited to recipients of Gift Boxes.</p>
                        <ul class="collection">
                            <li class="collection-item">
                                <b>13. PAYMENT</b><br/><hr>
                                <p>You may make payment for Gift Boxes via any means of payment that is accepted by the
                                    Authorised Distributors.</p>
                            </li>
                            <li class="collection-item">
                                <b>14. TITLE AND RISK</b><br/><hr>
                                <p>The title to and risk in any Gift Box shall pass to the Purchaser upon the Purchaser making
                                    payment for such Gift Box to the Authorised Distributor. For the avoidance of doubt, we shall
                                    be under no obligation to provide any refund in respect of any damage, loss or theft of any
                                    Gift Box after it has been purchased from such Authorised Distributor.</p>
                                <p>In the event of any error, fault, defect, partial or total damage, and/or shortfall in the
                                    purchased Gift Box(es), neither you nor the Gift Voucher Holder shall have any claim against
                                    us in relation to any such error, fault, defect, partial or total damage, and/or shortfall in the
                                    Gift Box(es).</p>
                            </li>
                            <li class="collection-item">
                                <b>15. CANCELLATION / REFUND</b><br/><hr>
                                <p>If you are not satisfied with the purchase of a Gift Box and wish to receive a refund of the
                                    price paid for a Gift Box, and provided that the Partner Merchant’s Products/Services were
                                    not denied to the Gift Voucher Holder in connection with any non-compliance with the
                                    Partner Merchant’s terms and conditions, you may cancel such purchase by filling up the
                                    cancellation form which can be found at: http://blissbox.asia/mygift and returning the Gift
                                    Box Voucher to us at your own expense in a condition acceptable in our sole determination,
                                    within ten (10) Business Days from the date of purchase. You acknowledge that any refund
                                    provided is provided without admission of liability on our part and shall constitute your sole
                                    and exclusive remedy in either of the events identified above in this Clause.
                            </li>
                        </ul>
                        <h1 class="center-align">D. GIFT VOUCHER T&Cs</h1>
                        <p>This <b>Section D</b> shall apply to all Gift Voucher Holders</p>
                        <ul class="collection">
                            <li class="collection-item">
                                <b>16. PROHIBITION AGAINST RESALE</b><br/><hr>
                                Gift Boxes and Gift Vouchers shall not be transferred, resold or offered for sale, at a
                                premium or otherwise, for any purpose whatsoever. We may seize and cancel any Gift Boxes
                                and/or Gift Vouchers that has/have been transferred, resold or otherwise obtained other
                                than by purchase directly from us or indirectly through Authorised Distributors. We shall not
                                be obliged to respond to any customer service request made in respect of any Gift Boxes
                                and/or Gift Vouchers which was/were obtained from a party other than Blissbox or an
                                Authorised Distributor.
                            </li>
                            <li class="collection-item">
                                <b>17. VALIDITY PERIOD</b><br/><hr>
                                <p>The Gift Boxes are valid from the Activation Date (as defined under Clause 18 below) and
                                    shall expire one (1) year thereafter (“Expiry Date”). In the event of any assertion by you that
                                    any Gift Box is valid beyond its Expiry Date, you shall provide evidence in writing of the date
                                    of purchase in the form of an acknowledgement provided by us or an Authorised Distributor
                                    of receipt of payment for the purchase of the Gift Box. Unless otherwise mentioned on our
                                    Website and subject to the availability of the Products/Services and the opening days and
                                    hours on the part of the Partner Merchant, you may redeem such Products/Services on all the
                                    days of the week including weekends during the validity period of the relevant Gift Voucher.</p>
                            </li>
                            <li class="collection-item">
                                <b>18. ACTIVATION</b><br/><hr>
                                <p>You may redeem the Products/Services only using Gift Vouchers which shall have been
                                    activated after confirmation by our bank of the Purchaser’s payment (“Activation Date”).</p>

                                <p>In the event of any issue with the attempted redemption of a Gift Voucher which has not
                                    been activated, you shall provide us with proof of purchase of the Gift Box to facilitate
                                    activation of the Gift Voucher, in the form of either an order confirmation email or an
                                    acknowledgement of receipt of payment for the purchase of a Gift Box, failing which
                                    you shall be deemed to have waived your right to request that we verify or facilitate the
                                    activation of any Gift Voucher, such activation being in our sole discretion. You may request
                                    that we verify the validity and/or activation status of your Gift Voucher by contacting us at
                                    your own expense.</p>

                            </li>
                            <li class="collection-item">
                                <b>19. PRODUCTS/SERVICES SUBJECT TO CHANGE</b><br/><hr>
                                <p>We may at any time update the Products/Services described in the Guide by adding new
                                    Products/Services or modifying existing Products/Services, and will update the Website with
                                    details of any such changes. You agree to visit the said section before redemption of the Gift
                                    Voucher to apprise yourself of the Products/Services available for redemption.</p>
                                <p>The precise Products/Services to be provided by the Partner Merchants may be subject
                                    to change from time to time, and may accordingly differ from the contents of the Guide.
                                    Notwithstanding the contents of the Guide, you shall at the time of booking any Products/
                                    Services, verify with the relevant Partner Merchant the exact description and nature of the
                                    Products/Services offered by such Partner Merchant.</p>
                            </li>
                            <li class="collection-item">
                                <b>20. PRIOR BOOKING</b><br/><hr>
                                <p>All of the Products/Services listed in the Guide must be booked with the relevant Partner
                                    Merchant in advance prior to redemption of the Gift Voucher. You shall contact the relevant

                                    Partner Merchant directly in order to make such a booking, which shall be subject to the
                                    relevant Partner Merchant’s approval. If you do not make such a booking in advance,
                                    the relevant Partner Merchant may reject your attempted redemption of their Products/
                                    Services. Any changes to your booking (including without limitation any modifications or
                                    cancellations) of the Products/Services sought to be redeemed shall also be subject to
                                    the relevant Partner Merchant’s approval and/or such Partner Merchant’s booking and/or
                                    cancellation policies. In general, any requested change to your booking of the Products/
                                    Services shall only be effective after the relevant Partner Merchant has provided written
                                    confirmation of acceptance.</p>
                            </li>
                            <li class="collection-item">
                                <b>21. REDEMPTION,</b><br/><hr>
                                <p>The Gift Voucher contained in the Gift Box entitles you to redeem only one (1) of the
                                    Products/Services listed in the Guide, and is valid for one-time use only. To redeem the
                                    Products/Services, you shall present to the Partner Merchant the Gift Voucher and email
                                    confirmation of prior booking if provided by the Partner Merchant. Redemption of any
                                    Products/Services shall be subject to the General T&Cs prevailing at the time of redemption.</p>
                                <p>The Products/Services shall be redeemable only after the authenticity and validity of
                                    the relevant Gift Voucher has been verified by the Partner Merchant. The Products/
                                    Services shall not be redeemable using a Gift Voucher which was previously reported to
                                    us to have been lost, stolen or destroyed. Our records of the reference numbers and/
                                    or other particulars of such Gift Vouchers shall constitute conclusive evidence of their
                                    reported status. Redemption of the Products/Services is subject to the Partner Merchant’s
                                    availability to provide such Products/Services within the date(s) you have selected by way
                                    of prior booking, and you acknowledge and agree that to the furthest extent permitted
                                    by applicable laws, we shall not be liable in the event that approval for such booking is
                                    withheld by the Partner Merchant.</p>

                                <p>You acknowledge that the provision of the selected Products/Services by the relevant
                                    Partner Merchant is subject to the specific terms and conditions of such Partner
                                    Merchant, including without limitation its terms and conditions relating to cancellation
                                    and modification of bookings of Products/Services, age limits, your physical and medical
                                    condition, and suitable weather conditions. We shall not be liable for any refusal by any
                                    Partner Merchant to provide the Products/Services to you due to your non-compliance with
                                    such Partner Merchant’s specific terms and conditions. You acknowledge and agree that
                                    in the event of any cancellation of a booking by the Partner Merchant, and to the furthest
                                    extent permitted by applicable laws, we shall not be liable for any Losses you may suffer
                                    or incur, including without limitation the cost of lost insurance premiums, travel expenses or
                                    any other costs incurred.</p>
                                <p>Unless expressly provided otherwise, including without limitation in the Guide, transportation
                                    to the place where the Products/Services are to be provided and any miscellaneous
                                    expenses (including without limitation food and beverage) are not included within the
                                    Products/Services to be redeemed using a Gift Voucher. Complementary activities to the
                                    Products/Services may be provided at a different location from such Products/Services. You
                                    are advised to consult the Partner Merchant about such complementary activities prior to
                                    making a booking for the Products/Services.
                                    In the event of any delay on your part in attending to redeem the Products/Services,
                                    relative to the time specified by prior booking, the Partner Merchant may reduce the time
                                    of any activity provided for in the Products/Services or cancel the booking. If any booking
                                    is cancelled due to such delay, you shall not be entitled to re-use the Gift Voucher used for
                                    that booking to redeem other Products/Services, nor shall you be entitled to any refund for
                                    any Gift Boxes.</p>

                                <p>In the event of any issue you may face in respect of the Products/Services, you may
                                    contact the relevant Partner Merchant directly to resolve such issue, and may contact us
                                    only to provide details of such issue within five (5) Business Days, including your Gift Box
                                    number, booking reference number, description of such issue, and full name of the relevant
                                    Partner Merchant’s personnel contacted. We provide no warranty whatsoever as to the
                                    Products/Services, whether as to their fitness for purpose or otherwise.</p>
                            </li>
                            <li class="collection-item">
                                <b>22. UNREDEEMED / LOST / STOLEN / DESTROYED GIFT BOX</b><br><hr>
                                <p>You may request a new Gift Box in exchange for a Gift Box which you have not redeemed,
                                    at least six (6) months before the Expiry Date of such unredeemed Gift Box, subject to
                                    payment of an administrative fee which we may impose in our sole discretion, and a
                                    delivery charge to be determined by a third party service provider.</p>
                                <p>We shall not be liable for any loss you may suffer or incur in the event that your Gift Box or
                                    Gift Voucher is lost, stolen or destroyed. You may report any such loss, theft or destruction
                                    to our customer service department, which may request further information from you
                                    to investigate such loss, theft or destruction, and take such further step(s) as they may
                                    determine in their sole discretion, provided always that the lost, stolen or destroyed Gift
                                    Voucher has not been redeemed and provided that you had previously created an account
                                    on the Website and registered your Gift Box number prior to such loss, theft or destruction.</p>
                            </li>
                            <li class="collection-item">
                                <b>23. NON-RELIANCE ON GUIDE</b><br/><hr>
                                <p>The descriptions, images and/or illustrations of the Products/Services contained in the
                                    Guide or the Gift Box are illustrative only and shall not be relied upon by you to be a
                                    representation of the actual Products/Services to be redeemed. The total duration of such

                                    Products/Services stated in the Guide is only an indication of the time you are estimated
                                    to spend, and may differ for each participant. We may in our sole discretion amend the
                                    Products/Services listed in each Gift Box at any time, amend the themes of the Gift Boxes,
                                    or cease the sale of any or all of the Gift Boxes.</p>
                            </li>
                            <li class="collection-item">
                                <b>24. HIGH RISK ACTIVITIES</b><br/><hr>
                                <p>Certain Products/Services described in the Guide include sports or other high risk activities.
                                    For such activities, you shall apprise yourself of the attendant risks of participating in such
                                    activities, including without limitation by making enquiries with the Partner Merchant directly
                                    on such risks and of the terms of any insurance cover procured by the Partner Merchant,
                                    consider obtaining your own insurance coverage, and consult your doctor if you are in any
                                    doubt about your medical condition. You shall determine for yourself whether the Products/
                                    Services are suitable in light of such risks and your own physical and medical condition.
                                    As a voluntary participant to these activities, you accept all risks and shall take all
                                    necessary precautions in relation to participating in such activities. For the avoidance of
                                    doubt and to the furthest extent permitted by applicable laws, we shall not be liable for any
                                    Losses suffered or incurred by you arising out of or in connection with your participation in
                                    such activities.</p>
                            </li>
                            <li class="collection-item">
                                <b>25. TERMINATION OF PARTNER MERCHANT RELATIONSHIP</b><br/><hr>
                                <p>The arrangements between us and each Partner Merchant may be terminated at any time,
                                    and in particular during the period of validity of any Gift Voucher. Should such termination
                                    result in a cancellation of the Products/Services you have booked, and such Products/
                                    Services were booked and confirmed by such Partner Merchant prior to such termination,
                                    we shall exercise reasonable endeavours to procure for you Products/Services similar to

                                    those you had initially booked. To the furthest extent permitted by applicable laws, we shall
                                    not be liable for any cancellation of Products/Services or to provide any refund as a result
                                    of such termination.</p>
                            </li>
                        </ul>
                        <h1 class="center-align">E. MISCELLANEOUS T&Cs</h1>
                        <p>This <b>Section E</b> This Section E shall apply to all users of the Website, all Purchasers, and all Gift
                            Voucher Holders.</p>
                        <ul class="collection">
                            <li class="collection-item">
                                <b>26. LEGAL CAPACITY</b><br/><hr>
                                By using the Website, making an offer to purchase a Gift Box and/or presenting a Gift
                                Voucher to a Partner Merchant to redeem the Products/Services, you represent and warrant
                                that you have sufficient legal capacity to act and contract under Singapore law and have
                                reached the age of majority or have valid parent or legal guardian consent to be bound
                                by these General T&Cs. If you do not know whether you have reached the age of majority,
                                or do not understand any provision in these General T&Cs, please ask your parent or legal
                                guardian for help before continuing the use of the Website, making an offer to purchase a
                                Gift Box and/or presenting a Gift Voucher to a Partner Merchant to redeem the Products/
                                Services. If you are a parent or legal guardian of a minor using the Website, making an
                                offer to purchase a Gift Box and/or presenting a Gift Voucher to a Partner Merchant to
                                redeem the Products/Services, you accept these General T&Cs on the minor’s behalf and
                                are responsible for all acts by the minor.
                            </li>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('inline-script')
    <script src="{{ asset('js/frontend/common.js') }}"></script>
@endsection