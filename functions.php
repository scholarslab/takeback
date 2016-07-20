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

add_filter(array('Display', 'Item', 'Item Type Metadata', 'URL'), 'make_url_link');

function make_url_link($url)
{
    if(empty($url)) {
        return;
    }
    return '<a href="'.$url.'">'.$url.'</a>';
}

add_filter(array('Display', 'Item', 'Dublin Core', 'Subject'), 'make_subject_link');

function make_subject_link($subject) {

    if(empty($subject)) {
        return;
    }

    $element = get_db()->getTable('Element')->findByElementSetNameAndElementName('Dublin Core', 'Subject');

    $link = link_to_items_browse($subject, array('advanced' => array(array('element_id' => $element->id, 'type' => 'is exactly', 'terms' => $subject))));

    return $link;

}

function get_unique_subjects() {
  $db = get_db();
  $table = $db->getTable('ElementText');
  $elementId = 49;
  $subjects = $table->getSelect()->where('element_texts.element_id = ?', (int)$elementId)->distinct();

  return count($table->fetchObjects($subjects));
}

