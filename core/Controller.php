<?php
/**
 * Created by PhpStorm.
 * User: ali
 * Date: 15-10-31
 * Time: 10:54 AM
 */

class Controller{
    public $db;

    function __construct(){
        $this->db = st_db_object();
        session_start();
    }
}