$(function () {
    //å·¦ä¾§åˆå§‹è‡ªé€‚åº”å®½
    var winwidth = $(window).width();
    var perright = 423 / (winwidth-100);
    var leftwidth = (1 - perright) * (winwidth-100);

    $(".paper").css({"width": winwidth});
    $(".papercenter").css({"width": winwidth});
    $(".commitleft").css({"width": leftwidth});

    //æŽ¨å¹¿èµšé’±
    var basicwidth = leftwidth - 450;
    $(".basic-user-table").css({"width": basicwidth});
    //å·¦ä¾§è‡ªé€‚åº”å®½
    $(window).resize(function () {
        var winwidth = $(window).width();
        var perright = 423 / (winwidth-100);
        var leftwidth = (1 - perright) * (winwidth-100);

        $(".paper").css({"width": winwidth});
        $(".papercenter").css({"width": winwidth});
        $(".commitleft").css({"width": leftwidth});

        //æŽ¨å¹¿èµšé’±
        var basicwidth = leftwidth - 450;
        $(".basic-user-table").css({"width": basicwidth});
    });

    //ç®¡ç†è‡ªå»ºåº“æ²¡æœ‰è­¦å‘Šæ¡†
    $(document).on("click", "#btnmanagerlib", function () {
        $(".paperwarning").hide();
    });
    $(document).on("click", "#btnuploadlib", function () {
        $(".paperwarning").show();
    });

    //è’™æ¿æ–‡æœ¬åŒºåŸŸèŽ·å¾—ç„¦ç‚¹ä¸Žå¤±åŽ»ç„¦ç‚¹
    $(document).on("click", ".mymod-hoverimg,.mymod-textarea", function () {
        $(".mymod-hoverimg").hide();
        $(".mymod-textarea").focus();
    });
    $(".mymod-textarea").blur(function () {
        if ($(this).val() == "") {
            $(".mymod-hoverimg").show();
        } else {
            return;
        }
    });

});