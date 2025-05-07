<?php $__env->startSection('title', 'Pengelolaan Buku'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>

        <div class="d-flex justify-content-end mb-2">
            <button class="btn btn-primary" data-bs-toggle="collapse" data-bs-target="#formTambahBuku">
                + Tambah Buku
            </button>
        </div>

        <div id="formTambahBuku" class="collapse mb-4">
            <div class="card card-body">
                <form method="POST" action="/pengelolaan">
                    <?php echo csrf_field(); ?>
                    <div class="row g-2">
                        <div class="col-md-3">
                            <input type="text" name="judul" class="form-control" placeholder="Judul Buku" required>
                        </div>
                        <div class="col-md-3">
                            <input type="text" name="pengarang" class="form-control" placeholder="Pengarang" required>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="tahun" class="form-control" placeholder="Tahun" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" name="aksi" value="tambah" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php if(isset($editBuku)): ?>
        <div class="alert alert-warning">
            <form method="POST" action="/pengelolaan">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="id" value="<?php echo e($editBuku['id']); ?>">
                <div class="row g-2">
                    <div class="col-md-3">
                        <input type="text" name="judul" class="form-control" value="<?php echo e($editBuku['judul']); ?>" required>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="pengarang" class="form-control" value="<?php echo e($editBuku['pengarang']); ?>" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="tahun" class="form-control" value="<?php echo e($editBuku['tahun']); ?>" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" name="aksi" value="simpan" class="btn btn-success">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
        <?php endif; ?>

        <form method="POST" action="/pengelolaan">
            <?php echo csrf_field(); ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover shadow-sm bg-white">
                    <thead class="table-success text-center">
                        <tr>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Edit/Hapus</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $dataBuku; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $buku): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($buku['judul']); ?></td>
                            <td><?php echo e($buku['pengarang']); ?></td>
                            <td><?php echo e($buku['tahun']); ?></td>
                            <td class="text-center">
                                <button type="submit" name="aksi" value="edit-<?php echo e($buku['id']); ?>" class="btn btn-warning btn-sm">Edit</button>
                                <button type="submit" name="aksi" value="hapus-<?php echo e($buku['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus buku ini?')">Hapus</button>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if(count($dataBuku) === 0): ?>
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada buku ditambahkan.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\uts-praktikum\resources\views/pengelolaan.blade.php ENDPATH**/ ?>