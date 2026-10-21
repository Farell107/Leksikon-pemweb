window.onload = function() {
    var notif = document.getElementById("notif");
    if (notif) {
        setTimeout(function() {
            notif.style.opacity = "0";
        }, 2000);
        setTimeout(function() {
            notif.remove();
        }, 2500);
    }
};
