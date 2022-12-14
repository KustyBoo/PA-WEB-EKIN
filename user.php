<?php

    session_start();

    if(!isset($_SESSION['user'])){
        echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
    }

    $username = $_SESSION['username'];

    require 'config.php';

    $newest= "SELECT * FROM review JOIN gambar ON review.id_review = gambar.id_review GROUP BY review.id_review ORDER BY review.id_review DESC LIMIT 3";

    $get_newest = mysqli_query($conn, $newest);

    while($row = mysqli_fetch_assoc($get_newest)){
        $sepatu_n[] = $row;
    }

    $b_rating = "SELECT * FROM review JOIN gambar ON review.id_review = gambar.id_review GROUP BY review.id_review ORDER BY review.rating_sepatu DESC,review.tanggal_rilis DESC LIMIT 2";

    $get_rate = mysqli_query($conn, $b_rating);

    $get_akun = mysqli_query($conn ,"SELECT email FROM akun WHERE username = '$username'");

    $get_email = mysqli_fetch_assoc($get_akun);

    while($row = mysqli_fetch_assoc($get_rate)){
        $sepatu_r[] = $row;
    }
    
    if( isset($_POST['submit'])){
        $nama_spt = htmlspecialchars($_POST['nama']);
        $brand_spt = htmlspecialchars($_POST['brand']);
        $tipe_spt = htmlspecialchars($_POST['tipe']);
        $warna_spt = htmlspecialchars($_POST['warna']);
        $email = $get_email['email'];

        $input = "INSERT INTO feedback VALUES ('','$nama_spt','$brand_spt','$tipe_spt','$warna_spt','$email')";

        $hasil_input = mysqli_query($conn, $input);

        if ($hasil_input){
                echo "
                    <script> 
                        alert ('Thank You for Your Feedback');
                        document.location.href = 'user.php';
                    </script>";
        } else {
            echo "
            <script> 
                alert ('Sorry but We Failed to Place your Feedack');
                document.location.href = 'user.php';
            </script>";  
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

        <div class="content2">
            Available Reviews
        </div>

        <div class="content3">
            <div class="gambar1">
                <a href="review_page.php?id_review=<?php echo $sepatu_n[0]['id_review']; ?>"><img width="100%" src="sepatu/<?php echo $sepatu_n[0]['gambar_sepatu']; ?>" alt=""></a>
            </div>
            <div class="gambar1">
                <a href="review_page.php?id_review=<?php echo $sepatu_n[1]['id_review']; ?>"><img width="100%" src="sepatu/<?php echo $sepatu_n[1]['gambar_sepatu']; ?>" alt=""></a>
            </div>
            <div class="gambar1">
            <a href="review_page.php?id_review=<?php echo $sepatu_n[2]['id_review']; ?>"><img width="100%" src="sepatu/<?php echo $sepatu_n[2]['gambar_sepatu']; ?>" alt=""></a>
            </div>
        </div>
        <div class="kotakfilo">
            <a href="more.php">See More...</a>
        </div>

        <div class="content4" id="top">
            <a href="#top"><img src="gambar/top.png" width="100%" height="50%" id="gambarkonten2"></a>
        </div>
        <br>

        <div class="content2">
            Based Off Ratings
        </div>

        <div class="content3">
            <div class="gambar2">
                <a href="review_page.php?id_review=<?php echo $sepatu_r[0]['id_review']; ?>"><img width="100%" src="sepatu/<?php echo $sepatu_r[0]['gambar_sepatu']; ?>" alt=""></a>
            </div>
            <div class="gambar2">
                <a href="review_page.php?id_review=<?php echo $sepatu_r[1]['id_review']; ?>"><img width="100%" src="sepatu/<?php echo $sepatu_r[1]['gambar_sepatu']; ?>" alt=""></a>
            </div>
        </div>
        <br>

        <div class="content4" id="feed">
            <a href="#feed"><img src="gambar/wat.png" width="100%" height="50%" id="gambarkonten3"></a>
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
                <div class="form-tombol2">
                    <button type="submit" class="tombol2" name="submit">SUBMIT</button>
                </div>
            </form>
        </div>

        <div class="content4">
            <a href="#aboutus"><img src="gambar/more.png" width="100%" height="50%" id="gambarkonten4"></a>
        </div>
        <br>

        <section class = "kotakabout"  id="aboutus">
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
                    <li class="list-inline-item"><a href="#contactus">Contact</a></li>
                </ul>
                <p class="copyright">EKIN ?? 2022</p>
            </footer>
        </div>

        <div id="gambaradmin1"><img src=""></div>
        <div id="gambarfeedback"><img src=""></div>
        <div id="gambarmore"><img src=""></div>
        <div id="gambarfind"><img src=""></div>

        <script src="javascript.js"></script>
    </body>

</html>
