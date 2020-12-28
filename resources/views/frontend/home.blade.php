@extends('frontend.layouts.app')

@section('title', 'Homepage')

@section('inline-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css" />
    <style>
        .carousel-fade .carousel-item {
            display: block;
            position: absolute;
            opacity: 0;
            transition: opacity 1s ease-in-out;
        }
        .carousel-fade .carousel-item.active {
            opacity: 1;
        }
        #universes a.btn-about {
            color: rgba(0, 0, 0, 0.5);
            background: url('/images/frontend/button.png') center center;
            -webkit-background-size: 100%;
            background-size: 100%;
        }
        #search .search-wrapper {
        position: relative;
        height: 75vh;
        min-height: 300px;
        background-size: cover;
        z-index: 11;
    }
    #search .search-wrapper .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height:100%;
        background-color: rgba(0, 0, 0);
        z-index: 15;
    }
    #search .search-wrapper .container.fill {
        position: absolute;
        z-index: 10;
        top: 0;
        left: 0;
        padding: 0;
        max-width: 100%;
    }
    #search .search-wrapper > .d-flex {
        z-index: 20;
    }
    #search .search-wrapper,
    #search .search-wrapper h3 {
        font-weight: bolder;
        color: #FFF;
    }
    #search .search-wrapper h3 {
        font-size: 2rem;
    }
    #search .search-wrapper p {
        font-size: 1.5rem;
        font-weight: normal;
    }
    #search .search-wrapper h4 {
        font-weight: bold;
        color: #FFF;
    }
    #search .search-wrapper .f-50 {
        flex-basis: 75%;
    }
    #newsletter .f-50 {
        flex-basis: 50%;
    }
    #search .search-wrapper .justify-content-evenly,
    #newsletter .justify-content-evenly {
        justify-content: space-evenly;
    }
    #search .search-wrapper .form-group,
    #search .search-wrapper .form-group .form-control,
    #search .search-wrapper .form-group select,
    #search .search-wrapper .form-control:focus select {
        color: #FECE51 !important;
    }
    #search .search-wrapper .form-control::-webkit-input-placeholder {
        color: #FFF;
        opacity: 1;
    }
    #search .search-wrapper .form-control:-ms-input-placeholder {
        color: #FFF;
        opacity: 1;
    }
    #search .search-wrapper .form-control::placeholder {
        color: rgba(0, 0, 0, 0.5);
        font-weight: 700;
        opacity: 1;
    }
    #search .search-wrapper .form-group,
    #newsletter .form-group {
        position: relative;
        border: 1px solid #FFF;
        border-radius: 25px;
        padding: 0 20px;
        background-color: rgb(255, 255, 255);
    }
    #newsletter .form-group {
        width: 60%;
    }
    #search .search-wrapper .form-control:focus,
    #newsletter .form-group:focus {
        background-color: transparent;
    }
    #search .search-wrapper .form-group label {
        position: absolute;
        z-index: 1;
        top: 0;
        left: 0;
        margin: 0;
        padding: 7px 0 7px 20px;
        color: #000;
    }
    #search .search-wrapper .form-group select,
    #search .search-wrapper .form-group input,
    #newsletter .form-group input {
        background-color: transparent;
        border: none;
        position: relative;
        z-index: 2;
    }
    #search .search-wrapper .form-group input {
        height: 100%;
    }
    #search .search-wrapper .form-group:nth-child(1) {
        width: 20%;
        margin: 0 10px;
    }
    #search .search-wrapper .form-group:nth-child(2) {
        width: 100%;
        margin: 0 10px;
        padding: 4px 100px 4px 4px;
    }
    #search .search-wrapper .form-group:nth-child(3) {
        width: 35%;
        margin: 0 10px;
    }
    #search .search-wrapper .form-group:nth-child(1) select {
        float: right;
        width: 80%;
    }
    #search .search-wrapper .form-group:nth-child(3) select {
        float: right;
        width: 25%;
    }
    /*
    #search .search-wrapper .carousel-item:nth-child(1) {
        background: url('/images/frontend/sliders/slider1.jpg') no-repeat center center;
        background-size: cover;
    }
    #search .search-wrapper .carousel-item:nth-child(2) {
        background: url('/images/frontend/sliders/slider2.jpg') no-repeat center center;
        background-size: cover;
    }
    #search .search-wrapper .carousel-item:nth-child(3) {
        background: url('/images/frontend/sliders/slider3.jpg') no-repeat center center;
        background-size: cover;
    }
    #search .search-wrapper .carousel-item:nth-child(4) {
        background-image: url('/images/frontend/sliders/slider4.jpg') no-repeat center center;
        background-size: cover;
    }
    */
    #search .carousel-caption {
        bottom: initial;
        top: 80px;
        font-weight: normal !important;
        /*transform: translateY(-50%);*/
    }
    #search .search-wrapper .btn-search,
    #newsletter .btn-register {
        height: 40px;
        padding: 0 25px;
        background: url('/images/frontend/button.png') center center;
        -webkit-background-size: 100%;
        background-size: 100%;
    }
    #search {

    }
    #search .search-wrapper .btn-search {
        position: absolute;
        right: 0;
        top: 0;
        height: 43px;
        background: url('/images/frontend/button.png') center center;
        -webkit-background-size: 100%;
        background-size: 100%;
    }
    #newsletter .btn-register {
        margin-left: 20px;
        background: url('/images/frontend/button.png') center center;
        -webkit-background-size: 100%;
        background-size: 100%;
    }
    #search .search-wrapper .form-control .form-control::-moz-placeholder {
        color: #FFF !important;
    }
    #universes .f-50 {
        flex-basis: 50%;
        max-width: 50%;
        flex-wrap: wrap;
        align-self: flex-end;
    }
    #social .p-7 {
        padding: 7rem;
    }
    #universes .p-7 {
        padding: 4rem 7rem;
    }
    #giftboxes .px-7 {
        padding: 0 7rem;
    }
    #giftboxes .pb-7 {
        padding-bottom: 7rem;
    }
    #universes .universe,
    #giftboxes > .d-flex .f-50,
    #social > .d-flex .f-50 {
        flex-basis: 50%;
        flex-grow: 1;
        max-width: 50%;
    }
    #universes .universe:nth-child(even) {
        position: relative;
        top: 0;
    }
    #universes .wellness {
        background: rgb(126,205,195);
        background: -moz-linear-gradient(top, rgba(126,205,195,1) 0%, rgba(5,172,137,1) 100%);
        background: -webkit-linear-gradient(top, rgba(126,205,195,1) 0%,rgba(5,172,137,1) 100%);
        background: linear-gradient(to bottom, rgba(126,205,195,1) 0%,rgba(5,172,137,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7ecdc3', endColorstr='#05ac89',GradientType=0 );
    }
    #universes .gastronomy {
        background: -moz-linear-gradient(top, rgba(248,164,145,1) 0%, rgba(220,28,77,1) 100%);
        background: -webkit-linear-gradient(top, rgba(248,164,145,1) 0%,rgba(220,28,77,1) 100%);
        background: linear-gradient(to bottom, rgba(248,164,145,1) 0%,rgba(220,28,77,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f8a491', endColorstr='#dc1c4d',GradientType=0 );
    }
    #universes .adventure {
        background: rgb(255,206,81);
        background: -moz-linear-gradient(top, rgba(255,206,81,1) 0%, rgba(244,130,30,1) 100%);
        background: -webkit-linear-gradient(top, rgba(255,206,81,1) 0%,rgba(244,130,30,1) 100%);
        background: linear-gradient(to bottom, rgba(255,206,81,1) 0%,rgba(244,130,30,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffce51', endColorstr='#f4821e',GradientType=0 );
    }
    #universes .stay {
        background: rgb(127,198,238);
        background: -moz-linear-gradient(top, rgba(127,198,238,1) 0%, rgba(7,118,189,1) 100%);
        background: -webkit-linear-gradient(top, rgba(127,198,238,1) 0%,rgba(7,118,189,1) 100%);
        background: linear-gradient(to bottom, rgba(127,198,238,1) 0%,rgba(7,118,189,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7fc6ee', endColorstr='#0776bd',GradientType=0 );
    }
    #universes .learn-more {
        display: block;
        width: 200px;
        color: #FFF;
        margin: 0 auto;
        border: 1px solid #FFF;
        text-transform: uppercase;
        background-color: transparent;
        margin: 30px auto;
    }
    #universes h1,
    #giftboxes h1,
    #social h1 {
        font-size: 3.75rem;
        font-weight: bolder;
        word-break: break-word;
    }
    #social h1 {
        font-size: 3.4rem;
    }
    #universes h1 span,
    #giftboxes h1 span {
        color: #FECE51;
    }
    #universes p,
    #giftboxes p {
        font-size: 1rem;
        margin: 30px 0;
        font-family: 'Oxygen', 'sans-serif';
    }
    #universes a {
        text-transform: uppercase;
        background-color: #FECE51;
        padding: 10px 20px;
        color: #FFF;
        cursor: pointer;
    }
    #universes h2,
    #giftboxes h2,
    #newsletter h2 {
        font-size: 3.125rem;
        word-break: break-word;
    }
    #universes h2 {
        font-size: 2.1rem;
        color: #FFF;
    }
    #giftboxes h2 {
        color: #000;
        font-weight: bold;
    }
    #why-choose-blissbox h2,
    #newsletter h2 {
        font-weight: bolder;
    }
    #newsletter h2,
    #newsletter h3 {
        font-family: "Oxygen", sans-serif;
    }
    #universes-carousel {
        display: none;
    }
    #why-choose-blissbox h2 {
        font-size: 3.125rem;
    }
    #why-choose-blissbox i {
        color: #05AC89;
        margin: 0 15px;
    }
    #why-choose-blissbox .my-7 {
        margin: 7rem 0;
    }
    #why-choose-blissbox .justify-content-evenly {
        justify-content: space-evenly;
    }
    #why-choose-blissbox a.btn-how-it-works {
        color: rgba(0, 0, 0, 0.5);
        padding: 10px 15px;
        background: url('/images/frontend/button.png') center center;
        -webkit-background-size: 100%;
        background-size: 100%;
    }
    #giftboxes .giftbox {
        flex-basis: 50%;
        max-width: 50%;
    }
    #giftboxes .giftbox img {
        display: block;
        margin: 0 auto;
    }
    #giftboxes p.title,
    #giftboxes p.price,
    #giftboxes p.review {
        margin: 10px 0;
        padding: 0 2rem;
        text-align: left;
    }
    #giftboxes p.title {
        font-size: 1.25rem;
        font-weight: bolder;
    }
    #giftboxes p.review {
        color: #F4821E;
    }
    #giftboxes p.review i {
        font-size: 0.875rem;
    }
    #giftboxes #giftboxes-carousel,
    #social #socials-carousel {
        display: none !important;
    }
    #newsletter {
        background-color: #EFEDEC;
    }
    #social .social-icons a {
        width: 50px;
        height: 50px;
        border-radius: 25px;
        background-color: #FECE51;
        color: #FFF;
        padding: 10px 10px;
        display: inline-block;
        margin: 0 10px;
        text-align: center;
    }
    #social .social {
        flex-basis: 50%;
        max-width: 50%;
    }
    #social p,
    #multitheme h3 {
        font-family: 'Oxygen', sans-serif;
        font-weight: normal;
    }
    #multitheme .container:first-child {
        max-width: 1120px;
    }
    #multitheme h3 {
        margin-bottom: 3rem;
        position: relative;
        padding-bottom: 50px;
        line-height: 1.5;
    }
    #multitheme h3::after {
        position: absolute;
        bottom: 0;
        left: 50%;
        padding: 0;
        width: 50%;
        height: 2%;
        z-index: 1080;
        content: '';
        -webkit-transform: translateX(-50%);
        -moz-transform: translateX(-50%);
        -ms-transform: translateX(-50%);
        -o-transform: translateX(-50%);
        transform: translateX(-50%);
        background: -webkit-gradient(linear, left top, right top, from(rgba(255, 206, 81, 0)), color-stop(#F4821E), color-stop(#DC1C4D), color-stop(#F8A491), color-stop(#D76EAB), color-stop(#9752A0), color-stop(#53489E), color-stop(#0776BD), color-stop(#7fC6EE), color-stop(#7FC6EE), color-stop(#35C2D6), color-stop(#05AC89), to(rgba(126, 205, 195, 0)));
        background: linear-gradient(to right, rgba(255, 206, 81, 0), #F4821E, #DC1C4D, #F8A491, #D76EAB, #9752A0, #53489E, #0776BD, #7fC6EE, #7FC6EE, #35C2D6, #05AC89, rgba(126, 205, 195, 0));
    }
    #multitheme .owl-item img {
        width: initial;
        margin: 0 auto;
    }
    #multitheme .btn-multitheme {
        color: rgba(0, 0, 0, 0.5);
        margin: 0 auto;
        padding: 12px 40px;
        text-transform: uppercase;
        background: url('/images/frontend/button.png') center center;
        -webkit-background-size: 100%;
        background-size: 100%;
    }
    #newsletterModal .modal-header {
        position: relative;
        background-color: transparent;
        border-bottom: 0;
    }
    #newsletterModal .modal-title {
        margin: 0 auto;
    }
    #newsletterModal .modal-header .close {
        position: absolute;
        right: 30px;
        padding: 0;
        top: 19px;
        cursor: pointer;
    }
    #newsletterModal .modal-body {
        border-top: 1px solid #E9ECEF;
    }
    #newsletterModal .modal-body h5 {
        text-align: center;
        margin-bottom: 1rem;
    }
    @media (max-width: 1199px) {
        html {
            font-size: 15px;
        }
        #search .search-wrapper .f-50 {
            flex-basis: 100%;
        }
        #universes .f-50 {
            flex-basis: 50%;
            max-width: 50%;
            flex-wrap: wrap;
            align-self: inherit;
        }
        #universes h2 {
            font-size: 2.7rem;
        }
        #universes .universe {
            flex-basis: 33%;
        }
        #universes .d-flex {
            margin: 0 !important;
        }
        #universes .universe:nth-child(even) {
            top: 0;
        }
        #universes .f-50:last-child .d-flex,
        #social .f-50:last-child .d-flex {
            display: none !important;
        }
        #universes .f-50:last-child {
            flex-basis: 100%;
            max-height: 100%;
        }
        #universes .captions {
            flex-basis: 100%;
            max-width: 100%;
            float: left;
        }
        #universes .captions:first-child,
        #giftboxes .captions:first-child,
        #social .captions:first-child {
            padding: 2rem 3rem 2rem 3rem;
            text-align: left;
        }
        #universes h1,
        #giftboxes h1 {
            font-size: 3.65rem;
        }
        #giftboxes h1 {
            font-size: 3.65rem;
        }
        #social h1 {
            font-size: 2.7rem;
        }
        #social .captions:first-child {
            padding: 2rem 7rem 2rem 7rem;
        }
        #universes-carousel,
        #giftboxes #giftboxes-carousel,
        #social #socials-carousel {
            display: block !important;
            height: 100%;
        }
        #universes-carousel .carousel-item div,
        #giftboxes-carousel .carousel-item div,
        #socials-carousel .carousel-item div{
            position: relative;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -moz-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -o-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
        #universes-carousel .carousel-control-next,
        #universes-carousel .carousel-control-prev {
            background-color: transparent;
        }
        #universes-carousel .carousel-inner,
        #universes-carousel .carousel-item,
        #giftboxes-carousel .carousel-inner,
        #giftboxes-carousel .carousel-item,
        #socials-carousel .carousel-inner,
        #socials-carousel .carousel-item {
            height: 100%;
        }
        #socials-carousel .carousel-item > div {
            width: 100%;
        }
        #giftboxes .f-50:first-child .d-flex {
            display: none !important;
        }
        #giftboxes p.title,
        #giftboxes p.price,
        #giftboxes p.review {
            text-align: center;
        }
        #giftboxes p.title,
        #giftboxes p.price,
        #giftboxes p.review {
            padding: 0;
        }
        #giftboxes p.price {
            font-family: 'Oxygen', sans-serif;
        }
        #giftboxes #giftboxes-carousel .carousel-control-prev-icon {
            background-image : url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M4 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");
            color: black;
        }
        #giftboxes #giftboxes-carousel .carousel-control-next-icon {
            background-image : url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='000000' viewBox='0 0 8 8'%3E%3Cpath d='M1.5 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
            color: black;
        }
        #newsletter {
            margin: 5rem 0;
        }
        #newsletter .f-50 {
            flex-basis: 70%;
        }
        #socials-carousel .carousel-item div {
            top: 0;
            left: 0;
            -webkit-transform: none;
            -moz-transform: none;
            -ms-transform: none;
            -o-transform: none;
            transform: none;
        }
        #multitheme h3::after {
            height: 2%;
        }
    }
    @media (max-width: 991px) {
        #search .search-wrapper .f-50 {
            align-items: center;
        }
        #search .search-wrapper .form-group {
            text-align: center;
            height: 100%;
        }
        #search .search-wrapper .form-group label {
            position: static;
            padding: 0;
        }
        #search .search-wrapper .form-group select {
            width: 100% !important;
        }
        #search .search-wrapper .form-group input[type="text"] {
            height: 100%;
        }
        #universes > .d-flex,
        #social > .d-flex {
            flex-direction: column;
        }
        #giftboxes > .d-flex {
            flex-direction: column-reverse;
        }
        #universes-carousel {
            height: 100%;
        }
        #universes .captions:first-child,
        #giftboxes .captions:first-child,
        #social .captions:first-child {
            text-align: center;
        }
        #universes-carousel h2 {
            padding-top: 0 !important;
        }
        #why-choose-blissbox h2 {
            font-size: 2.2rem;
        }
        #why-choose-blissbox > .d-flex .d-flex {
            padding: 0 1.5rem;
        }
        #why-choose-blissbox .reason {
            flex-basis: 33.33%;
            max-width: 33.33%;
        }
        #why-choose-blissbox .btn-how-it-works {
            margin: 0 auto;
            background: url('/images/frontend/button.png') center center;
            -webkit-background-size: 100%;
            background-size: 100%;
        }
        #universes .f-50,
        #giftboxes > .d-flex .f-50,
        #social > .d-flex .f-50 {
            flex-basis: 100%;
            max-width: 100%;
        }
        #social .captions:last-child {
            /*display: none;*/
        }
        #giftboxes-carousel {
            height: 479px !important;
        }
        #why-choose-blissbox .my-7 {
            margin-bottom: 0;
        }
        #socials-carousel .carousel-item {
            padding-top: 0;
        }
        #socials-carousel .carousel-item > div {
            width: 100%;
        }
        #universes-carousel .carousel-item div, #giftboxes-carousel .carousel-item div, #socials-carousel .carousel-item div {
            position: relative;
            top: inherit;
            left: inherit;
            -webkit-transform: translate(0, 0);
            -moz-transform: translate(0, 0);
            -ms-transform: translate(0, 0);
            -o-transform: translate(0, 0);
            transform: translate(0, 0);
        }
        #multitheme h3::after {
            height: 2%;
        }
    }
    @media (max-width: 767px) {
        html {
            font-size: 14px !important;
        }
        #search .search-wrapper {
            /*min-height: 500px;*/
            height: initial;
        }
        #search .search-wrapper h4 {
            text-align: center;
        }
        #search .search-wrapper .f-50 {
            flex-direction: column !important;
        }
        #search .search-wrapper .form-group {
            width: 100% !important;
            margin: 10px 0 !important;
            height: inherit;
        }
        #search .search-wrapper .form-group label {
            width: 50%;
            padding: 10px 0;
        }
        #search .search-wrapper .form-group select {
            width: 50% !important;
            float: right;
            padding: 7px 0 7px 20px;
            margin-top: 4px;
        }
        #search .search-wrapper .form-group input[type="text"] {
            text-align: center;
            padding: 0.785rem;
        }
        #search .search-wrapper .btn-search {
            margin: 10px auto 0 auto;
            width: 30%;
            height: 53px;
            right: 0;
            top: 0;
            background: url('/images/frontend/button.png') center center;
            -webkit-background-size: 100%;
            background-size: 100%;
        }
        #universes .captions:first-child,
        #giftboxes .captions:first-child,
        #social .captions:first-child {
            padding: 2rem;
        }
        #universes h1, #giftboxes h1, #social h1 {
            font-size: 2.5rem;
        }
        #universes h2, #giftboxes h2, #newsletter h2 {
            font-size: 2.2rem;
        }
        #why-choose-blissbox > .d-flex .d-flex {
            flex-wrap: wrap;
        }
        #why-choose-blissbox .reason {
            flex-basis: 100%;
            max-width: 100%;
            padding: 0.5rem 0;
        }
        #newsletter .form-group {
            width: 100%;
        }
        #newsletter .f-50 {
            flex-basis: 100%;
            flex-wrap: wrap;
        }
        #multitheme h3::after {
            height: 1%;
        }
    }
    html,body{height:100%;}
    .carousel,.item,.active{height:100%;}
    .carousel-inner{height:100%;}
    .fill{width:100%;height:100%;background-position:center;background-size:cover;}
