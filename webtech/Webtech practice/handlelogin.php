<?php

    // probably not necessary here. but after login, you have to put session_start() on every page if you set session;
    session_start();    

    // don't forget to include the db.php file because we need to query the database.
    include "db.php";

    // if the form is submitted i.e. the user reached this page by clicking on the login button and not directly visiting the page by typing the url in the navbar
    if(is_set($_POST['login'])){

        // get the form values. they are saved in $_POST[]. the '$_POST' is provided by php. the method in <form method="POST"></form> must be a POST request. there are other requests as well, like get, delete, put, patch etc.
        $username=$_POST['username'];
        $password=$_POST['password'];


        // temporary variable to hold the password saved in the database;
        $original_password="";

        // a query to select the details of the user where username equals to the username provided by the user in the login form
        $fetch_user_details="SELECT FROM USERS WHERE username='$username'";

        // execute the query using $conn->query and save the result in $result variale
        $result=$conn->query($fetch_user_details);

        // if there are more than 0 records in the $result variable i.e. the user provided proper username
        if($result->num_rows>0){
            // don't know what this does. i must have copied it from the internet. 
            // just understand that, we are looping for each items in the $result variable.
            // the $row is just a temporary variable to hold the current iterating value
            // here, the $result holds exactly one result. and THAT we have to make sure since we don't want duplicate username.
            while($row=$result->fetch_assoc()){
                // set the original password value of the database value;
                $original_password=$row['PASSWORD'];
            }
        }
        // close the connection
        $conn->close();


        // if the user typed password wrong;
        if($original_password!==$password){
            // redirect the user to the login page;
            header('location:login.php');
        }else{
            // if the user clicked the rememberme checkbox, set a cookie
            if(is_set($_POST['rememberme']){
                setcookie('logged_in',true,time()*60);
            }

            // create a session for the user. just add a unique value to the session. Do not include password in the session;
            $_SESSION['username']=$username;

            // home.php is the langing page;
            header('location: home.php');
        }


    }else{
        // user cheated and directly accessed the page. Redirect him to the login page;
        header('location:login.php');
    }

?>