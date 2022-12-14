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
                    <h1 class="m-0">Send Email</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Buku</a></li>
                        <li class="breadcrumb-item active">Send Email</li>
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Buku</h3>
                            <form action="/pushAll" method="POST" class="float-right">
                                <?= csrf_field() ?>
                                <button type="submit" class="btn bg-primary"><i class="fas fa-bell"></i> Push All</button>
                            </form>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Buku</th>
                                        <th>Nama Peminjam</th>
                                        <th>Code</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Telat Pengembalian</th>
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
                                            <td><?= $b->code ?></td>
                                            <td><?= $b->date_of_return ?></td>
                                            <td>
                                                <?php
                                                $diff = $time->difference($b->date_of_return);
                                                $day = $diff->getDays();
                                                if ($day < 0) {
                                                    $result = 'Telat ' . abs($day) . ' Hari';
                                                } else {
                                                    $result = 'Masa pengembalian ' . abs($day) . ' Hari';
                                                }
                                                ?>
                                                <?= $result ?>
                                            </td>
                                            <td>
                                                <?php if (abs($day) < 3) : ?>
                                                    <form action="/pushNotif" method="post">
                                                        <input type="hidden" name="id" value="<?= $b->loanId ?>">
                                                        <input type="hidden" name="user_id" value="<?= $b->user_id ?>">
                                                        <input type="hidden" name="email" value="<?= $b->email ?>">
                                                        <input type="hidden" name="hari" value="<?= abs($day) ?>">
                                                        <button type="submit" class="badge bg-primary">Send Email</i></a>
                                                    </form>
                                                <?php else : ?>
                                                    <button disabled="disabled" class="badge bg-secondary">Pending</button>
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
                                        <th>Code</th>
                                        <th>Tanggal Dikembalikan</th>
                                        <th>Telat Pengembalian</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

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
                        <input type="hidden" value="<?= $b->loan_date ?>" name="date_loan">
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