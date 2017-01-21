$(document).ready(function() {
    var url = $('.url-token').data('route');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $(".url-token").attr('idtoken')
        }
    });

    $(document).on("click", "#blockButton", function() {
        // alert("sdf");
        var arr = [];
        $.each($('input[name="checkbox-user-block"]:checked'), function() {
          var value = $(this).val()
          arr.push(value)

        });
        alert(arr); 
        $.post(
            url + '/user-block',
            {
                "value": arr,
            },
            function(response) {    
                $(".content").html(response.html);
        });
    });

    $(document).on("click", "#activeButton", function() {

        var arr = [];
        $.each($('input[name="checkbox-user-active"]:checked'), function() {
          var value = $(this).val()
          arr.push(value)

        });

        $.post(
            url + '/user-active',
            {
                "value": arr,
            },
            function(response) {    
                $(".content").html(response.html);
        });
    });
});
//# sourceMappingURL=user.js.map
