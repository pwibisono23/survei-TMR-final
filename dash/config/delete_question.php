<?php
    include_once("config.php");
    
    //Delete question
    if(isset($_GET['id'])){
        $question_id = $_GET['id'];

        $sql = "DELETE FROM questions WHERE id = '$question_id'";

        $result = $con->query($sql);

        if($result == TRUE){
            echo "Data removed successfully";
            header("Location: ../question.php");
        } else{
            echo "Error:". $sql . "<br>" . $con->error;
        }
    }
?>