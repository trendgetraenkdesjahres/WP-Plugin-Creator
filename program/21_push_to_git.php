<?php
// push into fresh repo project?

ask('you want to push to the git repo?','box');
if(get_last_answer() != 'yes')
{
    die("\n  ciao :(\n\n");
}
echo_s('setup:');

echo_s('domain','no_eol');
echo_s($config['git_config']['domain']);

echo_s('namespace','no_eol');
echo_s($config['git_config']['namespace']);

echo_s('mode','no_eol');
echo_s($config['git_config']['mode']);

$project_name = strtolower($config['plugin']['prefix'])."_".strtolower(get_answer('plugin_acronym'))."_plugin";
echo_s('project name','no_eol');
echo_s($project_name);

echo_s('user name','no_eol');
echo_s(get_answer('user_name'));

ask('is everthing looking okkk?');
if(get_last_answer() != 'yes')
{
    die("\n  ciao :(\n\n");
}

switch($config['git_config']['mode'])
{
    case 'ssh':
        $upstream = 'git@';
    case 'https':
        $upstream = 'https://';
    default:
        $upstream .= 
        $config['git_config']['domain'].'/'.
        $config['git_config']['namespace'].'/'.
        $project_name.'.git';
}
$command = 'git push --set-upstream '.$upstream.' main';

// run!
echo_bash($command);