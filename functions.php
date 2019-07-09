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

    get_view()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Open+Sans:400,700|Inconsolata|Raleway');
    queue_css_file('style');
}

function queue_slides_assets() {
    queue_js_file('deck/deck.core');
    queue_js_file('deck/extensions/scale/deck.scale');
    queue_js_file('deck/extensions/automatic/deck.automatic');
    queue_js_file('slides');
}

function make_url_link($url)
{
    if(empty($url)) {
        return;
    }
    return '<a href="'.$url.'">'.$url.'</a>';
}

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

function get_tbta_public_tags($tagsonly=true) {

  $tags = array(
    array(
      'name' => 'administration response',
      'description' => 'Documents and other materials related to actions and reactions of UVA administrators and other university officials in response to charges or incidences of sexual violence. Includes but is not limited to documentation of changes in official policies and articles published in student, local, and national media. This tag is also used in concert with the “race” tag to indicate administrative responses to racial incidents.'),
    array(
      'name' => 'Greek life',
      'description' => 'Materials pertaining to fraternity and sorority life at UVA, as they relate to issues of sexual violence. We include this tag to encourage a fair but thorough investigation of the relationship of Greek life to reports of sexual violence.'
    ),
    array(
      'name' => 'LGBTQ Community',
      'description' => 'Materials documenting the intersection of UVA’s LGBTQ community with issues of sexual violence. This tag is also applied to all of the items in the archive’s LGBTQ Center Collection, which covers a broader and more general field of information about LGBTQ life at UVA. We include this tag to encourage research and scholarship at the intersection of LGBTQ concerns, gender discrimination, and sexual violence.'
    ),
    array(
      'name' => 'national media',
      'description' => 'National media includes all media that is not considered a student publication. This includes local media outlets such as the Daily Progress and C’ville Weekly as well as major mass media outlets such as the Washington Post, New York Times, and other national news publications and sites.'
    ),
    array(
      'name' => 'personal account',
      'description' => 'The personal account tag identifies materials that constitute or include personal stories about experiences related to sexual violence, narrated or reported by the person involved. It does not include survivor stories, a category that has its own tag.'
    ),
    array(
      'name' => 'protests and demonstrations',
      'description' => 'Protests and demonstrations of all kinds, from marches to social media memes, related to sexual violence. This tag is also used in concert with the “race” tag to indicate protests and demonstrations related to race; and with the LGBTQ Community tag to indicate protests and demonstrations related to LGBTQ issues.'
    ),
    array(
      'name' => 'race',
      'description' => 'Identifies materials related to race. We include this tag to encourage research and scholarship at the intersection of race, gender discrimination, and sexual violence.'
    ),
    array(
      'name' => 'student publications',
      'description' => 'Print and digital publications produced by students at UVA. The vast majority are from the daily student newspaper, the Cavalier Daily, but other publications are also represented, including but not limited to University Journal, The Odyssey, and Iris Magazine. Articles published in UVa Today, a university publication, are not included.'
    ),
    array(
      'name' => 'survivor stories',
      'description' => 'First-person accounts of sexual violence by survivors.'
    ),
    array(
      'name' => 'advocacy',
      'description' => 'The advocacy tag recognizes activists of all kinds who work to prevent sexual violence and to support survivors. This includes advocacy efforts undertaken by UVA students, faculty, and staff as well as advocacy groups devoted specifically and institutionally to supporting survivors and educating bystanders.'
    )
  );

  return $tags;
}

function get_tbta_tags_for_select() {
    $tags_for_select = array();
    $tags = get_tbta_public_tags();

    foreach ($tags as $tag) {
        $tagname = $tag['name'];
        $tags_for_select[$tagname] = $tagname;
    }
    return $tags_for_select;
}

/**
 * Utility to compare name keys in two arrays. Found at:
 * http://stackoverflow.com/questions/5653241/using-array-intersect-on-a-multi-dimensional-array
 */
function compareDeepValue($val1, $val2)
{
   return strcmp($val1['name'], $val2['name']);
}

/**
 * Display only video files for an Item.
 *
 * Directly queries the File table for files associated with a given Item.
 * Checks the mime_type against an array of video types:
 *
 * - video/flv
 * - video/x-flv
 * - video/mp4
 * - video/webm
 * - video/wmv
 * - video/quicktime
 *
 * @uses file_markup()
 * @param array $options
 * @param array $wrapperAttributes
 * @param Item|null $item Check for this specific item record (current item if null).
 * @return string HTML
 */
function video_files_for_item($options = array(), $wrapperAttributes = array('class' => 'item-file'), $item = null)
{
    if (!$item) {
        $item = get_current_record('item');
    }

    $types = array(
        'video/flv', 'video/x-flv', 'video/mp4', 'video/m4v',
        'video/webm', 'video/wmv', 'video/quicktime'
    );

    $fileTable = get_db()->getTable('File');
    $select = $fileTable->getSelect();
    $select->where('files.item_id = ?', $item->id);
    $select->where('files.mime_type IN (?)', $types);

    $files = $fileTable->fetchObjects($select);

    return file_markup($files, $options, $wrapperAttributes);

}

/**
 * Determines if a given string is a useable date.
 *
 * @return bool
 */
function check_date_string($string)
{
    $time = strtotime($string);
    $date = ($time === false) ? false : $time;
    return $date;
}


/**
 * Makes dates more human useful.
 * 
 * @return Date
 */
function prettify_date($date, $date_format="F j, Y")
{
  if ($date){
    return date($date_format, check_date_string($date));
  }
  return false;
}