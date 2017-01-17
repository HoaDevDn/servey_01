$(document).ready(function() {
    var url = $('.url-token').data('route');
    var error = $('.url-token').attr('ms-error');

    function addAnwser($this) {
        var url = $this.attr('url');
        var number = parseInt($($this).attr('id-as'));
        var type = $this.attr("typeId");
        var num_as = (parseInt($(".question" + number).attr('temp-qs')) + 1);
        $.post(
            url,
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
    }

    function addOtherButton($this, class_temp) {
        var number = parseInt($this.parent().find(class_temp).attr('id-as'));
        var type = $this.attr("typeId");
        var url = $this.attr('url');
        $.post(
            url,
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
        $this.hide();
    }

    function addQuestion($this) {
        var number = parseInt($('.url-token').attr("data-number")) + 1;
        var type = $this.attr("typeId");
        var url = $this.attr('url');
        $.post(
            url,
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
    }

    $(document).on('click', ".add-radio", function() {
        addAnwser($(this));
    });

    $(document).on("click", ".add-checkbox", function() {
        addAnwser($(this));
    });

    $(document).on("click", ".add-radio-other",  function() {
        var class_temp = ".add-radio";
        addOtherButton($(this), class_temp);
    });

    $(document).on("click", ".add-checkbox-other", function() {
        var class_temp = ".add-checkbox";
        addOtherButton($(this), class_temp);
    });

    $(document).on("click", "#radio-button", function() {
        addQuestion($(this));
    });

    $(document).on("click", "#checkbox-button", function() {
        addQuestion($(this));
    });

    $(document).on("click", "#short-button", function() {
        addQuestion($(this));
    });

    $(document).on("click", "#long-button", function() {
        addQuestion($(this));
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
