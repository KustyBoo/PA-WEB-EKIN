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
                    <a href="login.php">LOGIN</a>
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
                <a href="login.php" class="login">LOGIN</a>
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
        <div class="kotakfilo">
            Wanna See More?
        </div>
        <div class="kotaksign">
            <a href="register.php"><img src="gambar/signup.png" width="100%"></a>
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
