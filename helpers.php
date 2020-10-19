<?php

function dd($data)
{
    var_dump($data);
    exit();
}

function action()
{
    if (isset($_SERVER['REQUEST_URI'])) {
        return count(explode('/', $_SERVER['REQUEST_URI'])) > 1 ? explode('/', $_SERVER['REQUEST_URI'])[1] : $_SERVER['REQUEST_URI'];
    }
    return '';
}

function id()
{
    if (isset($_SERVER['REQUEST_URI'])) {
        return count(explode('/', $_SERVER['REQUEST_URI'])) > 2 ? explode('/', $_SERVER['REQUEST_URI'])[2] : null;
    }
    return null;
}

function old($value, $default = null)
{
    if (isset($_SESSION[$value])) {
        return $_SESSION[$value];
    } else if (!empty($default)) {
        return $default;
    }
}
