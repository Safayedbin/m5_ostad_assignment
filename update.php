<?php
session_start();

$email= $_GET['email'];
echo $email;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update role</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
     <!-- header  -->
    <div class="container">
        <div class="row d-flex justify-content-center ">

            <div class="col-7">
                <h1 class="display-8">Update Role</h1>
                <hr>
                <h1 class="display-6">Hi <?php echo $_SESSION['role'] ?></h1>
                

            </div>
            

        </div>
    </div>

<div class="container">
<div class="row d-flex justify-content-center">

    <div class="col-6 mt-5">
        <h5>Update Role</h5>
        <div class="row justify-content-end">
        <div class="col-2 ">
            <a href="callfunction.php?call=logout"><button type="button" class="btn btn-primary mt-2">logout</button></a>
        </div>
        </div>
        <form action="update_backend.php" method="post">
            <div class="mb-3 mt-5">
                <label for="emailinput" class="form-label">Role of Username</label>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    <select class="form-select" name="role" id="inputGroupSelect01">
                        <option selected>Choose...</option>
                        <option value="admin">admin</option>
                        <option value="manager">manager</option>
                        <option value="user">user</option>
                    </select>
                    <input type="hidden" name="email" value= "<?php echo $email; ?>" >
                </div>

            </div>

            <div class="mb-3">
                <button class="btn btn-primary me-md-2" type="submit">Update </button>
            </div>
        </form>
    </div>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>
</html>