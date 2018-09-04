$().ready(function () {


    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
        event.preventDefault();
        $(this).ekkoLightbox();
    });


    $('#reason-guarantee-collapse').on('show.bs.collapse', function () {
        $('#reason-check-collapse').collapse('hide');
    });

    $('#reason-check-collapse').on('show.bs.collapse', function () {
        $('#reason-guarantee-collapse').collapse('hide');
    });

    let fd = new FormData(),
        id = null,
        check = null,
        modal = $('#checkModal'),
        info = $('#modalInfoRight'),
        decline = $('#modalDecline'),
        edit = $('#editModal'),
        uri = window.location.toString(),
        fastSearch = $('#fast-search-input'),
        baseSearch = $('#search-input'),
        body = $('body'),
        radio = $('input[type="radio"]'),
        reason = null,
        registration = {
            'container': $('#registration-container'),
            'modal': $('#registerModal'),
            'name': $('#registering-name'),
            'email': $('#registering-email'),
            'address': $('#registering-address'),
            'phone': $('#registering-phone'),
            'imei': $('#registering-imei'),
            'photo': $('#photo'),
            'filename': $('#photoFilename')
        },
        editing = {
            'name': $('#participantName'),
            'address': $('#participantAddress'),
            'phone': $('#participantPhone'),
            'email': $('#participantEmail'),
            'save': $('#saveParticipant')
        },
        table = 'registered';

    if (uri.indexOf("?") > 0) {
        let clear = uri.substring(0, uri.indexOf("?"));
        window.history.replaceState({}, document.title, clear);
    }

    $('[data-toggle="tab"]').each(function () {
       $(this).on('click', function (e) {
           e.preventDefault();
           table = $(this).data('table');
       })
    });

    function refresh(link, table) {
        $.ajax({
            url: link
        }).done(function (data) {
            $(table).html(data);
        }).fail(function () {
            alert('Невозможно отобразить');
        });
    }

    function paginate(selector){
        body.on('click', '.pagination a.page-link:not(.not-active)', function (e) {
            e.preventDefault();
            let url = $(this).attr('href');
            $.ajax({
                url: url,
                data:{id: table}
            }).done(function (data) {
                $(selector).html(data);
            }).fail(function () {
                alert('Невозможно отобразить');
            });
            window.history.pushState({}, document.title, window.location.pathname);
        });
    }

    function clearPag(selector) {
        body.on('click', '[data-toggle="tab"]', function (e) {
            e.preventDefault();
            $.ajax({
                url: '/home',
                data:{id: table}
            }).done(function (data) {
                $(selector).html(data);
            }).fail(function () {
                alert('Невозможно отобразить');
            });
            window.history.pushState({}, document.title, window.location.pathname);
        });
    }

    function search(table, input){
        let value = input.val().toLowerCase(),
            needle = $(table).find('tr');
        needle.filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    }
    paginate('#registered-table-body');
    clearPag('#registered-table-body');
    paginate('#approved-table-body');
    clearPag('#approved-table-body');
    paginate('#declined-table-body');
    clearPag('#declined-table-body');
    paginate('#mistakes-table-body');
    clearPag('#mistakes-table-body');

    fastSearch.on('keyup', function () {
        search('#registered-table', $(this));
    });

    fastSearch.on('keyup', function () {
        search('#approved-table', $(this));
    });

    fastSearch.on('keyup', function () {
        search('#declined-table', $(this));
    });

    fastSearch.on('keyup', function () {
        search('#mistakes-table', $(this));
    });

    body.on('click','[data-show]', function () {
        id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            modal.modal('show');
            modal.find('#imei').text(response.imei);
            modal.find('#image').attr('src','images/' + response.src);
            modal.find('[data-toggle="lightbox"]').attr('href', 'images/' + response.src);
        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });

    body.on('click','[data-approved]', function () {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/approved/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            modal.modal('show');
            modal.find('#imei').text(response.imei);
            modal.find('#image').attr('src', response.src);
            modal.find('[data-toggle="lightbox"]').attr('href', response.src);
        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });


    body.on('click','[data-declined]', function () {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/declined/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            modal.modal('show');
            modal.find('#imei').text(response.imei);
            modal.find('#image').attr('src', response.src);
            modal.find('[data-toggle="lightbox"]').attr('href', response.src);
        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });

    body.on('click','[data-mistakes]', function () {
        let id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/mistakes/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            modal.modal('show');
            modal.find('#imei').text(response.imei);
            modal.find('#image').attr('src', response.src);
            modal.find('[data-toggle="lightbox"]').attr('href', response.src);
        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });



    $('#sendSMS').on('click', function () {
        fd.append('id', id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/send-sms',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                if(response.success)
                {
                    modal.modal('hide');
                    refresh('/home','#tabs');
                    toastr.success(response.success)
                }
                if(response.error)
                {
                    toastr.error(response.error)
                }
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    $('#find').on('click', function () {
        let query = baseSearch.val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/find/' + query,
            data:{needle: query},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            info.modal('show');
            baseSearch.val('');
            if(response.results.length > 0) {
                if(response.results.length === 1) {
                    info.find('.modal-body').append('<p class="text-danger">Найден&nbsp;' + response.results.length + '&nbsp; результат</p>' );
                }
                if(response.results.length >= 2 && response.results.length <= 4) {
                    info.find('.modal-body').append('<p class="text-danger">Найдено&nbsp;' + response.results.length + '&nbsp; результата</p>' );
                }
                if(response.results.length > 4) {
                    info.find('.modal-body').append('<p class="text-danger">Найдено&nbsp;' + response.results.length + '&nbsp; результатов</p>');
                }
                for(let i = 0; i < response.results.length; i++) {
                    info.find('.modal-body').append('<p><span>' + (i+1) + '.&nbsp;</span>' + response.results[i].name + '&nbsp;' + response.results[i].phone + '&nbsp;' + response.results[i].number + '</p>' );
                }
            } else {
                info.find('.modal-body').append('<p class="text-danger">Поиск не дал результатов</p>' );
            }

        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });

    info.on('hidden.bs.modal', function () {
        $(this).find('.modal-body').html('');
    });

    $('#decline').on('click', function () {
        decline.modal('show');
        modal.modal('hide');
    });

    radio.each(function () {
        $(this).on('change', function () {
            reason = $(this).val();
        })
    });

    $('#declineSMS').on('click', function () {
        fd.append('id', id);
        fd.append('reason', reason);
        if(reason === '1') {
            fd.append('custom_reason', $('#reason-photo-guarantee').val());
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/decline-sms',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                if(response.success) {
                    decline.modal('hide');
                    refresh('/home','#tabs');
                    toastr.success(response.success);
                }
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    body.on('click', '[data-check]', function () {
        let id = $(this).data('check');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/check/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            toastr.info(response.status);
        }).fail(function () {
            alert('Невозможно отобразить');
        });
    });

    registration.photo.on('change', function () {
        fd.append('photo', $(this).prop('files')[0]);
        registration.filename.val( $(this).prop('files')[0].name);
    });

    body.on('click','[data-register]', function () {
        fd.append('name', registration.name.val());
        fd.append('email', registration.email.val());
        fd.append('address', registration.address.val());
        fd.append('phone', registration.phone.val());
        fd.append('imei', registration.imei.val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/add-participant',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                if(response.success)
                {
                    toastr.success(response.success);
                    registration.container.find('input').each(function () {
                        $(this).val('');
                    });
                    registration.modal.modal('hide');
                }
                if(response.error)
                {
                    toastr.error(response.error)
                }
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            }
        });
    });

    $('#edit').on('click', function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/edit/' + id,
            data:{id: id},
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
        }).done(function (response) {
            edit.modal('show');
            modal.modal('hide');
            editing.name.val(response.participant.name);
            editing.phone.val(response.participant.phone);
            editing.address.val(response.participant.address);
            editing.email.val(response.participant.email);

        }).fail(function () {
            toastr.alert('Невозможно отобразить');
        });
    });

    editing.save.on('click', function () {
        fd.append('id', id);
        fd.append('name', editing.name.val());
        fd.append('email', editing.email.val());
        fd.append('address', editing.address.val());
        fd.append('phone', editing.phone.val());

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/home/save-participant',
            type: 'POST',
            data: fd,
            cache: false,
            contentType: false,
            processData: false,
            dataType: 'JSON',
            success: function (response) {
                if(response.success)
                {
                    toastr.success(response.success);
                    edit.modal('hide');

                }
                if(response.error)
                {
                    toastr.error(response.error)
                }
            },
            error: function(error) {
                for(let err in error.responseJSON.errors ) {
                    toastr.error(error.responseJSON.errors[err][0]);
                }
            },
            complete: function() {
                refresh('/home','#tabs');
            }
        });
    });

    registration.modal.on('hidden.bs.modal', function () {
        registration.container.find('input').each(function () {
            $(this).val('');
        });
    });

});