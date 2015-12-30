<?php

if ( PA_APP_STATUS == 'deployed' ) {
    @ini_set("display_errors", 0);
} else {
    @ini_set("display_errors", 1);
}

st_bootstrap();



function st_bootstrap()
{
    date_default_timezone_set('America/Vancouver');

    global $db;
    require_once PA_CORE_LIB_DIR . 'MysqliDb.php';
    $db = new MysqliDb (PA_MYSQL_HOSTNAME, PA_MYSQL_USERNAME, PA_MYSQL_PASSWORD, PA_MYSQL_DATABASE);
}

function st_db_object()
{
    global $db;

    return $db;
}
