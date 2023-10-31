<?php

session_start();
require_once 'functions.php';
require_once 'db.php';
//session_destroy();
$_SESSION['role']=$_SESSION['role'] ?? "editor";

$_GET['form']=$_GET['form'] ?? 'signup';
$email= $_GET['email']?? false;
/*

// update code
if(isset($_POST['update'])){
    //change role
}

 // loggin in code
if(isset($_SESSION['logged_in'])){
 if($user[email][role]== 'admin'){
    // role management system
    while(){

    }

 }
 else{
    // role table
    while(){
        
    }
 }
}
*/


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Assignment 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <!-- header  -->
    <div class="container">
        <div class="row d-flex justify-content-center ">

            <div class="col-7">
                <h1 class="display-8">Welcome to Role Management System </h1>
                <hr>
                <h1 class="display-6">Hi <?php echo $_SESSION['role'] ?></h1>
                

            </div>
            

        </div>
    </div>



<?php 
if(isset($_SESSION['logged_in'])){
    if('admin' == $_SESSION['role']){
?>
    <!-- Role Management Form  -->
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6 mt-5">
                <h5>Role Management Dashboard</h5>
                <div class="row justify-content-end">
                <div class="col-2 ">
                    <a href="callfunction.php?call=logout"><button type="button" class="btn btn-primary mt-2">logout</button></a>
                </div>
                </div>
                <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
                </div>
                <?php }?>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Role</th>
                            <th scope="col">Email</th>
                            <th scope="col">operation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($users as $email => $array){?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                           <?php foreach ($array as $key=> $value){?>
                            <?php if('password'==$key){continue;}  echo "<td>". $value . "</td>";?>
                            <?php }?>
                            <td><?php echo $email;?></td>
                            <td><a href=<?php echo "update.php?email=".$email;?>>Edit</a> | <a href=<?php echo "callfunction.php?call=delete&email=".$email?>>Delete</a></td>
                        </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    }
    else{
?>
    <!-- Role Management Form  -->
    <div class="container">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-6 mt-5">
                <h5>Role Management Dashboard</h5>
                <div class="row justify-content-end">
                <div class="col-2 ">
                    <a href="callfunction.php?call=logout"><button type="button" class="btn btn-primary mt-2">logout</button></a>
                </div>
                </div>
                <?php if(isset($_SESSION['success'])){?>
                <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['success']; unset($_SESSION['success'])?>
                </div>
                <?php }?>
                <table class="table mt-5">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; foreach ($users as $email => $array){?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                           <?php foreach ($array as $key=> $value){?>
                            <?php if('password'==$key){continue;}  echo "<td>". $value . "</td>";?>
                            <?php }?>
                            <td><?php echo $email;?></td>
                            
                        </tr>
                        <?php $i++; }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
    }
}
else{
    if('signup'==$_GET['form']){
?>
    <!-- Registration Form  -->

    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-6 mt-5">
                <h5>Registration form</h5>
                <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'] ; unset($_SESSION['error'])?>
                </div>
                <?php }?>
                <form action="signup.php" method="post">
                    <div class="mb-3 mt-5">
                        <label for="UsernameInput" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="UsernameInput"
                            placeholder="Enter your name here">
                    </div>
                    <div class="mb-3">
                        <label for="emailinput" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="emailinput"
                            placeholder="Johndoe@mail.com">
                    </div>
                    <div class="mb-3">
                        <label for="passwordinput" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordinput"
                            placeholder="**********">

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary me-md-2" type="submit">Sign up </button>
                        <button class="btn btn-primary me-md-2" type="button"><a href="index.php?form=login"
                                style="color:white ; text-decoration: none;">Login</a> </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <?php
    }
if('login'==$_GET['form']){
?>
    <!-- login Form  -->

    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-6 mt-5">
                <h5>Login form</h5>
                <?php if(isset($_SESSION['error'])){?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['error'] ; unset($_SESSION['error'])?>
                </div>
                <?php }?>
                
                
                <form action="login.php" method="post">
                    <div class="mb-3 mt-5">
                        <label for="emailinput" class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-control" id="emailinput"
                            placeholder="Johndoe@mail.com">
                    </div>
                    <div class="mb-3">
                        <label for="passwordinput" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="passwordinput"
                            placeholder="**********">

                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary me-md-2" type="submit">Login </button>

                        <button class="btn btn-primary me-md-2" type="button"><a href="index.php?form=signup"
                                style="color:white ; text-decoration: none;">Signup</a> </button>
                    </div>

                </form>
            </div>

        </div>
    </div>
    <?php
}
}
?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>