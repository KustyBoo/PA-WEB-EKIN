<?php 

    require "config.php";

    $id_rev = $_GET["id_review"];

    $query1 = "SELECT nama_sepatu,jenis_sepatu,gambar_sepatu 
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
    <link rel = "icon" href = "logo_web.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EKIN</title>
</head>
<body>
    <p>Nama : <?php echo $sepatu['nama_sepatu'];?></p>

    <p>1</p>
    <img width="100px" src="sepatu/<?php echo $gambar[0]; ?>" alt="">

    <p>2</p>
    <img width="100px" src="sepatu/<?php echo $gambar[1]; ?>" alt="">

    <p>3</p>
    <img width="100px" src="sepatu/<?php echo $gambar[2]; ?>" alt="">

    <p>4</p>
    <img width="100px" src="sepatu/<?php echo $gambar[3]; ?>" alt="">

    <p>5</p>
    <img width="100px" src="sepatu/<?php echo $gambar[4]; ?>" alt="">

</body>
</html>