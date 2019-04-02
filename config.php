<?php
/**
 * Created by PhpStorm.
 * User: Christian
 * Date: 3/6/2019
 * Time: 4:00 PM
 */


   $dbhost = 'localhost:3306';
   $dbuser = 'root';
   $dbpassword = 'Protoman3';
   $dbname = 'location';
   $db = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname);

// Check connection
if( $db == false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>