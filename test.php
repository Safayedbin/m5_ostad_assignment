<?php
session_start();
require_once 'db.php';

print_r( $users);
//echo $_SESSION['email'];
//echo $_SESSION['role'];
foreach ($_SESSION as $key=>$val){
    echo $key." ".$val."\n";}