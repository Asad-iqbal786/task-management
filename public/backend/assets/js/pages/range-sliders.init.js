/*
Template Name: TechUI - Responsive Bootstrap 5 Admin Dashboard
Author: GetAppui
File: Range sliders init js
*/

import 'ion-rangeslider';
import 'ion-rangeslider/css/ion.rangeSlider.css';

$(document).ready(function () {
    $("#range_01").ionRangeSlider();

    $("#range_02").ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550
    });

    $("#range_03").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "$"
    });

    $("#range_04").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500
    });

    $("#range_05").ionRangeSlider({
        type: "double",
        grid: true,
        min: -1000,
        max: 1000,
        from: -500,
        to: 500,
        step: 250
    });

    $("#range_06").ionRangeSlider({
        grid: true,
        from: 3,
        values: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"]
    });

    $("#range_07").ionRangeSlider({
        grid: true,
        min: 1000,
        max: 1000000,
        from: 200000,
        step: 1000,
        prettify_enabled: true
    });

    $("#range_08").ionRangeSlider({
        min: 100,
        max: 1000,
        from: 550,
        disable: true
    });
    $("#range_09").ionRangeSlider({
        grid: true,
        min: 18,
        max: 70,
        from: 30,
        prefix: "Age ",
        max_postfix: "+"
    });
    $("#range_10").ionRangeSlider({
        type: "double",
        min: 100,
        max: 200,
        from: 145,
        to: 155,
        prefix: "Weight: ",
        postfix: " million pounds",
        decorate_both: true
    });
    $("#range_11").ionRangeSlider({
        type: "single",
        grid: true,
        min: -90,
        max: 90,
        from: 0,
        postfix: "Â°"
    });
    $("#range_12").ionRangeSlider({
        type: "double",
        min: 1000,
        max: 2000,
        from: 1200,
        to: 1800,
        hide_min_max: true,
        hide_from_to: true,
        grid: true
    });

    $("#range_13").ionRangeSlider({
        skin: "modern"
    });

    $("#range_14").ionRangeSlider({
        skin: "sharp"
    });

    $("#range_15").ionRangeSlider({
        skin: "round"
    });

    $("#range_16").ionRangeSlider({
        skin: "square"
    });
});
