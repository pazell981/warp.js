/*!
 * warp.js
 *
 * MIT licensed
 *
 * Copyright (C) 2014 Paul Zellmer, http://pazellmer.com
 */

//////////////////////////////
//                          //
//      document setup      //
//                          //
//////////////////////////////

// functions

function position(item, i) {
    item.attr("id", "warp" + arrayCoord[i].index);
    item.animate({
        left: arrayCoord[i].x_axis,
        top: arrayCoord[i].y_axis,
        "z-index": arrayCoord[i].z_index,
        width: arrayCoord[i].width,
        height: arrayCoord[i].height,
        opacity: arrayCoord[i].opacity
    }, 2000)
}

function rndItems() {
    for (i = 0; i < 4; i++) {
        if ((numItems + i) % 4 == 0) {
            return (numItems + i);
        }
    }
}

function Coord(index, xAxis, yAxis, zIndex, width, height, opacity) {
    this.index = index;
    this.x_axis = xAxis;
    this.y_axis = yAxis;
    this.z_index = zIndex;
    this.width = width;
    this.height = height;
    this.opacity = opacity;
}

$(".warp_desc, #warp_display").hide();
$("#warpContainer").parent().prepend("<div id='warp_display'></div>");

var offset = parseInt($("#warpContainer").attr("data-offset"));
var shape = $("#warpContainer").attr("data-shape");
if (shape == "") {
    shape = "diamond";
}
var numItems = $('.warp').length;

if (numItems > 0) {
    //variables

    var width = $(".warp").width();
    var height = $(".warp").height();

    var xCenter = $(window).width() / 2;
    var xLeft = $(window).width() / 4;
    var yTop = $(window).height() / 4 + offset;
    var yCenter = ($(window).height() + offset) / 2;


    var xInc = (xCenter - xLeft) / (numItems / 4);
    var xMov = xInc;
    var yInc = (yCenter - yTop) / (numItems / 4);
    var yMov = yInc;

    var counter = 1;
    var zIndex = 200;
    var zIndexInc = parseInt(800 / numItems);

    var limit = rndItems();

    //////////////////////////////
    //                          //
    //          code            //
    //                          //
    //////////////////////////////

    // Gather objects, count and organize array, coordinates and structure
    arrayCoord = [];

    if (shape == "diamond") {
        for (var i = 0; i < limit; i++) {
            if (counter == 1) {
                //left
                xAxis = Math.round(((xCenter - 50 - xMov - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round((yCenter - (height * zIndex / 1000) / 2) / $(window).height() * 100);
            } else if (counter == 2) {
                //top
                xAxis = Math.round((xCenter - (width * zIndex / 1000) / 2) / $(window).width() * 100)
                yAxis = Math.round(((yCenter - 50 - yMov - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else if (counter == 3) {
                //right
                xAxis = Math.round(((xCenter + 50 + xMov - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round((yCenter - (height * zIndex / 1000) / 2) / $(window).height() * 100);
                xMov += xInc;
            } else {
                //bottom
                xAxis = Math.round((xCenter - (width * zIndex / 1000) / 2) / $(window).width() * 100);
                yAxis = Math.round(((yCenter + 50 + yMov - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
                yMov += yInc;
                counter = 0;
            }
            arrayCoord[i] = new Coord(i, xAxis + "%", yAxis + "%", zIndex, (width * zIndex / 1000), (height * zIndex / 1000), (1 * zIndex / 1000));
            zIndex += zIndexInc;
            counter++;
        }
    }

    if (shape == "circle") {
        for (var i = 0; i < limit; i++) {
            if (counter == 1) {
                //left
                xAxis = Math.round(((xCenter - 100 - xMov - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round((yCenter - (height * zIndex / 1000) / 2) / $(window).height() * 100);
            } else if (counter == 2) {
                //left top
                xAxis = Math.round(((xCenter - 100 - xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter - 100 - yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else if (counter == 3) {
                //top
                xAxis = Math.round((xCenter - (width * zIndex / 1000) / 2) / $(window).width() * 100)
                yAxis = Math.round(((yCenter - 100 - yMov - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else if (counter == 4) {
                //top right
                xAxis = Math.round(((xCenter + 100 + xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter - 100 - yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else if (counter == 5) {
                //right
                xAxis = Math.round(((xCenter + 100 + xMov - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round((yCenter - (height * zIndex / 1000) / 2) / $(window).height() * 100);
            } else if (counter == 6) {
                //right bottom
                xAxis = Math.round(((xCenter + 100 + xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter + 100 + yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
                xMov += xInc;
            } else if (counter == 7) {
                //bottom
                xAxis = Math.round((xCenter - (width * zIndex / 1000) / 2) / $(window).width() * 100);
                yAxis = Math.round(((yCenter + 100 + yMov - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else {
                //bottom left
                xAxis = Math.round(((xCenter - 100 - xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter + 100 + yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
                yMov += yInc;
                counter = 0;
            }
            arrayCoord[i] = new Coord(i, xAxis + "%", yAxis + "%", zIndex, (width * zIndex / 1000), (height * zIndex / 1000), (1 * zIndex / 1000));
            zIndex += zIndexInc;
            counter++;
        }
    }

    if (shape == "triangle") {
        for (var i = 0; i < limit; i++) {
            if (counter == 1) {
                //top
                xAxis = Math.round((xCenter - (width * zIndex / 1000) / 2) / $(window).width() * 100);
                yAxis = Math.round(((yCenter - yMov - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else if (counter == 2) {
                //bottom right
                xAxis = Math.round(((xCenter + xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter + yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
            } else {
                //bottom left
                xAxis = Math.round(((xCenter - xMov / 2 - (width * zIndex / 1000) / 2) / $(window).width()) * 100);
                yAxis = Math.round(((yCenter + yMov / 2 - (height * zIndex / 1000) / 2) / $(window).height()) * 100);
                xMov += xInc;
                yMov += yInc;
                counter = 0;
            }
            arrayCoord[i] = new Coord(i, xAxis + "%", yAxis + "%", zIndex, (width * zIndex / 1000), (height * zIndex / 1000), (1 * zIndex / 1000));
            zIndex += zIndexInc;
            counter++;
        }
    }

    arrayCoord[arrayCoord.length - 1].z_index = 1000;

    // Assign items location and z-index and show items
    $($(".warp").get()).each(function(i) {
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
                position($(this), i);
            });
            // down     
        } else if (e.keyCode == 40) {
            $("#warpContainer").prepend($("#warpContainer").children(".warp:last"));
            $(".warp").each(function(i) {
                position($(this), i);
            });
        }
    })

    // Mouse click to item

    $(document).on("click",".warp:not(.warp:last)", function() {
        var id = $(this).attr("id");
        var cycle = arrayCoord.length - parseInt(id.slice(4)) - 2;
        for (i = 0; i < cycle; i++) {
            $("#warpContainer").prepend($("#warpContainer").children(".warp:last"));
            $(".warp").each(function(i) {
                position($(this), i);
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