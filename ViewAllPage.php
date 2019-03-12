<!DOCTYPE html>

<html>

<head>

    <!-- CSS Block -->
    <style>
        table {
            border-collapse: collapse;
            width: 40%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #0D2C6C;
            color: white;
        }
    </style>

    <!--CSS Block for container and text -->
    <style>
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
</head>
<body>

<table width="585" border="1" cellpadding="1" cellspacing="1">
    <tr>
        <th>Flight #</th>
        <th>Location</th>
        <th>Attendees</th>
        <th>Delayed</th>
    </tr>

<?php


$FromFAL = "";
$FromFW = "";
$FAL = "";
$FW = "";

$currenttime = 1000;

$tour = array
(
    array(1015,"Flightworks",18,FALSE),
    array(1025,"Flightworks, traveling",13,FALSE),
    array(1045,"FAL",20,TRUE),
    array(1100,"FAL, traveling",15,FALSE),
    array(1115,"FAL",12,FALSE),
    array(1130,"FAL",30,FALSE)
);


//loop through each tour and display the info on the table
foreach($tour as $row) {
    //if time is an hour past in either direction of the current time don't display those results this needs to be adjusted
    if (($row[0]-$currenttime) < 101 && ($row[0]-$currenttime) > -101) {
        echo('<tr>');
        if($row[1] == "Flightworks")
        {
            if($FW)
            {
                $FW .= " " . $row[0];
            }
            else
                $FW = "Flight " . $row[0];
        }

        elseif($row[1] == "Flightworks, traveling")
        {
            if($FromFW)
            {
                $FromFW .= " " . $row[0];
            }
            else
                $FromFW = "Flight " . $row[0];
        }

        elseif($row[1] == "FAL")
        {
            if($FAL)
            {
                $FAL .= " " . $row[0];
            }
            else
                $FAL = "Flight " . $row[0];
        }

        elseif($row[1] == "FAL, traveling")
        {
            if($FromFAL)
            {
                $FromFAL .= " " . $row[0];
            }
            else
                $FromFAL = "Flight " . $row[0];
        }
        foreach ($row as $cell) {
            echo('<td>' . $cell . '</td>');
        }
        echo('</tr>');


    }
}


?>

</table>

<div class="container">
    <img src="map.png" alt="map" style="width:40%;">
    <div class="bottom-left"><?php echo $FAL; ?></div>
    <div class="top-left"><?php echo $FromFAL; ?></div>
    <div class="top-right"><?php echo $FW; ?>t</div>
    <div class="centered"><?php echo $FromFW; ?></div>
</div>

</body>
</html>