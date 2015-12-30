<?php

//echo "UNDER CONSTRUCTION for 5 MINUTES...";
//exit;

//@ini_set('display_errors', 0);

define('PA_BASE_DIR', dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __DIR__ : $_SERVER['SCRIPT_FILENAME']).'/');
define('PA_CORE_DIR', PA_BASE_DIR . 'core/');
define('PA_APP_DIR' , PA_BASE_DIR . 'app/');

require PA_CORE_DIR . 'paliweb.php';