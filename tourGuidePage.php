<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Individual Page</title>
    <link rel="stylesheet" type="text/css" href="default.css"/>
</head>

<style>
    .tour_info {
        background-color: #0D2C6C;
        border: none;
        color: white;
        width: 380px;
        text-align: center;
        font-size: 16px;
        margin: 5px auto;
        padding: 10px;
    }
    .controls {
        background-color: #0D2C6C;
        border: none;
        color: white;
        padding: 24px 32px;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 6px 2px;
        cursor: pointer;
    }
    #delayClock {
        display: none;
    }

    body{
        background-color: #07495f
    }

    .button {
        background-color: #0D2C6C;
        border: none;
        color: white;
        padding: 30px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 6px 2px;
        cursor: pointer;
    }

    textarea {
        display: block;
        margin-left: auto;
        margin-right: auto;
        overflow-y: scroll;
    }

    tr{
        margin: 0 auto;
        width: 100px;
        color: white;
    }

    /* Container holding the image and the text */
    .container {
        position: relative;
        text-align: left;
        color: black;
    }
    /* TEXT FOR FAL FLIGHTS */
    .bottom-left {
        position: absolute;
        bottom: 100px;
        left: 150px;
    }
    /* TEXT FOR FLIGHTS LEAVING FAL */
    .top-left {
        position: absolute;
        top: 300px;
        left: 150px;
    }
    /* TEXT FOR FLIGHTS @FW */
    .top-right {
        position: absolute;
        top: 100px;
        right: 1210px;
    }
    /* TEXT FOR FLIGHTS LEAVING FW */
    .centered {
        position: absolute;
        top: 60%;
        left: 30%;
        transform: translate(-50%, -50%);
    }
</style>

<body>

<?php
$tourGuideName = "Theodore Roosevelt";
$status = "Normal";
$flightNumber = "210";
$numberOfPassengers = "25";
$departureString = "11:00:00";
$departureTime = strtotime($departureString);
$landingString = "12:00:00";
$landingTime = strtotime($landingString);
?>

<div align="center">
    <img src="images\logo.png" alt="Flight Works Alabama"/>
</div>


<!--Employee Information-->

<form id = "delayClock"><font color="red"><label id="minutes">00</label>:<label id="seconds">00</label></font></form>

<?php
echo "<div style='float: left; color: white'>Status: <b>$status</b></div>";
echo "<div style='float: right'><form action='login.php'><input type='submit' value='Log Out' /></form></div>";
echo "<div style= 'margin: 0 auto; width: 100px; color: white'>$tourGuideName</div>";

//Tour Information

echo "
    <div class = 'tour_info'>
        <font size = '6'><b>Flight $flightNumber</b></font>
        <br>Passengers: $numberOfPassengers
        <br>Departure:" . date('h', $departureTime) .  ":" . date('i', $departureTime) . "
        <br>Landing:" . date('h', $landingTime) .  ":" . date('i', $landingTime) . "
    </div>
    ";


//Controls and Forms
echo "
    <form action = 'viewAllPage.php' align='center'>
        <select class='controls'>
            <option>Location</option>
            <option value='Building A'>Building A</option>
            <option value='Building B'>Building B</option>
            <option value='On Bus'>On Bus</option>
        </select>
        <input type ='button' class='controls' value = 'Delay' onclick='toggleClock()'/>
        <input type = 'submit' class='controls' value = 'View All'/>
    </form> 
    "
?>

<textarea readonly cols="80" rows="40">
   Here is the spot to add a script to.
</textarea>


<!--Javascript Scripts-->

<script>
    var minutesLabel = document.getElementById("minutes");
    var secondsLabel = document.getElementById("seconds");
    var totalSeconds = 0;
    setInterval(setTime, 1000);

    function setTime() {
        document.getElementById("seconds").innerHTML = pad(totalSeconds % 60);
        document.getElementById("minutes").innerHTML = pad(parseInt(totalSeconds / 60));

        ++totalSeconds;
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
        var x = document.getElementById("delayClock");
        if (x.style.display == "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
            totalSeconds = 0;
        }
    }
</script>



</body>
</html>
