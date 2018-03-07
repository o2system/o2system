
// Rizal (Library)
(function(j){
    j.fn.extend({
        toAjaxForm: function (beforeSubmit, postPath, submitButton, successPath) {
            var _this = this;
            this.defaultInput = ['input','textarea','checkbox', 'select'];
            this.button = $(submitButton);
            this.fd = new FormData();
            this.postPath = postPath;
            this.successPath = successPath;
            this.callSubmit = beforeSubmit;

            this.button.on('click', function (e) {
                for (i in _this.defaultInput) {
                    $(_this).find(_this.defaultInput[i]).each(function (a,b) {
                        var e = $(b);

                        switch (e.attr('type')) {
                            case 'checkbox':
                                if (e.attr('name') !== undefined) {
                                    _this.fd.set(e.attr('name'), e.prop('checked') ? 1 : 0);
                                }
                                break;
                            case 'file':
                                if (e[0].files.length > 0) {
                                    _this.fd.set(e.attr('name'), e[0].files[0], 'feature.jpg');
                                }
                                break;
                            case 'radio':
                                _this.fd.set(e.attr('name'),_this.find('input[name="'+e.attr('name')+'"]:checked').val());
                                break;
                            default:
                                if (e.attr('name') !== undefined) {
                                    _this.fd.set(e.attr('name'), e.val());
                                }
                                break;
                        }
                    });
                }

                _this.beforeSubmit();

                return false;
            });

            return this;
        },
        beforeSubmit: function () {
            var _this = this;

            _this.callSubmit(_this.fd);

            $.ajax(_this.postPath, {method: 'POST', data: _this.fd, processData: false, contentType: false}).success(function () {
                window.location.href = window.location.protocol+'//'+window.location.host + _this.successPath;
            });
        }
    });
})($);

