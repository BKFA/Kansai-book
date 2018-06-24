var $input = $('<div class="modal-body"><input type="text" class="form-control" placeholder="Message"></div>');

$(document).on("click", ".js-msgGroup", function() { 
    $(".js-msgGroup, .js-newMsg").addClass("d-none"), 
    $(".js-conversation").removeClass("d-none"), 
    $(".modal-title").html('<a href="#" class="js-gotoMsgs">Back</a>'), 
    $input.insertBefore(".js-modalBody") }), $(function() {
    function o() { 
        return $('[data-toggle="popover"]').length ? $(window).width() - ($('[data-toggle="popover"]').offset().left + $('[data-toggle="popover"]').outerWidth()) : 0 } $(window).on("resize", function() {
        var t = $('[data-toggle="popover"]').data("bs.popover");
        t && (t.config.viewport.padding = o())
    }), $('[data-toggle="popover"]').popover({ template: '<div class="popover" role="tooltip"><div class="arrow"></div><div class="popover-body popover-content px-0"></div></div>', title: "", html: !0, trigger: "manual", placement: "bottom", viewport: { selector: "body", padding: o() }, content: function() { var o = $("#js-popoverContent").clone(); return '<ul class="nav nav-pills nav-stacked flex-column" style="width: 120px">' + o.html() + "</ul>" } }), $('[data-toggle="popover"]').on("click", function(o) { o.stopPropagation(), $($('[data-toggle="popover"]').data("bs.popover").getTipElement()).hasClass("in") ? ($('[data-toggle="popover"]').popover("hide"), $(document).off("click.app.popover")) : ($('[data-toggle="popover"]').popover("show"), setTimeout(function() { $(document).one("click.app.popover", function() { $('[data-toggle="popover"]').popover("hide") }) }, 1)) })
}), $(document).on("click", ".js-gotoMsgs", function() { $input.remove(), $(".js-conversation").addClass("d-none"), $(".js-msgGroup, .js-newMsg").removeClass("d-none"), $(".modal-title").html("Messages") }), $(document).on("click", "[data-action=growl]", function(o) { o.preventDefault(), $("#app-growl").append('<div class="alert alert-dark alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Click the x on the upper right to dismiss this little thing. Or click growl again to show more growls</div>') }), $(document).on("focus", '[data-action="grow"]', function() { $(window).width() > 1e3 && $(this).animate({ width: 300 }) }), $(document).on("blur", '[data-action="grow"]', function() { if ($(window).width() > 1e3) { $(this).animate({ width: 180 }) } }), $(function() {
    function o() { $(window).scrollTop() > $(window).height() ? $(".docs-top").fadeIn() : $(".docs-top").fadeOut() } $(".docs-top").length && (o(), $(window).on("scroll", o))
}), $(function() {
    function o() { a.width() > 768 ? e() : t() }

    function t() { a.off("resize.theme.nav"), a.off("scroll.theme.nav"), n.css({ position: "", left: "", top: "" }) }

    function e() {
        function o() { e.containerTop = $(".docs-content").offset().top - 40, e.containerRight = $(".docs-content").offset().left + $(".docs-content").width() + 45, t() }

        function t() {
            var o = a.scrollTop(),
                t = Math.max(o - e.containerTop, 0);
            return t ? void n.css({ position: "fixed", left: e.containerRight, top: 40 }) : ($(n.find("li a")[1]).addClass("active"), n.css({ position: "", left: "", top: "" }))
        }
        var e = {};
        o(), $(window).on("resize.theme.nav", o).on("scroll.theme.nav", t), $("body").scrollspy({ target: "#markdown-toc" }), setTimeout(function() { $("body").scrollspy("refresh") }, 1e3)
    }
    var n = $("#markdown-toc");
    $("#markdown-toc li").addClass("nav-item"), $("#markdown-toc li > a").addClass("nav-link"), $("#markdown-toc li > ul").addClass("nav");
    var a = $(window);
    n[0] && (o(), a.on("resize", o))
});