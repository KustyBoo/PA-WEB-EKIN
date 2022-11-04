<?php
    require "config.php";

    $failed = null;

    if( isset($_POST['logbtn'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['psw']);

        $result = mysqli_query($conn,"SELECT * FROM akun WHERE username='$username' ");


        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            $psw = $data['password'];
            if (password_verify($password, $psw)){
                if ($data['tipe'] == 'admin'){
                    $_SESSION['login'] = true;
                    header("Location: admin.php");
                }else {
                    $_SESSION['login'] = true;
                    header("Location: user.php");
                }
            } else{
                $failed = "Username or Password Wrong";
                echo "<script> poplogin(); </script>";
            }
        }else {
            $failed = "Username or Password Wrong";
            echo "<script> poplogin(); </script>";
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "icon" href = "logo_web.png">
    <link rel="stylesheet" href="style.css">
    <style>
        <?php include "style.css" ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIN</title>
</head>
<body>
    <div class="form-log" id="log-form">
            <form class="form-input" action="" method="POST">  
                <div class="form-header">
                    <h2>LOGIN</h2>
                </div>
                <div class="form-tombol">
                    <label for="username"><b>USERNAME</b></label>
                    <br>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="form-tombol">
                    <label for="password"><b>PASSWORD</b></label>
                    <br>
                    <input type="password" placeholder="Password" name="psw">
                </div>
                <p style="color:red">
                    <?php
                        echo $failed;
                     ?>
                </p>
                <br>
                <div class="form-tombol">
                    <button type="submit" class="tombol1" name="logbtn">LOGIN</button>
                    <button class="tombol" onclick="clslogin()">CLOSE</button>
                </div>
            </form> 
        </div>
</body>
</html>