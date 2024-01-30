<?php
// let's go?
ask('start to create files, folder and stuff?','ready','box');
if(get_last_answer() != 'yes')
{
    die("\n  ciaoi :(\n\n");
}

create_files();
echo_s('success!!');