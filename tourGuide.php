<!DOCTYPE html>
<html>
<head>


<!--Style Segment: defines look of various objects, uses CSS-->

<style>
textarea {
    display: block;
    margin-left: auto;
    margin-right: auto;
}
</style>
</head>



<!--Script Segment: functions that perform certain actions upon a response-->

<script>

<!--A test clock that displays current military time and updates-->
function startTime() {
  <!--var today = new Date();-->
  <!--var h = today.getHours();-->
  <!--var m = today.getMinutes();-->
  <!--var s = today.getSeconds();-->
  
  var timer = setInterval(clock, 1000);
  var h = 00;
  var m = 00;
  var s = 00;

  s += 1;
    console.log(h + ":" + m + ":" + s);
    if (s == 60) {
        m += 1;
        s = 00;
        console.log(h + ":" + m + ":" + s);
        if (m == 60) {
            h += 1;
	    m = 00;
            console.log(h + ":" + m + ":" + s);
        }
    }
  h = checkTime(h);
  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('txt').innerHTML =
  h + ":" + m + ":" + s;
  <!--var t = setTimeout(startTime, 500);-->
}



function test(){
 	var timer = new Timer();
	timer.start();
	timer.addEventListener('secondsUpdated', function (e) {
    		$('#basicUsage').html(timer.getTimeValues().toString());
	});
}




function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}

<!--Used to toggle the clock with a button is pressed-->
function toggleClockL() {
  var x = document.getElementById('txt');
  if (x.style.display === "none") {
    x.style.display = "block";
    clock();
  } else {
    x.style.display = "none";
  }
}
function toggleClockS() {
  var x = document.getElementById('timer');
  if (x.style.display === "none") {
    x.style.display = "block";
    clock();
  } else {
    x.style.display = "none";
  }
}

<!--A test clock that starts at 00:00:00 and counts up-->
function clock(){
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

</script>


<!--HTML Segment: Defines placement of various objects-->

<body onload="startTime()" onload="clock()">
<h1>Flight Works Alabama</h1>



<div id="txt"></div> <!--create persistent timer-->	<!--only need one timer-->
<div id="timer"></div> <!--create persistent timer-->
<div id="basicUsage">00:00:00</div>


<!--Employee Information-->

<div style="float: left">Status: <b>Normal</b></div>									<!--Get Status and Name from Database -->
<div style="float: right"><form action="loginPage.php"><input type="submit" value="Log Out" /></form></div>		<!--Replace "loginPage.php" with Christian's page-->
<div style="margin: 0 auto; width: 100px;">Teddy Roosevelt</div>


<!--Tour Information-->

<p><b>Tour Info</b>
<br>Flight 210												<!--Get Flight Name and number of people from Database-->
<br>25 People</p>



<!--Controls and Forms-->

<!--Location drop down menu-->
<select>
	<option></option>
	<option value="Building A">Building A</option>
	<option value="Building B">Building B</option>
	<option value="On Bus">On Bus</option>
</select>

<!--Delay Button, View All Button Link-->
<button onclick="toggleClockL()">Delay</button>
<button onclick="toggleClockS()">Delay</button>
<button onclick="test()">Start Timer Test</button>

<form action="viewAllPage.php"><input type="submit" value="View All" /></form>				<!--Replace "viewAllPage.php" with David's Page-->


<!--Text Area for script-->
<textarea name="tour guide's script" cols="30" rows="20"></textarea>


</body>
</html>