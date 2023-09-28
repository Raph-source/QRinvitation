let menu = document.querySelector('.menu')
let sideBar = document.querySelector('.side-bar')
menu.addEventListener('click',function () {
  /*  document.querySelectorAll('a').forEach(element => {
        element.style.width=90+"%"
        element.querySelector('span').style.visibility="visible";
        element.querySelector('span').style.fontSize=15+"px";
    });*/
    if (sideBar.getAttribute('class')=="side-bar visible") {
        sideBar.classList.remove('visible');
    }
    else{
        sideBar.classList.toggle("menu-vis");
    }
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


let formulaire = document.getElementById('formulaire');

formulaire.addEventListener('submit', function(event){
    if(!confirm("voulez-vous supprimer? clickez sur <ok> pour confirmer")){
        event.preventDefault();
    }
});