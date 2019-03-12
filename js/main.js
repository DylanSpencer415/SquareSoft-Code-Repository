// Your code here!
/*
window.onload = function startTime() {
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('txt').innerHTML =
		h + ":" + m + ":" + s;
	var t = setTimeout(startTime, 500);
}

function checkTime(i) {
	if (i < 10) { i = "0" + i };  // add zero in front of numbers < 10
	return i;
}

function toggleClock() {
	var x = document.getElementById('txt');
	if (x.style.display === "none") {
		x.style.display = "block";
	} else {
		x.style.display = "none";
	}
}

function clock() {
	message.innerHTML = "The time is " + Date();
	var timer = setInterval(clock, 1000);
	var msec = 00;
	var sec = 00;
	var min = 00;

	msec += 1;
	console.log(min + ":" + sec + ":" + msec);
	if (msec == 60) {
		sec += 1;
		msec = 00;
		console.log(min + ":" + sec + ":" + msec);
		if (sec == 60) {
			sec = 00;
			min += 1;
			console.log(min + ":" + sec + ":" + msec);
			if (sec % 2 == 0) {
				alert("Pair");
			}
		}
	}
	document.getElementById('timer').innerHTML = min + ":" + sec + ":" + msec;
}
*/

var minutesLabel = document.getElementById("minutes");
var secondsLabel = document.getElementById("seconds");
var totalSeconds = 0;
setInterval(setTime, 1000);

function setTime() {
  ++totalSeconds;
  document.getElementById("seconds").innerHTML = pad(totalSeconds % 60);
    document.getElementById("minutes").innerHTML = pad(parseInt(totalSeconds / 60));
}

function pad(val) {
  var valString = val + "";
  if (valString.length < 2) {
    return "0" + valString;
  } else {
    return valString;
  }
}

function toggleClock() {
    var x = document.getElementById('minutes');
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}