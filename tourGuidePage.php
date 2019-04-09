<?php
    // Start the session
    session_start();
?>

<?php
    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "myDB";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>

<?php
    $_SESSION["EmpId"] = "12345";
    $tourGuideID = $_SESSION["EmpId"];  //get session from login page

    $guideRowData = mysql_query("SELECT * FROM Employee WHERE EmpId = " . $tourGuideID);
    $Name = mysql_fetch_assoc($Employee);
    $tourRowData = mysql_query("SELECT * FROM tourInfo WHERE guide = " . $Name);


    $delay = mysql_fetch_assoc($tourRowData);
    if ($delay == 0){
        $statusText = "Normal";
        $statusColor = "lightgreen";
    }
    else {
        $statusText = "Delayed";
        $statusColor = "red";
    }

    $numberOfParticipants = mysql_fetch_assoc($tourRowData);
    $startTime = mysql_fetch_assoc($tourRowData);
    $endTime = mysql_fetch_assoc($tourRowData);
    $flightNumber = date('Gi', $startTime);

    if(!empty($_POST['Location'])){
        $location = $_POST['Location'];
        $sql = "UPDATE tourInfo SET location='$location' WHERE guide = " . $Name;
    }
    else $location = "Location";
?>

<?php
function updateStatus($delay, $Name) {
    if ($delay == 0){
        $sql = "UPDATE tourInfo SET delay=1 WHERE guide = " . $Name;
    }
    else {
        $sql = "UPDATE tourInfo SET delay=0 WHERE guide = " . $Name;
    }
}


//will run when delay button is clicked
if (isset($_GET['delayClick'])) {
    updateStatus($delay, $Name);
}

?>
<?php
    $conn->close();
?>



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

    .logoutLblPos{
        position:fixed;
        box-sizing: content-box;
        right:10px;
        top:5px;
        font-size:50px;
    }
</style>




<body>
<!--FWA LOGO-->
<div align="center">
    <img src="images\logo.png" alt="Flight Works Alabama"/>
</div>




<!--Employee Information-->
<?php
echo "<div style= 'font-size: 160%; margin: 0 auto; width: 100px; color: white'>$Name</div>";

//Tour Information

echo "
        <div class = 'tour_info'>
            <font size = '6'><b>Flight $flightNumber</b></font>
            <br>Passengers: $numberOfParticipants
            <br>Departure: " . date('g:i a', $startTime) . "
            <br>Landing: " . date('g:i a', $endTime) . "
            <br><font color=$statusColor>Status: <b>$statusText</b></font>
        </div>
        ";


//Controls and Forms
echo "
        <form action = 'viewAllPage.php' align='center' method='post'>
            <select name = 'Location' class='controls'>
                <option>$location</option>
                <option value='FlightWorks'>FlightWorks</option>
                <option value='Final Assembly Line'>FAL</option>
                <option value='On Bus to FW'>On Bus -> FW</option>
                <option value='On Bus to FAL'>On Bus -> FAL</option>
            </select>
            <input type ='button' class='controls' value = 'Delay' onclick= \"window.location.href = 'tourGuidePage.php?delayClick=true';\"/>
            <input type = 'submit' class='controls' value = 'View All'/>

            <!--Logout Button-->
            <input type =\"button\" class='controls' value = 'Log Out' onclick= \"window.location.href = 'login.php';\"/>
        </form>


        ";
?>


<textarea readonly cols="80" rows="40">
       Here is the spot to add a script to.
    </textarea>


</body>
</html>
