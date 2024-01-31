<?php

if (!function_exists('passwordEncrypt')) {
    function passwordEncrypt($password)
    {
        return base64_encode($password);
    }
}
