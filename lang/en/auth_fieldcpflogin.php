<?php

/**
 * Language file.
 *
 * @package   auth_fieldcpflogin
 * @copyright 2026 Lyelfiz - LHCV - contact: https://github.com/Lyelfiz/cpfformat
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$enableformatlogin = '<a href="' . $CFG->wwwroot . '/admin/settings.php?section=manageauths" target="_blank">Administration → Plugins → Authentication → Manage Authentication</a>';

$string['pluginname'] = 'Login for custom profile field CPF';

$string['instructions'] = 'Instructions';
$string['settings_desc'] = 'This plugin allows users to log in using their CPF number, which is stored in a custom profile field. To use it, simply enter your CPF (only numbers) in the username field on the login page. The plugin will find the associated username and log you in as usual.';

$string['enable_plugin'] = 'Enable CPF Login';
$string['enable_plugin_desc'] = 'For enable this plugin, go to ' . $enableformatlogin . ' and enable the "Login by CPF" method. <br><strong>Note:</strong> This plugin needs to be enabled and set with higher priority than Email-based self-registration to work.';

$string['developer_info'] = 'Developer Information';
$string['developer_info_desc'] = 'Developed by Lyelfiz - Luiz Henrique Carvalho Vacilio<br>For updates and support, visit the GitHub repository: <a href="https://github.com/Lyelfiz/fieldcpflogin" target="_blank">https://github.com/Lyelfiz/fieldcpflogin</a>';
$string['developer_info_version'] = 'Version: ';