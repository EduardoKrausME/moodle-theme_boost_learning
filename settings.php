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
 * @package   theme_boost_learning
 * @copyright 2017 Eduardo Kraus
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// This line protects the file from being accessed by a URL directly.
defined('MOODLE_INTERNAL') || die();

// This is used for performance, we don't need to know about these settings on every page in Moodle, only when
// we are looking at the admin settings pages.
if ($ADMIN->fulltree) {
    $settings = new theme_boost_admin_settingspage_tabs('themesettingboost_learning',
        get_string('configtitle', 'theme_boost_learning'));
    $page = new admin_settingpage('theme_boost_learning_general', get_string('generalsettings', 'theme_boost_learning'));

    // logo file setting.
    $name        = 'theme_boost_learning/logo1';
    $title       = get_string ( 'logo1', 'theme_boost_learning' );
    $description = get_string ( 'logo1desc', 'theme_boost_learning' );
    $setting     = new admin_setting_configstoredfile( $name, $title, $description, 'logo1', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'svg')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);

    $name        = 'theme_boost_learning/logo2';
    $title       = get_string ( 'logo2', 'theme_boost_learning' );
    $description = get_string ( 'logo2desc', 'theme_boost_learning' );
    $setting     = new admin_setting_configstoredfile( $name, $title, $description, 'logo2', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'svg')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);

    $name = 'theme_boost_learning/favicon';
    $title = get_string ( 'favicon', 'theme_boost_learning' );
    $description = get_string ( 'favicondesc', 'theme_boost_learning' );
    $setting = new admin_setting_configstoredfile( $name, $title, $description, 'favicon', 0,
        array('maxfiles' => 1, 'accepted_types' => array('png', 'jpg', 'ico')));
    $setting->set_updatedcallback ( 'theme_reset_all_caches' );
    $page->add($setting);


    // @headerColor setting.
    $name = 'theme_boost_learning/headercolor';
    $title = get_string('headercolor', 'theme_boost_learning');
    $description = get_string('headercolor_desc', 'theme_boost_learning');
    $default = '#2196f3';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // @textColor setting.
    $name = 'theme_boost_learning/textcolor';
    $title = get_string('textcolor', 'theme_boost_learning');
    $description = get_string('textcolor_desc', 'theme_boost_learning');
    $default = '#FFFFFF';
    $setting = new admin_setting_configcolourpicker($name, $title, $description, $default, null, false);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);


    // Add tab icons.
    $settings->add($page);

    // Icons.
    $page = new admin_settingpage('theme_boost_learning_icons', get_string('icons', 'theme_boost_learning'));

    $icons = [
        'android' => "Google Play Store",
        'apple' => 'Apple App Store',
        'youtube' => 'YouTube',
        'pinterest' => 'Pinterest',
        'linkedin' => 'LinkedIn',
        'instagram' => 'Instagram',
        'flickr' => 'Flickr',
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'website' => 'Website',
    ];

    foreach ($icons as $icon => $iconname) {
        $name = "theme_boost_learning/icon_{$icon}";
        $title = get_string("icon", 'theme_boost_learning', $iconname);
        $description = get_string('icondesc', 'theme_boost_learning', $iconname);
        $default = '';
        $setting = new admin_setting_configtext($name, $title, $description, $default);
        $page->add($setting);
    }


    // Must add the page after definiting all the settings!
    $settings->add($page);

    // Advanced settings.
    $page = new admin_settingpage('theme_boost_learning_advanced', get_string('advancedsettings', 'theme_boost_learning'));

    // Raw SCSS to include before the content.
    $setting = new admin_setting_scsscode('theme_boost_learning/scsspre',
        get_string('rawscsspre', 'theme_boost_learning'), get_string('rawscsspre_desc', 'theme_boost_learning'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    // Raw SCSS to include after the content.
    $setting = new admin_setting_scsscode('theme_boost_learning/scss', get_string('rawscss', 'theme_boost_learning'),
        get_string('rawscss_desc', 'theme_boost_learning'), '', PARAM_RAW);
    $setting->set_updatedcallback('theme_reset_all_caches');
    $page->add($setting);

    $settings->add($page);
}
