<div class="tab-content vertical">
    <div class="tab-pane fade in show active" id="registered" role="tabpanel">
        <div class="row m-0 p-0">
            <div class="col-xl-12 col-xl-12">
                <table class="table table-hover" id="registered-table">
                    <thead>
                    <tr>
                        <th>Фамилия, имя, отчество</th>
                        <th>E-mail</th>
                        <th>Адрес</th>
                        <th>Номер телефона</th>
                        <th>IMEI</th>
                        <th>Дата регистрации</th>
                    </tr>
                    </thead>
                    <tbody id="registered-table-body">
                    @include('tables.registered')
                    </tbody>
                </table>

            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="approved" role="tabpanel">
        <div class="row m-0 p-0">
            <div class="col-xl-12 col-xl-12">
                <table class="table table-hover" id="approved-table">
                    <thead>
                    <tr>
                        <th>Фамилия, имя, отчество</th>
                        <th>E-mail</th>
                        <th>Адрес</th>
                        <th>Номер телефона</th>
                        <th>IMEI</th>
                        <th>Игровой номер</th>
                        <th>Дата модерации</th>
                        <th>Модератор</th>
                        <th>Проверить статус отправки</th>

                    </tr>
                    </thead>
                    <tbody id="approved-table-body">
                    @include('tables.approved')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="mistakes" role="tabpanel">
        <div class="row m-0 p-0">
            <div class="col-xl-12 col-xl-12">
                <table class="table table-hover" id="mistakes-table">
                    <thead>
                    <tr>
                        <th>Фамилия, имя, отчество</th>
                        <th>E-mail</th>
                        <th>Адрес</th>
                        <th>Номер телефона</th>
                        <th>IMEI 1</th>
                        <th>IMEI 2</th>
                        <th>Дата регистрации</th>
                        <th>Ошибка</th>
                        <th>Модератор</th>
                    </tr>
                    </thead>
                    <tbody id="mistakes-table-body">
                    @include('tables.mistakes')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="declined" role="tabpanel">
        <div class="row m-0 p-0">
            <div class="col-xl-12 col-xl-12">
                <table class="table table-hover" id="declined-table">
                    <thead>
                    <tr>
                        <th>Фамилия, имя, отчество</th>
                        <th>E-mail</th>
                        <th>Адрес</th>
                        <th>Номер телефона</th>
                        <th>IMEI</th>
                        <th>Дата регистрации</th>
                        <th>Модератор</th>
                    </tr>
                    </thead>
                    <tbody id="declined-table-body">
                    @include('tables.declined')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>