<?php
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
{
    echo "ERROR\n";
}
else
{
    if (!file_exists('../htdocs/')) {
        mkdir('../htdocs/');
    }
    if (!file_exists('../htdocs/private')) {
        mkdir('../htdocs/private');
    }
    $users = unserialize(file_get_contents('../htdocs/private/passwd'));
    $exist   = false;
    foreach ($users as $key => $user) {
        if ($user['login'] === $_POST['login']) {
            $exist = true;
        }
    }
    if ($exist) {
        echo "ERROR\n";
    } else {
        $users[] = array('login' => $_POST['login'], 'passwd' => hash('whirlpool', $_POST['passwd']));
        file_put_contents('../htdocs/private/passwd', serialize($users));
        echo "OK\n";
    }
}