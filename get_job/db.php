<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "job_description";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
        die('Could not Connect MySql Server:' .mysql_error());
    }
?>