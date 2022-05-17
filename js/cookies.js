//import Cookies from '/js/js-cookie.min.js';

console.log("COOKIES!");
//$("#cook").css("display", "none");
console.log(document.cookie);

if (Cookies.get('cookies') != 'yes') {
    $("#cook").css("display", "flex");
}

$('#cookies-accept').click(function () {
    Cookies.set('cookies', 'yes')
    location.reload();
});