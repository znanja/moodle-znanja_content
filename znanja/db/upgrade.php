<?php
/**
 * Plugin upgrade logic.
 *
 * @package  mod_znanja
 * @author   znanja, inc.  {@link https://znanja.com}
 * @license  See LICENSE.txt
 */

function xmldb_znanja_upgrade($oldversion = 0) {
    global $DB;

    $dbman = $DB->get_manager();

    // 2013031400 -> 2013040300
    // Add required course and name fields
    if ($oldversion < 2013040300) {
        $table = new xmldb_table('znanja');

        $field = new xmldb_field(
            'course', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, null, null,
            'id'
        );
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        $field = new xmldb_field(
            'name', XMLDB_TYPE_CHAR, '255', null, XMLDB_NOTNULL, null, null,
            'course'
        );
        if (!$dbman->field_exists($table, $field)) {
            $dbman->add_field($table, $field);
        }

        upgrade_mod_savepoint(true, 2013040300, 'znanja');
    }
}
