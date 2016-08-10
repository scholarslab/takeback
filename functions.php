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
    'administrative response' => 'Documents and other materials related to actions and reactions of UVA administrators and other university officials in response to charges or incidences of sexual violence. Includes but is not limited to documentation of changes in official policies and articles published in student, local, and national media. This tag is also used in concert with the “race” tag to indicate administrative responses to racial incidents.',
    'Greek life' => 'Materials pertaining to fraternity and sorority life at UVA, as they relate to issues of sexual violence. We include this tag to encourage a fair but thorough investigation of the relationship of Greek life to reports of sexual violence.',
    'LGBTQ Community' => 'Materials documenting the intersection of UVA’s LGBTQ community with issues of sexual violence. This tag is also applied to all of the items in the archive’s LGBTQ Center Collection, which covers a broader and more general field of information about LGBTQ life at UVA. We include this tag to encourage research and scholarship at the intersection of LGBTQ concerns, gender discrimination, and sexual violence.',
    'national media' => 'National media includes all media that is not considered a student publication. This includes local media outlets such as the Daily Progress and C’ville Weekly as well as major mass media outlets such as the Washington Post, New York Times, and other national news publications and sites.',
    'personal account' => 'The personal account tag identifies materials that constitute or include personal stories about experiences related to sexual violence, narrated or reported by the person involved. It does not include survivor stories, a category that has its own tag.',
    'protests and demonstrations' => 'Protests and demonstrations of all kinds, from marches to social media memes, related to sexual violence. This tag is also used in concert with the “race” tag to indicate protests and demonstrations related to race; and with the LGBTQ Community tag to indicate protests and demonstrations related to LGBTQ issues.',
    'race' => 'Identifies materials related to race. We include this tag to encourage research and scholarship at the intersection of race, gender discrimination, and sexual violence.',
    'student publications' => 'Print and digital publications produced by students at UVA. The vast majority are from the daily student newspaper, the Cavalier Daily, but other publications are also represented, including but not limited to University Journal, The Odyssey, and Iris Magazine. Articles published in UVa Today, a university publication, are not included.',
    'survivor stories' => 'First-person accounts of sexual violence by survivors.',
    'advocacy' => 'The advocacy tag recognizes activists of all kinds who work to prevent sexual violence and to support survivors. This includes advocacy efforts undertaken by UVA students, faculty, and staff as well as advocacy groups devoted specifically and institutionally to supporting survivors and educating bystanders.'
  );

  if ($tagsonly) {
    return array_keys($tags);
  }
  
  return $tags;
}

