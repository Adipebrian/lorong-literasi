<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Flashdata -->
    <div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
    <div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Konfirmasi Pengembalian buku melalui Code</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Konfirmasi</a></li>
                        <li class="breadcrumb-item active">Code</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2 mb-3">
                    <form action="/searchCode" method="POST">
                        <div class="input-group">
                            <input type="search" name="code" class="form-control form-control-lg" placeholder="Type your Code here" value="<?= $code ?>">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-lg btn-default">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Buku</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Nama Peminjam</th>
                                        <th>Status</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    <?php foreach ($books as $b) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $b->book_title ?></td>
                                            <td><?= $b->username ?></td>
                                            <?php if ($b->return_status == 1) : ?>
                                                <td><button class="badge bg-success">Terpinjam</button></td>
                                            <?php else : ?>
                                                <td><button class="badge bg-warning">Pending</button></td>
                                            <?php endif ?>
                                            <?php
                                            $diff = $time->difference($b->date_of_return);
                                            $day = $diff->getDays();
                                            ?>
                                            <td><?= $b->code ?></td>
                                            <td>
                                                <?php if ($b->return_status == 1) : ?>
                                                    <a href="#" class="badge bg-secondary"><i class="far fa-calendar-check"></i></a>
                                                <?php else : ?>
                                                    <a href="#" class="badge bg-primary" data-toggle="modal" data-target="#modal-default<?= $b->loanId ?>">Konfirmasi <i class="far fa-calendar-check"></i></a>
                                                <?php endif ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Nama Peminjam</th>
                                        <th>Status</th>
                                        <th>Code</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<?php foreach ($books as $b) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-default<?= $b->loanId ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Peminjaman Buku</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/konfirm_return" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <p>Apakah anda yakin??</p>
                        <input type="hidden" value="<?= $b->loanId ?>" name="id" id="id">
                        <input type="hidden" value="<?= $b->user_id ?>" name="user_id">
                        <input type="hidden" value="<?= $b->book_id ?>" name="book_id">
                        <input type="hidden" value="<?= $b->code ?>" name="code">
                        <input type="hidden" value="<?= $b->loan_date ?>" name="date_loan">
                        <input type="hidden" value="<?= $day ?>" name="telat">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Confirm</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php endforeach; ?>
<?= $this->endSection() ?>