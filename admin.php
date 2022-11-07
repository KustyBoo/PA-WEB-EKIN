<?php 
    session_start();

    if(!isset($_SESSION['login'])){
        echo "<script>
                alert('Access Denied, Please Login');
                document.location.href = 'login.php';
            </script>";
    }

    require "config.php";

    $query = "SELECT * FROM review JOIN gambar 
            ON review.id_review = gambar.id_review
            GROUP BY review.id_review
            ORDER BY review.id_review";

    $result = mysqli_query($conn, $query);

    $review = [];

    while ($row = mysqli_fetch_assoc($result)){
        $review[] = $row; 
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

    <table>
        <tr>
            <th height=50px>ID</th>
            <th>NAMA</th>
            <th>JENIS</th>
            <th>RATING</th>
            <th>GAMBAR</th>
        </tr>
        <?php $i = 1; foreach($review as $rev): ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $rev['nama_sepatu']; ?></td>
            <td><?php echo $rev['jenis_sepatu'];?></td>
            <td><?php echo $rev['rating_sepatu']; ?></td>
            <td><img width="100px" src="sepatu/<?php echo $rev['gambar_sepatu']; ?>" alt=""></td>
            <td>
                <a href="review_page.php?id_review=<?php echo $rev['id_review']; ?>">See Review</a>
                <a href="update.php?id_review=<?php echo $rev['id_review'];?>">Update</a>
                <a href="delete.php?id_review=<?php echo $rev['id_review'];?>">Delete</a>
            </td>
        </tr>
        <?php $i++; endforeach; ?>
    </table><br>
    <a href="insert_review.php">Tambah</a>

</body>
</html>