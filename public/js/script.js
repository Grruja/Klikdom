// ===== OFFCANVAS OPEN & CLOSE
const myOffcanvas = document.getElementById('offcanvasNavbar');
const bsOffcanvas = new bootstrap.Offcanvas(myOffcanvas);

document.getElementById("openMenu").addEventListener('click',function (e){
    e.preventDefault();
    bsOffcanvas.toggle();
});
