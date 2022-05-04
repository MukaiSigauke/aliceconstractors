(function($) {
    $(document).ready(function() {

        $("footer").append('<style id="styler_styles"></style>');

        $('.sg_widget_custom_box_left #colorchange').ColorPicker({
            onChange: function(hsb, hex, rgb) {

                $('.sg_widget_custom_box_left #colorchange').css('backgroundColor', '#' + hex);
                $('.colorchange-text').css('color', '#' + hex);
                $('#styler_styles').load(plugin.plugin_url + "custom_style.php?color=" + hex);

            }
        });
        var clicked = false;

        $(".sg_widget_custom_box_left #sg_custom_box_icon").click(function() {
            if (clicked == false) {
                $(".sg_widget_custom_box_left").stop(true, false).animate({
                    left: "0"
                }, 800, 'easeOutQuint');
                clicked = true;

            } else {
                $(".sg_widget_custom_box_left").stop(true, false).animate({
                    left: "-224"
                }, 800, 'easeInQuint');
                clicked = false;
            }
        });

        $(".skinchange").click(function() {
            $('#styler_styles').load(plugin.plugin_url + "custom_style.php?skin=" + $(this).attr('class').split(' ')[1]);
        });

        function colorChanged(hsb, hex, rgb) {
            $('.sg_widget_custom_box_left #colorchange').val(rgb);
        }

    });
})(jQuery);