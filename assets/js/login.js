function preventBack() {
    window.history.forward();
}
setTimeout("preventBack()", 0);
window.onunload = function() {
    null
};

jQuery(function($) {
    if (jQuery("#loginform-password").data("strength")) {
        jQuery("#loginform-password").strength("destroy");
    }
    jQuery("#loginform-password").strength(strength_06b96b85);


    $(document).ready(function() {
        $("td").removeClass("kv-meter-container");
    });
});

window.strength_06b96b85 = {
    showMeter: false,
    language: "es",
    inputTemplate: "\u003Cdiv class=\u0022input-group\u0022\u003E{input}\u003Cspan class=\u0022input-group-addon\u0022\u003E{toggle}\u003C\/span\u003E\u003C\/div\u003E",
};