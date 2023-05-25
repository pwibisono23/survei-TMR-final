<?php 
    include("config/question_script.php");
    include("config/function.php");

    if(isset($_POST["addquestion"])){
        if(questionAdd($_POST) > 0){
            echo "<script>alert('Question Successfully Added');</script>";
            header("Location: question.php");
        } else {
            echo mysqli_error($con);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Pertanyaan</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="dashboard.php">Menu Admin</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="dashboard.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="question.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-question"></i></div>
                                Pertanyaan
                            </a>

                            <a class="nav-link" href="result.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Hasil Kuisioner
                            </a>
                            <div class="sb-sidenav-menu-heading">Account</div>
                            <a class="nav-link" href="settings.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-gear"></i></div>
                                User Settings
                            </a>
                            <a class="nav-link" href="survei.php">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-square-poll-vertical"></i></div>
                                Visit Survey
                            </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Pertanyaan</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Pertanyaan</li>
                        </ol>
                        
                        <h3 class="header2">Data Pertanyaan</h3>
                        <input type="checkbox" id="toggle">
                        <label for="toggle">Tambah Pertanyaan</label>

                        <dialog>
                            <h3>Tambah Pertanyaan</h3>
                            <form action="" method="POST">
                            <input type="text" name="question" placeholder="Masukkan pertanyaan" id="inputId">
                            <button type="submit" name="addquestion">Tambah</button>
                            <button class="cancel">Batal</button>
                            </form>
                        </dialog>
                        <br><br>
                        <div class="card-body">
                            <table class="table tabe-hover table-bordered" id="list">
                                <thead>
                                    <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Question</th>
                                    <th class="text-center">Action</th>
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if(is_array($fetchData)){
                                        foreach($fetchData as $data){
                                            ?>
                                            <tr>
                                                <td class="text-center"><?php echo $data['id']; ?></td>
                                                <td class="text-center"><?php echo $data['tanggal']??''; ?></td>
                                                <td><?php echo $data['question']??''; ?></td>
                                                <td class="text-center"><a class="btn btn-danger" href="config/delete_question.php?id=<?php echo $data['id']; ?>">Hapus</a></td>
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
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Unit Pengelola Taman Margasatwa Ragunan 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
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
