<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Pasien - <?= esc($title); ?></title>
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/../assets/bootstrap-4.5.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url(); ?>/../assets/fa/css/solid.min.css" />
        <link rel="stylesheet" href="<?= base_url(); ?>/../assets/fa/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/../assets/DataTables/datatables.css">
        <script src="<?= base_url(); ?>/../assets/jquery-3.5.1.min.js"></script>
        <script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/../assets/DataTables/datatables.js"></script>
        <script src="<?= base_url(); ?>/../assets/bootstrap-4.5.0-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <style>
        body {
            position: relative;
            min-height: 100vh;
            padding-bottom: 4rem;
        }
        .btn {
            font-weight: bold;
        }
    </style>
    <body>        
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-4">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse"  id="navbarNav">
                <a class="navbar-brand" href="<?= site_url('home') ?>">Pasien</a>
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="<?= site_url('home') ?>">Home</a>
                    <a class="nav-item nav-link" href="<?= site_url('standardeviasi') ?>">Standar Deviasi</a>
                </div>
                <a class="btn btn-outline-danger ml-auto font-weight-bold" href="<?= site_url('auth/logout') ?>">
                    <i class="fa fa-sign-out"></i>
                    Logout
                </a>
            </div>
        </nav>

