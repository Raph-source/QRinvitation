let menu = document.querySelector('.menu')
let sideBar = document.querySelector('.side-bar')
menu.addEventListener('click',function () {
  /*  document.querySelectorAll('a').forEach(element => {
        element.style.width=90+"%"
        element.querySelector('span').style.visibility="visible";
        element.querySelector('span').style.fontSize=15+"px";
    });*/
    sideBar.classList.toggle("menu-vis");
})
document.querySelectorAll('a').forEach(element => {
    element.addEventListener('mouseover',function(params) {
        sideBar.classList.toggle("visible");
    })
});
document.querySelectorAll('span').forEach(element => {
    element.addEventListener('mouseover',function(params) {
        sideBar.classList.toggle("visible");
    })
});
