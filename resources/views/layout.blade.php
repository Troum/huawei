<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-125060599-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-125060599-1');
    </script>
    <meta charset="UTF-8">
    <meta property="og:title" content="ВОКРУГ СВЕТА С HUAWEI!" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="http://видетьбольше.бел" />
    <meta property="og:site_name" content="ВОКРУГ СВЕТА С HUAWEI!" />
    <meta property="og:description" content="КУПИ HUAWEI P20/P20 Pro/P20 lite > ЗАРЕГИСТРИРУЙ НА САЙТЕ ВИДЕТЬБОЛЬШЕ.БЕЛ > ПРИМИ УЧАСТИЕ В РОЗЫГРЫШЕ КРУГОСВЕТНОГО ПУТЕШЕСТВИЯ И 4-Х ПОЕЗДОК В ЭКЗОТИЧЕСКИЕ СТРАНЫ">
    <meta property="og:image" content="{{asset('images/site/slide.png')}}" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="300" />
    <meta name="description" content="Купите в период акции смартфон линейки Huawei P20 в салонах наших партнеров и участвуйте в розыгрыше кругосветного путешествия и 4-х поездок в экзотические страны.">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('favicon.ico')}}">
    <style>
        .container-fluid {
            display: none;
        }

        .loader-container {
            display: flex;
            align-content: center;
            justify-content: center;
            position: absolute;
            width: 100%;
            height: 100vh !important;
            top: 0;
            left: 0;
            background-color: #ffffff;
        }

        .loader {
            align-self: center;
            position: relative;
            display: grid;
            grid-template-columns: 33% 33% 33%;
            grid-gap: 2px;
            width: 100px;
            height: 100px;
        }

        .loader > div {
            position: relative;
            display: inline-block;
            width: 100%;
            height: 100%;
            background: #c8102e;
            transform: scale(0);
            transform-origin: center center;
            animation: loader 2s infinite linear;
        }

        .loader > div:nth-of-type(1), .loader > div:nth-of-type(5), .loader > div:nth-of-type(9) {
            animation-delay: 0.4s;
        }

        .loader > div:nth-of-type(4), .loader > div:nth-of-type(8) {
            animation-delay: 0.2s;
        }

        .loader > div:nth-of-type(2), .loader > div:nth-of-type(6) {
            animation-delay: 0.6s;
        }

        .loader > div:nth-of-type(3) {
            animation-delay: 0.8s;
        }

        @keyframes loader {
            0% {
                transform: scale(0);
            }
            40% {
                transform: scale(1);
            }
            80% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
    </style>
    <title>Видеть больше</title>
</head>
<body>
<div class="loader-container">
    <div class="loader">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
@yield('content')
<div class="modal fade" id="p20" tabindex="-1" role="dialog" aria-labelledby="p20Label" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="p20Label">Huawei P20</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-3 col-xl-6 m-0 p-0 text-center d-flex justify-content-center align-content-center">
                        <img src="{{asset('images/site/hp20.png')}}" alt="" class="img-fluid align-self-center m-auto">
                    </div>
                    <div class="col-9 col-xl-6 d-flex justify-content-center align-content-center">
                        <ul class="text-left align-self-center m-auto mr-auto">
                            <li>
                                <small>&sdot;&nbsp;двойная камера Leica 12Мп + 20Мп</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;процессор Kirin 970 <br>
                                    &nbsp;&nbsp;c Искусственным Интеллектом
                                </small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;24Мп фронтальная камера</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;3400 мАч, быстрая зарядка HUAWEI SuperCharge</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;5.8’’ HUAWEI FullView RGBW дисплей</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;4 ГБ RAM + 128 ГБ ROM</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;AndroidTM 8.1 + EMUI 8.1</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="p20Pro" tabindex="-1" role="dialog" aria-labelledby="p20ProLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="p20ProLabel">Huawei P20 Pro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-3 col-xl-6 m-0 p-0 text-center d-flex justify-content-center align-content-center">
                        <img src="{{asset('images/site/hp20Pro.png')}}" alt="" class="img-fluid align-self-auto m-auto">
                    </div>
                    <div class="col-9 col-xl-6 d-flex justify-content-center align-content-center">
                        <ul class="text-left align-self-center m-auto mr-auto">
                            <li>
                                <small>&sdot;&nbsp;тройная камера Leica 40Мп + 20Мп + 8Мп</small>
                                <small>&nbsp;&nbsp;лучшая мобильная камера в мире по версии &nbsp;&nbsp;DxOMark</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;процессор Kirin 970 <br>
                                    &nbsp;&nbsp;c Искусственным Интеллектом
                                </small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;24Мп фронтальная камера</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;4000 мАч, быстрая зарядка HUAWEI SuperCharge</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;6.1’’ HUAWEI FullView OLED дисплей</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;6 ГБ RAM + 128 ГБ ROM</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;AndroidTM 8.1 + EMUI 8.1</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="p20Lite" tabindex="-1" role="dialog" aria-labelledby="p20LiteLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h5 class="modal-title text-white" id="p20LiteLabel">Huawei P20 lite</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-3 col-xl-6 m-0 p-0 text-center d-flex justify-content-center align-content-center">
                        <img src="{{asset('images/site/hp20Lite.png')}}" alt="" class="img-fluid align-self-center m-auto">
                    </div>
                    <div class="col-9 col-xl-6 d-flex justify-content-center align-content-center">
                        <ul class="text-left align-self-center m-auto mr-auto">
                            <li>
                                <small>&sdot;&nbsp;двойная камера 16Мп + 2Мп</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;16Мп фронтальная камера</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;быстрая зарядка HUAWEI Fast Charge 2.0</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;3000 мАч</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;5.84’’ 19:9 HUAWEI FullView 2.0 дисплей</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;4 ГБ RAM + 64 ГБ ROM</small>
                            </li>
                            <li>
                                <small>&sdot;&nbsp;AndroidTM 8.0 + EMUI 8.0</small>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('assets/easy-autocomplete/dist/jquery.easy-autocomplete.min.js')}}"></script>
<script src="{{asset('assets/popper.js/dist/umd/popper.min.js')}}"></script>
<script src="{{asset('assets/mdbootstrap/js/mdb.min.js')}}"></script>
<script src="{{asset('assets/mdbootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/modernizr/modernizr.min.js')}}"></script>
<script src="{{asset('assets/toastr/build/toastr.min.js')}}"></script>
<script src="{{asset('assets/custom/anchor-scrolling.min.js')}}"></script>
<script src="{{asset('assets/custom/custom.js')}}"></script>
<script src="{{asset('assets/custom/client.min.js')}}"></script>
</body>
</html>