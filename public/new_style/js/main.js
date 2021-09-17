(function($) {

    "use strict";

    $('#id_0').datetimepicker({
        allowInputToggle: true,
        showClose: true,
        showClear: true,
        showTodayButton: true,
        format: "MM/DD/YYYY hh:mm:ss A",
        icons: {
            time: 'fa fa-clock-o',

            date: 'fa fa-calendar-o',

            up: 'fa fa-chevron-up',

            down: 'fa fa-chevron-down',

            previous: 'fa fa-chevron-left',

            next: 'fa fa-chevron-right',

            today: 'fa fa-chevron-up',

            clear: 'fa fa-trash',

            close: 'fa fa-close'
        },

    });



    var figure = $(".video").hover(hoverVideo, hideVideo);

    function hoverVideo(e) { $('video', this).get(0).play(); }

    function hideVideo(e) { $('video', this).get(0).pause(); }







    $('select').niceSelect();


    function sh(src1, src2) {
        $(src1).click(function() {
            $(src2).toggleClass('toggle')
        })
    }


    sh('.country', '.countries');

    sh('.lang', '.langs');

    sh('.Engagement', '.Engagements');

    sh('.objective', '.objectives');

    $('.cancel').click(function() {
        $(this).parent().parent().toggleClass('toggle')
    })

    $('.content span').click(function() {
        $(this).parent().parent().toggleClass('toggle')
    })


    function addTarget(src, src2) {
        $(src2).click(function() {

            $(src).text($(this).text());

        })
    }

    addTarget('.country .current', '.countries .row1 span');

    addTarget('.lang .current', '.langs .row1 span');

    addTarget('.Engagement .current', '.Engagements .row1 span');

    addTarget('.objective .current', '.objectives .row1 span');



    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });

    $('.fa-heart').click(function() {
        $(this).toggleClass('far');
        $(this).toggleClass('fas');

    })
    $('#post_type').on('change', function() {
        // alert('ff');
        get_posts();

    });
    $('#daterange').on('change', function() {
        // alert('ssq');
        get_posts();

    });
    $('#sort_by').on('change', function() {
        // alert('ssq');
        get_posts();

    });



    $('#aBtnGroup button').on('click', function() {
        // alert('qwww');
        var thisBtn = $(this);

        thisBtn.addClass('active').siblings().removeClass('active');
        var btnText = thisBtn.text();
        var btnValue = thisBtn.val();
        get_posts();

    });


    if ($('.post-body').hasClass('blur')) {

        $('.over-lay-img').css('display', 'block')

    } else {
        $('.over-lay-img').css('display', 'none')

    }

    var val = {};

    function getdataIDPro(src1) {
        $(src1).click(function() {
            val.one = $(this).attr("id");

        })
    }

    getdataIDPro('.langs span')

    function get_posts() {
        let lang = val.one;
        let country = $('.country .current').text();
        let obj = $('.objective .current').text();
        let enng = val2.one + " " + val2.two;
        let post_type = $('#post_type :selected').val();
        let sort_by = $('#sort_by :selected').val();
        var radioValue = $(".btn-default.active").val()
        var daterange = $("#daterange").val();
        $.ajax({
            url: '/index',
            type: 'get',
            dataType: 'html',
            data: { 'is_filtter': 1, 'enng': enng, 'country': country, 'lang': lang, "obj": obj, 'post_type': post_type, "sort_by": sort_by, 'radioValue': radioValue, "daterange": daterange },
            success: function(data) {



                $("#post-data").replaceWith(data);



            }
        });
    }

    var val2 = {};


    function getTypeId(src1) {
        $(src1).click(function() {
            val2.one = $(this).parent().attr('id');
            val2.two = $(this).text()
        })
    }

    getTypeId('.Engagements span')




    $('.content span').each(function() {

        $(this).click(function() {

            let value = $(this).text();

            get_posts();

        });

    });


})(jQuery);