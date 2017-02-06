$(document).ready(function() {
    var error = $('.data').attr('data-error');
    var notice = $('.data').attr('data-confirm');
    var link = $('.data').attr('data-link');
    var email_confirm = $('.data').attr('data-email-invalid');

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1853033838292892";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    $("#sortable" ).sortable({

        start: function(event, ui) {
            console.log('start: ' + ui.item.index());
            index = ui.item.index();
        },
        update: function(event, ui) {
            console.log('update: '+ ui.item.index());
            $('.stt' +  index).innerHTML = ui.item.index();
        }
    });
    $( "#sortable" ).disableSelection();

    $('div').sort(function (a, b) {

      var contentA =parseInt( $(a).attr('div-data-sort'));
      var contentB =parseInt( $(b).attr('div-data-sort'));
      return (contentA < contentB) ? -1 : (contentA > contentB) ? 1 : 0;
   })

    $(document).on('click', '.qtyplus', function() {
        var getNumber = parseInt($('.quantity-limit').val());

        if (!isNaN(getNumber)) {
            $('.quantity-limit').val(getNumber + 1);
        } else {
            $('.quantity-limit').val(1);
        }
    });

    $(document).on('click', '.qtyminus', function() {
        var getNumber = parseInt($('.quantity-limit').val());

        if (!isNaN(getNumber) && getNumber > 1) {
            $('.quantity-limit').val(getNumber - 1);
        } else {
            $('.quantity-limit').val(1);
        }
    });

    $(document).on('click', '#requirement-answer', function() {
        $('.setting-requirement').toggle(1200);
    });

    $(document).on('click', '#limit-answer', function() {
        $('.setting-limit').toggle(1000);
    });

    $(document).on('click', '.tab-choose', function() {
        var value = $(this).val();
        $('.content-' + value).css('display', 'block');

        for (var i = 1; i <= 4; i++) {
            if (i != value) {
                $('.content-' + i).css('display', 'none');
            }
        }

    });

    $('#langs').on('change', function () {
        var url = $(this).attr('data-url');
        var lang = $(this).val();

        $.post(
            url,
            {
                'locale': lang,
            },
            function (response) {
                if (response.success) {
                    window.location.href = response.urlBack;
                } else {
                    alert(error);
                }
        });
    });

    $('.submit-answer').prop('disabled', false);

    $(document).on('click', '.active-answer', function() {
        $('.container-list-answer').fadeIn();
        $('.container-list-result').fadeOut();
    });

    $(document).on('click', '.active-result', function() {
        $('.container-list-result').fadeIn();
        $('.container-list-answer').fadeOut();
    });

    $('.image-type-option').hover(
        function() {
            $(this).siblings('span').css('display', 'block');
        }, function() {
            $(this).siblings('span').css('display', 'none');
        }
    );

    setTimeout(function() {
        $('.complete-image').addClass('jello');
    }, 1000);

    $(document).on('click', '.choose-image', function() {
        $('.button-file-hidden').click();
    });

    $(document).on('click', '.tag-send-email', function() {
        var url = $(this).attr('data-url');
        $('.frm-submit-mail').attr('action', url);
        $('.popupBackground').fadeIn();
    });

    $(document).on('click', '.btn-remove-survey', function() {
        var result = confirm(notice);

        if (result) {
            var url = $(this).attr('data-url');
            var idSurvey = $(this).attr('id-survey');
            var redirect = $(this).attr('redirect');
            $.post(
                url,
                {
                    'idSurvey': idSurvey,
                },
                function(response) {

                    if (response.success) {
                        window.location.href = redirect;
                    } else {
                        alert(error);
                }
            });
        }
    });

    $('.datetimepicker').datetimepicker();

    $('.frm-date-2').datetimepicker({
        format: 'MM/DD/YYYY'
    });

    $('.frm-time').datetimepicker({
        format: 'LT'
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

    $(document).on('click', '.menu-wizard', function() {
        $('.menu-wizard').removeClass('active-menu');
        $(this).addClass('active-menu');
    });

    $('.alert-message').delay(3000).slideUp(300);

    var number = parseInt($('.ct-data').attr('data-number'));
    var charts = $('.ct-data').attr('data-content');
    var obj = jQuery.parseJSON( charts );

    for (i = 0; i < obj.length; i++) {
        var dataInput = new Array();

        for (j = 0; j < obj[i]['chart'].length; j++) {
            dataInput.push([obj[i]['chart'][j]['answer'], obj[i]['chart'][j]['percent']]);
        }
        var count = i + 1;
        if(dataInput.length != 1) {
            Highcharts.chart('container' + i, {
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    },
                    style: {
                        fontFamily: 'Arial'
                    },
                    spacingBottom: 15,
                    spacingTop: 70,
                    spacingLeft: 70,
                    spacingRight: 70,
                },
                title: {
                    text: count + '.' + obj[i]['question']['content'],
                    floating: true,
                    align: 'left',

                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                series: [{
                    type: 'pie',
                    name: 'Browser share',
                    data: dataInput
                }]
            });
        }
    }
});
