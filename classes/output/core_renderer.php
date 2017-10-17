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

namespace theme_boost_learning\output;

defined('MOODLE_INTERNAL') || die;

/**
 * Renderers to align Moodle's HTML with that expected by Bootstrap
 *
 * @package    theme_boost_learning
 * @copyright  2012 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class core_renderer extends \theme_boost\output\core_renderer {

    /**
     * @return string
     */
    public function favicon() {
        return $this->page->theme->setting_file_url('favicon', 'favicon');
    }

    /**
     * @return bool
     */
    public function should_display_navbar_logo1() {
        if (get_config('theme_boost_learning', 'logo1')) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function get_logo_url1() {
        $imageurl = $this->page->theme->setting_file_url('logo1', 'logo1');
        if (!empty($imageurl)) {
            return $imageurl;
        }
    }

    /**
     * @return bool
     */
    public function should_display_navbar_logo2() {
        if (get_config('theme_boost_learning', 'logo2')) {
            return true;
        }

        return false;
    }

    /**
     * @return string
     */
    public function get_logo_url2() {
        $imageurl = $this->page->theme->setting_file_url('logo2', 'logo2');
        if (!empty($imageurl)) {
            return $imageurl;
        }
    }

    /**
     * @return string
     */
    public function get_icons_footer() {
        $returnicones = '';

        foreach ($this->page->theme->settings as $iconname => $setting) {
            if (strpos($iconname, 'icon_') === 0) {
                if (!empty($setting)) {

                    $icon = str_replace('icon_', '', $iconname);

                    if ($icon == 'website') {
                        $returnicones .= '<a target="_blank" href="' . $setting . '"><span
                                             class="footer-icon ' . $icon . '"><i class="material-icons">pages</i></span></a>';
                    } else {
                        $returnicones .= '<a target="_blank" href="' . $setting . '"><span
                                             class="footer-icon ' . $icon . '"><i class="fa fa-' . $icon . '"></i></span></a>';
                    }
                }
            }
        }

        return "<div class=\"icones\">$returnicones</div>";
    }
}
