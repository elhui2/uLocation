<?php

/**
 * friendly_url_helper.php
 * @version 1.1.5
 * @param string $title
 * Crea el url a partir del nombre
 */
defined('BASEPATH') or exit('No direct script access allowed');

function friendly_url($title) {
    $title = str_replace(array('[\', \']'), '', $title);
    $title = preg_replace('/\[.*\]/U', '', $title);
    $title = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $title);
    $title = htmlentities($title, ENT_COMPAT, 'utf-8');
    $title = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $title);
    $title = preg_replace(array('/[^a-z0-9]/i', '/[-]+/'), '-', $title);
    return strtolower(trim($title, '-'));
}