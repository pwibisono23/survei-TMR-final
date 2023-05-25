<?php
    include_once("config.php");

    //Delete user
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql = "DELETE FROM users WHERE id = '$user_id'";

        $result = $con->query($sql);

        if($result == TRUE){
            echo "Data removed successfully";
            header("Location: ../settings.php");
        } else{
            echo "Error:". $sql . "<br>" . $con->error;
        }
    }
?>