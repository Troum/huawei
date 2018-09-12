@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10 col-xl-12 mx-auto">
                <div class="card rounded-0">
                    <div class="card-header">
                        <div class="row m-0 p-0">
                            <div class="col-xl-4 text-left border-right">
                                <span class="ml-xl-2 d-block"><strong>Зарегистрированных: {{$allRegistered}} ({{round(($allRegistered/$count)*100, 2)}}% от общего числа)</strong></span>
                                <span class="ml-xl-2 d-block"><strong>Промодерированных: {{$allApproved}} ({{round(($allApproved/$count)*100, 2)}}% от общего числа)</strong></span>
                                <span class="ml-xl-2 d-block"><strong>Ошибочных: {{$allMistakes}} ({{round(($allMistakes/$count)*100, 2)}}% от общего числа)</strong></span>
                                <span class="ml-xl-2 d-block"><strong>Отказано: {{$allDeclined}} ({{round(($allDeclined/$count)*100, 2)}}% от общего числа)</strong></span>
                                <hr>

                                <span class="ml-xl-2 d-block"><strong>ВСЕГО: {{$count}}</strong></span>
                            </div>
                            <div class="col-xl-4">
                                <div class="md-form m-xl-0">
                                    <input class="form-control" type="text" placeholder="Быстрый поиск" aria-label="Search" id="fast-search-input">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="md-form m-xl-0">
                                    <input class="form-control" type="text" placeholder="Поиск в базе" aria-label="Search" id="search-input">
                                </div>
                            </div>
                            <div class="col-xl-2">
                                <div class="md-form m-xl-0 text-center">
                                    <button class="btn btn-danger rounded-0 btn-sm" id="find">Найти</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                    @endif
                    <!-- Nav tabs -->
                        <div class="row">
                            <div class="col-xl-2">
                                <ul class="nav list-group xl-pills pills-primary flex-column" role="tablist">
                                    <li class="nav-item waves-effect active waves-light d-flex align-content-center justify-content-xl-start">
                                        <a class="nav-link active waves-effect waves-light align-self-center mr-xl-auto w-100" data-toggle="tab" href="#registered" role="tab" data-table="registered">
                                            Зарегистрировавшиеся пользователи
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light d-flex align-content-center justify-content-xl-start">
                                        <a class="nav-link waves-effect waves-light align-self-center mr-xl-auto w-100" data-toggle="tab" href="#approved" role="tab" data-refresh data-table="approved">
                                            Промодерированные пользователи
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light d-flex align-content-center justify-content-xl-start">
                                        <a class="nav-link waves-effect waves-light align-self-center mr-xl-auto w-100" data-toggle="tab" href="#mistakes" role="tab" data-refresh data-table="mistakes">
                                            Пользователи с ошибками
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light d-flex align-content-center justify-content-xl-start">
                                        <a class="nav-link waves-effect waves-light align-self-center mr-xl-auto w-100" data-toggle="tab" href="#declined" role="tab" data-refresh data-table="declined">
                                            Отказанные пользователи
                                        </a>
                                    </li>
                                </ul>
                                <hr class="mt-4 mb-4">
                                <ul class="nav list-group xl-pills pills-primary flex-column">
                                    <li class="d-flex align-content-center justify-content-center">
                                        <button class="btn btn-sm btn-danger waves-effect waves-light align-self-center m-auto" data-toggle="modal" data-target="#registerModal">
                                            Зарегистрировать участника с IMEI вне базы
                                        </button>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xl-10" id="tabs">
                                @include('tables.tabs')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="checkModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
        <div class="modal-dialog modal-notify modal-primary modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <p class="heading lead">Проверка IMEI, даты и чека</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row m-0 p-0 d-flex justify-content-center align-content-center">
                        <div class="col-xl-6 p-0 text-center border-right border-light">
                            <p class="h6 text-uppercase font-weight-bold">Фото чека или гарантийного талона:</p>
                            <a href="" data-toggle="lightbox">
                                <img id="image" src="" alt="" class="img-fluid">
                            </a>
                        </div>
                        <div class="col-xl-6 p-0 text-center d-flex justify-content-center align-content-center border-left border-light">
                            <div class="row m-0 p-0">
                                <div class="col-xl-12">
                                    <p class="h6 font-weight-bold text-uppercase d-inline-block m-auto align-self-center">IMEI:</p>
                                    <h4 class="text-uppercase align-self-center m-auto" id="imei"></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id === 8)
                @else
                    <div class="modal-footer">
                        <div class="row m-0 p-0 w-100">
                            <div class="col-xl-6 m-0 p-0 text-left">
                                <a class="btn btn-danger text-white" id="sendSMS">Отправить код участника</a>
                            </div>
                            <div class="col-xl-6 m-0 p-0 text-right">
                                <a class="btn danger-color-dark text-white" id="edit">Редактировать</a>
                                <a class="btn danger-color-dark text-white" id="decline">Отказать</a>
                                <a class="btn btn-outline-danger waves-effect" data-dismiss="modal">Закрыть</a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade right" id="modalInfoRight" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog modal-full-height modal-right" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title w-100" id="myModalLabel">Результат поиска</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"></div>
            </div>
        </div>
    </div>
    <div class="modal fade right" id="modalDecline" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-notify modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title w-100 text-white" id="myModalLabel">Выбрать причину отказа</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-danger">Пожалуйста, выберите причину отказа для участия в рекламной игре:</p>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-11" name="reason" value="11">
                        <label class="form-check-label" for="reason-11">загружено фото не гарантийного талона/чека</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-2" name="reason" value="2">
                        <label class="form-check-label" for="reason-2">в гарантийном талоне отсутствует печать продавца</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-3" name="reason" value="3">
                        <label class="form-check-label" for="reason-3">в гарантийном талоне не указан IMEI</label>
                    </div>
                    {{--<div class="form-check">--}}
                        {{--<input type="radio" class="form-check-input" id="reason-4" name="reason" value="4">--}}
                        {{--<label class="form-check-label" for="reason-4">в гарантийном талоне не указана модель смартфона</label>--}}
                    {{--</div>--}}
                    {{--<div class="form-check">--}}
                        {{--<input type="radio" class="form-check-input" id="reason-5" name="reason" value="5">--}}
                        {{--<label class="form-check-label" for="reason-5">в гарантийном талоне не указано место продажи</label>--}}
                    {{--</div>--}}
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-6" name="reason" value="6">
                        <label class="form-check-label" for="reason-6">в гарантийном талоне не указана дата продажи</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-12" name="reason" value="12">
                        <label class="form-check-label" for="reason-12">гарантийный талон не заполнен</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-7" name="reason" value="7">
                        <label class="form-check-label" for="reason-7">фото чека / гарантийного талона нечеткое</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-8" name="reason" value="8">
                        <label class="form-check-label" for="reason-8">на фото чека не видно даты</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-9" name="reason" value="9">
                        <label class="form-check-label" for="reason-9">товар приобретен до 24.08.2018</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-10" name="reason" value="10">
                        <label class="form-check-label" for="reason-10">товар приобретен не у партнера</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="reason-1" name="reason" value="1" data-toggle="collapse" data-target="#reason-guarantee-collapse" aria-expanded="false" aria-controls="reason-guarantee-collapse">
                        <label class="form-check-label" for="reason-1">непредусмотренная ошибка</label>
                    </div>
                    <div class="row collapse" id="reason-guarantee-collapse">
                        <div class="col-xl-12">
                            <textarea class="form-control" name="reason-photo-guarantee" id="reason-photo-guarantee" cols="30" rows="3" placeholder="Введите конкретную причину отказа"></textarea>
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id === 8)
                @else
                    <div class="modal-footer justify-content-center">
                        <a class="btn btn-danger text-white" id="declineSMS">Отправить SMS</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
        <div class="modal-dialog modal-notify modal-primary modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <p class="heading lead">Редактировать</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-xl-3">
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="participantName">Имя зарегистрировавшегося</label>
                            <input type="text" id="participantName" name="participantName" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="participantEmail">E-mail</label>
                            <input type="text" id="participantEmail" name="participantEmail" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="participantAddress">Адрес</label>
                            <input type="text" id="participantAddress" name="participantAddress" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="participantPhone">Номер телефона</label>
                            <input type="text" id="participantPhone" name="participantPhone" class="form-control">
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id === 8)
                @else
                    <div class="modal-footer" style="justify-content: center!important;">
                        <a class="btn btn-danger text-white" id="saveParticipant">Сохранить данные</a>
                        <a class="btn btn-outline-danger waves-effect" data-dismiss="modal">Закрыть</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="editApprovedModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
        <div class="modal-dialog modal-notify modal-primary modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <p class="heading lead">Редактировать </p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mb-xl-3">
                        <div class="col-xl-10 mx-xl-auto mb-xl-5">
                            <label class="d-inline-block text-uppercase"><strong>Статус:</strong></label>
                            <label class="d-inline-block text-uppercase ml-4" data-status></label>
                        </div>
                        <div class="col-xl-10 p-0 mx-xl-auto mb-xl-5 text-center">
                            <img src="" alt="" class="img-fluid" id="approvedParticipantImage">
                        </div>
                        <div class="col-xl-10 p-0 mx-xl-auto mb-xl-5 text-center">
                            <button class="btn btn-sm btn-danger rounded-0" id="rotateApprovedParticipantImage90">Повернуть на 90&deg;</button>
                            <button class="btn btn-sm btn-danger rounded-0" id="rotateApprovedParticipantImage180">Повернуть на 180&deg;</button>
                            <button class="btn btn-sm btn-danger rounded-0" id="rotateApprovedParticipantImage270">Повернуть на 270&deg;</button>
                            <button class="btn btn-sm btn-danger rounded-0" id="rotateApprovedParticipantImage360">Сбросить&deg;</button>
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="approvedParticipantName">Имя промодерированного</label>
                            <input type="text" id="approvedParticipantName" name="approvedParticipantName" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="approvedParticipantEmail">E-mail</label>
                            <input type="text" id="approvedParticipantEmail" name="approvedParticipantEmail" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="approvedParticipantAddress">Адрес</label>
                            <input type="text" id="approvedParticipantAddress" name="approvedParticipantAddress" class="form-control">
                        </div>
                        <div class="col-xl-10 mx-xl-auto">
                            <label for="approvedParticipantPhone">Номер телефона</label>
                            <input type="text" id="approvedParticipantPhone" name="approvedParticipantPhone" class="form-control">
                        </div>
                    </div>
                </div>
                @if(Auth::user()->id === 8)
                @else
                    <div class="modal-footer" style="justify-content: center!important;">
                        <a class="btn btn-danger text-white" id="saveApprovedParticipant">Сохранить данные</a>
                        <a class="btn btn-outline-danger waves-effect" data-dismiss="modal">Закрыть</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if(Auth::user()->id === 8)
    @else
        <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-id="">
            <div class="modal-dialog modal-notify modal-primary modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger">
                        <p class="heading lead">Одобрить пользователя</p>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="white-text">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row m-0 p-0">
                            <div class="col-xl-12 col-xl-12">
                                <div class="row">
                                    <div class="col-11 col-sm-11 col-xl-11 mx-auto m-0 pt-xl-0 pl-xl-5 pr-xl-0 pb-xl-0" id="registration-container">
                                        <div class="row m-0 p-0">
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <input type="text" id="registering-name" class="form-control">
                                                    <label for="name">Фамилия, имя, отчество регистрируемого</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <input type="email" id="registering-email" class="form-control">
                                                    <label for="email">E-mail регистрируемого</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <input type="text" id="registering-address" class="form-control">
                                                    <label for="address">Почтовый адрес регистрируемого</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <input type="text" id="registering-phone" class="form-control">
                                                    <label for="phone">Номер телефона регистрируемого</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <input type="text" id="registering-imei" class="form-control">
                                                    <label for="imei">IMEI регистрируемого</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-xl-10 mx-auto p-0 p-sm-0 p-xl-1 mt-2 mt-sm-2 mt-xl-0">
                                                <div class="md-form">
                                                    <div class="file-field">
                                                        <div class="btn btn-danger rounded-0 btn-sm float-left">
                                                            <span>Добавить</span>
                                                            <input type="file" id="photo" name="photo" required>
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input id="photoFilename" class="file-path" type="text" placeholder="Добавить фото чека или гарантийного талона" disabled>
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
                    <div class="modal-footer" style="justify-content: center!important;">
                        <button type="button" data-register class="btn danger-color-dark rounded-0 ml-xl-3 my-xl-4">Зарегистрировать</button>
                        <a class="btn btn-outline-danger waves-effect" data-dismiss="modal">Закрыть</a>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

