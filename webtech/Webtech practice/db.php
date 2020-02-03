<!-- important file!!! you must import it to every file where you want to query the database -->
<?php

    // takes following parameters to establish the connection
    $server_name="localhost";
    $username="root";
    $password="root";
    $dbname="users";


    $conn=new mysqli($server_name,$username,$password,$dbname);

    // if there is a connection error, print the message; else move on;
    if($conn->connect_error){
        die("connection failed".$conn->connect_error);
    }

?>