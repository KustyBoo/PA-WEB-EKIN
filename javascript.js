// responsive nav bar
function nav_responsive() {
    var y = document.getElementById("login");
    var z = document.getElementById("nightmode");
}
var x = document.getElementsByClassName("nav")[0];
var kotak = document.getElementsByClassName("kotakbar")[0];
kotak.addEventListener('click', function(){
    x.classList.toggle('responsive');
})

// light mode-dark mode
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const toggleSwitch1 = document.querySelector('.theme-switch1 input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

// Ganti gambar automatis tergantung light/dark mode
var img = document.getElementById('gambarkonten').src;
var img1 = document.getElementById('gambarkonten1').src;
var img2 = document.getElementById('gambarkonten2').src;
var img3 = document.getElementById('gambarkonten3').src;
var img4 = document.getElementById('gambarkonten4').src;
var img5 = document.getElementById('gambaradmin1').src;
var img6 = document.getElementById('gambarfeedback').src;
var img7 = document.getElementById('gambarmore').src;
var img8 = document.getElementById('gambarfind').src;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'light') {
        toggleSwitch.checked = true;
        toggleSwitch1.checked = true;
        if(toggleSwitch.checked === true || toggleSwitch1.checked === true){
            document.getElementById('gambarkonten').src  = 'gambar/konten2.png';
            document.getElementById('gambarkonten1').src  = 'gambar/logo_web_2.png';
            document.getElementById('gambarkonten2').src  = 'gambar/top1.png';
            document.getElementById('gambarkonten3').src  = 'gambar/wat1.png';
            document.getElementById('gambarkonten4').src  = 'gambar/more1.png';
            document.getElementById('gambaradmin1').src  = 'gambar/bgadmin1.png';
            document.getElementById('gambarfeedback').src  = 'gambar/feedback1.png';
            document.getElementById('gambarmore').src  = 'gambar/kontenmore1.png';
            document.getElementById('gambarfind').src  = 'gambar/find1.png';
        }else{
            document.getElementById('gambarkonten').src  = 'gambar/konten3.png';
            document.getElementById('gambarkonten1').src  = 'gambar/logo_web.png';
            document.getElementById('gambarkonten2').src  = 'gambar/top.png';
            document.getElementById('gambarkonten3').src  = 'gambar/wat.png';
            document.getElementById('gambarkonten4').src  = 'gambar/more.png';
            document.getElementById('gambarfeedback').src  = 'gambar/feedback2.png';
            document.getElementById('gambarmore').src  = 'gambar/kontenmore2.png';
            document.getElementById('gambarfind').src  = 'gambar/find.png';
        }
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);
toggleSwitch1.addEventListener('change', switchTheme, false);

// image slide kanan kiri
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}