<?php
require_once 'db.php';
require_once 'functions.php';

$emailbypost= $_POST['email'];
$role= $_POST['role'];

if (isset($role)){
    updateUser($users,$emailbypost,$role,$usersFile);
    header("Location:index.php");
}