</style>
@endsection

@section('body', 'frontend')

@section('content')
    <div id="homepage">
        <div class="load-background" v-if="loading">
            <div class="load">
                <svg xmlns:svg="http://www.w3.org/2000/svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.0" width="100px" height="100px" viewBox="0 0 128 128" xml:space="preserve"><g><path d="M64 0L40.08 21.9a10.98 10.98 0 0 0-5.05 8.75C34.37 44.85 64 60.63 64 60.63V0z" fill="#ffb118"/><path d="M128 64l-21.88-23.9a10.97 10.97 0 0 0-8.75-5.05C83.17 34.4 67.4 64 67.4 64H128z" fill="#80c141"/><path d="M63.7 69.73a110.97 110.97 0 0 1-5.04-20.54c-1.16-8.7.68-14.17.68-14.17h38.03s-4.3-.86-14.47 10.1c-3.06 3.3-19.2 24.58-19.2 24.58z" fill="#cadc28"/><path d="M64 128l23.9-21.88a10.97 10.97 0 0 0 5.05-8.75C93.6 83.17 64 67.4 64 67.4V128z" fill="#cf171f"/><path d="M58.27 63.7a110.97 110.97 0 0 1 20.54-5.04c8.7-1.16 14.17.68 14.17.68v38.03s.86-4.3-10.1-14.47c-3.3-3.06-24.58-19.2-24.58-19.2z" fill="#ec1b21"/><path d="M0 64l21.88 23.9a10.97 10.97 0 0 0 8.75 5.05C44.83 93.6 60.6 64 60.6 64H0z" fill="#018ed5"/><path d="M64.3 58.27a110.97 110.97 0 0 1 5.04 20.54c1.16 8.7-.68 14.17-.68 14.17H30.63s4.3.86 14.47-10.1c3.06-3.3 19.2-24.58 19.2-24.58z" fill="#00bbf2"/><path d="M69.73 64.34a111.02 111.02 0 0 1-20.55 5.05c-8.7 1.14-14.15-.7-14.15-.7V30.65s-.86 4.3 10.1 14.5c3.3 3.05 24.6 19.2 24.6 19.2z" fill="#f8f400"/><circle cx="64" cy="64" r="2.03"/><animateTransform attributeName="transform" type="rotate" from="0 64 64" to="-360 64 64" dur="2700ms" repeatCount="indefinite"></animateTransform></g></svg>
            </div>
            <div class="load load-text">
                <h5 v-cloak>@{{ message }}</h5>
                {{--<h5 class="center-align">Please do not refresh your browser when purchase.<br/><br/>--}}
                {{--It takes few minutes for us to process your payment and generating voucher</h5>--}}
            </div>
        </div>
        <section id="search">

            <div class="search-wrapper d-flex align-items-center">
                <div class="container fill">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('/images/frontend/sliders/1.png') }}" class="img-fluid" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>Indulge</h1>
                                    <p>Blissbox gives you the freedom to gift extraordinary dinners, <br/>
                                        relaxing massages, amazing staycations and thrilling activities!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/images/frontend/sliders/2.png') }}" class="img-fluid" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>Energize</h1>
                                    <p>Blissbox gives you the freedom to gift extraordinary dinners, <br/>
                                        relaxing massages, amazing staycations and thrilling activities!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/images/frontend/sliders/3.png') }}" class="img-fluid" style="position: relative; top: -300px;"/>
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>Escape</h1>
                                    <p>Blissbox gives you the freedom to gift extraordinary dinners, <br/>
                                        relaxing massages, amazing staycations and thrilling activities!</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('/images/frontend/sliders/4.png') }}" class="img-fluid" />
                                <div class="carousel-caption d-none d-md-block">
                                    <h1>Relax</h1>
                                    <p>Blissbox gives you the freedom to gift extraordinary dinners, <br/>
                                        relaxing massages, amazing staycations and thrilling activities!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container d-flex flex-column align-items-center">
                    <div class="row">
                        <div class="col-xs-12">
                        </div>
                    </div>
                    <div class="row">
                    </div>
                    <div class="d-flex justify-content-center align-self-stretch mt-4">
                        <form class="d-flex flex-row justify-content-evenly f-50" style="position: relative;" method="POST" action="{{ url('/search')  }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            {{--<div class="form-group">--}}

                            {{--<label for="giftboxes">For</label>--}}
                            {{--<select class="form-control" id="giftboxes" name="giftboxes" v-model="search.universe">--}}
                            {{--<!-- List All Universe -->--}}
                            {{--<option>Any</option>--}}
                            {{--@foreach($giftboxes AS $giftbox)--}}
                            {{--<option>{{ $giftbox->name }}</option>--}}
                            {{--@endforeach--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <input type="text" class="form-control" id="keyword" name="keyword" placeholder="Find the experience" v-model="search.keyword">
                            </div>
                            {{--<div class="form-group">--}}
                            {{--<label for="pax">No. of Beneficiary(s)</label>--}}
                            {{--<select class="form-control" id="pax" name="no" v-model="search.no">--}}
                            {{--<!-- List All Universe -->--}}
                            {{--<option>1</option>--}}
                            {{--<option>2</option>--}}
                            {{--<option>3</option>--}}
                            {{--<option>More</option>--}}
                            {{--</select>--}}
                            {{--</div>--}}
                            <button type="submit" class="btn btn-search">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section id="universes">
            <div class="d-flex">
                <div class="f-50">
                    <div class="captions flex-wrap p-7">
                        <h1>Emotions <br/>
                            As <span>Gift</span></h1>
                        <p class="py-2">
                            Blissbox is a lifestyle company offering curated experiences in a gift-box. Established in 2016 to revolutionize the way we gift through unique activities and shared experiences. Hence, emotions as gift.
                        </p>
                        <a href="{{ url('/about') }}" class="btn btn-about">About Blissbox</a>
                    </div>
                    <div class="captions">
                        <img src="{{ asset('images/frontend/homepage/freedom.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                    </div>
                </div>
                <div class="f-50">
                    <div class="d-flex flex-wrap">
                        <div class="universe pb-5 text-center wellness">
                            <h2 class="pt-5 mb-5">Relax</h2>
                            <img src="{{ asset('/images/frontend/giftbox/RELAX 6.png') }}" alt="Wellness" />
                            <a href="{{ url('/relax') }}" class="btn learn-more mt-5">LEARN MORE</a>
                        </div>
                        <div class="universe pb-5 text-center gastronomy">
                            <h2 class="pt-5 mb-5">Indulge</h2>
                            <img src="{{ asset('/images/frontend/giftbox/INDULGE 1.png') }}" alt="Gastronomy" />
                            <a href="{{ url('/indulge') }}" class="btn learn-more mt-5">LEARN MORE</a>
                        </div>
                        <div class="universe pb-5 text-center adventure">
                            <h2 class="pt-5 mb-5">Energise</h2>
                            <img src="{{ asset('/images/frontend/giftbox/ENERGIZE 8.png') }}" alt="Adventure" />
                            <a href="{{ url('/energize') }}" class="btn learn-more mt-5">LEARN MORE</a>
                        </div>
                        <div class="universe pb-5 text-center stay">
                            <h2 class="pt-5 mb-5">Escape</h2>
                            <img src="{{ asset('/images/frontend/giftbox/ESCAPE 4.png') }}" alt="Stay" />
                            <a href="{{ url('/escape') }}" class="btn learn-more mt-5">LEARN MORE</a>
                        </div>
                    </div>
                    <div id="universes-carousel" class="carousel slide text-center" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators">
                            <li data-target="#universes-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#universes-carousel" data-slide-to="1"></li>
                            <li data-target="#universes-carousel" data-slide-to="2"></li>
                            <li data-target="#universes-carousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active gastronomy py-5">
                                <div>
                                    <h2 class="py-5">Indulge</h2>
                                    <img src="{{ asset('/images/frontend/giftbox/RELAX 6.png') }}" alt="Gastronomy" />
                                    <a class="btn learn-more">LEARN MORE</a>
                                </div>
                            </div>
                            <div class="carousel-item wellness py-5">
                                <div>
                                    <h2 class="py-5">Relax</h2>
                                    <img src="{{ asset('/images/frontend/giftbox/INDULGE 1.png') }}" alt="Wellness" />
                                    <a class="btn learn-more">LEARN MORE</a>
                                </div>
                            </div>
                            <div class="carousel-item adventure py-5">
                                <div>
                                    <h2 class="py-5">Energise</h2>
                                    <img src="{{ asset('/images/frontend/giftbox/ENERGIZE 8.png') }}" alt="Adventure" />
                                    <a class="btn learn-more">LEARN MORE</a>
                                </div>
                            </div>
                            <div class="carousel-item stay py-5">
                                <div>
                                    <h2 class="py-5">Escape</h2>
                                    <img src="{{ asset('/images/frontend/giftbox/ESCAPE 4.png') }}" alt="Stay" />
                                    <a class="btn learn-more">LEARN MORE</a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#universes-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#universes-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <section id="why-choose-blissbox">
            <div class="d-flex my-7 align-item-center flex-column text-center">
                <h2>Reasons to Choose Blissbox?</h2>
                <div class="d-flex text-center justify-content-evenly mt-5">
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i> We offer curated set of experiences
                    </div>
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>It's easy to buy, use and enjoy
                    </div>
                    <div class="reason">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>Choice to personalise your gifts
                    </div>
                </div>
                <div class="d-flex text-center justify-content-evenly mt-5">
                    <a href="{{ url('/how-it-works') }}" class="btn btn-how-it-works">How It Works</a>
                </div>
            </div>
        </section>
        <!--
        <section id="giftboxes">
            <div class="d-flex my-5">
                <div class="f-50">
                    <div class="d-flex flex-wrap">
                        <h2 class="px-7">Our Best Selling Gift Boxes</h2>
                        <div class="giftbox p-5 text-center wellness">
                            <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                            <p class="title">Well-being and Relaxing Treatments</p>
                            <p class="price">SGD 44.90</p>
                            <p class="review">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <i class="material-icons">star_border</i>
                            </p>
                        </div>
                        <div class="giftbox p-5 text-center gastronomy">
                            <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                            <p class="title">Well-being and Relaxing Treatments</p>
                            <p class="price">SGD 44.90</p>
                            <p class="review">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <i class="material-icons">star_border</i>
                            </p>
                        </div>
                        <div class="giftbox p-5 text-center adventure">
                            <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                            <p class="title">Well-being and Relaxing Treatments</p>
                            <p class="price">SGD 44.90</p>
                            <p class="review">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <i class="material-icons">star_border</i>
                            </p>
                        </div>
                        <div class="giftbox p-5 text-center adventure">
                            <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                            <p class="title">Well-being and Relaxing Treatments</p>
                            <p class="price">SGD 44.90</p>
                            <p class="review">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <i class="material-icons">star_border</i>
                            </p>
                        </div>
                        <div class="giftbox p-5 text-center adventure" style="flex-basis: 100%; max-width: 100%;">
                            <a href="{{ url('/multitheme/giftboxes/1') }}" style="color: #000; text-decoration: none;">
                            <img src="{{ asset('/images/frontend/giftbox/giftbox.png') }}" class="img-fluid" alt="Wellness" />
                            <p class="title text-center mt-5">Enjoy Gifting</p>
                            <p class="price text-center">SGD 44.90</p>
                            <p class="review text-center">
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star</i>
                                <i class="material-icons">star_half</i>
                                <i class="material-icons">star_border</i>
                            </p>
                            </a>
                        </div>
                    </div>
                    <div id="giftboxes-carousel" class="carousel slide text-center" data-ride="carousel" data-interval="5000">
                        <ol class="carousel-indicators">
                            <li data-target="#giftboxes-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#giftboxes-carousel" data-slide-to="1"></li>
                            <li data-target="#giftboxes-carousel" data-slide-to="2"></li>
                            <li data-target="#giftboxes-carousel" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active gastronomy py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/giftbox/giftbox.png') }}" class="img-fluid" alt="Wellness" />
                                    <p class="title text-center mt-5">Enjoy Gifting</p>
                                    <p class="price text-center">SGD 44.90</p>
                                    <p class="review text-center">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_half</i>
                                        <i class="material-icons">star_border</i>
                                    </p>
                                </div>
                            </div>
                            <!--
                            <div class="carousel-item wellness py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                                    <p class="title">Well-being and Relaxing Treatments</p>
                                    <p class="price">SGD 44.90</p>
                                    <p class="review">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_half</i>
                                        <i class="material-icons">star_border</i>
                                        <small>2821</small>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item adventure py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                                    <p class="title">Well-being and Relaxing Treatments</p>
                                    <p class="price">SGD 44.90</p>
                                    <p class="review">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_half</i>
                                        <i class="material-icons">star_border</i>
                                        <small>2821</small>
                                    </p>
                                </div>
                            </div>
                            <div class="carousel-item stay py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" />
                                    <p class="title">Well-being and Relaxing Treatments</p>
                                    <p class="price">SGD 44.90</p>
                                    <p class="review">
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star</i>
                                        <i class="material-icons">star_half</i>
                                        <i class="material-icons">star_border</i>
                                        <small>2821</small>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#giftboxes-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#giftboxes-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="f-50">
                    <div class="captions flex-wrap px-7 pb-0">
                        <h1>Joy of <br/>
                            <span>Gift</span> Giving</h1>
                        <p class="py-2">
                            Blissbox is a lifestyle company offering curated experiences in a gift-box. Established in 2016 to revolutionize the way we gift through unique activities and shared experiences. Hence, emotions as gift.
                        </p>
                    </div>
                    <div class="captions">
                        <img src="{{ asset('images/frontend/homepage/freedom-2.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                    </div>
                </div>
            </div>
        </section>
        -->
        <section id="newsletter" class="p-5">
            <div class="d-flex my-7 align-item-center flex-column text-center">
                <h2>Join the Blissbox Community and Get Even More Benefits!</h2>
                <h3 class="mt-5">Enjoy hot deals and exclusive offers</h3>
                <div class="d-flex justify-content-center align-self-stretch mt-4">
                    <form v-on:submit.prevent="submitsubscribe" class="d-flex flex-row justify-content-center f-50">
                        <div class="form-group">
                            <input type="text" class="form-control" id="email" v-model="subscribe" placeholder="Your Email Address">
                        </div>
                        <button type="submit" class="btn btn-register btn-register-nl">I'm Registering</button>
                    </form>
                </div>
            </div>
        </section>
        <section id="social">
            <div class="d-flex">
                <div class="f-50">
                    <div class="captions flex-wrap p-7">
                        <h1>@blissboxasia</h1>
                        <p class="py-2">
                            Follow us for the latest updates and conversations.
                            <br/>
                            Join our growing online community.
                        </p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/blissboxasia/" target="_blank"><i class="fa fa-facebook fa-2x" aria-hidden="true"></i></a>
                            <a href="https://sg.linkedin.com/company/blissbox-asia" target="_blank"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/blissboxasia/" target="_blank"><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a>
                        </div>
                    </div>
                    <div class="captions">
                        <img src="{{ asset('images/frontend/homepage/social.jpg') }}" class="img-fluid" alt="Emotion As Gift" />
                    </div>
                </div>
                <div class="f-50">
                    <div class="d-flex flex-wrap">
                        <div class="social p-5" v-for="(feed, index) in feeds" v-if="index < 4">
                            <img v-bind:src="feed.images.standard_resolution.url"
                                 class="img-fluid" />
                            <p class="mt-3">@{{ feed.likes.count }} likes</p>
                            <p>
                                {{--@{{  feed.caption.text }}--}}
                            </p>
                        </div>
                    </div>
                    <!--
                    <div class="d-flex flex-wrap">

                        <div class="social p-5">
                            <img src="{{ asset('/images/frontend/homepage/social-2.jpg') }}" class="img-fluid" alt="Gastronomy" />
                            <p class="mt-3">12 likes</p>
                            <p>blissboxasia TGIF #blissbox #giftbox
                                #happiness #weekend #enjoy #singapore #tgif</p>
                        </div>
                        <div class="social p-5">
                            <img src="{{ asset('/images/frontend/homepage/social-3.jpg') }}" class="img-fluid" alt="Adventure" />
                            <p class="mt-3">12 likes</p>
                            <p>blissboxasia TGIF #blissbox #giftbox
                                #happiness #weekend #enjoy #singapore #tgif</p>
                        </div>
                        <div class="social p-5">
                            <img src="{{ asset('/images/frontend/homepage/social-4.jpg') }}" class="img-fluid" alt="Stay" />
                            <p class="mt-3">12 likes</p>
                            <p>blissboxasia TGIF #blissbox #giftbox
                                #happiness #weekend #enjoy #singapore #tgif</p>
                        </div>
                    </div>
                    -->
                    <div id="socials-carousel" class="carousel slide text-center" data-ride="carousel" data-interval="false">
                        <ol class="carousel-indicators">
                            <li data-target="#socials-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#socials-carousel" data-slide-to="1"></li>
                            <li data-target="#socials-carousel" data-slide-to="2"></li>
                            <li data-target="#socials-carousel" data-slide-to="3"></li>
                        </ol>
                            <div class="carousel-inner">
                            <div class="carousel-item py-5" v-for="(feed, index) in feeds" v-if="index < 4">
                                <div>
                                    <img v-bind:src="feed.images.standard_resolution.url"
                                         class="img-fluid" />
                                    <p class="mt-3">@{{ feed.likes.count }} likes</p>
                                </div>
                            </div>

                            <div class="carousel-item wellness py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/social-2.jpg') }}" class="img-fluid"/>
                                    <p class="mt-3">12 likes</p>
                                    <p>blissboxasia TGIF #blissbox #giftbox
                                        #happiness #weekend #enjoy #singapore #tgif</p>
                                </div>
                            </div>
                            <div class="carousel-item adventure py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/social-3.jpg') }}" class="img-fluid"/>
                                    <p class="mt-3">12 likes</p>
                                    <p>blissboxasia TGIF #blissbox #giftbox
                                        #happiness #weekend #enjoy #singapore #tgif</p>
                                </div>
                            </div>
                            <div class="carousel-item stay py-5">
                                <div>
                                    <img src="{{ asset('/images/frontend/homepage/social-4.jpg') }}" class="img-fluid"/>
                                    <p class="mt-3">12 likes</p>
                                    <p>blissboxasia TGIF #blissbox #giftbox
                                        #happiness #weekend #enjoy #singapore #tgif</p>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#socials-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#socials-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!--
        <section id="multitheme" class="my-5">
            <div class="container">
                <div class="d-flex my-7 align-item-center flex-column text-center">
                    <h3>A hint of well-being, a great weekend, a great thrill, a dinner at the table of great chefs ...
                        These magical moments packs bring together the best of our experiences to live!</h3>
                </div>
            </div>
            <div class="container mt-5">
                <div class="owl-carousel owl-theme multitheme-owl-carousel">
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid" />
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                    <div class="item">
                        <img src="{{ asset('/images/frontend/homepage/wellness.png') }}" alt="Wellness" class="img-fluid"/>
                    </div>
                </div>
                <div class="d-flex text-center justify-content-evenly mt-5">
                    <a href="{{ url('/multitheme') }}" class="btn btn-multitheme">View Full Multi-Themes Collection</a>
                </div>
            </div>
        </section>
        -->

        <div class="modal fade" id="newsletterModal" tabindex="-1" role="dialog" aria-labelledby="newsletterModalDialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsletterModalDialog">
                            <img src="{{ asset('images/logo.png') }}" class="img-fluid" alt="Blissbox Logo" width="350">
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form v-on:submit.prevent="submitsubscribe">
                        <div class="modal-body">
                            <h5>Subscribe to our newsletter and enjoy $5 Promo Code!</h5>
                            <div class="form-group">
                                <input type="text" class="form-control" id="email" v-model="subscribe" placeholder="Your Email Address">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary btn-register-nl">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline-script')
    <script src="{{ asset('js/frontend/homepage.js') }}"></script>
@endsection