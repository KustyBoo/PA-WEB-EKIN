<?php
    
    session_start();

    require "config.php";

    $failed = null;

    if(isset($_POST['logbtn'])){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['psw']);

        $result = mysqli_query($conn,"SELECT * FROM akun WHERE username='$username' ");

        if(mysqli_num_rows($result) > 0){
            $data = mysqli_fetch_assoc($result);
            $psw = $data['password'];
            if (password_verify($password, $psw)){
                if ($data['tipe'] == 'admin'){
                    $_SESSION['admin'] = true;
                    header("Location: admin.php");
                }else {
                    $_SESSION['user'] = true;
                    $_SESSION['username'] = $username;
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
    <link rel = "icon" href = "gambar/logo_web.png">
    <link rel="stylesheet" href="style.css">
    <style>
        <?php include "style.css" ?>
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIN | Login Page</title>
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
                <form action="more.php" methode = "GET">
                    <table>
                        <tr>
                            <td>
                                <div>
                                    <input type = "text" name = "keyword" id = 'keyword' value="" placeholder="Search">
                                </div>
                            </td>
                            <td>
                                <button type = "submit" class = "btn btn-secondary" name="search">
                                    <i class = "fa fa-search"></i>
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>
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
                <div class="form-invalid">
                    <b>
                    <p style="color:red">
                        <?php
                            echo $failed;
                            ?>
                    </p>
                    </b>
                </div>
                <div class="form-tombol">
                    <button type="submit" class="tombol1" name="logbtn">LOGIN</button>
                </div>
                <div class="form-register">
                    <a href="register.php">Create Account?</a>
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