<?php
    include("config/question_script.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Cetak Laporan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        
</head>
<body>
    <a href="survei.php"><img src="assets/img/ragunan-logo.png" alt="razoo" width="87" height="83"></a>
    <div class="col-12 dki-logo">
        <a href="survei.php"><img src="assets/img/pemprov-dki.png" alt="dki" width="68" height="77"></a>
    </div>
    <h1 class="text-center">Unit Pengelola Taman Margasatwa Ragunan</h1> 
    <h2 class="text-center">Laporan Survei Kepuasan Pengunjung</h2>
    <div class="card-body">
        <table class="table tabe-hover table-bordered" id="list">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Question</th>
                    <th class="text-center">Sangat Puas</th>
                    <th class="text-center">Puas</th>
                    <th class="text-center">Cukup Puas</th>
                    <th class="text-center">Tidak Puas</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if(is_array($fetchData)){
                    foreach($fetchData as $data){
                    ?>
                    <tr>
                        <td class="text-center"><?php echo $data['id']; ?></td>
                        <td><?php echo $data['question']??''; ?></td>
                        <td class="text-center"><?php echo $data['sangat_puas']??''; ?></td>
                        <td class="text-center"><?php echo $data['puas']??''; ?></td>
                        <td class="text-center"><?php echo $data['cukup_puas']??''; ?></td>
                        <td class="text-center"><?php echo $data['tidak_puas']??''; ?></td>
                                                    
                    </tr>
                    <?php
                    }} else{ ?>
                        <tr>
                            <td colspan="8">
                            <?php echo $fetchData; ?>
                            </td>
                            <tr>
                                <?php } ?>
                            </tr>
                        </tr>
            </tbody>
        </table>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>
</html>