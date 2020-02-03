<?php

    include "db.php";

    // If the user clicked on the signup button
    if(is_set($_POST['signup'])){   

        // variables to hold the submitted data;

        $username=$_POST['username'];
        $password=$_POST['password'];

        // just view the w3school file handling on this one, 
        // https://www.w3schools.com/php/php_file_upload.asp    view this page for more details

        $file_tmp=$_FILES['image']['tmp_name'];
        $file_name=$_FILES['image']['name'];
        $file_uploaded_successfully=false;

        // probably is an overkill to check if username is unique or not for the exam perspective. you can skip this


        // ____________ OPTIONAL ______________//
            $check_username_unique_query = "SELECT FROM users WHERE USERNAME='$username'";
            $fetch_user_details="SELECT FROM USERS WHERE username='$username'";

            $result=$conn->query($fetch_user_details);

            // if there is already an existing user with the provided username, redirect to the signup page;
            if($result->num_rows>0){
                header('location:signup.php')
            }
            // close the connection
            $conn->close();
        // ____________ OPTIONAL ______________//

        // File handling
        // Move uploaded image to uploads folder
        if(move_uploaded_file($file_tmp,'uploads/')){
            $file_uploaded_successfully=true;
        }else{
            $file_uploaded_successfully=false;
        }

        // If file uploaded successfully
        if($file_uploaded_successfully){
            // construct a insert query to save user details
            $insert_query="INSERT INTO users(USERNAME,PASSWORD,IMAGE) VALUES(
                '$username','$password','$file_name'
            )";

            // If the query ran without error
            if(mysqli_query($conn,$insert_query)){
                echo "Signed up successfully";
            }else{
                echo "Something went wrong while signing up!";
            }
        }

    }else{
        // user visited the page directly so redirect!!!
        header('location:signup.php');
    }

?>