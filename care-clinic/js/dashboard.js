var clock = document.getElementById('#time')

function updateTime() {
    var now = moment().format("dddd, Do MMMM k:mm a");
    time.textContent = now;
}

setInterval(updateTime, 1000);
updateTime();