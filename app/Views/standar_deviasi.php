<style>
    .table td {
        white-space: nowrap;
    }
</style>
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

<div class="container-fluid">
    <h1><i class="fa fa-list-alt"></i> <?= esc($title); ?></h1>

    <div class="border border-dark rounded p-3">
        <nav class="font-weight-bold">
            <div class="nav nav-tabs" id="dataTab" role="tablist">
                <a class="nav-item nav-link active" id="x-tab" href="#x" data-toggle="tab" role="tab" aria-controls="x" aria-selected="true"><i class="fa fa-square"></i> Data X</a>
                <a class="nav-item nav-link" id="y-tab" href="#y" data-toggle="tab" role="tab" aria-controls="y" aria-selected="false"><i class="fa fa-square"></i> Data Y</a>
                <a class="nav-item nav-link" id="hasil-tab" href="#hasil" data-toggle="tab" role="tab" aria-controls="hasil" aria-selected="false"><i class="fa fa-book"></i> Hasil</a>
            </div>
        </nav>

        <?php if (!empty($kolomX) && is_array($kolomX) && !empty($kolomY) && is_array($kolomY)) : ?>
            <button class="btn btn-success my-3 font-weight-bold" data-toggle="modal" data-target="#modal" data-id=""><i class="fa fa-plus"></i> Tambah</button>

            <!-- Modal -->
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title font-weight-bold" id="editModalLabel">Tambah / Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formInput" action="<?= site_url('standardeviasi/savedata'); ?>" method="post">
                            <div class="modal-body">
                                <input id="id" class="reset" name="id" type="hidden">

                                <div id="input_x" class="mb-5">
                                    <h5 class="text-center font-weight-bold mb-3"><i class="fa fa-square"></i> Data X</h5>
                                    <?php foreach ($kolomX as $namaKolom) : ?>
                                        <div class="form-group">
                                            <label for="<?= $namaKolom; ?>" class="form-l font-weight-bold"><?= str_replace('_', '.', $namaKolom); ?></label>
                                            <input id="<?= $namaKolom; ?>" type="number" name="data_x[<?= str_replace('_', '', substr($namaKolom, 0, 3)) ?>][]" class="form-control" min="0" required="">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div id="input_y">
                                    <h5 class="text-center font-weight-bold mb-3"><i class="fa fa-square"></i> Data Y</h5>
                                    <?php foreach ($kolomY as $namaKolom) : ?>
                                        <div class="form-group">
                                            <label for="<?= $namaKolom; ?>" class="form-l font-weight-bold"><?= str_replace('_', '.', $namaKolom); ?></label>
                                            <input id="<?= $namaKolom; ?>" type="number" name="data_y[]" class="form-control" min="0" required="">
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="tab-content" id="dataTabContent">
            <div class="tab-pane fade show active" id="x" role="tabpanel" aria-labelledby="x">
                <?php if (!empty($x) && is_array($x)) : ?>
                    <?php $no = 1; ?>
                    <table id="x-table" class="nowrap table table-sm table-bordered table-striped table-hover text-center" style="width: 100%;">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <?php foreach ($kolomX as $namaKolom) : ?>
                                    <?php $namaKolom = str_replace('_', '.', $namaKolom); ?>
                                    <th><?= $namaKolom ?></th>
                                <?php endforeach; ?>
                                <th><i class="fa fa-edit"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($x as $namaKolom) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <?php foreach ($namaKolom as $key => $value) : ?>
                                        <?php if ($key != 'id') : ?>
                                            <td><?= $value ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td class="col-1">
                                        <button type="button" class="btn btn-warning font-weight-bold" data-toggle="modal" data-target="#modal" data-id="<?= $namaKolom->id; ?>"><i class="fa fa-edit"></i> Edit</button>
                                        <a href="<?= site_url('standardeviasi/delete/' . $namaKolom->id); ?>" class="btn btn-danger font-weight-bold"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div>
                        <h4 class="text-center text-danger font-weight-bold m-3">Tidak ada data 'X' ditemukan</h4>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tab-pane fade" id="y" role="tabpanel" aria-labelledby="y">
                <?php if (!empty($y) && is_array($y)) : ?>
                    <?php $no = 1; ?>
                    <table id="y-table" class="nowrap table table-sm table-bordered table-striped table-hover text-center" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <?php foreach ($kolomY as $namaKolom) : ?>
                                    <?php $namaKolom = str_replace('_', '.', $namaKolom); ?>
                                    <th><?= $namaKolom ?></th>
                                <?php endforeach; ?>
                                <th><i class="fa fa-edit"></i> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($y as $namaKolom) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <?php foreach ($namaKolom as $key => $value) : ?>
                                        <?php if ($key != 'id') : ?>
                                            <td><?= $value ?></td>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                    <td class="col-1">
                                        <button type="button" class="btn btn-warning font-weight-bold" data-toggle="modal" data-target="#modal" data-id="<?= $namaKolom->id; ?>"><i class="fa fa-edit"></i> Edit</button>
                                        <a href="<?= site_url('standardeviasi/delete/' . $namaKolom->id); ?>" class="btn btn-danger font-weight-bold"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div>
                        <h4 class="text-center text-danger font-weight-bold m-3">Tidak ada data 'Y' ditemukan</h4>
                    </div>
                <?php endif; ?>
            </div>

            <div class="tab-pane fade" id="hasil" role="tabpanel" aria-labelledby="hasil">
                <?php if (!empty($hasil) && is_array($hasil)) : ?>
                    <?php $no = 1; ?>
                    <table id="hasil-table" class="nowrap table table-sm table-bordered table-striped table-hover text-center" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th>Variable</th>
                                <th>MIN</th>
                                <th>MAX</th>                                
                                <th>MEAN</th>
                                <th>VAR</th>
                                <th>Nilai Capaian</th>
                                <th>Standar Deviasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($hasil as $variable => $statistic): ?>
                                <tr>
                                    <td><?= $variable ?></td>
                                    <td><?= $statistic->min ?></td>
                                    <td><?= $statistic->max ?></td>
                                    <td><?= $statistic->mean ?></td>
                                    <td><?= $statistic->var ?></td>
                                    <td><?= $statistic->nilai_capaian ?></td>
                                    <td><?= $statistic->std ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else : ?>
                    <div>
                        <h4 class="text-center text-danger font-weight-bold m-3">Tidak ada data 'Hasil' ditemukan</h4>
                    </div>
                <?php endif; ?> 
            </div>
        </div>
    </div>
