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
        }else{
            document.getElementById('gambarkonten').src  = 'gambar/konten3.png';
            document.getElementById('gambarkonten1').src  = 'gambar/logo_web.png';
            document.getElementById('gambarkonten2').src  = 'gambar/top.png';
            document.getElementById('gambarkonten3').src  = 'gambar/wat.png';
            document.getElementById('gambarkonten4').src  = 'gambar/more.png';
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
