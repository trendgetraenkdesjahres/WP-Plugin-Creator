<?php

global $config;

$plugin_init_file_name = 'includes/init.php';
$plugin_init_file_content = 
"<?php

/*
this file checks dependecies and neceserry set-ups
*/
";

$plugin_init_file = new FileImage($plugin_init_file_name);
$plugin_init_file->setContent($plugin_init_file_content);