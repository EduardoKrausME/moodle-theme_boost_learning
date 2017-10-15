<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * @package   theme_boostb
 * @copyright 2016 Ryan Wyllie
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboostb', get_string('configtitle', 'theme_boostb'));
    $page = new admin_settingpage('theme_boostb_general', get_string('generalsettings', 'theme_boostb'));


    // logo file setting.
    $name        = 'theme_boostb/logo1';
    $title       = get_string ( 'logo1', 'theme_boostb' );
    $description = get_string ( 'logo1desc', 'theme_boostb' );
    $setting     = new admin_setting_configstoredfile( $name, $title, $description, 'logo1', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'svg')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);

    $name        = 'theme_boostb/logo2';
    $title       = get_string ( 'logo2', 'theme_boostb' );
    $description = get_string ( 'logo2desc', 'theme_boostb' );
    $setting     = new admin_setting_configstoredfile( $name, $title, $description, 'logo2', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'svg')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);

    $name = 'theme_boostb/favicon';
    $title = get_string ( 'favicon', 'theme_boostb' );
    $description = get_string ( 'favicondesc', 'theme_boostb' );
    $setting = new admin_setting_configstoredfile( $name, $title, $description, 'favicon', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'ico')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);


    // @headerColor setting.
    $name = 'theme_boostb/headercolor';
    $title = get_string('headercolor', 'theme_boostb');
    $description = get_string('headercolor_desc', 'theme_boostb');
    $default = '#2196f3';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @textColor setting.
    $name = 'theme_boostb/textcolor';
    $title = get_string('textcolor', 'theme_boostb');
    $description = get_string('textcolor_desc', 'theme_boostb');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_boostb_advanced', get_string('advancedsettings', 'theme_boostb'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_boostb/scsspre',
        get_string('rawscsspre', 'theme_boostb'), get_string('rawscsspre_desc', 'theme_boostb'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_boostb/scss', get_string('rawscss', 'theme_boostb'),
        get_string('rawscss_desc', 'theme_boostb'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