</div>
<script>
    var alertSukses = document.getElementById("suksesAlert");
    var alertError = document.getElementById("errorAlert");
    var alertContainer = document.getElementById("alertContainer");
    var close = document.getElementsByClassName("close");
    var status = "<?php
                if (session()->has('message')) {
                    echo session()->getFlashdata('status');
                }
                ?>";

    function hideAlert() {
        var delay = 2000;
        setTimeout(function () {
            $("#alertContainer").hide(1000, function () {
            });
        }, delay);
    }

    function closeAlert() {
        $("#alertContainer").hide(1000, function () {
            alertContainer.style.display = "none";
        });
    }

    if (status == "sukses") {
        alertSukses.style.display = "block";
        hideAlert();
    }
    if (status == "error") {
        alertError.style.display = "block";
        hideAlert();
    }

    $('#modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var id_data = button.data('id'); // Extract info from data-* attributes

        if (id_data !== "") {
            $.ajax({
                url: '<?= site_url('standardeviasi/getdata') ?>',
                method: 'get',
                data: {id: id_data},
                dataType: 'json'
            }).done(function (data) {
                $('#id').val(data.id);

                <?php if (!empty($kolomX) && is_array($kolomX) && !empty($kolomY) && is_array($kolomY)) : ?>
                    <?php foreach ($kolomX as $namaKolom) : ?>
                        $('#<?= $namaKolom ?>').val(data.<?= $namaKolom ?>);
                    <?php endforeach; ?>
                    <?php foreach ($kolomY as $namaKolom) : ?>
                        $('#<?= $namaKolom ?>').val(data.<?= $namaKolom ?>);
                    <?php endforeach; ?>
                <?php endif; ?>
            });
        }
    });

    $('#modal').on('hidden.bs.modal', function () {
        $('.reset').val("");
        $('#formInput')[0].reset();
    });

    $(document).ready(function () {
        $('.table').DataTable({
            "ordering": false
        });

        $('.table').wrap("<div class='table-responsive'></div>");
    });
</script>