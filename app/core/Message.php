<?php

class Message
{
    public static function setMessage($name, $message, $color)
    {
        $_SESSION[$name] = [
            'message' => $message,
            'color' => $color
        ];
    }

    public static function getMessage($name)
    {
        if (isset($_SESSION[$name])) {
            echo '<div class="alert alert-' . $_SESSION[$name]['color'] . '" role="alert">
                    ' . $_SESSION[$name]['message'] . '
                </div>';
            unset($_SESSION[$name]);
        }
    }
}
