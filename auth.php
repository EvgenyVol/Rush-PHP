<?php
function auth($login, $passwd) {
    if (!$login || !$passwd) {
        return FALSE;
    }
    $users = unserialize(file_get_contents('../htdocs/private/passwd'));
    foreach ($users as $key => $user) {
        if ($user['login'] === $login && $user['passwd'] === hash('whirlpool', $passwd)) {
            return TRUE;
        }
    }
    return FALSE;
}
?>