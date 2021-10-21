<?php 
    //Start Session
    if(!isset($_SESSION)){
        session_start();
    }


    //Create Constants to Store Non Repeating Values
    $localhost = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'database';

    
    $conn = new mysqli($localhost,$username, $password , $db_name  ) ; //Database Connection
    // define('SITEURL', 'http://localhost/rsc/');
