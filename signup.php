<?php
session_start();
require_once 'db.php';
require_once 'functions.php';

$user=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
    if(!empty($user) && !empty($email) && !empty($password)){
        if(isset($users[$email])){
            echo 'hi';
           $_SESSION['error']='Email already exist';
           header("Location:index.php?form=signup");
        }
        else{
           $users[$email] = [
               'username' => $user,
               'password' => $password,
               'role'     => 'users',
           ];
           saveUser($users,$usersFile);
           $_SESSION['email'] = $email; 
           header("Location:index.php?form=login");
        }
   
    }
    else{
        $_SESSION['error']="The required inforjmation is not filled";
        header("Location:index.php?form=signup");
    }
    

