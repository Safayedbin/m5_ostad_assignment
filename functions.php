<?php
require_once 'db.php';
function saveUser($users,$usersFile){
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT ));

}
function updateUser($users,$email,$role,$usersFile){
    $users[$email]['role'] = $role; 
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT ));

}
function deleteUser($users,$email,$usersFile,){
    unset($users[$email]);
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT ));
    header("Location:index.php");

}

function logout(){
    session_destroy();
    header('Location:index.php');
}
