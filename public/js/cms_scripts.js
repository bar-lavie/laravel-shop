/*******************************************************
 ************* CMS Scripts File *************
 ********************************************************/

$(document).ready(function () {
    // General
    //=============================

    // Messege Box toggle

    var $sm = $('#sm-box');

    if ($sm.length) {
        $sm.delay(3000).fadeOut();
    }

    /************* CMS *************/

    // Make Freindly Url on Typing

    String.prototype.permalink = function () {
        return this.toString().trim().toLowerCase().replace(/\s/g, '-');
    };

    $('.origin-feild').on('focusout', function () {
        $('.target-feild').val($(this).val().permalink());
    });


    // CMS SummerNote

    $('#article').summernote({
        lang: 'he-IL',
        height: 300,
    });







});