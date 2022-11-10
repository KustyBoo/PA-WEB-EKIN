<?php

    session_start();

    if(!isset($_SESSION['user'])){
        echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
    }

    require 'config.php';

    $newest= "SELECT * FROM review JOIN gambar ON review.id_review = gambar.id_review GROUP BY review.id_review";

    $get_newest = mysqli_query($conn, $newest);

    while($row = mysqli_fetch_assoc($get_newest)){
        $sepatu_n[] = $row;
    }

    $b_rating = "SELECT * FROM review JOIN gambar ON review.id_review = gambar.id_review GROUP BY review.id_review ORDER BY review.rating_sepatu DESC,review.tanggal_rilis DESC LIMIT 2";

    $get_rate = mysqli_query($conn, $b_rating);

    while($row = mysqli_fetch_assoc($get_rate)){
        $sepatu_r[] = $row;
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
        <title>EKIN</title>
    </head>

    <body>
        <div class="kotaknav">
            <div class="kotaklogo">
                <a href="#"><img src="gambar/logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="user.php">HOME</a>
                <a href="user.php#aboutus">ABOUT US</a>
                <a href="user.php#contactus">CONTACT</a>
                <div class="hidden-log">
                    <a href="logout.php">LOGOUT</a>
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
                <a href="logout.php" class="login">LOGOUT</a>
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

        <div class="content1">
            <img src="gambar/konten3.png" width="100%" height="50%" id="gambarkonten">
        </div>
        <br>

        <div class="content-semua">
            <?php 
            if(isset($sepatu_n)){
                foreach($sepatu_n as $spt):
            ?>
                <div class="gambar1-semua">
                    <a href="review_page.php?id_review=<?php echo $spt['id_review']; ?>"><img src="sepatu/<?php echo $spt['gambar_sepatu']; ?>" alt=""></a>
                </div>
            <?php
                endforeach;
            }
            ?>
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

        <script src="javascript.js"></script>
    </body>

</html>