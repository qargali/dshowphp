<?php
require 'Database.php';
//Start the session
session_start();

//Ondemand Class Loader

spl_autoload_register(function($c){
    require '../'.preg_replace("/\\\/","/",$c).'.php';
});

$url=$_GET['url'];
unset($_GET['url']);
