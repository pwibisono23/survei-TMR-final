<?php
    include("config.php");

    $show = mysqli_query($con, "SELECT * FROM questions WHERE id = 3");
    $data = mysqli_fetch_array($show);

    $id = $data['id'];
    $sangat_puas = $data['sangat_puas'];
    $puas = $data['puas'];
    $cukup_puas = $data['cukup_puas'];
    $tidak_puas = $data['tidak_puas'];

    $keterangan = $_GET['ket'];

    if(isset($keterangan)){
        if($keterangan == "sangat_puas"){
            $sangat_puas = $sangat_puas+1;

            $query = "UPDATE questions SET sangat_puas = '$sangat_puas' WHERE id = '$id'";
        }
        elseif($keterangan == "puas"){
            $puas = $puas+1;

            $query = "UPDATE questions SET puas = '$puas' WHERE id = '$id'";
        }
        elseif($keterangan == "cukup_puas"){
            $cukup_puas = $cukup_puas+1;

            $query = "UPDATE questions SET cukup_puas = '$cukup_puas' WHERE id = '$id'";
        }
        elseif($keterangan == "tidak_puas"){
            $tidak_puas = $tidak_puas+1;

            $query = "UPDATE questions SET tidak_puas = '$tidak_puas' WHERE id = '$id'";
        }

        mysqli_query($con, $query);
        echo "<script>document.location = '../survei4.php'</script>";
        
    }

?>