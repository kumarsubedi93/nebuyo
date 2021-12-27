jQuery(document).ready(function() {

    /*------------------------------------------------------*/
    // Replace all SVG images with inline SVG
    /*------------------------------------------------------*/
    jQuery('img.svg').each(function() {
        var jQueryimg = jQuery(this);
        var imgID = jQueryimg.attr('id');
        var imgClass = jQueryimg.attr('class');
        var imgURL = jQueryimg.attr('src');

        jQuery.get(imgURL, function(data) {
            // Get the SVG tag, ignore the rest
            var jQuerysvg = jQuery(data).find('svg');

            // Add replaced image's ID to the new SVG
            if (typeof imgID !== 'undefined') {
                jQuerysvg = jQuerysvg.attr('id', imgID);
            }
            // Add replaced image's classes to the new SVG
            if (typeof imgClass !== 'undefined') {
                jQuerysvg = jQuerysvg.attr('class', imgClass + ' replaced-svg');
            }

            // Remove any invalid XML tags as per http://validator.w3.org
            jQuerysvg = jQuerysvg.removeAttr('xmlns:a');

            // Replace image with new SVG
            jQueryimg.replaceWith(jQuerysvg);

        }, 'xml');

    });


});
