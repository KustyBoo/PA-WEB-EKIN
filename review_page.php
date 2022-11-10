<?php 

    session_start();

    if(!isset($_SESSION['user'])){
        if(!isset($_SESSION['admin'])){
            echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
        }
    } else if(!isset($_SESSION['admin'])){
        if(!isset($_SESSION['user'])){
            echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
        }
    }

    require "config.php";

    $id_rev = $_GET["id_review"];

    $query1 = "SELECT nama_sepatu,jenis_sepatu,warna_sepatu,
            rating_sepatu,review_sepatu,tanggal_rilis,gambar_sepatu 
            FROM review JOIN gambar 
            ON review.id_review = gambar.id_review 
            WHERE review.id_review = '$id_rev'";

    $result1 = mysqli_query($conn,$query1);

    $gambar = [];

    $sepatu = [];

    while($row = mysqli_fetch_assoc($result1)){
        $sepatu = $row;
        array_push($gambar,$row['gambar_sepatu']);
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
        <title>EKIN | ADMIN</title> 
    </head>
    <body>
        <?php if(isset($_SESSION['admin'])){ ?>
            <div class="kotaknav">
                <div class="kotaklogo">
                    <a href="#"><img src="gambar/logo_web.png" alt="logo_web"></a>
                </div>
                <div class="nav">
                    <a href="admin.php">DATA REVIEW</a>
                    <a href="#">FEEDBACK USER</a>
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
        <?php } ?>
        <?php if(isset($_SESSION['user'])) { ?>
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
        <?php } ?>
        <br>
        <br>
        <div class="kotak-luar">
            <div class="kotak-review-gambar">
                <div class="kotak-img">
                    <div class="kotak-tombol">
                        <a class="prev" onclick="plusDivs(-1)">❮</a>
                    </div>
                    <img class="mySlides" width="100%" src="sepatu/<?php echo $gambar[0]; ?>" alt="">
                    <img class="mySlides" width="100%" src="sepatu/<?php echo $gambar[1]; ?>" alt="">
                    <img class="mySlides" width="100%" src="sepatu/<?php echo $gambar[2]; ?>" alt="">
                    <img class="mySlides" width="100%" src="sepatu/<?php echo $gambar[3]; ?>" alt="">
                    <img class="mySlides" width="100%" src="sepatu/<?php echo $gambar[4]; ?>" alt="">
                    <div class="kotak-tombol">
                        <a class="next" onclick="plusDivs(1)">❯</a>
                    </div>
                </div>
            </div>
            <div class="kotak-review">
                <div class="form-tombol">
                    <h1><?php echo $sepatu['nama_sepatu'] ?></h1>
                </div>
                <div class="form-tombol">
                    <b>Ratings :
                    <?php echo $sepatu['rating_sepatu'] ?>
                    / 10</b>
                </div>
                <div class="form-tombol">
                    Type :
                    <?php echo $sepatu['jenis_sepatu'] ?>
                </div>
                <div class="form-tombol">
                    Color :
                    <?php echo $sepatu['warna_sepatu'] ?>
                </div>
                <div class="form-tombol">
                    Release Date :
                    <?php echo $sepatu['tanggal_rilis'] ?>
                </div>
                <br>
                <div class="form-tombol">
                    <?php echo $sepatu['review_sepatu'] ?>
                </div>
            </div>
        </div>
        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#">About</a></li>
                    <li class="list-inline-item"><a href="#">Contact</a></li>
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