$(document).ready(function() {
    var error = $('.data').attr('data-error');
    var notice = $('.data').attr('data-confirm');
    var link = $('.data').attr('data-link');
    var email_confirm = $('.data').attr('data-email-invalid');


    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(document).on('click', '.send-mail', function() {
        var idSurvey = $(this).attr('data-id-survey');
        $('.bt-send').attr('data-id', idSurvey);
        $('.tiles, .render, #menu').fadeOut();
        $('.popupBackground').fadeIn();
    });

    $(document).on('click', '.close', function() {
        $('.tiles, .render, #menu').fadeIn();
        $('.popupBackground').fadeOut();
    });

    $(document).on('click', '.remove-survey', function() {
        var result = confirm(notice);

        if (result) {
            var key = $(this).attr('data-key');
            var url = $(this).attr('url');
            var idSurvey = $(this).attr('id-survey');
            $.post(
                url,
                {
                    'idSurvey': idSurvey,
                },
                function(response) {

                    if (response.success) {
                        $('.style' + key).remove();
                    } else {
                        alert(error);
                    }
            });
        }
    });

    $(document).on('click', '.bt-send', function() {
        var url = $(this).attr('data-url');
        var redirect = $(this).attr('data-redirect');
        var emails = $('.form-emails').tagsinput('items');
        var idSurvey =$(this).attr('data-id');
        var flag = true;

        emails.forEach(function (email) {

            if (!validateEmail(email)) {
                flag = false;
            }
        });

        if (flag) {
            $.post(
                url,
                {
                    'emails' : emails,
                    'surveyId' : idSurvey,
                },
                function(response) {

                    if (response.success) {
                        window.location.href = redirect;
                    }else{
                        alert(error);
                    }
            });
        } else {
            alert(email_confirm);
        }
    });

    $(document).on('click', '.mark-survey', function() {
        var url = $(this).attr('data-url');
        var idSurvey = $(this).siblings('.send-mail').attr('data-id-survey');
        var value = $(this).children('.bt-like').attr('data-value');

        if (value == 1) {
            var classA = 'glyphicon-star-empty';
            var classB = 'glyphicon-star';
            var data = 0;
        } else {
            var classA = 'glyphicon-star';
            var classB = 'glyphicon-star-empty';
            var data = 1;
        }

        $(this).children('.bt-like').removeClass(classA).addClass(classB).attr('data-value', data);
        $.post(
            url,
            {
                'idSurvey': idSurvey,
                'value': value,
            },
            function(response) {

                if (response.success) {

                } else {
                    alert(error);
                }
        });
    });

    $(document).on('click', '.view-result', function() {
        window.location.href = $(this).attr('data-url');
    });

    $('input.typeahead').typeahead({
        source:  function (query, process) {

        return $.get(
            link,
            {
                "query": query
            }, function (data) {

                return process(data);
            });
        }
    });

    $('.alert-message').delay(3000).slideUp(300);
});
