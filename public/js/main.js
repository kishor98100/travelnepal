$(document).ready(function () {

    var path = window.location.pathname.split("/").pop();

    if (path == '') {
        path = 'index.html'
    }

    var target = $('#menu li a[href="' + path + '"]');
    target.addClass('active');


    $('#hamb-menu').on('click', 'i.fa', function (e) {
        e.preventDefault();
        $('#sidebar').toggle();
    });

    // ajax

    window.setTimeout(function () {
        $(".cs-alert").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 3000);





});