<?php

include 'connect.php';

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO `users` (name, email, password) VALUES ('$name', '$email', '$password')";

    $result = mysqli_query($conn,$sql);

    if($result){
       
        $idemail = urlencode($email);  // urlencode to make it URL-safe

        // Use header to redirect with data
        header("Location: note_keeper.php?idemail=$idemail");
        exit();
    
    }
    else{
        die(mysqli_error($conn));
    }
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Note Keeper</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        h2 {
            text-align: center;
            margin: 20px;
        }
    </style>
</head>

<body>
    <h2>User Registration</h2>

    <div class="container my-4">
        <form method="post">
            <div class="mb-3">
                <label>Email address</label>
                <input type="email" name="email" class="form-control" placeholder="Enter your email address." autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter your name." autocomplete="off">
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter your password." autocomplete="off">
            </div>
            <div class= "button">
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class= "button">
            <button><a href="login.php" name="submit" class="btn btn-primary">Login</a></button>
            </div>
        </form>
    </div>
</body>

</html>
