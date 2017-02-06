$(document).ready(function () {

    function validateEmail(email) {
        var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    $(document).on("click", ".bt-send", function() {
        var emails = $(".form-emails").tagsinput('items');
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
