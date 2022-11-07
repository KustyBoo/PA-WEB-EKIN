<?php
    session_start();

    require "config.php";

    $failed = null;

    if (isset($_POST['submit'])){
        $kul = "SELECT * FROM db_ekin";
        $result = mysqli_query($conn, $kul);
        $sepatu = [];
        while ($row = mysqli_fetch_assoc($result)){
            $sepatu[] = $row;
        }

        $id_review = count($sepatu)+1;
        $nama_sepatu = $_POST['nama_sepatu'];
        $jenis_sepatu = $_POST['jenis_sepatu'];
        $warna_sepatu = $_POST['warna_sepatu'];
        $rating_sepatu = $_POST['rating_sepatu'];
        $review_sepatu = $_POST['review_sepatu'];
        $tanggal_rilis = $_POST['tanggal_rilis'];

        $format_file = $_FILES['gambar_sepatu']['name'];
        $tmp_name = $_FILES['gambar_sepatu']['tmp_name'];
        $size = $_FILES['gambar_sepatu']['size'];
        $type = explode('.',$format_file);
        $type2 = $type[1];
        $rename = "$nama.$type2";
        $format_foto = array('jpg', 'png', 'jpeg');
        $max_size = 3000000;
    

        if($size < $max_size){
            move_uploaded_file($tmp_name, 'gambar/' . $rename);
            $sql = "INSERT INTO db_ekin VALUES ('$id_review','$rename','$nama_sepatu','$jenis_sepatu','$warna_sepatu','$rating_sepatu','$review_sepatu', date '$tanggal_rilis')";

            $result = mysqli_query($conn, $sql);

        if ($result){
            echo "
            <script>
                alert ('Review berhasil ditambah');
                document.location.href = 'admin.php';
            </script>";
        } else {
            echo "
            <script> 
                alert ('Review Gagal Ditambah');
                document.location.href = 'admin.php';
            </script>";
        }
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
    <title>EKIN | ADMIN</title>
</head>

    <body class="member">
        <div class="kotaknav">
            <div class="kotaklogo">
                <a href="index.php"><img src="gambar/logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="index.php">HOME</a>
                <a href="admin.php">ADMIN MENU</a>
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
            <a href="#"><img src="gambar/bgadmin2.png" id="gambaradmin1" width="100%" height="50%" id="gambarkonten"></a>
        </div>

        <div class="form-log2" id="log-form">
            <form class="form-input2" action="" method="POST">  
                <div class="form-header">
                    <h2>ADD SHOES REVIEWS</h2>
                </div>  
                <div class="form-tombol">
                    <label for="nama_sepatu"><b>Nama Sepatu</b></label>
                    <br>
                    <input type="text" placeholder="Nama Sepatu" name="nama_sepatu">
                </div>
                <div class="form-tombol">
                    <label for="jenis_sepatu"><b>Jenis Sepatu</b></label>
                    <br>
                    <input type="text" placeholder="Jenis" name="jenis_sepatu">
                </div>
                <div class="form-tombol">
                    <label for="warna_sepatu"><b>Warna Sepatu</b></label>
                    <br>
                    <input type="text" placeholder="Warna" name="warna_sepatu">
                </div>
                <div class="form-tombol">
                    <label for="rating_sepatu"><b>Rating Sepatu</b></label>
                    <br>
                    <input type="text" placeholder="Rating" name="rating_sepatu">
                </div>
                <div class="form-tombol">
                    <label for="review_sepatu"><b>Review Sepatu</b></label>
                    <br>
                    <textarea placeholder="Write Review" name="review_sepatu"></textarea>
                </div>
                <div class="form-tombol">
                    <label for="tanggal_rilis"><b>Tanggal Rilis</b></label>
                    <br>
                    <input type="date" name="tanggal_rilis">
                </div>
                <div class="form-tombol">
                    <label for="gambar_sepatu"><b>Gambar Sepatu</b></label>
                    <br>
                    <input type="file" name="gambar_sepatu">
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
                    <button type="submit" class="tombol1" name="logbtn">SUBMIT REVIEW</button>
                </div>
            </form> 
        </div>

        <div class="footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="index.php">Home</a></li>
                    <li class="list-inline-item"><a href="index.php#aboutus">About</a></li>
                    <li class="list-inline-item"><a href="index.php#contact">Contact</a></li>
                </ul>
                <p class="copyright">EKIN © 2022</p>
            </footer>
        </div>
        <script src="javascript.js"></script>
        
        </body>
</html>
