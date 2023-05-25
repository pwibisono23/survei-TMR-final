<?php
    function register($data){
        global $con;

        $firstname = stripslashes($data["firstname"]);
        $lastname = stripslashes($data["lastname"]);
        $email = strtolower(stripslashes($data["email"]));
        $password = mysqli_real_escape_string($con, $data["password"]);
        $cpassword = mysqli_real_escape_string($con, $data["cpassword"]);

        //cek username ada atau belum
        $result = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");

        if(mysqli_fetch_assoc($result)){
            echo "<script>alert('Email already exist')</script>";

            return false;
        }

        //cek confirm password

        if($password !== $cpassword){
            echo "<script>alert('Password Does Not Match')</script>";

            return false;
        }

        //enkrip password
        $password = password_hash($password, PASSWORD_DEFAULT);


        //tambahkan user baru ke database
        mysqli_query($con, "INSERT INTO users VALUES('', '$firstname', '$lastname', '$email', '$password')");

        return mysqli_affected_rows($con);
    }

    function questionAdd($dataQuestion){
        global $con;

        $question = mysqli_real_escape_string($con, $dataQuestion["question"]);
        
        //cek pertanyaan ada atau belum
        $resultQuestion = mysqli_query($con, "SELECT question FROM questions WHERE question = '$question'");

        if(mysqli_fetch_assoc($resultQuestion)){
            echo "<script>alert('Question already exist')</script>";

            return false;
        }

        mysqli_query($con, "INSERT INTO questions VALUES('', '$question', '', '', '', '', CURRENT_TIMESTAMP())");

        return mysqli_affected_rows($con);
    }

    function deleteUser($dataDelete){
        global $con;

        $delete = mysqli_real_escape_string($con, $dataDelete["firstname"]);
        
        //cek pertanyaan ada atau belum
        $resultDelete = mysqli_query($con, "SELECT firstname FROM users WHERE firstname = '$delete'");

        if(mysqli_fetch_assoc($resultDelete)){
            echo "<script>alert('Data already removed')</script>";

            return false;
        }

        mysqli_query($con, "DELETE FROM users WHERE id = ?");

        return mysqli_affected_rows($con);
    }


?>