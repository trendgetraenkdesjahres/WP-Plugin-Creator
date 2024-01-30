<?php
ask('a good name for the plugin?','plugin_name', 'box');
ask('is "'.filter_acronymizer(get_answer('plugin_name')).'" a good acronym for "'.get_last_answer().'"?');
if(get_last_answer() != 'yes')
{
    ask('whats`s a better one?','plugin_acronym');
}
else
{
    set_answer(filter_acronymizer(get_answer('plugin_name')), 'plugin_acronym');
}
ask('some description?','plugin_description');
set_answer(get_bash('git config user.name'),'user_name');