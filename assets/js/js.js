let btn = document.querySelectorAll('.voir')
let Qrcode = document.querySelector('.Qrcode')
let closes = document.querySelector('.close')
//let src;

let img = document.createElement('img');
btn.forEach(element => {
    element.addEventListener('click',function () {
        let src = element.querySelector('img').getAttribute('src')
        img.setAttribute('src',src)
        Qrcode.prepend(img)
        Qrcode.classList.toggle('Qrcode-vis')
    })
});
closes.addEventListener('click',function () {
    Qrcode.classList.remove('Qrcode-vis')
})