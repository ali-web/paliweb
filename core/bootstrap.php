<?php

if ( PA_APP_STATUS == 'deployed' ) {
    @ini_set("display_errors", 0);
} else {
    @ini_set("display_errors", 1);
}

st_bootstrap();



function st_bootstrap()
{
    define('PA_REQUESTED_DOMAIN', requestedDomain());
    define('PA_REQUESTED_LANG', requestedLang());

    date_default_timezone_set(PA_TIMEZONE);

    global $db;
    require_once PA_CORE_LIB_DIR . 'MysqliDb.php';
    $db = new MysqliDb (PA_MYSQL_HOSTNAME, PA_MYSQL_USERNAME, PA_MYSQL_PASSWORD, PA_MYSQL_DATABASE);

    global $lang_words;
    $lang_words = require_once PA_LANG_DIR . PA_REQUESTED_LANG . '/' . 'main.php';
}

function st_db_object()
{
    global $db;

    return $db;
}


function requestedDomain()
{
    if (isset($_SERVER['HTTP_HOST'])) {
        $fullHostName = $_SERVER['HTTP_HOST'];
    } elseif (isset($_SERVER['SERVER_NAME'])) {
        $fullHostName = $_SERVER['SERVER_NAME'];
    } else {
        $fullHostName = 'yon.ir'; //the default if site requested with ip or ...
    }

    return $fullHostName;
}

function requestedLang()
{
    return 'fa';
}


function lang($key)
{
    global $lang_words;

    return $lang_words[$key];
}
