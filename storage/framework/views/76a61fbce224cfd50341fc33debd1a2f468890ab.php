<?php $__env->startSection('title', 'Riwayat Buku'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <h2 class="mb-4">📚 Riwayat Buku yang Telah Dibaca</h2>

    <?php if(count($riwayat) > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Judul Buku</th>
                        <th>Pengarang</th>
                        <th>Tanggal Selesai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $riwayat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($buku['judul']); ?></td>
                        <td><?php echo e($buku['pengarang']); ?></td>
                        <td><?php echo e($buku['tanggal']); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-warning">
            Belum ada buku yang selesai dibaca.
        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\uts-praktikum\resources\views/riwayat.blade.php ENDPATH**/ ?>