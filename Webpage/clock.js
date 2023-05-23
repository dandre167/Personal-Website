"use strict";

function startTime() {
    var today = new Date();
    var date = (today.getMonth() + 1) + '/' + today.getDate() + '/' + today.getFullYear();
    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
    var dateTime = date + ' ' + time;
    document.getElementById('date').innerHTML = date;
    document.getElementById('time').innerHTML = time;
    setTimeout(startTime, 1000);
}

