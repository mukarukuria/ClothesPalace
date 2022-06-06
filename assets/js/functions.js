function closeHelpDiv(){
    document.getElementById("alertbox").style.display = "none";
}
function showmin(newmin){
    document.getElementById('amount1').value = newmin;
}
function showmax(newmax){
    document.getElementById('amount2').value = newmax;
}
function showcredit(){
    document.getElementById('creditdiv').style.display = 'flex';
    document.getElementById('mpesadiv').style.display = 'none';
    document.getElementById('paypaldiv').style.display = 'none';
}
function showpaypal(){
    document.getElementById('paypaldiv').style.display = 'block';
    document.getElementById('mpesadiv').style.display = 'none';
    document.getElementById('creditdiv').style.display = 'none';
}
function showmpesa(){
    document.getElementById('mpesadiv').style.display = 'block';
    document.getElementById('creditdiv').style.display = 'none';
    document.getElementById('paypaldiv').style.display = 'none';
}
function passwordchecker(passid){
    var field= document.getElementById(passid);
    if (field.type === "password") {
        field.type = "text";
    } else {
        field.type = "password";
    }
}
window.addEventListener('DOMContentLoaded', event => {
const sidebarToggle = document.body.querySelector('#sidebarToggle');
if (sidebarToggle) {
    sidebarToggle.addEventListener('click', event => {
        event.preventDefault();
        document.body.classList.toggle('sb-sidenav-toggled');
        localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
    });
}
});
window.addEventListener('DOMContentLoaded', event => {
    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple);
    }
});

