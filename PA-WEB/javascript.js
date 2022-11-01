function nav_responsive() {
    var x = document.getElementById("nav");
    var y = document.getElementById("login");
    if(x.style.display =='none' && x.style.display =='none'){
        x.style.display ='flex';
        y.style.display ='flex';
    } else{
        x.style.display ='none';
        y.style.display ='none';
    }
}

const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]');
const currentTheme = localStorage.getItem('theme');

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);
  
    if (currentTheme === 'light') {
        toggleSwitch.checked = true;
    }
}

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light');
    }
    else {document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);
