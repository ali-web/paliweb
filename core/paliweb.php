<?php

require_once PA_APP_DIR . 'config.php';
require_once PA_APP_DIR . 'config-depending.php';
require_once PA_CORE_DIR . 'bootstrap.php';
require_once PA_CORE_DIR . 'functions.php';
require_once PA_CORE_LIB_DIR     . 'Http.php';
require_once PA_LIB_DIR     . 'StoryTime.php';
require_once PA_CORE_DIR . 'Controller.php';
//require_once PA_CORE_DIR . 'auth.php';

function pa_handler(){
    $uri = $_SERVER['REQUEST_URI'];
    $uri = substr($uri, 1);
    //$parsed = parse_url($uri);
    //$uri_path = $parsed['path'];
    $uri_segment = explode('/', $uri);

    $class = 'Main';
    $method = 'index';
    $arguments = array();

    if (isset($uri_segment[0]) && $uri_segment[0]) $class = $uri_segment[0];
    if (isset($uri_segment[1]) && $uri_segment[1]) $method = $uri_segment[1];
    if (isset($uri_segment[2]) && $uri_segment[2]) $arguments = array_slice($uri_segment, 2);


    //echo $class . $method; exit;

    if(file_exists(PA_CONTROLLER_DIR . $class . '.php')){
        //echo 'hi'; return;
        require_once PA_CONTROLLER_DIR . $class . '.php';

        $controller = new $class;

        if (method_exists($controller, $method)){
            call_user_func_array(array($controller, $method), $arguments);
        } else{
            Http::notFound();
        }
/*      page_protect();
        load_template('header', ['title' => 'hi']);
        load_view('');
        load_template('footer');*/
    } elseif ((g('rt') == 'ajax' && file_exists(PA_AJAX_DIR . $uri_segment[0]))) {
        require_once PA_AJAX_DIR . $uri_segment[0] . '.php';

        if (function_exists($uri_segment[1])){
            call_user_func($uri_segment[1]);
        } else{
            Http::notFound();
        }
    } else{
        Http::notFound();
    }
}


function request_handler()
{
    global $routes;


}

pa_handler();
