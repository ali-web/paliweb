<?php

class Http {

    function __construct()
    {

    }

    function redirect($to, $permanent = false)
    {
        if ($permanent)
            header("HTTP/1.1 301 Moved Permanently");

        header('Location:' . $to);
        exit;
    }

    function notFound($message = '')
    {
        header("HTTP/1.0 404 Not Found");

        $title = "404 Not Found";
        load_template('header', ['title' => $title, 'message' => $message]);

        load_view('not_found');

        load_template('footer');
    }

    function requestHeader($key)
    {
        $headers = apache_request_headers();
        return (iseset($headers[$key])) ? $headers[$key] : null;
    }

    function responseHeader($key)
    {
        $headers = get_headers();
        return (iseset($headers[$key])) ? $headers[$key] : null;
    }

    function isAjax()
    {
        return $this->requestHeader('X-Requested-With') === 'XMLHttpRequest';
    }
}