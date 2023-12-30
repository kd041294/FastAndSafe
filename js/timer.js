let timeleft = 30;
let downloadTimer = setInterval(function () {
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if (timeleft <= 0)
        clearInterval(downloadTimer);
}, 1000);