$(document).ready(function() {
    var error = $('.data').attr('data-error');
    var notice = $('.data').attr('data-confirm');

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"] + (\.[^<>()[\]\\.,;:\s@\"] + )*)|(\". + \"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9] + \.)+[a-zA-Z]{2,}))$/;

        return re.test(email);
    }

    // $(document).on('click', '.send-bt', function() {
    //     var url = $(this).attr('url');
    //     $.post(
    //         url,
    //         function(response) {

    //             if (response.success) {
    //                 $('.temp-popup').html(response.data);
    //             } else {
    //                 alert(error);
    //             }
    //     });
    // });

    // $(document).on('click', '.close', function() {
    //     $('.popupBackground').remove();
    // });

    $(document).on('click', '.send-mail', function() {
        $('.popupBackground').css('display','block');
    });

    $(document).on('click', '.close', function() {
        $('.popupBackground').css('display','none');
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
                    alert(response);
                    if (response.success) {
                        $('.style' + key).remove();
                    } else {
                        alert(error);
                    }
            });
        }
    });

    $(document).on('click', '.bt-send', function() {
        var emails = $('.form-emails').tagsinput('items');
        var flag = true;
        emails.forEach(function (email) {

            if (!validateEmail(email)) {
                flag = false;
                alert("sai roi");
            }
        });

        if (flag) {
            var idSurvey = 6;
            $.post(
                "http://localhost:8000/123",
                {
                    'emails' : emails,
                    'surveyId' : idSurvey,
                },
                function(response) {
                    if (response.success) {
                        window.location.href = 'https://google.com';
                    }
            });
        }
    });
});
