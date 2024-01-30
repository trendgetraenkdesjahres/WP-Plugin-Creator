<?php

global $config;

$plugin_admin_file_name = 'includes/admin.php';
$plugin_admin_file_content = 
"<?php

/*
this file creates the admin settings page for the plugin
*/

// add to menu
add_action('admin_menu', '".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_menu');
function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_menu()
{
    add_menu_page('".strtoupper($config['plugin']['prefix'])." ".get_answer('plugin_acronym')." Plugin', '".get_answer('plugin_acronym')."', 'manage_options', '".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."-plugin-admin-menu', '".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page', 'dashicons-upload');
}

// the admin page function
function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page()
{

    echo '<h1>".$config['plugin']['prefix']." ".get_answer('plugin_name')." Plugin Settings</h1>\n';

    ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_status();
    ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_save_options();

    echo \"<form method='post' action='\".\$_SERVER['PHP_SELF'].\"?page=".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."-plugin-admin-menu'>\";

    ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_save_button();

    echo '</form>';
}

function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_status()
{
    global \$".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin;

    if (is_array(\$".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin->status))
    {
        foreach(\$".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin->status as \$notification)
        {
            echo '<div class=\"notice notice-warning\">'.\$notification.\"</div>\\n\";
        }
    }
}

function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_save_options()
{
    if(isset(\$_POST['submit']))
    {
        \$data = \$_POST;

    /* *
     * EXAMPLE:
     *  \$save_me = array();
     *  foreach(\$data as \$key => \$value)
     *  {
     *      //push
     *      array_push(\$save_me, \$value);
     *  }
     *  update_option('".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."-settings',serialize(\$save_me));
     */
    }


}

function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_admin_page_save_button()
{
    echo \"<p class='submit'>\\n\";
    echo \"<input type='submit' name='submit' id='submit' class='button button-primary' value='\".__('Save Changes','WordPress').\"'>\\n\";
    echo \"</p>\\n\";
}

";

$plugin_admin_file = new FileImage($plugin_admin_file_name);
$plugin_admin_file->setContent($plugin_admin_file_content);