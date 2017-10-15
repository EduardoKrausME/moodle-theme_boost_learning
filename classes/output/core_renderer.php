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

namespace theme_boostb\output;

defined('MOODLE_INTERNAL') || die;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_boostb
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    public function should_display_navbar_logo1() {
        if (get_config('theme_boostb', 'logo1')) {
            return true;
        }

        return false;
    }

    public function get_logo_url1() {
        $imageurl = $this->page->theme->setting_file_url('logo1', 'logo1');
        if (!empty($imageurl)) {
            return $imageurl;
        }
    }

    public function should_display_navbar_logo2() {
        if (get_config('theme_boostb', 'logo2')) {
            return true;
        }

        return false;
    }

    public function get_logo_url2() {
        $imageurl = $this->page->theme->setting_file_url('logo2', 'logo2');
        if (!empty($imageurl)) {
            return $imageurl;
        }
    }
}
