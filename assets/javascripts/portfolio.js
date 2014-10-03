$(document).ready(function() {

    $(".warp_desc, #form_failure, #form_success, #project_accord, #topbar2, #wrapper3").hide();

    $(".controls").popover({
        animation: true,
        template: "<div class='popover'><div class='arrow'></div><div class='popover-inner'><h6 class='popover-title'></h6><div class='popover-content'></div></div></div>",
        title: "Navigation",
        content: "Use these buttons or the arrows on your keyboard to navigate through the site.",
        placement: "left",
        delay: {
            show: 500,
            hide: 5000
        }
    });

    $("#portfolio").click(function() {
        Reveal.configure({
            37: null,
            38: null,
            39: null,
            40: null
        });
        $("#wrapper2").animate({
            "opacity": ".6"
        }, 1000).slideUp(2000);
        $("#topbar").delay(2000).slideDown();
        $(".warp").delay(3000).slideDown();
    });

    $(".nav").click(function() {
        Reveal.configure({
            37: 'prev',
            38: 'up',
            39: 'next',
            40: 'down'
        });
        $("#warp_display").slideUp()
        $("#wrapper2").slideDown(2000).animate({
            'opacity': ".9"
        }, 1000);
        $(".warp").slideToggle();
        $("#topbar").slideUp();
        setTimeout(function() {
            Reveal.initialize({
                controls: true,
                progress: false,
                history: false,
                center: true,
                loop: true,
                keyboard: true,
                overview: true,
                viewDistance: 3,

                  theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
                  transition: Reveal.getQueryHash().transition || 'default', // default/cube/page/concave/zoom/linear/fade/none

                  // Optional libraries used to extend on reveal.js
                  dependencies: [
                  { src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
                  { src: 'plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                  { src: 'plugin/tagcloud/tagcloud.js', async: true},
                  { src: 'plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
                  { src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
                      // 
                      ]
            })
        }, 3000);
        $(".controls").popover("destroy")
    });

    $("#resume h1").click(function() {
        $("#resumepanel").slideToggle()
    })

    $(".close").click(function() {
        $(this).parent().slideToggle();
    })

    $("#pi").click(function(e) {
        if (e.altKey) {
            $(".info").hide
            $("#controlpanelallowed").slideToggle();
        } else {
            $(".info").hide
            $("#controlpanel").slideToggle();
        }
    })

    Reveal.addEventListener('slidechanged', function() {
        $(".info").hide();
        $(".controls").popover("destroy")
    });

    $(".controls").popover("show");

    $(document).click(function(e) {
        $(".controls").popover("destroy");
    });

    $(document).on("click", ".proj_link", function() {
        $("#project_accord").accordion({
            active: parseInt($(this).attr("id"))
        });
        $("#project_accord").accordion("refresh");
        $('#project_view_screen').attr("src", $(this).attr("data-link"));
        $("#topbar").slideToggle();
        $("#topbar2").slideToggle();
        $("#warpContainer").slideToggle();
        $("#wrapper3").slideToggle();
    });

    $(document).on("click", ".proj_link_a", function() {
        $('#project_view_screen').attr('src', $(this).attr("data-link"));
    });

    $("#project_nav").mouseenter(function() {
        $("#project_nav").animate({
            width: '25%'
        }, 350);
        $("#project_accord").slideDown()
    });

    $("#project_nav").mouseleave(function() {
        $("#project_nav").animate({
            width: '3%'
        }, 350);
        $("#project_accord").slideUp()
    });

    $("#back_to_warp").click(function() {
        $("#topbar2").slideToggle();
        $("#wrapper3").slideToggle();
        $("#topbar").slideToggle();
        $("#warpContainer").slideToggle();
    });

    $('#contact_form').submit(function() {
        $.post(
            $(this).attr('action'),
            $(this).serialize(),
            function(data) {
                if (data.status == "success") {
                    $("#form_success").fadeIn();
                } else if (data.status == "failure") {
                    $("#form_failure").fadeIn();
                }
            },
            'json'
        );
        $('input[type=text]').val('');
        $('input[type=email]').val('');
        $('textarea').val('');
        return false;
    });

    setTimeout(function () {
        var startY = 0;
        var startX = 0;
        var b = document.body;
        b.addEventListener('touchstart', function (event) {
            parent.window.scrollTo(0, 1);
            startY = event.targetTouches[0].pageY;
            startX = event.targetTouches[0].pageX;
        });
        b.addEventListener('touchmove', function (event) {
            event.preventDefault();
            var posy = event.targetTouches[0].pageY;
            var h = parent.document.getElementById("resumepanel");
            var sty = h.scrollTop;

            var posx = event.targetTouches[0].pageX;
            var stx = h.scrollLeft;
            h.scrollTop = sty - (posy - startY);
            h.scrollLeft = stx - (posx - startX);
            startY = posy;
            startX = posx;
        });
    }, 1000);})