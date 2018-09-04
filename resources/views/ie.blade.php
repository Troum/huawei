@extends('layout')
@section('content')
    <div class="container-fluid m-xl-0 p-xl-0 animated">
        <div class="row m-xl-0 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 m-xl-0 p-xl-0">
                <div class="row m-xl-0 p-xl-0">
                    <div class="col-xl-10 m-xl-0">
                        <nav class="navbar navbar-expand-lg navbar-dark bg-white fixed-top z-depth-0">
                            <div class="container m-0 p-0 mx-auto">
                                <a class="navbar-brand" href="http://consumer.huawei.com/by">
                                    <img src="{{asset('images/site/logo.svg')}}" alt="Видеть больше с HUAWEI" class="img-fluid">
                                </a>
                                <button class="hamburger hamburger--spin" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                                      <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                      </span>
                                </button>
                                <div class="collapse navbar-collapse" id="basicExampleNav">
                                    <ul class="navbar-nav mx-auto">
                                        <li class="nav-item animated item-1" style="padding: 7px;">
                                            <a class="text-dark" href="{{asset('assets/documents/Правила рекламной игры Вокруг света с Huawei.pdf')}}" target="_blank" data-rules style="display: block">Правила игры</a>
                                        </li>
                                        <li class="nav-item animated item-1">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-rules" style="text-decoration: none!important">Условия участия</a>
                                        </li>
                                        <li class="nav-item animated item-2">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-trips" style="text-decoration: none!important">Описание поездок</a>
                                        </li>
                                        <li class="nav-item animated item-3">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-line" style="text-decoration: none!important">Линейка HUAWEI P20</a>
                                        </li>
                                        <li class="nav-item animated item-3">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-winners" style="text-decoration: none!important">Победители</a>
                                        </li>
                                        <li class="nav-item animated item-3">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-partners" style="text-decoration: none!important">Партнеры</a>
                                        </li>
                                        <li class="nav-item animated item-4">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-faq" style="text-decoration: none!important">FAQ</a>
                                        </li>
                                        <li class="nav-item animated item-5">
                                            <a class="nav-link text-dark anchor-scroll" href="#game-feedback" style="text-decoration: none!important">Обратная связь</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row m-xl-0 p-xl-0">
                    <div class="col-xl-10 mx-xl-auto text-center p-xl-0 slide">
                        <img src="{{asset('images/site/slide.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="row m-xl-0 p-xl-0">
                    <div class="col-xl-8 mx-xl-auto text-center p-xl-0">
                        <h1 class="slogan display-4 text-uppercase">
                            вокруг света с huawei!
                        </h1>
                        <p class="text-uppercase h4 slogan-description">купите смартфон и выиграйте <strong style="font-family: 'FrutigerNext-Bold', sans-serif">кругосветное путешествие</strong></p>
                    </div>
                </div>
                <div class="row m-xl-0 p-xl-0">
                    <div class="col-xl-6 mx-xl-auto text-center">
                        <p>Купите в период акции смартфон линейки <a class="anchor-scroll" href="#game-line">Huawei P20</a> в салонах наших <a class="anchor-scroll" href="#game-partners">партнеров</a> и участвуйте в розыгрыше кругосветного путешествия и 4-х поездок в экзотические страны.</p>
                    </div>
                    <div class="col-xl-10 mx-xl-auto text-center mt-xl-2">
                        <a class="btn btn-huawei text-white anchor-scroll" href="#game-registration" style="text-decoration: none!important">зарегистрироваться</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 m-0 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/star.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-rules">
                        <h2 class="text-uppercase rules">условия участия</h2>
                    </div>
                    <div class="col-xl-8 mx-xl-auto p-xl-0 mt-xl-4">
                        <div class="row m-xl-0 p-xl-0">
                            <div class="col-xl-3 mx-xl-auto text-center">
                                <p class="text-danger text-uppercase rules-steps h4">
                                    купите
                                </p>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <img src="{{asset('images/site/cart.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <p><strong>смартфон <br><a class="anchor-scroll" href="#game-line">Huawei P20</a>,<br><a class="anchor-scroll" href="#game-line">Huawei P20 Pro</a>, <a
                                                        href="#game-line"><br>Huawei P20 lite</a></strong> в салонах <a class="anchor-scroll" href="#game-partners">партнеров</a> с 24 августа по 30 сентября</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 m-xl-0 p-xl-0 d-flex justify-content-center align-content-center">
                                <img src="{{asset('images/site/chevron-right.png')}}" alt="" class="align-self-center m-xl-auto img-fluid">
                            </div>
                            <div class="col-xl-3 mx-xl-auto text-center">
                                <p class="text-danger text-uppercase rules-steps h4">
                                    зарегистрируйте
                                </p>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <img src="{{asset('images/site/list.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <p>
                                            свою покупку на<br>
                                            <strong class="text-uppercase">видетьбольше.бел</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-1 m-xl-0 p-xl-0 d-flex justify-content-center align-content-center">
                                <img src="{{asset('images/site/chevron-right.png')}}" alt="" class="align-self-center m-xl-auto img-fluid">
                            </div>
                            <div class="col-xl-3 mx-xl-auto text-center">
                                <p class="text-danger text-uppercase rules-steps h4">
                                    участвуйте
                                </p>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <img src="{{asset('images/site/participate.png')}}" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="row m-xl-0 p-xl-0 mt-xl-3 pt-xl-2">
                                    <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                        <p>в <a href="#game-winners"><strong>розыгрышах</strong></a><br>
                                            кругосветного путешествия и 4-х поездок в экзотические страны
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-xl-5 p-xl-0 text-center">
                        <img src="{{asset('images/site/island.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 register-background d-flex justify-content-center align-content-center">
            <div class="col-xl-12 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/user.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-registration">
                        <h2 class="text-uppercase rules">регистрация участника</h2>
                        <p>Чтобы участвовать в розыгрыше, пожалуйста, зарегистрируйтесь</p>
                    </div>
                </div>
                <div class="row mt-xl-5 p-xl-0">
                    <div class="col-xl-8 mx-xl-auto">
                        <div class="row m-xl-0 p-xl-0" id="registration-container">
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="name" class="form-control" placeholder="ФИО" required>
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="email" id="email" class="form-control disabled" placeholder="E-mail" required>
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="phone" class="form-control disabled" placeholder="Номер телефона" required>
                            </div>

                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="region" class="form-control disabled" placeholder="Область" required >
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="city" class="form-control disabled" placeholder="Населенный пункт" required >
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="street" class="form-control disabled" placeholder="Улица">
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="build" class="form-control disabled" placeholder="Дом/квартира" required >
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <input type="text" id="index" class="form-control disabled" placeholder="Индекс" required data-toggle="popover" data-title="Индекс" data-trigger="focus" data-content="Можно ввести только цифры">
                            </div>
                            <div class="col-xl-6">
                                <div class="md-form input-group" id="imei-group">
                                    <input type="text" id="imei" class="form-control disabled" placeholder="IMEI смартфона" data-toggle="popover" data-title="IMEI" data-content="Можно ввести только цифры" required>
                                    <div class="input-group-append">
                                        <button id="tip-one" class="btn bg-white m-0 z-depth-0 popover-dismiss" type="button" data-toggle="popover" data-trigger="focus" title="IMEI"></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 mb-xl-3">
                                <div class="md-form input-group" id="photo-input-group">
                                    <div class="row m-0 p-0 w-100">
                                        <div class="col-xl-10 m-xl-0 p-xl-0">
                                            <div class="file-field">
                                                <div class="form-control bg-white">
                                                    <span id="photoFilename" style="font-weight: bolder; color: rgb(117,130,137)">Добавить фото гарантийного талона/чека</span>
                                                    <input type="file" id="photo" name="photo" class="disabled" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-2 m-xl-0 p-xl-0">
                                            <div class="input-group-append">
                                                <button id="tip-two" class="btn bg-white m-xl-0 z-depth-0 popover-dismiss w-100" type="button" data-toggle="popover" data-trigger="focus" title="IMEI"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 d-flex justify-content-start align-content-center">
                                <div class="form-check align-self-center pl-0">
                                    <input type="checkbox" class="form-check-input invalid-feedback" id="agreement" value="disagree">
                                    <label class="form-check-label disabled" for="agreement"><small class="d-inline-block ml-xl-4 mt-xl-2">C <a
                                                    href="{{asset('assets/documents/Правила рекламной игры Вокруг света с Huawei.pdf')}}" target="_blank" class="text-danger">правилами</a> рекламной игры ознакомлен/на и согласен/на</small></label>
                                </div>
                            </div>
                            <div class="col-xl-12 mt-xl-5 d-flex justify-content-center align-content-center">
                                <button type="button" id="register" class="btn btn-lg btn-huawei align-self-center m-xl-auto disabled" data-toggle="popover" data-title="Согласие" data-content="Вы не согласились с правилами">Зарегистрировать</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 m-0 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/world.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-trips">
                        <h2 class="text-uppercase rules">описание поездок</h2>
                    </div>
                    <div class="col-xl-12 m-xl-0 p-xl-0">
                        <div class="row mt-xl-5 p-xl-0">
                            <div class="col-xl-10 mx-xl-auto">
                                <div class="row m-xl-0 p-xl-0">
                                    <div class="col-xl-12 mx-xl-auto">
                                        <nav class="mb-xl-4">
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="col-xl-4 nav-item rounded-0 nav-link active" id="nav-world-around-tab" data-toggle="tab" href="#nav-world-around" role="tab" aria-controls="nav-world-around" aria-selected="true">Кругосветное путешествие</a>
                                                <a class="col-xl-2 nav-item rounded-0 nav-link" id="nav-first-trip-tab" data-toggle="tab" href="#nav-first-trip" role="tab" aria-controls="nav-first-trip" aria-selected="false">Мексика</a>
                                                <a class="col-xl-2 nav-item rounded-0 nav-link" id="nav-second-trip-tab" data-toggle="tab" href="#nav-second-trip" role="tab" aria-controls="nav-second-trip" aria-selected="false">Шри-Ланка</a>
                                                <a class="col-xl-2 nav-item rounded-0 nav-link" id="nav-third-trip-tab" data-toggle="tab" href="#nav-third-trip" role="tab" aria-controls="nav-third-trip" aria-selected="false">Занзибар</a>
                                                <a class="col-xl-2 nav-item rounded-0 nav-link" id="nav-fourth-trip-tab" data-toggle="tab" href="#nav-fourth-trip" role="tab" aria-controls="nav-fourth-trip" aria-selected="false">Китай</a>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-xl-12 m-xl-0 p-xl-0">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane p-xl-4 fade show active" id="nav-world-around" role="tabpanel" aria-labelledby="nav-world-around-tab">
                                                <div class="row">
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <img src="{{asset('images/site/image.jpg')}}" alt="" class="img-fluid img-rounded" style="border-radius: 10px!important;">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row" style="margin-top: 4rem; text-align: justify">
                                                            <div class="col-xl-10">
                                                                <p class="h4 blue-text text-center">Кругосветное путешествие</p>
                                                                <p style="line-height: 1.8rem">Не упустите свой шанс обогнуть земной шар, побывав в легендарной Барселоне, пляжной Малаге, островной Португалии, горячей Колумбии, райской Коста-Рике, звездном Лос-Анджелесе, экзотическом Таити, невероятной Австралии, романтичном Коломбо в Шри-Ланке и шикарном Абу-Даби в Объединенных Арабских Эмиратах.</p>
                                                                <p><em>Хотите увидеть весь мир? Купите смартфон линейки <a href="#game-line" class="anchor-scroll"><strong style="text-decoration: underline!important">Huawei P20!</strong></a></em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-first-trip" role="tabpanel" aria-labelledby="nav-first-trip-tab">
                                                <div class="row">
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <img src="{{asset('images/site/image1.jpg')}}" alt="" class="img-fluid" style="border-radius: 10px!important;">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row" style="margin-top: 4rem; text-align: justify">
                                                            <div class="col-xl-10">
                                                                <p class="h4 blue-text text-center">Мексика</p>
                                                                <p style="line-height: 1.8rem">Мексика — это удивительная шкатулка впечатлений. Это богатая культура и древняя история, древние пирамиды майа, джунгли и вулканы, пляжи и бухты Карибского моря, рифы, пустыни, тусовочные и колоритные города, острая мексиканская еда и обжигающий колорит!</p>
                                                                <p><em>Хотите провести отпуск в Мексике? Купите смартфон линейки <a href="#game-line" class="anchor-scroll"><strong style="text-decoration: underline!important">Huawei P20!</strong></a></em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-second-trip" role="tabpanel" aria-labelledby="nav-second-trip-tab">
                                                <div class="row">
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <img src="{{asset('images/site/image2.jpg')}}" alt="" class="img-fluid" style="border-radius: 10px!important;">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row" style="margin-top: 4rem; text-align: justify">
                                                            <div class="col-xl-10">
                                                                <p class="h4 blue-text text-center">Шри-Ланка</p>
                                                                <p style="line-height: 1.8rem">Шри-Ланка — экзотический остров в Азии, также известный как остров Цейлон.  Здесь вас ждут не только высококлассные пляжи и морские развлечения, но и древняя культура, исторические и природные достопримечательности. А на одной из величайших чайных плантаций мира уже тянется к солнцу листок, который попадет в вашу ароматную чашку чая.</p>
                                                                <p><em>Мечтали об отдыхе на экзотическом острове?  Купите смартфон линейки <a href="#game-line" class="anchor-scroll"><strong style="text-decoration: underline!important">Huawei P20!</strong></a></em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-third-trip" role="tabpanel" aria-labelledby="nav-third-trip-tab">
                                                <div class="row">
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <img src="{{asset('images/site/image4.jpg')}}" alt="" class="img-fluid" style="border-radius: 10px!important;">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row" style="margin-top: 4rem; text-align: justify">
                                                            <div class="col-xl-10">
                                                                <p class="h4 blue-text text-center">Занзибар</p>
                                                                <p style="line-height: 1.8rem">Занзибар — тропический рай в Индийском океане. Это бескрайние белоснежные пляжи с лазурной водой, неповторимый африканский колорит, диковинная природа и аутентичная культура. Здесь вас ждут морские прогулки, дайвинг, путешествия вглубь джунглей и сокровища султана.</p>
                                                                <p><em>Хотите увидеть экзотический остров специй Занзибар? Купите смартфон линейки <a href="#game-line" class="anchor-scroll"><strong style="text-decoration: underline!important">Huawei P20!</strong></a></em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-fourth-trip" role="tabpanel" aria-labelledby="nav-fourth-trip-tab">
                                                <div class="row">
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <img src="{{asset('images/site/image5.jpg')}}" alt="" class="img-fluid" style="border-radius: 10px!important;">
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="row" style="margin-top: 4rem; text-align: justify">
                                                            <div class="col-xl-10">
                                                                <p class="h4 blue-text text-center">Китай</p>
                                                                <p style="line-height: 1.8rem">Путешествие в Китай — это ошеломительный опыт даже для бывалого туриста. Столичный Пекин, ультрасовременный Шанхай, культовая Великая Китайская стена, милые панды, чарующие сады, разноцветные горы и умиротворяющие храмы.</p>
                                                                <p><em>Хотите оказаться в Китае и обнять панду? Купите смартфон линейки <a href="#game-line" class="anchor-scroll"><strong style="text-decoration: underline!important">Huawei P20!</strong></a></em></p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-xl-5 p-xl-0 text-center">
                        <img src="{{asset('images/site/dragon.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 m-0 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/cup.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-winners">
                        <h2 class="text-uppercase rules">победители</h2>
                    </div>
                    <div class="col-xl-12 m-xl-0 p-xl-0">
                        <div class="row mt-xl-5 p-xl-0">
                            <div class="col-xl-11 mx-xl-auto">
                                <div class="row m-xl-0 p-xl-0">
                                    <div class="col-xl-10 mx-xl-auto">
                                        <nav class="mb-xl-4">
                                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                                <a class="col-xl-3 nav-item rounded-0 nav-link active" id="nav-first-tab" data-toggle="tab" href="#nav-first" role="tab" aria-controls="nav-first" aria-selected="true">Розыгрыш 1</a>
                                                <a class="col-xl-3 nav-item rounded-0 nav-link" id="nav-second-tab" data-toggle="tab" href="#nav-second" role="tab" aria-controls="nav-second" aria-selected="false">Розыгрыш 2</a>
                                                <a class="col-xl-3 nav-item rounded-0 nav-link" id="nav-third-tab" data-toggle="tab" href="#nav-third" role="tab" aria-controls="nav-third" aria-selected="false">Розыгрыш 3</a>
                                                <a class="col-xl-3 nav-item rounded-0 nav-link" id="nav-fourth-tab" data-toggle="tab" href="#nav-fourth" role="tab" aria-controls="nav-fourth" aria-selected="false">Розыгрыш 4</a>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-xl-12 m-xl-0 p-xl-0">
                                        <div class="tab-content" id="nav-tabContent">
                                            <div class="tab-pane p-xl-4 fade show active" id="nav-first" role="tabpanel" aria-labelledby="nav-first-tab">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-xl-12 text-center" style="margin-top: 15rem;">
                                                                <p class="h5 font-weight-bold">Дата проведения розыгрыша:</p>
                                                                <p class="h5 font-weight-light">07 сентября 2018 года</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <div class="embed-responsive embed-responsive-16by9 z-depth-2">
                                                            <video src="{{asset('video/huaweitravel.mp4')}}" controls controlsList="nodownload noremoteplayback nomutebutton" preload="metadata"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-second" role="tabpanel" aria-labelledby="nav-second-tab">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-xl-12 text-center" style="margin-top: 15rem;">
                                                                <p class="h5 font-weight-bold">Дата проведения розыгрыша:</p>
                                                                <p class="h5 font-weight-light">14 сентября 2018 года</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <div class="embed-responsive embed-responsive-16by9 z-depth-2">
                                                            <video src="{{asset('video/huaweitravel.mp4')}}" controls controlsList="nodownload noremoteplayback nomutebutton" preload="metadata"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-third" role="tabpanel" aria-labelledby="nav-third-tab">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-xl-12 text-center" style="margin-top: 15rem;">
                                                                <p class="h5 font-weight-bold">Дата проведения розыгрыша:</p>
                                                                <p class="h5 font-weight-light">21 сентября 2018 года</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <div class="embed-responsive embed-responsive-16by9 z-depth-2">
                                                            <video src="{{asset('video/huaweitravel.mp4')}}" controls controlsList="nodownload noremoteplayback nomutebutton" preload="metadata"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane p-xl-4 fade" id="nav-fourth" role="tabpanel" aria-labelledby="nav-fourth-tab">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="row">
                                                            <div class="col-xl-12 text-center" style="margin-top: 15rem;">
                                                                <p class="h5 font-weight-bold">Дата проведения розыгрыша:</p>
                                                                <p class="h5 font-weight-light">05 октября 2018 года</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 m-0 p-0">
                                                        <div class="embed-responsive embed-responsive-16by9 z-depth-2">
                                                            <video src="{{asset('video/huaweitravel.mp4')}}" controls controlsList="nodownload noremoteplayback nomutebutton" preload="metadata"></video>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 m-0 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/lines.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-line">
                        <h2 class="text-uppercase rules">линейка huawei p20</h2>
                    </div>
                    <div class="col-xl-12 m-xl-0 p-xl-0">
                        <div class="row mt-xl-5 p-xl-0">
                            <div class="col-xl-11 mx-xl-auto">
                                <div class="row m-xl-0 p-xl-0">
                                    <div class="col-xl-4 m-xl-0 p-xl-0">
                                        <div class="row m-xl-0 p-xl-0">
                                            <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                                <img src="{{asset('images/site/hp20.png')}}" class="img-fluid"></div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0">
                                                <ul class="text-left">
                                                    <li>&sdot;&nbsp;&nbsp;двойная камера Leica 12Мп + 20Мп</li>
                                                    <li>&sdot;&nbsp;&nbsp;процессор Kirin 970 с ИИ</li>
                                                    <li>&sdot;&nbsp;&nbsp;24Мп фронтальная камера</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto p-xl-0 text-right">
                                                <a style="text-decoration: none; font-weight: 600" data-toggle="modal" data-target="#p20">
                                                    <strong>Подробнее >></strong>
                                                </a>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0 text-center">
                                                <a class="btn btn-huawei w-50 text-white anchor-scroll" href="#game-partners" style="border-radius: 10px; text-decoration: none!important">
                                                    где купить
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 m-xl-0 p-xl-0">
                                        <div class="row m-xl-0 p-xl-0">
                                            <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                                <img src="{{asset('images/site/hp20Pro.png')}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0">
                                                <ul class="text-left">
                                                    <li>&sdot;&nbsp;&nbsp;тройная камера Leica 40Мп + 20Мп + 8Мп</li>
                                                    <li>&sdot;&nbsp;&nbsp;процессор Kirin 970 с ИИ</li>
                                                    <li>&sdot;&nbsp;&nbsp;24Мп фронтальная камера</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto p-xl-0 text-right">
                                                <a style="text-decoration: none; font-weight: 600" data-toggle="modal" data-target="#p20Pro">
                                                    <strong>Подробнее >></strong>
                                                </a>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0 text-center">
                                                <a class="btn btn-huawei w-50 text-white anchor-scroll" href="#game-partners" style="border-radius: 10px; text-decoration: none!important">
                                                    где купить
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 m-xl-0 p-xl-0">
                                        <div class="row m-xl-0 p-xl-0">
                                            <div class="col-xl-12 m-xl-0 p-xl-0 text-center">
                                                <img src="{{asset('images/site/hp20Lite.png')}}" alt="" class="img-fluid">
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0">
                                                <ul class="text-left">
                                                    <li>&sdot;&nbsp;&nbsp;двойная камера 16Мп + 2Мп</li>
                                                    <li>&sdot;&nbsp;&nbsp;16Мп фронтальная камера</li>
                                                    <li>&sdot;&nbsp;&nbsp;быстрая зарядка HUAWEI Fast Charge 2.0</li>
                                                </ul>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto p-xl-0 text-right">
                                                <a style="text-decoration: none; font-weight: 600" data-toggle="modal" data-target="#p20Lite">
                                                    <strong>Подробнее >></strong>
                                                </a>
                                            </div>
                                            <div class="col-xl-11 mx-xl-auto mt-xl-4 p-xl-0 text-center">
                                                <a class="btn btn-huawei w-50 text-white anchor-scroll" href="#game-partners" style="border-radius: 10px; text-decoration: none!important">
                                                    где купить
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 mt-xl-5 p-xl-0 text-center">
                        <img src="{{asset('images/site/mexica.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/partners.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-partners">
                        <h2 class="text-uppercase rules">партнеры</h2>
                    </div>
                </div>
                <div class="row mt-xl-5 p-xl-0">
                    <div class="col-xl-8 mx-xl-auto">
                        <img src="{{asset('images/site/partners-logos.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 mb-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 p-0 text-center align-self-center m-xl-auto">
                <img src="{{asset('images/site/faq.png')}}" alt="" class="img-fluid">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-faq">
                        <h2 class="text-uppercase rules">часто задаваемые вопросы</h2>
                    </div>
                </div>
                <div class="row mt-xl-5 p-xl-0">
                    <div class="col-xl-8 mx-xl-auto">
                        <div class="accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                            <div class="card mb-2">
                                <div class="card-header z-depth-0" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                <span class="mb-0">
                                    Какие смартфоны участвуют в рекламной игре?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseOne" class="collapse z-depth-0" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>
                                            В акции участвуют модели смартфонов: Huawei P20, Huawei P20 lite, Huawei  P20 Pro
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <span class="mb-0">
                                    Какое фото нужно загрузить для регистрации на сайте?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>
                                            На интернет-сайт необходимо загрузить фотографию кассового (товарного) чека или заполненного гарантийного талона. Гарантийный талон — все поля гарантийного талона должны быть заполнены: печать продавца, IMEI, наименование товара, адрес магазина и дата продажи.
                                            Кассовый чек принимается вместо гарантийного талона, если он содержит УНП продавца, дату продажи, наименование товара, количество и цену приобретенного товара, а также номер кассового чека.

                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <span class="mb-0">
                                    Какие призы разыгрываются?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <ul>
                                            <li>07 сентября 2018г. — сертификат № 1 на путешествие в Мексику;</li>
                                            <li>14 сентября 2018г. — сертификат № 2 на путешествие на остров Шри-Ланка;</li>
                                            <li>21 сентября 2018г. — сертификат № 3 на путешествие на остров Занзибар (Танзания);</li>
                                            <li>05 октября 2018г. — сертификат № 4 на поездку в Китай и сертификат № 5 на кругосветное путешествие (Главный приз).</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingFour">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                <span class="mb-0">
                                    Что делать, если не пришло SMS-сообщение с номером участника?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseFour" class="collapse" role="tabpanel" aria-labelledby="headingFour" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Свяжитесь с нами через форму «Обратная связь»..</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingFive">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                <span class="mb-0">
                                    Как узнать, что я выиграл?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseFive" class="collapse" role="tabpanel" aria-labelledby="headingFive" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>
                                            Мы свяжемся с Вами по номеру телефона, указанному при регистрации. В случае, если номер будет недоступен - Вы получите SMS — сообщение, а также будете уведомлены заказным письмом или письмом на электронную почту.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingSix">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                <span class="mb-0">
                                    Сколько дней будет длиться кругосветное путешествие?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseSix" class="collapse" role="tabpanel" aria-labelledby="headingSix" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Программа кругосветного путешествия рассчитана на 31 день.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingSeven">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                <span class="mb-0">
                                   На скольких человек рассчитано путешествие?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseSeven" class="collapse" role="tabpanel" aria-labelledby="headingSeven" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>В пределах стоимости сертификата ограничений по количеству человек нет.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingEight">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                <span class="mb-0">
                                   Есть ли конкретные числа, в которые должна состояться поездка?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseEight" class="collapse" role="tabpanel" aria-labelledby="headingEight" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Вы можете отправиться в путешествие в срок до 31 октября 2019г.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingNine">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                <span class="mb-0">
                                    Что включено в сертификат на поездку?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseNine" class="collapse" role="tabpanel" aria-labelledby="headingNine" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Все включено! Перелет, трансфер, проживание, питание и даже визы! Программу поездки специально для Вас спланирует турагентство
                                            <a href="https://alltour.by/">https://alltour.by/</a>. Единственное ограничение — это сумма сертификата.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingTen">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                <span class="mb-0">
                                    Я хочу поехать не только в Мексику, но и объехать всю Латинскую Америку. Это возможно?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseTen" class="collapse" role="tabpanel" aria-labelledby="headingTen" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Сертификат может быть использован Вами для путешествия в Мексику, также Вы можете расширить маршрут и объехать всю Латинскую Америку, если стоимость спланированного Вами совместно с турагентством путешествия не превышает стоимости сертификата либо доплатив необходимую сумму из собственных средств.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingEleven">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                <span class="mb-0">
                                    Могу ли я отказаться / подарить выигранный сертификат?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseEleven" class="collapse" role="tabpanel" aria-labelledby="headingEleven" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Вы сможете отказаться от сертификата. Передача сертификата 3-м лицам не предусмотрена. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-2">
                                <div class="card-header" role="tab" id="headingTwelve">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                <span class="mb-0">
                                    Если я купил смартфон в магазине, которого нет в списке – могу ли я участвовать в рекламной игре?
                                </span>
                                        <i class="fa fa-angle-down rotate-icon float-right"></i>
                                    </a>
                                </div>
                                <div id="collapseTwelve" class="collapse" role="tabpanel" aria-labelledby="headingTwelve" data-parent="#accordionEx">
                                    <div class="card-body">
                                        <p>Нет. В рекламной игре принимают участие только смартфоны, купленные в магазинах-партнеров.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 mx-xl-auto mt-xl-5 p-xl-0 text-center">
                        <img src="{{asset('images/site/landscape.png')}}" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5 mb-5"></div>
        <div class="row m-xl-0 mt-xl-5 p-xl-0 d-flex justify-content-center align-content-center">
            <div class="col-xl-12 p-0 text-center align-self-center m-xl-auto">
                <div class="row m-0 p-0">
                    <div class="col-xl-12 m-xl-3 text-center" id="game-feedback">
                        <h3><strong>Остались вопросы? Напишите нам!</strong></h3>
                    </div>
                </div>
                <div class="row mt-xl-5 p-xl-0">
                    <div class="col-xl-6 mx-xl-auto">
                        <div class="row m-xl-0 p-xl-0" id="feedback-container">
                            <div class="col-xl-12 mb-xl-3">
                                <input type="email" id="feedback-email" class="form-control bg-light" placeholder="Ваш e-mail для обратной связи" required>
                            </div>
                            <div class="col-xl-12 mb-xl-3">
                                <textarea class="form-control bg-light" name="feedback" id="feedback-message" cols="30" rows="10" placeholder="Текст сообщения"></textarea>
                            </div>
                            <div class="col-xl-12 mb-xl-3 text-center">
                                <button class="btn btn-huawei w-50" style="border-radius: 10px;" id="send-feedback">отправить</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-xl-5 p-xl-0">
                    <div class="col-xl-7 mx-xl-auto">
                        <div class="row m-xl-0 p-xl-0 d-flex justify-content-center align-content-center">
                            <div class="col-xl-6 align-self-center m-xl-auto text-right">
                                <p>Следите за нами в соцсетях</p>
                            </div>
                            <div class="col-xl-6 align-self-center m-xl-auto">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="https://vk.com/huaweimobileby " class="btn btn-floating btn-sm d-flex justify-content-center align-content-center primary-color text-white" style="text-decoration: none!important;">
                                            <i class="fab fa-vk fa-2x align-self-center m-auto"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.facebook.com/HuaweimobileBY/" class="btn btn-floating 1tn-sm d-flex justify-content-center align-content-center primary-color-dark text-white" style="text-decoration: none!important;">
                                            <i class="fab fa-facebook-f fa-2x align-self-center m-auto"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.youtube.com/channel/UCfVXuOkhygPuOJ-Uzpr348A " class="btn btn-floating btn-sm d-flex justify-content-center align-content-center danger-color-dark text-white" style="text-decoration: none!important;">
                                            <i class="fab fa-youtube fa-2x align-self-center m-auto"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="https://www.instagram.com/huaweimobileby/ " class="btn btn-floating btn-sm d-flex justify-content-center align-content-center text-white" style="background-color: #cebfa9; text-decoration: none!important;">
                                            <i class="fab fa-instagram fa-2x align-self-center m-auto"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 mx-xl-auto">
                        <div class="row m-xl-0 p-xl-0">
                            <div class="col-xl-12 text-left">
                                <p>
                                    <small>Период проведения рекламной игры «Вокруг света с Huawei» с 24.08.2018 по 14.11.2018.
                                        Свидетельство о гос. регистрации № 3358 от 15.08.2018 г. Выдано Министерством
                                        антимонопольного регулирования и торговли Республики Беларусь.  Горячая линия
                                        <a href="tel:+375293224252">+375 (29) 322-42-52</a> (с 14:00 по 18:00). Организатор — Издательско-производственное
                                        частное унитарное предприятие «ПРОСПЕКТПРЕСС», УНП 101520868
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection