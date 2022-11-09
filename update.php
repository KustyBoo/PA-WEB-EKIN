<?php 

    require "config.php";

    $id_rev = $_GET["id_review"];

    $query = "SELECT * 
            FROM review JOIN gambar 
            ON review.id_review = gambar.id_review 
            WHERE review.id_review = '$id_rev'";

    $result = mysqli_query($conn,$query);

    $del_img = [];
    $loop = 0;
    while($row = mysqli_fetch_assoc($result)){
        if($loop === 0){
            $sepatu = $row;
        }
        array_push($del_img,$row['gambar_sepatu']);
        $loop++;
    }

    if(isset($_POST['submit'])){
        $nama = htmlspecialchars($_POST['nama']);
        $jenis = htmlspecialchars($_POST['jenis']);
        $warna = htmlspecialchars($_POST['warna']);
        $rating = htmlspecialchars($_POST['rating']);
        $review = htmlspecialchars($_POST['review']);
        $date = htmlspecialchars($_POST['date']);

        $panjang = 0;

        foreach($_FILES['img']['name'] as $key=>$val){
            $panjang++;
        }

        $size = array_sum($_FILES['img']['size']);

        echo"$size";

        if($size != 0){
            $insert = "UPDATE review SET
                    nama_sepatu = '$nama',
                    jenis_sepatu = '$jenis',
                    warna_sepatu = '$warna',
                    rating_sepatu = '$rating',
                    review_sepatu = '$review',
                    tanggal_rilis = '$date' 
                    WHERE id_review = '$id_rev'" ;

            $result_insert = mysqli_query($conn, $insert);


            $fk = $sepatu['id_review'];
            $id_gambar = $sepatu['id_gambar'];
            
            $panjang = NULL;

            foreach($_FILES['img']['name'] as $key=>$val){
                $panjang++;
            }

            if($panjang === 5){
                foreach($del_img as $img){
                    unlink("sepatu/".$img);
                }
                
                foreach($_FILES['img']['name'] as $key=>$val){
                    $image = $_FILES['img']['name'][$key];
                    $temp = $_FILES["img"]["tmp_name"][$key];
                    
                    if(move_uploaded_file($temp, 'sepatu/'.$image)){
                        $sql = "UPDATE gambar SET gambar_sepatu = '$image' WHERE id_gambar = '$id_gambar'";
    
                        $result_image = mysqli_query($conn,$sql);
                    }
                    $id_gambar++;
                }
                if($result_insert){
                    echo "
                    <script> 
                        alert ('Succes to Update Review');
                        document.location.href = 'admin.php';
                    </script>";
                }
            } else {
                echo "
                    <script> 
                        alert ('5 woy');
                        document.location.href = 'update.php?id_review=$id_rev';
                    </script>";
            }
            
        }else{
            $insert = "UPDATE review SET
                    nama_sepatu = '$nama',
                    jenis_sepatu = '$jenis',
                    warna_sepatu = '$warna',
                    rating_sepatu = '$rating',
                    review_sepatu = '$review',
                    tanggal_rilis = '$date' 
                    WHERE id_review = '$id_rev'" ;

            $result_insert = mysqli_query($conn, $insert);

            if($result_insert){
                echo "
                <script> 
                    alert ('Succes to Update else Review');
                    document.location.href = 'admin.php';
                </script>";
            }
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
                    <h2>UPDATE REVIEW</h2>
                </div>  
                <div class="form-tombol">
                    <label for="nama"><b>Nama Sepatu</b></label><br>
                    <input type="text" name="nama" placeholder="<?php echo $sepatu['nama_sepatu'] ?>" required><br>
                </div>
                <div class="form-tombol">
                    <label for="jenis"><b>Jenis Sepatu</b></label><br>
                    <input type="text" name="jenis" placeholder="<?php echo $sepatu['jenis_sepatu'] ?>" required><br>
                </div>
                <div class="form-tombol">
                    <label for="warna"><b>Warna</b></label><br>
                    <input type="text" name="warna" placeholder="<?php echo $sepatu['warna_sepatu'] ?>" required><br>
                </div>
                <div class="form-tombol">
                    <label for="rating"><b>Rating</b></label><br>
                    <input type="number" name="rating" placeholder="<?php echo $sepatu['rating_sepatu'] ?>" required><br>
                </div>
                <div class="form-tombol">
                    <label for="review"><b>Review</b></label><br>
                    <textarea name="review" placeholder="<?php echo $sepatu['review_sepatu'] ?>" required></textarea><br>
                </div>
                <div class="form-tombol">
                    <label for="tgl"><b>Tanggal Rilis</b></label><br>
                    <input type="date" name="date" placeholder="<?php echo $sepatu['tanggal_rilis'] ?>" required><br><br>
                </div>
                <div class="form-gambar">
                    <?php if(!empty($sepatu['gambar_sepatu'])){
                        echo "<img src='sepatu/$del_img[0]' width='300' height='400'>";
                    }          
                    ?>
                </div>

                <br>
                <div class="form-tombol">
                    <label for="img1">Image</label><br>
                    <input type="file" accept="image/*" name="img[]" multiple><br>
                </div>
                <br>
                <div class="form-tombol1">
                    <button type="submit" class="tombol2" name="submit" >UPDATE REVIEW</button>
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
        <div id="gambaradmin1"><img src=""></div>

        <script src="javascript.js"></script>

    </body>
</html>