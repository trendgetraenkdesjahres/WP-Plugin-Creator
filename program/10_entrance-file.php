<?php

global $config;

$plugin_entrance_file_name = filter_underscoreFilename($config['plugin']['prefix'].'-'.get_answer('plugin_name').'.php');
$plugin_entrance_file_content = 
"<?php
/*
Plugin Name: ".$config['plugin']['prefix'].' '.get_answer('plugin_name')."
Description: ".get_answer('plugin_description')."
Author: ".get_answer('user_name')."
Version: 0.1
*/

class ".ucwords($config['plugin']['prefix']).get_answer('plugin_acronym')."
{
    public \$status;

    //add more properties here

    public function __construct()
    {
        \$this->require_files();
        \$this->status = \$this->init();
        if(\$this->status === 'ok')
        {
            // run some nice methods here
        }
    }

    private function require_files(){
        // include required files 😘
        require plugin_dir_path( __FILE__ ) . 'functions.php';
        require plugin_dir_path( __FILE__ ) . 'includes/init.php';
        require plugin_dir_path( __FILE__ ) . 'includes/admin.php';
    }

    protected function init()
    {
        \$status = 'ok';

        if(!is_admin() && !get_".strtolower(get_answer('plugin_acronym'))."_plugin_status())
        {
            return;
        }

    /* *
     * EXAMPLE: 
     *  if(!check_dependency())
     *  {
     *      if(!is_array(\$status))
     *      {
     *          \$status = array();
     *      }
     *      array_push(\$status, 'dependency is not working');
     *  }
    */

        update_option('".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin_status',serialize(\$status));
        return \$status;
    }
}

add_action('init','".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_init');
function ".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_init()
{
    $".strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin = new ".ucwords($config['plugin']['prefix']).get_answer('plugin_acronym').";
}


";

$plugin_entrance_file = new FileImage($plugin_entrance_file_name);
$plugin_entrance_file->setContent($plugin_entrance_file_content);