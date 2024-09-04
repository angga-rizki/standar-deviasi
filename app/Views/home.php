<style>
    body {
    }
    #containerHome {
        background: rgba(255,255,255,0.5);
    }
</style>
<div class="container-fluid px-4">
    <div id="containerHome" class="border border-dark p-4 rounded" style="padding: 10px;">
        <h1>Selamat datang <?= session()->get('nama'); ?></h1>  
        <p class="lead">Aplikasi ini bagian dari penelitian skripsi mahasiswa strata satu (S1) Program Studi Sistem Informasi STMIK Sinar Nusantara yang menggunakan metode EUCS untuk mengetahui tingkat kepuasan user terhadap sistem informasi RSDM E-patient.</p>

        <div class="text-center p-3">
            <button class="btn btn-lg btn-success mr-2" id="openModalUploadData">
                <i class="fa fa-upload"></i>
                Upload
            </button>
            <button class="btn btn-lg btn-danger" id="openModalClearData">
                <i class="fa fa-trash"></i>
                Clear Data
            </button> 
        </div>
    </div>
</div>

<!-- Alert -->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/../assets/css/alert.css">
<div id="alertContainer">
    <div id="suksesAlert" class="alert alert-success">
        <?php
        if (session()->has('message')) {
            echo session()->getFlashdata('message');
        }
        ?>
        <span class="close fa fa-remove mx-3"></span>
        <div class="clearfix"></div>
    </div>
    <div id="errorAlert" class="alert alert-danger">
        <?php
        if (session()->has('message')) {
            echo session()->getFlashdata('message');
        }
        ?>
        <span class="close fa fa-remove mx-3"></span>
        <div class="clearfix"></div>
    </div>
</div>
<!-- End Alert -->

<!-- The Modal -->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/../assets/css/modal.css">
<div id="uploadData" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Upload Data</h2>
            <span class="close">&times;</span>
        </div>
        <form action="<?= site_url('home/upload'); ?>" method="post" enctype="multipart/form-data">
            <div class="modal-body p-4">
                <label>Pilih File</label>
                <input class="border border-dark rounded p-2" type="file" name="fileExcel">
                <label>* Data yang diupload berupa file Microsoft Excel dengan format .xls atau .xlsx</label>
                <div class="text-center"><a id="contoh" href="#"><i class="fa fa-image"></i> Contoh excel</a></div>
            </div>
            <div class="modal-footer">
                <button class="cancel btn btn-danger">
                    <i class="fa fa-remove"></i>
                    Cancel
                </button>
                <button class="btn btn-success" type="submit" name="submit">
                    <i class="fa fa-check"></i>
                    Import
                </button>
            </div>
        </form>
    </div>
</div>

<div id="clearData" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <h2>Clear Data</h2>
            <span class="close">&times;</span>
        </div>
        <div class="modal-body text-center px-5">
            <i class="fa fa-warning p-3" style="font-size: 3.5rem;color: orange;"></i>
            <h3>Warning</h3>
            <p class="lead">Anda akan menghapus semua data.<br>
                Apakah Anda yakin?</p>
        </div>
        <div class="modal-footer">
            <button class="cancel btn btn-danger">
                <i class="fa fa-remove"></i>
                Cancel
            </button>
            <a class="btn btn-success" href="<?= site_url('home/cleardata'); ?>">
                <i class="fa fa-check"></i>
                Confirm
            </a>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Image -->
<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/../assets/css/modal_image.css">
<div id="myModal" class="modal">

    <!-- The Close Button -->
    <span id="close-image">&times;</span>

    <!-- Modal Content (The Image) -->
    <span id="loading">
        <i class="fa fa-circle-notch fa-spin"></i>
    </span>

    <img id="modal-content-image">
</div>

<script>
    var modalUploadData = document.getElementById("uploadData");
    var modalClearData = document.getElementById("clearData");
    var uploadDataBtn = document.getElementById("openModalUploadData");
    var clearDataBtn = document.getElementById("openModalClearData");
    var span = document.getElementsByClassName("close");
    var cancel = document.getElementsByClassName("cancel");

    var alertSukses = document.getElementById("suksesAlert");
    var alertError = document.getElementById("errorAlert");
    var alertContainer = document.getElementById("alertContainer");
    var status = "<?php
        if (session()->has('message')) {
            echo session()->getFlashdata('status');
        }
        ?>";

    function hideAlert() {
        var delay = 2000;
        setTimeout(function () {
            $("#alertContainer").hide(1000, function () {
                $("#alertContainer").style.display = "none";
            });
        }, delay);
    }

    if (status == "sukses") {
        alertSukses.style.display = "block";
        hideAlert();
    }
    if (status == "error") {
        alertError.style.display = "block";
        hideAlert();
    }

    function closeAll() {
        $("#uploadData").hide("slow", function () {
            modalUploadData.style.display = "none";
        });
        $("#clearData").hide("slow", function () {
            modalClearData.style.display = "none";
        });
        $("#alertContainer").hide(1000, function () {
            alertContainer.style.display = "none";
        });
    }

    uploadDataBtn.onclick = function () {
        modalUploadData.style.display = "block";
    }
    clearDataBtn.onclick = function () {
        modalClearData.style.display = "block";
    }

    for (var i = 0; i < span.length; i++) {
        span[i].onclick = function () {
            closeAll();
        }
    }

    window.onclick = function (event) {
        if (event.target == modalUploadData || event.target == modalClearData) {
            closeAll();
        }
        if (event.target == modal) {
            hideImage();
        }
    }

    for (var i = 0; i < cancel.length; i++) {
        cancel[i].onclick = function (e) {
            e.preventDefault();
            closeAll();
        }
    }

    //IMAGE
    var modalImg = document.getElementById("modal-content-image");
    var modal = document.getElementById('myModal');
    var loading = document.getElementById("loading");
    $('#contoh').on("click", function (event) {
        modal.style.display = "block";
        var downloadingImage = new Image();
        downloadingImage.onload = function () {
            loading.style.opacity = "0";
            loading.style.visibility = "hidden";
            modalImg.style.animationName = "zoom";
            modalImg.src = this.src;
        };
        downloadingImage.src = "<?= base_url(); ?>/../assets/contoh.png";
    });

    var span = document.getElementById("close-image");
    span.onclick = function () {
        hideImage();
    };

    function hideImage() {
        $("#myModal").hide("slow", function () {
            modalImg.src = "<?= base_url(); ?>/../assets/clear.png";
            modalImg.style.animationName = "none";
            loading.style.opacity = "1";
            loading.style.visibility = "visible";
            modal.style.display = "none";
        });
    }
</script>