$(document).ready(function () {
    if (window.location.href.match(/\/posts\/form\/*$/)) {
        $('main').toAjaxForm(function(a) {
            a.set('content', tinyMCE.get('content').getContent())
        }, 'create', $('.btn-primary'), '/posts');
    }

    if (window.location.href.match(/\/posts\/form\/(\d+)$/)) {
        var m = window.location.href.match(/\/form\/(\d+)$/);

        $('main').toAjaxForm(function(a) {
            a.set('content', tinyMCE.get('content').getContent());
            a.set('id', m.length === 2 ? m[1] : '');
        }, '/posts/update/', $('.btn-primary'), '/posts');
    }

    if (window.location.href.match(/\/pages\/form\/*$/)) {
        $('main').toAjaxForm(function (e) {
            e.set('content', tinyMCE.get('content').getContent())
        }, 'create', $('.btn-primary'), '/pages');
    }

    if (window.location.href.match(/\/pages\/form\/(\d+)$/)) {
        var m = window.location.href.match(/\/pages\/form\/(\d+)$/);

        $('main').toAjaxForm(function (e) {
            e.set('content', tinyMCE.get('content').getContent());
            e.set('id', m.length === 2 ? m[1] : '')
        }, '/pages/update', $('.btn-primary'), '/pages');
    }

    $('.account-cover').on('click', function () {
        $('#change-cover').modal('show');
    });

    $('.account-cover-avatar').find('img').on('click', function (e) {
        e.stopPropagation();
        $('#change-logo').modal('show');
    });

    $('#change-cover').on('shown.bs.modal', function () {
        var t = false;
        var m = $('#change-cover');
        var mim = m.find('img');

        if (!t) {
            var cropper = new Cropper(mim[0]);

            m.find('[data-action="upload-avatar"]').on('click', function () {
                m.find('#avatar-canvas').html(cropper.getCroppedCanvas({width: 350, height: 350}));
                cropper.disable();

                cropper.getCroppedCanvas().toBlob(function (blob) {
                    var fd = new FormData();

                    fd.append('cover', blob, 'cover.jpg');

                    $.ajax(window.location.href+'/update', {contentType: 'image/jpeg',method: 'POST', data: fd, contentType: false,processData: false}).success(function () {
                       // window.location.reload(true);
                    });
                }, 'image/jpeg', 1);
            });

            m.find('#input-avatar').change(function () {
                var f = new FileReader();
                var fi = this;

                f.onload = function (e) {
                    mim.attr('src', e.target.result);
                    mim.removeClass('hidden');
                    cropper.replace(e.target.result);
                    cropper.enable();
                };

                f.readAsDataURL(fi.files[0]);
            });

            t = true;
        }
    });

    $('#change-logo').on('shown.bs.modal', function () {
        var t = false;
        var m = $('#change-logo');
        var img = $('.account-cover-avatar').find('img');
        var mim = m.find('img');

        if (!t) {
            var cropper = new Cropper(mim[0]);

            m.find('[data-action="upload-avatar"]').on('click', function () {
                m.find('#avatar-canvas').html(cropper.getCroppedCanvas({width: 350, height: 350}));
                cropper.disable();

                cropper.getCroppedCanvas().toBlob(function (blob) {
                    var fd = new FormData();

                    fd.append('avatar', blob, 'avatar.jpg');

                    $.ajax(window.location.href+'/update', {contentType: 'image/jpeg',method: 'POST', data: fd, contentType: false,processData: false}).success(function () {
                         // window.location.reload(true);
                    });
                }, 'image/jpeg', 1);
            });

            m.find('#input-avatar').change(function () {
                var f = new FileReader();
                var fi = this;

                f.onload = function (e) {
                    mim.attr('src', e.target.result);
                    mim.removeClass('hidden');
                    cropper.replace(e.target.result);
                    cropper.enable();
                };

                f.readAsDataURL(fi.files[0]);
            });

            t = true;
        }
    });

    $('div .account-page .card table tbody tr td').on('click', function (e) {
        var me = this;
        var tableHead = $(me).parents('table').find('thead').find('tr').find('th');
        var trElem = $(me).parents('tr');
        var cardHeader = $(trElem).parents('div.table-responsive').prev().html();

        if (cardHeader === 'Profile') {
            var haveTh = $(me).prev('th').length > 0;

            if ($(this).attr('edited') === undefined && haveTh === false) {
                var name = $($(tableHead)[$(this).index()]).html();
                var inputTemplate = '<input type="text"/>';
                var inputValue = $(this).html();
                var titleHeader = $(tableHead).parents('.card').find('.card-header').html();

                inputTemplate = $(inputTemplate).attr('name', titleHeader.toString().toLowerCase()+'-'+name.replace(' ', '-').toString().toLowerCase());
                inputTemplate = $(inputTemplate).attr('value', inputValue);

                inputTemplate.keypress(function (e) {
                    if (e.charCode === 13) {
                        var meInput = this;
                        var config = {};

                        config[$(this).attr('name')] = $(this).val();

                        $.ajax(window.location.href+'/update', { method: 'POST', data: config}).success(function () {
                            $(me).html($(meInput).val());
                            $(me).removeAttr('edited');
                        });
                    }
                });

                $(me).attr('edited', 1);
                $(me).html(inputTemplate);
            } else {
                if ($(me).attr('edited') === undefined) {
                    var name = $(me).prev('th').html().toLowerCase().replace(' ', '-');
                    var inputTemplate = '<input type="text"/>';
                    var inputValue = $(this).html();

                    inputTemplate = $(inputTemplate).attr('name', cardHeader.toString().toLowerCase()+'-'+name);
                    inputTemplate = $(inputTemplate).attr('value', inputValue);

                    inputTemplate.keypress(function (e) {
                        if (e.charCode === 13) {
                            var meInput = this;
                            var config = {};

                            config[$(this).attr('name')] = $(this).val();

                            $.ajax(window.location.href+'/update', { method: 'POST', data: config}).success(function () {
                                $(me).html($(meInput).val());
                                $(me).removeAttr('edited');
                            });
                        }
                    });

                    $(me).attr('edited', 1);
                    $(me).html(inputTemplate);
                }
            }
        } else if (cardHeader === 'Biodata') {
            if ($(me).attr('edited') === undefined) {
                var inputType = $(me).prev().html().toLowerCase();
                var data = [];
                var spanBackup = $(this).html();

                switch (inputType) {
                    case 'gender':
                        data = ['MALE', 'FEMALE', 'UNDEFINED'];
                        break;
                    case 'religion':
                        data = ['HINDU', 'BUDDHA', 'MOSLEM', 'CHRISTIAN', 'CATHOLIC'];
                        break;
                    case 'marital status':
                        data = ['SINGLE', 'MARRIED', 'DIVORCED'];
                        break;
                    case 'birthday':
                        break;
                    default:
                        break;
                }

                if (data.length > 0) {
                    var selectTemplate = '<select></select>';
                    selectTemplate = $(selectTemplate).attr('name', cardHeader.toLowerCase() + '-' + inputType);

                    for (n in data) {
                        var optionTemplate = $('<option></option>');
                        optionTemplate.attr('value', data[n]);
                        optionTemplate.html(data[n]);

                        if (optionTemplate.attr('value') === $(spanBackup).html()) {
                            optionTemplate.attr('selected', 1);
                        }

                        selectTemplate.append(optionTemplate);
                    }

                    selectTemplate.change(function (e) {
                        var selectMe = this;
                        var config = {};
                        config[$(selectMe).attr('name')] = $(selectMe).val();

                        $.ajax(window.location.href+'/update', {method: 'POST', data: config}).success(function () {
                            spanBackup = $(spanBackup).html($(selectMe).val());

                            $(me).removeAttr('edited');
                            $(me).html(spanBackup);
                        });
                    });

                    selectTemplate.attr('value', $(spanBackup).html());

                    $(me).html(selectTemplate);
                    $(me).attr('edited', 1);
                }
            }
        }
    });
});