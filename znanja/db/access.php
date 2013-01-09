<?php
/**
 * Capabilities definition.
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

$capabilities = array(
    'mod/znanja:addinstance' => array(
        'riskbitmask' => RISK_XSS,
        'captype' => 'write',
        'contextlevel' => CONTEXT_COURSE,
        'archetypes' => array(
            'editingteacher' => CAP_ALLOW,
            'manager' => CAP_ALLOW
        ),
        'clonepermissionsfrom' => 'moodle/course:manageactivities'
    )
);
