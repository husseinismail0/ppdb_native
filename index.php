<?php
    session_start();
    ob_start();

    include "database/connect.php";
    include "controllers/register-controller.php";
    include "controllers/dashboard-controller.php";

    if(isset($_POST['create'])){ 
        $controller = new RegisterController();
        $table = 'tb_siswa';
        $redirect = 'create';

        $payload = [
            'nama_lengkap' => $_POST['nama'],
            'jk' => $_POST['jk'],
            'alamat_lengkap' => $_POST['alamat'],
            'asal_smp' => $_POST['asal_sekolah'],
            'agama' => $_POST['agama'],
            'jurusan' => $_POST['jurusan'],
        ];

        $controller->create($database, $table, $payload, $redirect);
    };

    if(isset($_POST['edit'])){ 
        $controller = new DashboardController();
        $table = 'tb_siswa';
        $redirect = 'dashboard';

        $payload = [
            'nama_lengkap' => $_POST['nama'],
            'jk' => $_POST['jk'],
            'alamat_lengkap' => $_POST['alamat'],
            'asal_smp' => $_POST['asal_sekolah'],
            'agama' => $_POST['agama'],
            'jurusan' => $_POST['jurusan'],
        ];

        $controller->update($database, $table, $_POST['student-id'], $payload, $redirect);
    };

    if(isset($_GET['page']) && $_GET['page'] === 'dashboard'){ 
        $controller = new DashboardController();
        $table = 'tb_siswa';

        $results = $controller->index($database, $table);
    };

    if(isset($_GET['page']) && $_GET['page'] === 'edit'){ 
        $controller = new DashboardController();
        $table = 'tb_siswa';

        $id = $_GET['id'];

        $data = $controller->detail($database, $table, $id);
    };

    if(isset($_GET['page']) && $_GET['page'] === 'print'){ 
        $controller = new DashboardController();
        $table = 'tb_siswa';

        $id = $_GET['id'];

        $data = $controller->detail($database, $table, $id);
    };

    if(isset($_POST['delete'])){ 
        $controller = new DashboardController();
        $table = 'tb_siswa';
        $redirect = 'dashboard';
        $id =  $_POST['student-id'];
        $results = $controller->delete($database, $table, $id, $redirect);
    };
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB SMK Semangat 45</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/flatly/bootstrap.min.css" integrity="sha384-qF/QmIAj5ZaYFAeQcrQ6bfVMAh4zZlrGwTPY7T/M+iTTLJqJBJjwwnsE5Y0mV7QK" crossorigin="anonymous">
</head>
<body style="height: 100%; width: 100%;">
<nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PPDB SMK Semangat 45</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarColor01">
            <ul class="nav justify-contet">
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="?page=dashboard">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" class="nav-link" href="?page=create">Registrasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <?php
        include "routes.php";
    ?>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
</body>
</html>