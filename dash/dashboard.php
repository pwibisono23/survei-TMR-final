<?php
    include("config/config.php");

    $show = mysqli_query($con, "SELECT * FROM questions");
    $data = mysqli_fetch_array($show);

    $username = "root";
    $password = "";
    $database = "zoosurvei";

    try{
        $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
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
        <title>Dashboard Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
    <?php 
        try{
            $sql = "SELECT * FROM zoosurvei.questions";
            $result = $pdo->query($sql);
            if($result->rowCount()>0){
                $sangatPuas = array();
                $puas = array();
                $cukupPuas = array();
                $tidakPuas = array();

                while($row = $result->fetch()){
                    $sangatPuas[] = $row["sangat_puas"];
                    $puas[] = $row["puas"];
                    $cukupPuas[] = $row["cukup_puas"];
                    $tidakPuas[] = $row["tidak_puas"];
                }
                unset($result);
            } else{
                echo "No records matching your query were found";
            }
        } catch(PDOException $e){
            die("ERROR: Could not be able to execute $sql. ".$e->getMessage());
        }

        unset($pdo);
    ?>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Sangat Puas <br><br><?=$data['sangat_puas']?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Puas <br><br><?=$data['puas']?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div> ..
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Cukup Puas <br><br><?=$data['cukup_puas']?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Tidak Puas <br><br><?=$data['tidak_puas']?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Line Chart
                                    </div>
                                    <div class="card-body"><canvas id="lineChart" width="100%" height="50"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart
                                    </div>
                                    <div class="card-body"><canvas id="barChart" width="100%" height="50"></canvas></div>
                                </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.1/chart.min.js"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script type="text/javascript">

            //Setup Block
            const sangatPuas = <?php echo json_encode($sangatPuas); ?>;
            const puas = <?php echo json_encode($puas); ?>;
            const cukupPuas = <?php echo json_encode($cukupPuas); ?>;
            const tidakPuas = <?php echo json_encode($tidakPuas); ?>;
            const data = {
                labels: ['Pendapat anda tentang kebersihan', 'Pendapat anda tentang pelayanan', 'Pendapat anda tentang loket'],
                    datasets: [{
                        label: 'Sangat Puas',
                        data: sangatPuas,
                        backgroundColor: '#FEFF86',
                        borderColor: '#FEFF86',
                        borderWidth: 1
                    },
                    {
                        label: 'Puas',
                        data: puas,
                        backgroundColor: '#FD8A8A',
                        borderColor: '#FD8A8A',
                        borderWidth: 1
                    },
                    {
                        label: 'Cukup Puas',
                        data: cukupPuas,
                        backgroundColor: '#9EA1D4',
                        borderColor: '#9EA1D4',
                        borderWidth: 1
                    },
                    {
                        label: 'Tidak Puas',
                        data: tidakPuas,
                        backgroundColor: '#A8D1D1',
                        borderColor: '#A8D1D1',
                        borderWidth: 1
                    }]
                };

            //Config Block
            const config = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            }; 

            //Render Block
            const barChart = new Chart(
                document.getElementById('barChart'),
                config
            );

            //Data Line
            const dataline = {
                labels:  ['Pendapat anda tentang kebersihan', 'Pendapat anda tentang pelayanan', 'Pendapat anda tentang loket'],
                    datasets: [{
                        label: 'Sangat Puas',
                        data: sangatPuas,
                        backgroundColor: '#0000FF',
                        borderColor: '#0000FF',
                        borderWidth: 1
                    },
                    {
                        label: 'Puas',
                        data: puas,
                        backgroundColor: '#9D02D7',
                        borderColor: '#9D02D7',
                        borderWidth: 1
                    },
                    {
                        label: 'Cukup Puas',
                        data: cukupPuas,
                        backgroundColor: '#CD34B5',
                        borderColor: '#CD34B5',
                        borderWidth: 1
                    },
                    {
                        label: 'Tidak Puas',
                        data: tidakPuas,
                        backgroundColor: '#EA5F94',
                        borderColor: '#EA5F94',
                        borderWidth: 1
                    }]
                };

            //Config Line
            const configLine = {
                type: 'line',
                data: dataline,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        }
                    }
                }
            };

            //Render Block Line Chart
            const lineChart = new Chart(
                document.getElementById('lineChart'),
                configLine
            );
        </script>
    </body>
</html>
