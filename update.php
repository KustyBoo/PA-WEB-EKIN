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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Sepatu</label><br>
        <input type="text" name="nama" placeholder="<?php echo $sepatu['nama_sepatu'] ?>" required><br><br>

        <label for="jenis">Jenis Sepatu</label><br>
        <input type="text" name="jenis" placeholder="<?php echo $sepatu['jenis_sepatu'] ?>" required><br><br>

        <label for="warna">Warna</label><br>
        <input type="text" name="warna" placeholder="<?php echo $sepatu['warna_sepatu'] ?>" required><br><br>

        <label for="rating">Rating</label><br>
        <input type="number" name="rating" placeholder="<?php echo $sepatu['rating_sepatu'] ?>" required><br><br>

        <label for="review">Review</label><br>
        <input type="text" name="review" placeholder="<?php echo $sepatu['review_sepatu'] ?>" required><br><br>

        <label for="tgl">Tanggal Rilis</label><br>
        <input type="date" name="date" placeholder="<?php echo $sepatu['tanggal_rilis'] ?>" required><br><br>

        <?php if(!empty($sepatu['gambar_sepatu'])){
            echo "<img src='sepatu/$del_img[0]' width='300' height='200'>";
        }

        ?>

        <br>
        <label for="img1">Image</label><br>
        <input type="file" accept="image/*" name="img[]" multiple><br>
        <p>Optional Change Img</p>
        <p>Pleasu Uplod 5 img</p>

        <button type="submit" name="submit" >sbm</button>

    </form>
</body>
</html>