<?php
/**
 * lib.php implementation.
 *
 * Adapted heavily from Martin Dougiamas' code - with thanks - by CGoodwin
 * For details/doc see scorm.
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

require_once("$CFG->dirroot/mod/scorm/lib.php");

function znanja_status_options($with_strings = false) {
    return scorm_status_options($with_strings);
}

function znanja_add_instance($scorm, $mform=null) {
    global $CFG, $DB;

    // Add new instance as a normal SCORM package
    $scorm->introformat=1;
    $scorm->add="scorm";
    $scorm->modulename="scorm";

    return scorm_add_instance($scorm, $mform);
}

function znanja_update_instance($scorm, $mform=null) {
    return scorm_update_instance($scorm, $mform);
}

function znanja_delete_instance($id) {
    return scorm_delete_instance($id);
}

function znanja_user_outline($course, $user, $mod, $scorm) {
    return scorm_user_outline($course, $user, $mod, $scorm);
}

function znanja_user_complete($course, $user, $mod, $scorm) {
    return scorm_user_complete($course, $user, $mod, $scorm);
}

function znanja_cron () {
    return scorm_cron();
}

function znanja_get_user_grades($scorm, $userid=0) {
    return scorm_get_user_grades($scorm, $userid);
}

function znanja_update_grades($scorm, $userid=0, $nullifnone=true) {
    return scorm_update_grades($scorm, $userid, $nullifnone);
}

function znanja_upgrade_grades() {
    return znanja_upgrade_grades();
}

function znanja_grade_item_update($scorm, $grades=null) {
    return scorm_grade_item_update($scorm, $grades=null);
}

function znanja_grade_item_delete($scorm) {
    return scorm_grade_item_delete($scorm);
}

function znanja_get_view_actions() {
    return scorm_get_view_actions();
}

function znanja_get_post_actions() {
    return array();
}

function znanja_option2text($scorm) {
    return scorm_option2text($scorm);
}

function znanja_reset_course_form_definition(&$mform) {
    return scorm_reset_course_form_definition($mform);
}

function znanja_reset_course_form_defaults($course) {
    return array('reset_scorm'=>1);
}

function znanja_reset_gradebook($courseid, $type='') {
    return scorm_reset_gradebook($courseid, $type);
}

function znanja_reset_userdata($data) {
    return scorm_reset_userdata($data);
}

function znanja_get_extra_capabilities() {
    return scorm_get_extra_capabilities();
}

function znanja_get_file_areas($course, $cm, $context) {
    return scorm_get_file_areas($course, $cm, $context);
}

function znanja_get_file_info($browser, $areas, $course, $cm, $context, $filearea, $itemid, $filepath, $filename) {
    return scorm_get_file_info($browser, $areas, $course, $cm, $context, $filearea, $itemid, $filepath, $filename);
}

function znanja_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, array $options=array()) {
    return scorm_pluginfile($course, $cm, $context, $filearea, $args, $forcedownload, $options);
}

function znanja_supports($feature) {
    return scorm_supports($feature);
}

function znanja_debug_log_filename($type, $scoid) {
    return scorm_debug_log_filename($type, $scoid);
}

function znanja_debug_log_write($type, $text, $scoid) {
    return scorm_debug_log_write($type, $text, $scoid);
}

function znanja_debug_log_remove($type, $scoid) {
    return scorm_debug_log_remove($type, $scoid);
}

function znanja_print_overview($courses, &$htmlarray) {
    return scorm_print_overview($courses, $htmlarray);
}

function znanja_page_type_list($pagetype, $parentcontext, $currentcontext) {
    return scorm_page_type_list($pagetype, $parentcontext, $currentcontext);
}

function znanja_version_check($scormversion, $version='') {
    return scorm_version_check($scormversion, $version='');
}

function znanja_get_completion_state($course, $cm, $userid, $type) {
    return scorm_get_completion_state($course, $cm, $userid, $type);
}

function znanja_dndupload_register() {
    return scorm_dndupload_register();
}

function znanja_dndupload_handle($uploadinfo) {
    return scorm_dndupload_handle($uploadinfo);
}

function znanja_set_completion($scorm, $userid, $completionstate = COMPLETION_COMPLETE, $grades = array()) {
    return scorm_set_completion($scorm, $userid, $completionstate = COMPLETION_COMPLETE, $grades );
}
