<?php
    require "config.php";

    if( isset($_POST['submit'])){
        $panjang = 0;

        foreach($_FILES['img']['name'] as $key=>$val){
            $panjang++;
        }

        echo"$panjang";

        if($panjang === 5){
            $nama = htmlspecialchars($_POST['nama']);
            $jenis = htmlspecialchars($_POST['jenis']);
            $warna = htmlspecialchars($_POST['warna']);
            $rating = htmlspecialchars($_POST['rating']);
            $review = htmlspecialchars($_POST['review']);
            $date = htmlspecialchars($_POST['date']);

            $insert = "INSERT INTO review VALUES ('','$nama','$jenis','$warna','$rating','$review','$date')";

            $result_insert = mysqli_query($conn, $insert);

            if ($result_insert){
                $query = "SELECT * FROM review WHERE nama_sepatu = '$nama'";

                $result_get_id = mysqli_query($conn,$query);

                if($result_get_id){
                    while($row = mysqli_fetch_assoc($result_get_id)){
                        $fk = $row['id_review'];
                    }
                    

                    foreach($_FILES['img']['name'] as $key=>$val){
                        $image = $_FILES['img']['name'][$key];
                        $temp = $_FILES["img"]["tmp_name"][$key];
                        
                        if(move_uploaded_file($temp, 'sepatu/'.$image)){
                            $sql = "INSERT INTO gambar VALUES ('','$fk','$image')";
        
                            $result_image = mysqli_query($conn,$sql);
                        }
                    }
            
                    echo "
                    <script> 
                        alert ('Succes to Add Review');
                        document.location.href = 'admin.php';
                    </script>";
                }else{
                    ## Tambahi Delete From nanti
                    echo "
                    <script> 
                        alert ('Gagal Uplod foto1');
                        document.location.href = 'insert_review.php';
                    </script>";
                }

            } else {
                echo "
                <script> 
                    alert ('Gagal Insert');
                    document.location.href = 'insert_review.php';
                </script>";
            }
        }else {
            echo "
            <script> 
                alert ('Please Upload 5 Images');
                
            </script>";
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="gambar/logo_web.png">
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
        <div class="kotaknav">
            <div class="kotaklogo">
                <a href="#"><img src="gambar/logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="admin.php">REVIEW DATA</a>
                <a href="#">FEEDBACK USER</a>
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
            <a href="#"><img src="gambar/bgadmin2.png" id="gambaradmin1" width="100%" height="50%"></a>
        </div>

        <div class="form-log2" id="log-form">
            <form class="form-input2" action="" method="POST" enctype="multipart/form-data">  
                <div class="form-header">
                    <h2>ADD REVIEW</h2>
                </div>  
                <div class="form-tombol">
                    <label for="nama_sepatu"><b>Nama Sepatu</b></label>
                    <br>
                    <input type="text" name="nama" required>
                </div>
                <div class="form-tombol">
                    <label for="jenis_sepatu"><b>Jenis Sepatu</b></label>
                    <br>
                    <input type="text" name="jenis" required>
                </div>
                <div class="form-tombol">
                    <label for="warna_sepatu"><b>Warna Sepatu</b></label>
                    <br>
                    <input type="text" name="warna" required>
                </div>
                <div class="form-tombol">
                    <label for="rating_sepatu"><b>Rating Sepatu</b></label>
                    <br>
                    <input type="number" name="rating" required>
                </div>
                <div class="form-tombol">
                    <label for="review_sepatu"><b>Review Sepatu</b></label>
                    <br>
                    <textarea placeholder="Write Review" name="review" required></textarea>
                </div>
                <div class="form-tombol">
                    <label for="tanggal_rilis"><b>Tanggal Rilis</b></label>
                    <br>
                    <input type="date" name="date" required>
                </div>
                <div class="form-tombol">
                    <label for="gambar_sepatu"><b>Gambar Sepatu</b></label>
                    <br>
                    <input type="file" accept="image/*" name="img[]" multiple required>
                </div>
                <br>
                <div class="form-tombol1">
                    <button type="submit" class="tombol2" name="submit" >SUBMIT REVIEW</button>
                </div>
                <div class="form-register">
                    <a href="admin.php">CANCEL</a>
                </div>
            </form> 
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
        <div id="gambarfeedback"><img src=""></div>
        <div id="gambarmore"><img src=""></div>

        <script src="javascript.js"></script>
        
        </body>
</html>