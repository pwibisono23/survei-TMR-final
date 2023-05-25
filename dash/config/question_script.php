<?php 
    include("config/config.php");

    $db = $con;
    $tableName = 'questions';
    $column = ["id", "question", "sangat_puas", "puas", "cukup_puas", "tidak_puas", "tanggal"];
    $fetchData = fetch_data($db, $tableName, $column);

    function fetch_data($db, $tableName, $column){
        if(empty($db)){
            $msg = "Database connection error";
        } elseif(empty($column) || !is_array($column)){
            $msg = "Column name must be defined in an indexed array";
        } elseif(empty($tableName)){
            $msg = "Table name is empty";
        } else{
            $columnName = implode(", ", $column);
            $query = "SELECT ".$columnName." FROM $tableName"." ORDER BY id ASC";
            $result = $db->query($query);

            if($result==true){
                if($result->num_rows > 0){
                    $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    $msg = $row;
                } else{
                    $msg = "No Data Found";
                }
            } else{
                $msg = mysqli_error($db);
            }
        }
        return $msg;
    }
?>