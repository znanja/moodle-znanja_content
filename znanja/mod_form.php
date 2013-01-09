<?php
/**
 * Activity form definition.
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

if (!defined('MOODLE_INTERNAL')) {
    die('Direct access to this script is forbidden.');
}

require_once($CFG->dirroot.'/mod/scorm/mod_form.php');

define('IFRAME_URL', 'https://znanja.com/plugin');

class mod_znanja_mod_form extends mod_scorm_mod_form {

    function definition() {
        parent::definition();

        // Packages are fetched from an external URL, so the localsync setting
        // must be enabled
        $scorm_config = get_config('scorm');
        if (!$scorm_config->allowtypelocalsync) {
            print_error('localsyncdisabled', 'znanja');
        } else {
            global $CFG;
            $mform = $this->_form;

            $mform->insertElementBefore(
                $mform->createElement('header', 'znanja', 'znanja'), 'general'
            );

            $mform->insertElementBefore(
                $mform->createElement(
                    'html',
                    '<iframe id="znanja-iframe" src="'.IFRAME_URL.'"'.
                    ' style="border: 1px solid #eee; height: 600px;'.
                    '        width: 100%;"></iframe>'
                ), 'general'
            );

            // Setup these fields so that the only way to import a SCORM package
            // using this form is via a URL
            $mform->removeElement('scormtype');
            $mform->addElement('hidden', 'scormtype', 'localsync');

            $mform->removeElement('packageurl');
            $mform->addElement('hidden', 'packageurl');

            $mform->removeElement('packagefile');

            // API for iframe to populate Moodle form
            $mform->addElement(
                'html',
                "<script src='$CFG->wwwroot/mod/znanja/api.js'></script>"
            );
        }
    }

    function set_data($default_values) {
        global $DB;

        $default_values = (array)$default_values;

        // Ensure the imported package is recognized as a SCORM package by
        // setting "module" to the same ID as the "scorm" module
        $module = $DB->get_record('modules', array('name' => 'scorm'));

        if ($module === FALSE) {
            print_error('scormmodulenotfound', 'znanja');
        } else {
            $default_values['module'] = $module->id;
        }

        parent::set_data($default_values);
    }

}
