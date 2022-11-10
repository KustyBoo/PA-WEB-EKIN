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
    <link rel = "icon" href = "gambar/logo_web.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIN | Register Page</title>
</head>
    <body>

    <div class="kotaknav">
            <div class="kotaklogo">
                <a href="index.php"><img src="gambar/logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="index.php">HOME</a>
                <a href="index.php#aboutus">ABOUT US</a>
                <a href="index.php#contactus">CONTACT</a>
                <div class="hidden-log">
                    <a href="login.php">LOGIN</a>
                </div>
                <div class="nightmode1">
                    <div class="theme-switch-wrapper1">
                        <label class="theme-switch1" for="checkbox1">
                            <input type="checkbox" id="checkbox1" onclick="document.location.reload(true)"/>
                            <div class="slider1 round1"></div>
                        </label>
                    </div>  
                </div>
            </div>
            <div class="searchbar">
                <form action="">
                    <input type="text" name="search" value="" placeholder="Search">
                </form>
            </div>
            <div class="login">
                <a href="login.php" class="login">LOGIN</a>
            </div>
            <div class="nightmode">
                <div class="theme-switch-wrapper">
                    <label class="theme-switch" for="checkbox">
                        <input type="checkbox" id="checkbox" onclick="document.location.reload(true)"/> 
                        <div class="slider round"></div>
                    </label>
                </div>  
            </div>
            <div class="kotakbar">
                <a href="javascript:void(0);" class="icon">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div class="form-log">
            <form class="form-input" action="" method="POST">
                <div class="form-header">
                    <h2>REGISTER</h2>
                </div>
                <div class="form-tombol">
                    <label for="username"><b>USERNAME</b></label>
                    <input type="text" placeholder="Username" name="username" autocomplete="off" required>
                </div>
                <div class="form-tombol">
                    <label for="email"><b>EMAIL</b></label>
                    <input type="email" placeholder="Email" name="email" autocomplete="off" required>
                </div>
                <div class="form-tombol">
                    <label for="psw"><b>PASSWORD</b></label>
                    <input type="password" placeholder="Password" name="psw"  required>
                </div>
                <div class="form-tombol">
                    <label for="psw"><b>CONFIRM PASSWORD</b></label>
                    <input type="password" placeholder="Confirm Password" name="cpsw"  required>
                </div>
                <div class="form-invalid">
                    <p style="color:red">
                        <?php echo $duplicate ?>
                    </p>
                </div>
                <div class="form-invalid">
                    <p style="color:red">
                        <?php echo $duplicate1 ?>
                    </p>
                </div>
                <div class="form-invalid">
                    <p style="color:red">
                        <?php echo $failed ?>
                    </p>
                </div>
                <div class="form-tombol">
                    <button class="tombol1" type="submit" name="regbtn">REGISTER</button>
                </div>
                <div class="form-register">
                    <p>Already have an account?</p>
                    <a href="login.php">LOGIN</a>
                </div>
            </form>
        </div>

        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="index.php">Home</a></li>
                    <li class="list-inline-item"><a href="index.php#aboutus">About</a></li>
                    <li class="list-inline-item"><a href="index.php#contactus">Contact</a></li>
                </ul>
                <p class="copyright">EKIN © 2022</p>
            </footer>
        </div>
 
        <div id="gambarkonten"><img src=""></div>
        <div id="gambarkonten1"><img src=""></div>
        <div id="gambarkonten2"><img src=""></div>
        <div id="gambarkonten3"><img src=""></div>
        <div id="gambarkonten4"><img src=""></div>
        <div id="gambaradmin1"><img src=""></div>
        <div id="gambarfeedback"><img src=""></div>
        <div id="gambarmore"><img src=""></div>

        <script src="javascript.js"></script>
    </body>
</html>

