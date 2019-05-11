'use strict';
if (typeof jQuery === "undefined") {
    throw new Error("jQuery plugins need to be before this file");
}

$.MyAdmin = {};
$.MyAdmin.options = {
    leftSideBar: {
        scrollColor: 'rgba(0,0,0,0.5)',
        scrollWidth: '4px',
        scrollAlwaysVisible: false,
        scrollBorderRadius: '0',
        scrollRailBorderRadius: '0',
        scrollActiveItemWhenPageLoad: true,
        breakpointWidth: 1170
    },
    dropdownMenu: {
        effectIn: 'pullDown',
        effectOut: 'fadeOut'
    }
}
/* Tooltip */
$.MyAdmin.tooltip = {
    activate: function () {
        $('[data-toggle="tooltip"]').tooltip({
            placement: 'top'
        });
    }
}
/* Title Sparkline chart data */
$.MyAdmin.titleSparkline = {
    activate: function () {
        $('.chart.header-bar').sparkline([6, 8, 6, 8, 10, 5, 6, 7, 9, 7], {
            type: 'bar',
            barColor: '#f17312',
            negBarColor: '#fff',
            barWidth: '4px',
            height: '40px'
        });
        $('.chart.header-bar2').sparkline([6, 8, 6, 8, 10, 3, 6, 7, 9, 7], {
            type: 'bar',
            barColor: '#1399f2',
            negBarColor: '#fff',
            barWidth: '4px',
            height: '40px'
        });

        $('.chart.header-line').sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7, 5, 6, 7, 9, 9], {
            type: 'line',
            lineColor: '#46B2A8',
            fillColor: '#badddc',
            height: '40px'
        });
    }
}
/* Left Sidebar */

$.MyAdmin.leftSideBar = {
    activate: function () {
        var _this = this;
        var $body = $('body');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).on("click", function (e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') { $target = $(e.target).parent(); }

            if (!$target.hasClass('bars') && _this.isOpen() && $target.parents('#leftsidebar').length === 0) {
                if (!$target.hasClass('js-right-sidebar')) $overlay.fadeOut();
                $body.removeClass('overlay-open');
            }
        });

        $.each($('.menu-toggle.toggled'), function (i, val) {
            $(val).next().slideToggle(0);
        });

        //When page load
        $.each($('.menu .list li.active'), function (i, val) {
            var $activeAnchors = $(val).find('a:eq(0)');

            $activeAnchors.addClass('toggled');
            $activeAnchors.next().show();
        });

        //Collapse or Expand Menu
        $('.menu-toggle').on('click', function (e) {
            var $this = $(this);
            var $content = $this.next();

            if ($($this.parents('ul')[0]).hasClass('list')) {
                var $not = $(e.target).hasClass('menu-toggle') ? e.target : $(e.target).parents('.menu-toggle');

                $.each($('.menu-toggle.toggled').not($not).next(), function (i, val) {
                    if ($(val).is(':visible')) {
                        $(val).prev().toggleClass('toggled');
                        $(val).slideUp();
                    }
                });
            }

            $this.toggleClass('toggled');
            $content.slideToggle(320);
        });

        //Set menu height
        _this.setMenuHeight();
        _this.checkStatuForResize(true);
        $(window).resize(function () {
            _this.setMenuHeight();
            _this.checkStatuForResize(false);
        });

        //Set Waves
        Waves.attach('.menu .list a', ['waves-block']);
        Waves.init();
    },
    setMenuHeight: function (isFirstTime) {
        if (typeof $.fn.slimScroll != 'undefined') {
            var configs = $.MyAdmin.options.leftSideBar;
            //var height = ($(window).height() - ($('.legal').outerHeight() + $('.user-info').outerHeight() + $('.navbar').innerHeight()));
            var height = ($(window).height() - ($('.navbar').innerHeight()));
            var $el = $('.list');

            $el.slimscroll({
                height: height + "px",
                color: configs.scrollColor,
                size: configs.scrollWidth,
                alwaysVisible: configs.scrollAlwaysVisible,
                borderRadius: configs.scrollBorderRadius,
                railBorderRadius: configs.scrollRailBorderRadius
            });

            //Scroll active menu item when page load, if option set = true
            if ($.MyAdmin.options.leftSideBar.scrollActiveItemWhenPageLoad) {
                var activeItemOffsetTop = $('.menu .list li.active')[0].offsetTop
                if (activeItemOffsetTop > 150) $el.slimscroll({ scrollTo: activeItemOffsetTop + 'px' });
            }
        }
    },
    checkStatuForResize: function (firstTime) {
        var $body = $('body');
        var $openCloseBar = $('.navbar .navbar-header .bars');
        var width = $body.width();

        if (firstTime) {
            $body.find('.content, .sidebar').addClass('no-animate').delay(1000).queue(function () {
                $(this).removeClass('no-animate').dequeue();
            });
        }

        if (width < $.MyAdmin.options.leftSideBar.breakpointWidth) {
            $body.addClass('ls-closed');
            $openCloseBar.fadeIn();
        }
        else {
            $body.removeClass('ls-closed');
            $openCloseBar.fadeOut();
        }
    },
    isOpen: function () {
        return $('body').hasClass('overlay-open');
    }
};
$('.sidemenu-collapse').on('click', function () {
    var $body = $('body');
    if ($body.hasClass('side-closed')) {
        $body.removeClass('side-closed');
        $body.removeClass('submenu-closed');
    } else {
        $body.addClass('side-closed');
        $body.addClass('submenu-closed');
    }
});
$(".content, .navbar").mouseenter(function () {
    var $body = $('body');
    $body.removeClass('side-closed-hover');
    $body.addClass('submenu-closed');
});
$(".sidebar").mouseenter(function () {
    var $body = $('body');
    $body.addClass('side-closed-hover');
    $body.removeClass('submenu-closed');
});

