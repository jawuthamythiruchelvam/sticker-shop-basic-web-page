<?php

    $servern="localhost";
    $user="root";
    $password="";
    $db_name="assignmentbb";
    
    
    try{
        $conn=mysqli_connect($servern,$user,$password,$db_name);
    }
    catch(mysqli_sql_exception){
        echo"could not connect!";
        }

    // if(isset($conn)){
    //     echo" connected to server";
    // }
?>
