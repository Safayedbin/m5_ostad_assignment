<?php

require_once 'functions.php';
require_once 'db.php';
session_start();

 
$func= $_GET['call'];
$email= $_GET['email'];


switch($func)
{
    case 'logout':
        logout();
    break;
    case 'delete':
        deleteUser($users,$email,$usersFile);
    break;
}
