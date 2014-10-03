/*!
 * warp.js
 * 
 * MIT licensed
 *
 * Copyright (C) 2014 Paul Zellmer, http://pazellmer.com
 */

//document setup

$(".warp").hide();
$("#warpContainer").parent().prepend("<div id='warp_display'></div>");
$("#warp_display").hide();

var offset = parseInt($("#warpContainer").attr("data-offset"));
var numItems = $('.warp').length;

if (numItems > 0) {
    //variables

    var width = $(".warp").width();
    var height = $(".warp").height();

    var x_right = (3 * $(window).width() / 4);
    var x_center = $(window).width() / 2;
    var x_left = $(window).width() / 4;
    var y_top = $(window).height() / 4 + offset;
    var y_center = ($(window).height() + offset) / 2;
    var y_bottom = 3 * $(window).height() / 4 + offset;


    var xinc = (x_center - x_left) / (numItems / 4);
    var xmov = xinc;
    var yinc = (y_center - y_top) / (numItems / 4);
    var ymov = yinc;

    var counter = 1;
    var zindex = 200;
    var zindex_inc = parseInt(800 / numItems);



    // Gather objects, count and organize array, coordinates and structure
    arrayCoord = [];

    for (var i = 0; i < numItems; i++) {
        if (counter == 1) {
            //top
            y_axis = Math.round(((y_center - ymov - (height * zindex / 1000) / 2) / $(window).height()) * 100);
            arrayCoord[i] = {
                index: i,
                x_axis: Math.round((x_center - (width * zindex / 1000) / 2) / $(window).width() * 100) + "%",
                y_axis: y_axis + "%",
                z_index: zindex,
                width: (width * zindex / 1000),
                height: (height * zindex / 1000),
                opacity: (1 * zindex / 1000)
            };
        } else if (counter == 2) {
            //right
            x_axis = Math.round(((x_center + xmov - (width * zindex / 1000) / 2) / $(window).width()) * 100);
            arrayCoord[i] = {
                index: i,
                x_axis: x_axis + "%",
                y_axis: Math.round((y_center - (height * zindex / 1000) / 2) / $(window).height() * 100) + "%",
                z_index: zindex,
                width: (width * zindex / 1000),
                height: (height * zindex / 1000),
                opacity: (1 * zindex / 1000)
            };
        } else if (counter == 3) {
            //bottom
            y_axis = Math.round(((y_center + ymov - (height * zindex / 1000) / 2) / $(window).height()) * 100);
            arrayCoord[i] = {
                index: i,
                x_axis: Math.round((x_center - (width * zindex / 1000) / 2) / $(window).width() * 100) + "%",
                y_axis: y_axis + "%",
                z_index: zindex,
                width: (width * zindex / 1000),
                height: (height * zindex / 1000),
                opacity: (1 * zindex / 1000)
            };
            ymov += yinc;
        } else {
            //left
            x_axis = Math.round(((x_center - xmov - (width * zindex / 1000) / 2) / $(window).width()) * 100);
            arrayCoord[i] = {
                index: i,
                x_axis: x_axis + "%",
                y_axis: Math.round((y_center - (height * zindex / 1000) / 2) / $(window).height() * 100) + "%",
                z_index: zindex,
                width: (width * zindex / 1000),
                height: (height * zindex / 1000),
                opacity: (1 * zindex / 1000)
            };
            xmov += xinc;
            counter = 0;
        }
        zindex += zindex_inc;
        counter++;
    }
    arrayCoord[arrayCoord.length - 1].z_index = 1000;

    // Assign items location and z-index and show items
    $(".warp").each(function(i) {
        $(this).attr("id", "warp" + arrayCoord[i].index);
        $(this).css("left", arrayCoord[i].x_axis);
        $(this).css("top", arrayCoord[i].y_axis);
        $(this).css("z-index", arrayCoord[i].z_index);
        $(this).css("width", arrayCoord[i].width);
        $(this).css("height", arrayCoord[i].height);
        $(this).css("opacity", arrayCoord[i].opacity);
    })

    // Arrow click to item

    $(document).on("keydown", function(e) {
        // up
        if (e.keyCode == 38) {
            $("#warpContainer").append($("#warpContainer").children(".warp:first"));
            $(".warp").each(function(i) {
                $(this).attr("id", "warp" + arrayCoord[i].index);
                $(this).animate({
                    left: arrayCoord[i].x_axis,
                    top: arrayCoord[i].y_axis,
                    "z-index": arrayCoord[i].z_index,
                    width: arrayCoord[i].width,
                    height: arrayCoord[i].height,
                    opacity: arrayCoord[i].opacity
                }, 2000)
            });
            // down		
        } else if (e.keyCode == 40) {
            $("#warpContainer").prepend($("#warpContainer").children(".warp:last"));
            $(".warp").each(function(i) {
                $(this).attr("id", "warp" + arrayCoord[i].index);
                $(this).animate({
                    left: arrayCoord[i].x_axis,
                    top: arrayCoord[i].y_axis,
                    "z-index": arrayCoord[i].z_index,
                    width: arrayCoord[i].width,
                    height: arrayCoord[i].height,
                    opacity: arrayCoord[i].opacity
                }, 2000)
            });
        }
    })

    // Mouse click to item

    $(".warp:not(.warp:last)").click(function() {
        var id = $(this).attr("id");
        var cycle = arrayCoord.length - 1 - parseInt(id.slice(4));
        for (i = 0; i < cycle; i++) {
            $("#warpContainer").prepend($("#warpContainer").children(".warp:last"));
            $(".warp").each(function(i) {
                $(this).attr("id", "warp" + arrayCoord[i].index);
                $(this).animate({
                    left: arrayCoord[i].x_axis,
                    top: arrayCoord[i].y_axis,
                    "z-index": arrayCoord[i].z_index,
                    width: arrayCoord[i].width,
                    height: arrayCoord[i].height,
                    opacity: arrayCoord[i].opacity
                }, 1000)
            });
        }
    });

    // Mouse click front item to open iFrame
    $(document).on("click", ".warp:last", function() {
        $("#warp_display").html($(this).html());
        $("#warp_display").children().show();
        $("#warp_display").fadeToggle();
    });

    $("#warp_display").click(function() {
        $("#warp_display").fadeToggle();
    });

}