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
        <div class="kotaknav">
            <div class="kotaklogo">
                <a href="#"><img src="logo_web.png" alt="logo_web"></a>
            </div>
            <div class="nav">
                <a href="#">HOME</a>
                <a href="#aboutus">ABOUT US</a>
                <a href="#">CONTACT</a>
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
                <button class="login" onclick="poplogin()">LOGIN</button>
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
        <div class="form-log" id="log-form">
            <form class="form-input" action="" method="POST">  
                <div class="form-header">
                    <h2>LOGIN</h2>
                </div>
                <div class="form-tombol">
                    <label for="username"><b>USERNAME</b></label>
                    <br>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="form-tombol">
                    <label for="password"><b>PASSWORD</b></label>
                    <br>
                    <input type="password" placeholder="Password">
                </div>

                <br>
                <div class="form-tombol">
                    <button type="submit" class="tombol1">LOGIN</button>
                    <button class="tombol" onclick="clslogin()">CLOSE</button>
                </div>
            </form> 
        </div>
        <div class="content1">
            <a href="#"><img src="konten3.png" width="100%" height="50%" id="gambarkonten"></a>
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
        <div class="kotakfilo">
            Wanna See More?
        </div>
        <div class="kotaksign">
            <a href="#"><img src="signup.png" width="100%"></a>
        </div>
        <div class="footer-basic satu-footer-basic">
            <footer>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#">Home</a></li>
                    <li class="list-inline-item"><a href="#aboutus">About</a></li>
                    <li class="list-inline-item"><a href="#">Contact</a></li>
                </ul>
                <p class="copyright">EKIN © 2022</p>
            </footer>
        </div>

        <script src="javascript.js"></script>
    </body>

</html>