const contenedor = document.querySelector('.contenedor');
const loginlink = document.querySelector('.login-link');
const registerlink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnlogin-popup');
const iconClose = document.querySelector('.icon-close');

registerlink.addEventListener('click', ()=> {
    contenedor.classList.add('activo');
});

loginlink.addEventListener('click', ()=> {
    contenedor.classList.remove('activo');
});

btnPopup.addEventListener('click', ()=> {
    contenedor.classList.add('activo-popup');
});

iconClose.addEventListener('click', ()=> {
    contenedor.classList.remove('activo-popup');
});
