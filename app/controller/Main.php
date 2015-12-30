<?php

class Main extends Controller{

    function index()
    {
        load_template('header', array('title' => 'home'));
        load_view('home');
        load_template('footer');
    }
}
