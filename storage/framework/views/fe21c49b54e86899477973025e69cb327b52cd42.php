<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container vh-100 d-flex align-items-center">
        <div class="row justify-content-center w-100">
            <div class="col-md-5">
                <div class="card bg-light shadow-sm">
                    <div class="card-header text-center bg-danger text-white">
                        <h4>Login</h4>
                    </div>
                    <div class="card-body">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <?php echo e($errors->first()); ?>

                            </div>
                        <?php endif; ?>

                        <form method="POST" action="<?php echo e(url('/login')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" value="<?php echo e(old('username')); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-danger w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\acer\uts-praktikum\resources\views/login.blade.php ENDPATH**/ ?>