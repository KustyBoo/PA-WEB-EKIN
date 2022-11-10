<?php
    require "config.php";

    $query = "SELECT * FROM feedback";
    $result = mysqli_query($conn, $query);

    $feedback = [];
    while ($row = mysqli_fetch_assoc($result)){
        $feedback[] = $row; 
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
    <title>EKIN | User Feedback</title>
</head>
    <body>
        <div class="kotaknav">
            <div class="kotaklogo">
                <a href="admin.php"><img src="gambar/logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="admin.php">DATA REVIEW</a>
                <a href="feedback.php">FEEDBACK USER</a>
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
                <form action="" methode = "GET">
                <table>
                    <tr>
                        <td>
                            <div>
                                <input type = "text" name = "keyword" id = 'keyword' value="" placeholder="Search">
                            </div>
                        </td>
                        <td>
                            <button class = "btn btn-secondary" name="search">
                                <i class = "fa fa-search"></i>
                            </button>
                        </td>
                    </tr>
                </table>
                    <!-- <input class = "fa fa-search" type="text" name="search" value="" placeholder="Search"> -->
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
            <img src="gambar/feedback1.png" width="100%" height="50%" id="gambarfeedback">
        </div>

        <div class="tabel-data">
            <div class="content2">
                User Feedback
            </div>
            <table class="tabel-admin">
                <tr>
                    <th height=50px>ID</th>
                    <th>NAMA SEPATU</th>
                    <th>BRAND SEPATU</th>
                    <th>TIPE SEPATU</th>
                    <th>WARNA SEPATU</th>
                    <th>EMAIL USER</th>
                </tr>
                <?php $i = 1; foreach($feedback as $fb): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $fb['nama_sepatu']; ?></td>
                    <td><?php echo $fb['brand_sepatu'];?></td>
                    <td><?php echo $fb['tipe_sepatu']; ?></td>
                    <td><?php echo $fb['warna_sepatu']; ?></td>
                    <td><?php echo $fb['email']; ?></td>
                </tr>
                <?php $i++; endforeach; ?>
            </table><br>
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
        <div id="gambarfeedback"><img src=""></div>
        <div id="gambarmore"><img src=""></div>

        <script src="javascript.js"></script>
        
    </body>
</html>