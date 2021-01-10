<?php
function redirect($path)
{
    header("Location:" . BASEURL . $path);
}

function titleNotFound($file, $data)
{
    require $file;
}

function old($name)
{
    return isset($_POST[$name]) ? $_POST[$name] : '';
}
