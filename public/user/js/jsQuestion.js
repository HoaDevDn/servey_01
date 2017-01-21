$(document).ready(function() {
    var url = $('.url-token').data('route');

    $(document).on('click', ".add-radio", function() {
        var number = parseInt($(this).attr('id-as'));
        var type = $(this).attr("typeId");
        var num_as = (parseInt($(".question" + number).attr('temp-qs')) + 1);
        $.post(
            url + '/radio-answer',
            {
                "number": number,
                "num_as": num_as,
                "type": type,
            },
            function(response) {
                $(".temp-other" + number +":first").before(response);
                $(".question" + number).attr("temp-qs", num_as);
        });
    });

    $(document).on("click", ".add-radio-other",  function() {
        var number = parseInt($(this).parent().find(".add-radio").attr('id-as'));
        var type = $(this).attr("typeId");
        $.post(
            url + '/other-radio',
            {
                "number": number,
                "type": type,
            },
            function(response) {
                $(".temp-other" + number + ":first").before(response);
        });
        $(this).hide();
    });

    $(document).on("click", ".add-checkbox", function() {
        var number = parseInt($(this).attr('id-as'));
        var type = $(this).attr("typeId");
        var num_as = (parseInt($(".question" + number).attr('temp-qs')) + 1);
        $.post(
            url + '/checkbox-answer',
            {
                "number": number,
                "num_as": num_as,
                "type": type,
            },
            function(response) {
                $(".temp-other" + number +":first").before(response);
                $(".question" + number).attr("temp-qs", num_as);
        });
    });

    $(document).on("click", ".add-checkbox-other", function() {
        var number = parseInt($(this).parent().find(".add-checkbox").attr('id-as'));
        var type = $(this).attr("typeId");
        $.post(
            url + '/other-checkbox',
            {
                "number": number,
                "type": type,
            },
            function(response) {
                $(".temp-other" + number + ":first").before(response);
        });
        $(this).hide();
    });

    $(document).on("click", "#radio-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/radio-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {
                $(".hide").before(response);
                $(".url-token").attr("data-number", number);
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
                $(".hide").before(response);
                $(".url-token").attr("data-number", number);
        });
    });

    $(document).on("click", "#short-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/short-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {
                $(".hide").before(response);
                $(".url-token").attr("data-number", number);
        });
    });

    $(document).on("click", "#long-button", function() {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $(this).attr("typeId");
        $.post(
            url + '/long-question',
            {
                "number": number,
                "type": type,
            },
            function(response) {
                $(".hide").before(response);
                $(".url-token").attr("data-number", number);
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
            url + '/delete-survey',
            {
                "idSurvey":  + idSurvey,
            },
            function(response) {
                $(".row-tb" + idSurvey).remove();
        });
    });
});

//# sourceMappingURL=jsQuestion.js.map
