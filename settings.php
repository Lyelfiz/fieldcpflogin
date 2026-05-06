<?php

defined('MOODLE_INTERNAL') || die();
global $CFG;

if ($hassiteconfig) {

    //create settings page
    $settings = new admin_settingpage('authsettingfieldcpflogin', get_string('pluginname', 'auth_fieldcpflogin'));

    if ($ADMIN->fulltree) {
        // No settings for now, but we can add some in the future if needed
        $settings->add(new admin_setting_heading(
            'auth_fieldcpflogin/instructions',
            get_string('instructions', 'auth_fieldcpflogin'),
            get_string('settings_desc', 'auth_fieldcpflogin')
        ));
    }

        // Add developer info with version
        $plugininfo = core_plugin_manager::instance()->get_plugin_info('auth_fieldcpflogin');

        $settings->add(new admin_setting_heading(
            'auth_fieldcpflogin/enable_plugin',
            get_string('enable_plugin', 'auth_fieldcpflogin'),
            get_string('enable_plugin_desc', 'auth_fieldcpflogin')
        ));

        $settings->add(new admin_setting_heading(
            'auth_fieldcpflogin/developer_info',
            get_string('developer_info', 'auth_fieldcpflogin'),
            get_string('developer_info_desc', 'auth_fieldcpflogin') . '<br><strong>' . get_string('developer_info_version', 'auth_fieldcpflogin') . $plugininfo->release . '</strong>'
        ));

    $ADMIN->add('authsettings', $settings);
}