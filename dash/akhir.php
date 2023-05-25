<?php
include("config/functions-survei.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5;url=http://localhost/dash/survei.php" />
    <title>Survei Kepuasan Pengunjung - Taman Margasatwa Ragunan</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
</head>

<body>
    <div class="container-fluid py-3 text-center text-white border-bottom border-4 rounded-bottom header">
        <div class="row">
            <div class="col-12 col-xl-12">
                <h1>Taman Margasatwa Ragunan</h1>
                <a href="survei.php"><img src="assets/img/ragunan-logo.png" alt="razoo" width="87" height="83"></a>
            </div>
            <div class="col-12 dki-logo">
                <a href="survei.php"><img src="assets/img/pemprov-dki.png" alt="dki" width="68" height="77"></a>
            </div>
        </div>
    </div>

    <div class="container-fluid text-center">
        <div class="row">
            <div class="col-12 sub-header">
                <h2>Survei Kepuasan Pengunjung</h2>
            </div>
        </div>
    </div>

    <div class="icons">
        <input type="image" name="spuas" id="end" src="assets/img/wink.png"></a>
        <h2 class="tq">TERIMAKASIH TELAH MENGISI SURVEI</h2>
    </div>

    <div class="time">
        <div class="clock">
            <strong><span id="spanClock">
                    <script type="text/javascript">
                        var clock = document.getElementById("spanClock");

                        function time() {
                            var d = new Date();
                            var m = d.getMinutes();
                            var h = d.getHours();
                            clock.textContent = ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2);
                        }
                        setInterval(time, 1000);
                    </script>
                </span></strong>
        </div>
    </div>

    <div class="footer">
        <div class="run-text">
            <b>
                <marquee behavior="" direction="">Slot gacor hanya di www.beta138.com | Man-UTD vs Liverpool : 0 - 7</marquee>
            </b>
        </div>
    </div>
</body>

</html>