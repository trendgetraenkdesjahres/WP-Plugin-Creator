<?php

global $config;

$plugin_functions_file_name = 'functions.php';
$plugin_functions_file_content =
"<?php

/*
* this file contains some function - i do not know where to put them else
*
*/

/**
 * Gets options for the ".get_answer('plugin_name')." Plugin.
 *
 * @param   string  \$option_name key of the option.
 *
 * @return  mixed                value of the option
 */
function get_".strtolower(get_answer('plugin_acronym'))."_option(string \$option_name)
{
    $".strtolower(get_answer('plugin_acronym'))."_options = unserialize(get_option('".strtolower(get_answer('plugin_acronym'))."_option'));
    foreach($".strtolower(get_answer('plugin_acronym'))."_options  as  \$key => $".strtolower(get_answer('plugin_acronym'))."_option)
    {
        if(\$key == \$option_name)
        {
            return $".strtolower(get_answer('plugin_acronym'))."_option;
        }
    }
    return false;
}

/**
 * Gets status infos for the ".get_answer('plugin_name')." Plugin.
 *
 * @return  array              status notifications
 */
function get_".strtolower(get_answer('plugin_acronym'))."_plugin_status()
{
    $".strtolower(get_answer('plugin_acronym'))."_plugin_status = unserialize(get_option('".strtolower(get_answer('plugin_acronym'))."_plugin_status'));
    return $".strtolower(get_answer('plugin_acronym'))."_plugin_status;
}
";

$plugin_functions_file = new FileImage($plugin_functions_file_name);
$plugin_functions_file->setContent($plugin_functions_file_content);
