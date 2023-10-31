<?php
session_start();
require_once 'db.php';
require_once 'functions.php';


$email=$_POST['email'];
$password=$_POST['password'];
    if(!empty($email) && !empty($password)){
        if(!isset($users[$email])){
           $_SESSION['error']='Email does not exist';
           header("Location:index.php?form=login");
        }
        else{
           if($password == $users[$email]['password']){
           $_SESSION['email'] = $email;
           $_SESSION['role'] = $users[$email]['role'];
           $_SESSION['success'] = 'Successfully login';
           $_SESSION['logged_in']= true;
           header("Location:index.php?form=login&test=success");
           }
           else{
            $_SESSION['error']='Password does not match';
           header("Location:index.php?form=login&test=password");
           }
        }
   
    }
    else{
        $_SESSION['error']="The required inforjmation is not filled";
        header("Location:index.php?form=login");
        
    }
    

