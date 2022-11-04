<?php
    require "config.php";
    
    $failed = null;
    $duplicate = null;
    $duplicate1 = null;

    if( isset($_POST['regbtn']) ){

        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['psw']);
        $cpassword = htmlspecialchars($_POST['cpsw']);

        if( $password === $cpassword ){
            
            $password = password_hash($password, PASSWORD_DEFAULT);

            $query = "SELECT username FROM akun WHERE username = '$username'";
            $query1 = "SELECT email FROM akun WHERE email = '$email'";

            $result = mysqli_query($conn,$query);
            $result1 = mysqli_query($conn,$query1);

            if( mysqli_fetch_assoc($result) ){
                $duplicate = "Username Taken";
            }else if (mysqli_fetch_assoc($result1)){
                $duplicate1 = "Email Taken";
            }else{
                $query = "INSERT INTO akun VALUES ('','$username','$email','$password','user')";
                
                $result = mysqli_query($conn, $query);

                if(mysqli_affected_rows($conn) > 0){
                    echo "<script>
                    alert('Register Success');
                    document.location.href = 'index.php';
                    </script>";
                }else{
                    echo "<script>
                    alert('Registrasi Gagal');
                    document.location.href = 'register.php';
                    </script>";
                }
                }
        }else{
            $failed = "Wrong Confirm Password";
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel = "icon" href = "logo_web.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIN</title>
</head>
<body>
    <div>
        <form action="" method="POST">
            <h1>Register</h1>
            <p style="color:red">
                <?php echo $duplicate ?>
            </p>
            <p style="color:red">
                <?php echo $duplicate1 ?>
            </p>
            <p style="color:red">
                <?php echo $failed ?>
            </p>
            <br>

            <label for="username"><b>USERNAME</b></label>
            <br>
            <input type="text" placeholder="Username" name="username" autocomplete="off" required>
            <br>
            

            <label for="email"><b>EMAIL</b></label>
            <br>
            <input type="email" placeholder="Email" name="email" autocomplete="off" required>
            <br>
            

            <label for="psw"><b>PASSWORD</b></label>
            <br>
            <input type="password" placeholder="Password" name="psw"  required>
            <br>

            <label for="psw"><b>CONFIRM PASSWORD</b></label>
            <br>
            <input type="password" placeholder="Confirm Password" name="cpsw"  required>
            <br>
            
            <br>

            <button type="submit" name="regbtn">REGISTER</button>
            <br>
            
        </form>
    </div>
</body>
</html>

