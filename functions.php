<?php

/**
 * Adds theme assets to queues.
 *
 * - Modernizr
 * - Respond.js
 * - Selectivizr
 * - Google Fonts style sheet
 * - Theme style sheet
 */
function queue_theme_assets() {
    queue_js_file('modernizr.min');
    queue_js_file(array('respond.min', 'selectivizr.min'), 'javascripts', array('conditional' => 'lt IE 9'));

    get_view()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Open+Sans:400,700');
    queue_css_file('style');
}

function queue_slides_assets() {
    queue_js_file('deck/deck.core');
    queue_js_file('deck/extensions/scale/deck.scale');
    queue_js_file('deck/extensions/automatic/deck.automatic');
    queue_js_file('slides');
}
