<?php $__env->startSection('title', 'Buku yang Sedang Dibaca'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4">Buku yang Sedang Dibaca</h2>

    <button class="btn btn-primary mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#formTambahBuku">
        + Tambah Buku yang Akan Dibaca
    </button>

    <div class="collapse mb-4" id="formTambahBuku">
        <div class="card card-body">
            <form action="<?php echo e(route('tambahBukuSedangDibaca')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="row">
                    <div class="col-md-4">
                        <label for="judul" class="form-label">Judul Buku</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" name="pengarang" class="form-control" required>
                    </div>
                    <div class="col-md-2">
                        <label for="total_halaman" class="form-label">Total Halaman</label>
                        <input type="number" name="total_halaman" class="form-control" min="1" required>
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-success w-100">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if(count($sedangDibaca) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Total Halaman</th>
                        <th>Halaman Dibaca</th>
                        <th>Progress</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $sedangDibaca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $progress = ($buku['halaman_dibaca'] / $buku['total_halaman']) * 100;
                    ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($buku['judul']); ?></td>
                        <td><?php echo e($buku['pengarang']); ?></td>
                        <td><?php echo e($buku['total_halaman']); ?></td>
                        <td><?php echo e($buku['halaman_dibaca']); ?></td>
                        <td>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: <?php echo e($progress); ?>%;" aria-valuenow="<?php echo e($progress); ?>" aria-valuemin="0" aria-valuemax="100">
                                    <?php echo e(round($progress)); ?>%
                                </div>
                            </div>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-warning" data-bs-toggle="collapse" data-bs-target="#edit-<?php echo e($index); ?>">Edit</button>
                        </td>
                    </tr>

                    <tr id="edit-<?php echo e($index); ?>" class="collapse">
                        <td colspan="7">
                            <form method="POST" action="<?php echo e(route('updateProgress')); ?>">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="index" value="<?php echo e($index); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="halaman_dibaca_<?php echo e($index); ?>" class="form-label">Update Halaman Dibaca:</label>
                                        <input type="number" min="0" max="<?php echo e($buku['total_halaman']); ?>" name="halaman_dibaca" id="halaman_dibaca_<?php echo e($index); ?>" class="form-control" value="<?php echo e($buku['halaman_dibaca']); ?>" required>
                                    </div>
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button type="submit" class="btn btn-success mt-2">Simpan Perubahan</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            Saat ini tidak ada buku yang sedang dibaca.
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\uts-praktikum\resources\views/sedangDibaca.blade.php ENDPATH**/ ?>