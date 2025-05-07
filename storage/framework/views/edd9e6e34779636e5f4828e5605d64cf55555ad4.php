<?php $__env->startSection('title', 'Profil - BukuKu'); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body bg-white">
                    <h1 class="card-title fs-2 fw-bold text-danger mb-3">Profil Pengguna</h1>
                    <p class="fs-5 mb-1 fw-semibold">Selamat datang di halaman profil, <span class="fw-semibold"><?php echo e($username); ?></span>!</p>
                    <p class="text-muted">Di sini kamu bisa melihat informasi singkat tentang akunmu.</p>

                    <hr>

                    <div class="mt-4">
                        <h5>Informasi Akun</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><strong>Username:</strong> <?php echo e($username); ?></span>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><strong>Email:</strong> <?php echo e($email ?? 'user@example.com'); ?></span>
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span><strong>Password:</strong> ••••••••</span>
                                <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal">
                                    Ganti Password
                                </button>
                            </li>
                            <li class="list-group-item"><strong>Status:</strong> Pengguna Terdaftar</li>
                            <li class="list-group-item"><strong>Bergabung Sejak:</strong> Mei 2025</li>
                        </ul>

                        <div class="mt-4 text-center">
                            <form action="/logout" method="POST">
                                <?php echo csrf_field(); ?>
                                <button type="submit" class="btn btn-outline-dark bg-danger text-white">Logout</button>
                            </form>
                        </div>
                    </div>

                    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="changePasswordModalLabel">Ganti Password</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="passwordForm">
                                        <div class="mb-3">
                                            <label for="currentPassword" class="form-label">Password Saat Ini</label>
                                            <input type="password" class="form-control" id="currentPassword" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="newPassword" class="form-label">Password Baru</label>
                                            <input type="password" class="form-control" id="newPassword" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                                            <input type="password" class="form-control" id="confirmPassword" required>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" form="passwordForm" class="btn btn-danger">Simpan Perubahan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\uts-praktikum\resources\views/profile.blade.php ENDPATH**/ ?>