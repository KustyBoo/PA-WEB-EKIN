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
var img = document.getElementById('gambarkonten').src;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
    if (currentTheme === 'light') {
        toggleSwitch.checked = true;
        toggleSwitch1.checked = true;
        if(toggleSwitch.checked === true || toggleSwitch1.checked === true){
            document.getElementById('gambarkonten').src  = 'konten2.png';
        }else{
            document.getElementById('gambarkonten').src  = 'konten3.png';
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

// pop-up login
function poplogin(){
    document.getElementById("log-form").style.display = "flex";
}

function clslogin(){
    document.getElementById("log-form").style.display = "none";
}

// save posisi scroll refresh
document.addEventListener("DOMContentLoaded", function (event) {
    var scrollpos = localStorage.getItem("scrollpos");
    if (scrollpos) window.scrollTo(0, scrollpos);
});
    window.onscroll = function (e) {
    localStorage.setItem("scrollpos", window.scrollY);
};