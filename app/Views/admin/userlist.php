<?= $this->extend('layout/main') ?>
namespace App\Views\buku\backend;
<?= $this->section('content') ?>

<!-- Content Wrapper. Contains page content -->
<!-- Flashdata -->
<div class="flash-data-success" data-flashdata="<?= session()->getFlashdata('pesan'); ?>"></div>
<div class="flash-data-warning" data-flashdata="<?= session()->getFlashdata('gagal'); ?>"></div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Admin</a></li>
                        <li class="breadcrumb-item active">User List</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small Box (Stat card) -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List User</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Email</th>
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    <?php foreach ($users as $u) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><?= $u->fullname ?></td>
                                            <td><?= $u->kelas ?></td>
                                            <td> <?= $u->jurusan ?></td>
                                            <td> <?= $u->email ?></td>
                                            <?php if ($u->active == 1) : ?>
                                                <td>
                                                    <a href="" class="badge badge-success">Aktif</a>
                                                    <a href="#" class="badge bg-primary" data-toggle="modal" data-target="#modal-default<?= $u->id ?>">Edit <i class="far fa-calendar-check"></i></a>
                                                </td>
                                            <?php else : ?>
                                                <td>
                                                    <a href="#" class="badge bg-primary" data-toggle="modal" data-target="#modal-default<?= $u->id ?>">Edit <i class="far fa-calendar-check"></i></a>
                                                    <a href="" class="badge badge-danger">Belum Aktivasi</a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Email</th>
                                        <th>Active</th>
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
<!-- /.content-wrapper -->
<?php foreach ($users as $u) : ?>
    <!-- Modal -->
    <div class="modal fade" id="modal-default<?= $u->id ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/edit_user" method="POST">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $u->id ?>">
                        <label for="fullname">Fullname</label>
                        <input type="text" class="form-control" name="fullname" value="<?= $u->fullname ?>" required>
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?= $u->username ?>" required>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" value="<?= $u->email ?>" required>
                        <label for="kelas">Class</label>
                        <select name="kelas" id="kelas" class="form-control">
                            <option value="" selected disabled>Select one</option>
                            <option value="12" <?= ($u->kelas == 12) ? 'selected' : '' ?>>12</option>
                            <option value="11" <?= ($u->kelas == 11) ? 'selected' : '' ?>>11</option>
                            <option value="10" <?= ($u->kelas == 10) ? 'selected' : '' ?>>10</option>
                            <option value="Umum" <?= ($u->kelas == 'Umum') ? 'selected' : '' ?>>Umum</option>
                        </select>
                        <label for="jurusan">Vocational</label>
                        <select name="jurusan" id="jurusan" class="form-control">
                            <option value="" selected disabled>Select one</option>
                            <option value="akl1" <?= ($u->jurusan == 'akl1') ? 'selected' : '' ?>>AKL 1</option>
                            <option value="akl2" <?= ($u->jurusan == 'akl2') ? 'selected' : '' ?>>AKL 2</option>
                            <option value="akl3" <?= ($u->jurusan == 'akl3') ? 'selected' : '' ?>>AKL 3</option>
                            <option value="akl4" <?= ($u->jurusan == 'akl4') ? 'selected' : '' ?>>AKL 4</option>
                            <option value="akl5" <?= ($u->jurusan == 'akl5') ? 'selected' : '' ?>>AKL 5</option>
                            <option value="bdp1" <?= ($u->jurusan == 'bdp1') ? 'selected' : '' ?>>BDP 1</option>
                            <option value="bdp2" <?= ($u->jurusan == 'bdp2') ? 'selected' : '' ?>>BDP 2</option>
                            <option value="bdp3" <?= ($u->jurusan == 'bdp3') ? 'selected' : '' ?>>BDP 3</option>
                            <option value="otkp1" <?= ($u->jurusan == 'otkp1') ? 'selected' : '' ?>>OTKP 1</option>
                            <option value="otkp2" <?= ($u->jurusan == 'otkp2') ? 'selected' : '' ?>>OTKP 2</option>
                            <option value="otkp3" <?= ($u->jurusan == 'otkp3') ? 'selected' : '' ?>>OTKP 3</option>
                            <option value="otkp4" <?= ($u->jurusan == 'otkp4') ? 'selected' : '' ?>>OTKP 4</option>
                            <option value="mm1" <?= ($u->jurusan == 'mm1') ? 'selected' : '' ?>>MM 1</option>
                            <option value="mm2" <?= ($u->jurusan == 'mm2') ? 'selected' : '' ?>>MM 2</option>
                            <option value="tkj1" <?= ($u->jurusan == 'tkj1') ? 'selected' : '' ?>>TKJ 1</option>
                            <option value="tkj2" <?= ($u->jurusan == 'tkj2') ? 'selected' : '' ?>>TKJ 2</option>
                            <option value="umum" <?= ($u->jurusan == 'umum') ? 'selected' : '' ?>>Umum</option>
                        </select>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
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