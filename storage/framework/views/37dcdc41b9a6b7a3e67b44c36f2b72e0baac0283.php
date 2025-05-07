<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">BukuKu</a>

            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('dashboard') ? 'active' : ''); ?>"
                        href="<?php echo e(route('dashboard')); ?>?user=<?php echo e($username); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('pengelolaan') ? 'active' : ''); ?>"
                    href="<?php echo e(route('pengelolaan')); ?>">Koleksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e(request()->is('profile') ? 'active' : ''); ?>"
                        href="<?php echo e(route('profile')); ?>?user=<?php echo e($username); ?>">Profile</a>
                </li>
            </ul>

            <?php if(session('logged_in')): ?>
            <form action="<?php echo e(route('logout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-light">Logout</button>
            </form>
            <?php endif; ?>
            </div>
        </div>
    </nav>
</body>
</html>
<?php /**PATH C:\Users\acer\uts-praktikum\resources\views/components/navbar.blade.php ENDPATH**/ ?>