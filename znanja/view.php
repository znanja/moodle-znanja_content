<?php
/**
 * view.php implementation.
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

require_once('../../config.php');

// Just redirect the user to the SCORM player
$id = required_param('id', PARAM_INT);
redirect("$CFG->wwwroot/mod/scorm/view.php?id=$id");
