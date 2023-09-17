function hour_actualisation() {
    var date = new Date();
    var hour = date.getHours();
    var minute = date.getMinutes();
    var second = date.getSeconds();

    if (hour < 10) {
        hour = "0" + hour;
    }

    if (minute < 10) {
        minute = "0" + minute;
    }

    if (second < 10) {
        second = "0" + second;
    }

    return document.getElementById("hour").innerHTML = hour + ":" + minute + ":" + second;

} 

if (document.getElementById("hour")) {
    setInterval(hour_actualisation, 1000);
}