if (localStorage.getItem("sidebar_option")) {
    jQuery("body").addClass(localStorage.getItem("sidebar_option"));
}
if ($('body').hasClass('side-closed')) {
    $(".sidebar-user-panel").css({ "display": "none" });
} else {
    $(".sidebar-user-panel").css({ "display": "block" });
}
jQuery(document).on("click", ".sidemenu-collapse", function () {
    var sidebar_option = "";
    if ($('body').hasClass('side-closed')) {
        var sidebar_option = "side-closed submenu-closed";
        $(".sidebar-user-panel").css({ "display": "none" });
    } else {
        $(".sidebar-user-panel").css({ "display": "block" });
    }
    jQuery("body").addClass(sidebar_option);
    localStorage.setItem("sidebar_option", sidebar_option);
});


/* Right Sidebar */
$.MyAdmin.rightSideBar = {
    activate: function () {
        var _this = this;
        var $sidebar = $('#rightsidebar');
        var $overlay = $('.overlay');

        //Close sidebar
        $(window).on("click", function (e) {
            var $target = $(e.target);
            if (e.target.nodeName.toLowerCase() === 'i') { $target = $(e.target).parent(); }

            if (!$target.hasClass('js-right-sidebar') && _this.isOpen() && $target.parents('#rightsidebar').length === 0) {
                if (!$target.hasClass('bars')) $overlay.fadeOut();
                $sidebar.removeClass('open');
            }
        });
        $('.js-right-sidebar').on('click', function () {
            $sidebar.toggleClass('open');
            if (_this.isOpen()) { $overlay.fadeIn(); } else { $overlay.fadeOut(); }
        });
    },
    isOpen: function () {
        return $('.right-sidebar').hasClass('open');
    }
}

/* Navbar */
$.MyAdmin.navbar = {
    activate: function () {
        var $body = $('body');
        var $overlay = $('.overlay');

        //Open left sidebar panel
        $('.bars').on('click', function () {
            $body.toggleClass('overlay-open');
            if ($body.hasClass('overlay-open')) { $overlay.fadeIn(); } else { $overlay.fadeOut(); }
        });

        //Close collapse bar on click event
        $('.nav [data-close="true"]').on('click', function () {
            var isVisible = $('.navbar-toggle').is(':visible');
            var $navbarCollapse = $('.navbar-collapse');

            if (isVisible) {
                $navbarCollapse.slideUp(function () {
                    $navbarCollapse.removeClass('in').removeAttr('style');
                });
            }
        });
    }
}
/* Input - Function */
$.MyAdmin.input = {
    activate: function () {
        //On focus event
        $('.form-control').focus(function () {
            $(this).parent().addClass('focused');
        });

        //On focusout event
        $('.form-control').focusout(function () {
            var $this = $(this);
            if ($this.parents('.form-group').hasClass('form-float')) {
                if ($this.val() == '') { $this.parents('.form-line').removeClass('focused'); }
            }
            else {
                $this.parents('.form-line').removeClass('focused');
            }
        });

        //On label click
        $('body').on('click', '.form-float .form-line .form-label', function () {
            $(this).parent().find('input').focus();
        });

        //Not blank form
        $('.form-control').each(function () {
            if ($(this).val() !== '') {
                $(this).parents('.form-line').addClass('focused');
            }
        });
    }
}
/* Form - Select */
$.MyAdmin.select = {
    activate: function () {
        if ($.fn.selectpicker) { $('select:not(.ms)').selectpicker(); }
    }
}

/* Browser */
var edge = 'Microsoft Edge';
var ie10 = 'Internet Explorer 10';
var ie11 = 'Internet Explorer 11';
var opera = 'Opera';
var firefox = 'Mozilla Firefox';
var chrome = 'Google Chrome';
var safari = 'Safari';

$.MyAdmin.browser = {
    activate: function () {
        var _this = this;
        var className = _this.getClassName();

        if (className !== '') $('html').addClass(_this.getClassName());
    },
    getBrowser: function () {
        var userAgent = navigator.userAgent.toLowerCase();

        if (/edge/i.test(userAgent)) {
            return edge;
        } else if (/rv:11/i.test(userAgent)) {
            return ie11;
        } else if (/msie 10/i.test(userAgent)) {
            return ie10;
        } else if (/opr/i.test(userAgent)) {
            return opera;
        } else if (/chrome/i.test(userAgent)) {
            return chrome;
        } else if (/firefox/i.test(userAgent)) {
            return firefox;
        } else if (!!navigator.userAgent.match(/Version\/[\d\.]+.*Safari/)) {
            return safari;
        }

        return undefined;
    },
    getClassName: function () {
        var browser = this.getBrowser();

        if (browser === edge) {
            return 'edge';
        } else if (browser === ie11) {
            return 'ie11';
        } else if (browser === ie10) {
            return 'ie10';
        } else if (browser === opera) {
            return 'opera';
        } else if (browser === chrome) {
            return 'chrome';
        } else if (browser === firefox) {
            return 'firefox';
        } else if (browser === safari) {
            return 'safari';
        } else {
            return '';
        }
    }
}
//==========================================================================================================================

$(function () {
    $.MyAdmin.browser.activate();
    $.MyAdmin.leftSideBar.activate();
    $.MyAdmin.rightSideBar.activate();
    $.MyAdmin.navbar.activate();
    $.MyAdmin.input.activate();
    $.MyAdmin.select.activate();
    $.MyAdmin.tooltip.activate();
    $.MyAdmin.titleSparkline.activate();

    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);

});