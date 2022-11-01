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