<?php

    session_start();

    if(!isset($_SESSION['login'])){
        echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
    }

    require 'config.php';

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
                <a href="#">HOME</a>
                <a href="#aboutus">ABOUT US</a>
                <a href="#contactus">CONTACT</a>
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
            <a href="#"><img src="gambar/konten3.png" width="100%" height="50%" id="gambarkonten"></a>
        </div>
        <br>

        <div class="content2">
            Available Reviews
        </div>

        <div class="content3">
            <div class="gambar1">
                <a href="#"><img src="https://static.nike.com/a/images/f_auto/dpr_1.3,cs_srgb/h_647,c_limit/9688463f-8011-4283-9a83-bb42b035e02a/nike-just-do-it.png" width="100%"></a>
            </div>
            <div class="gambar1">
                <a href="#"><img src="https://static.nike.com/a/images/f_auto/dpr_1.3,cs_srgb/h_647,c_limit/a6a8c148-dab2-4cbb-9d4c-67fc8237a8fa/nike-just-do-it.png" width="100%"></a>
            </div>
            <div class="gambar1">
                <a href="#"><img src="https://static.nike.com/a/images/f_auto/dpr_1.3,cs_srgb/h_647,c_limit/d91e8135-6430-4074-b870-fef440dfefb8/nike-just-do-it.png" width="100%"></a>
            </div>
        </div>
        <br>

        <div class="content4">
            <a href="#"><img src="gambar/top.png" width="100%" height="50%" id="gambarkonten2"></a>
        </div>
        <br>

        <div class="content2">
            Based Off Ratings
        </div>

        <div class="content3">
            <div class="gambar2">
                <a href="#"><img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/f094af40-f82f-4fb9-a246-e031bf6fc411/air-force-1-07-shoe-NMmm1B.png" width="100%"></a>
            </div>
            <div class="gambar2">
                <a href="#"><img src="https://static.nike.com/a/images/t_PDP_864_v1/f_auto,b_rgb:f5f5f5/5557469e-3338-4ddc-92eb-fac05511d57c/air-jordan-1-low-shoe-459b4T.png" width="100%"></a>
            </div>
        </div>
        <br>

        <div class="content4">
            <a href="#"><img src="gambar/wat.png" width="100%" height="50%" id="gambarkonten3"></a>
        </div>
        <br>

        <div class="form-feed">
            <form class="form-input1" action="" method="POST">  
                <div class="form-tombol1">
                    <input type="text" placeholder="NAME OF SHOE" name="nama" required>
                </div>
                <div class="form-tombol1">
                    <input type="text" placeholder="BRAND" name="brand" required>
                </div>
                <div class="form-tombol1">
                    <input type="text" placeholder="TYPE" name="tipe" required>
                </div>
                <div class="form-tombol1">
                    <input type="text" placeholder="COLOR" name="warna" required>
                </div>
                <div class="form-tombol1">
                    <input type="email" placeholder="EMAIL" name="email" required>
                </div>
                <div class="form-tombol2">
                    <button type="submit" class="tombol2" name="submit">SUBMIT</button>
                </div>
            </form>
        </div>

        <section id = "aboutus" class = "kotakabout">
            <div class="isiabout">
                <a href="#"><img src="gambar/logo_web.png" id="gambarkonten1"></a>
                <div class = "textabout">
                    <h1>About Us</h1>
                    <h3>EKIN</h3>
                    <p>EKIN is a website that works for you shoe enthusiasts who are always curious about the latest shoe information 
                    that is booming in the fashion world and the market. With ekin, we hope that all of you can receive interesting 
                    information every day related to the world of shoes.
                </div>
            </div>
        </section>

        <section class = "contactus" id="contactus">
            <div class = "isicontact">
                <h2>Contact Us</h2>
                <p>Thank you for visiting our website. You can interact with us via:</p>
            </div>
            <div class = "containercontact">
                <div class = "contactInfo">
                    <div class = "box">
                        <div class = "icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                        <div class = "text">
                            <h3>Address</h3>
                            <p>Ahmad Yani Street No. 55, East Jakarta, Indonesia</p>
                        </div>
                    </div>
                    <div class = "box">
                        <div class = "icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                        <div class = "text">
                            <h3>Phone</h3>
                            <p>0541-2234045</p>
                        </div>
                    </div>
                    <div class = "box">
                        <div class = "icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                        <div class = "text">
                            <h3>Email</h3>
                            <p>wearekin@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#aboutus">About</a></li>
                    <li class="list-inline-item"><a href="#contact">Contact</a></li>
                </ul>
                <p class="copyright">EKIN © 2022</p>
            </footer>
        </div>

        <script src="javascript.js"></script>
    </body>

</html>
