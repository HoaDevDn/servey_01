$(document).ready(function() {
    var url = $('.url-token').data('route');
    var error = $('.url-token').attr('ms-error');

    $(document).on('click', ".add-radio", function() {
        var number = parseInt($(this).attr('id-as'));
        var type = $(this).attr("typeId");
        var num_as = (parseInt($(".question" + number).attr('temp-qs')) + 1);
        $.post(
            url + '/survey/radio-answer',
            {
                "number": number,
                "num_as": num_as,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".temp-other" + number +":first").before(response.data);
                    $(".question" + number).attr("temp-qs", num_as);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", ".add-radio-other",  function() {
        var number = parseInt($(this).parent().find(".add-radio").attr('id-as'));
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/other-radio',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".temp-other" + number + ":first").before(response.data);
                } else {
                    alert(error);
                }
        });
        $(this).hide();
    });

    $(document).on("click", ".add-checkbox", function() {
        var number = parseInt($(this).attr('id-as'));
        var type = $(this).attr("typeId");
        var num_as = (parseInt($(".question" + number).attr('temp-qs')) + 1);
        $.post(
            url + '/survey/checkbox-answer',
            {
                "number": number,
                "num_as": num_as,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".temp-other" + number +":first").before(response.data);
                    $(".question" + number).attr("temp-qs", num_as);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", ".add-checkbox-other", function() {
        var number = parseInt($(this).parent().find(".add-checkbox").attr('id-as'));
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/other-checkbox',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".temp-other" + number + ":first").before(response.data);
                } else {
                    alert(error);
                }
        });
        $(this).hide();
    });

    $(document).on("click", "#radio-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/radio-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".hide").before(response.data);
                    $(".url-token").attr("data-number", number);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", "#checkbox-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/checkbox-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".hide").before(response.data);
                    $(".url-token").attr("data-number", number);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", "#short-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/short-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".hide").before(response.data);
                    $(".url-token").attr("data-number", number);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", "#long-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/survey/long-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {

                if (response.success) {
                    $(".hide").before(response.data);
                    $(".url-token").attr("data-number", number);
                } else {
                    alert(error);
                }
        });
    });

    $(document).on("click", ".glyphicon-trash", function() {
        var idQuestion = $(this).attr("id-question");
        $(".question" + idQuestion).remove();
    });

    $(document).on("click", ".glyphicon-remove", function() {
        var idAnwser = $(this).attr("id-as");
        $(".clear-as" + idAnwser).remove();
        $(".qs-as" + idAnwser).remove();
    });

    $(document).on("click", ".remove-other", function() {
        var idAnwser = $(this).attr("id-qs");
        $(".temp-other" + idAnwser + ":last").remove();
        $(".answer-other" + idAnwser).remove();
        $(".other" + idAnwser).show();
    });

    $(document).on("click", ".delete-survey", function() {
        var idSurvey = $(this).attr("id-survey");
        $.post(
            url + '/survey/delete-survey',
            {
                "idSurvey":  + idSurvey,
            },
            function(response) {

                if (response.success) {
                    $(".row-tr" + idSurvey).remove();
                } else {
                    alert(error);
                }
        });
    });
});
