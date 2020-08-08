<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LARAVEL YUDIS</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/normalize.css')); ?> ">
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/font-awesome.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/flag-icon.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/css/cs-skin-elastic.css')); ?>">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="<?php echo e(asset('style/assets/scss/style.css')); ?>">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<style>
    .headImage {
       border: 1px solid #DDDDDD;
       position: relative;
    }
    .headMenu {
       position: absolute;
       left: 0px;
       top: 0px;
       width: 100%;
       opacity: 100%;
       border: none!important;
    }
</style>
<body>
    <header>
        <img class="headImage"src='<?php echo e(asset('storage/gambar/bghead_artikel.jpg')); ?>' style="width: 100%; height: 480px;"></img>

        <!-- Image and text -->
        <nav class="navbar navbar-light bg-transparent headMenu">
            <div class="container">
                <a class="navbar-brand " style="outline: none; border: none; box-shadow: none;">
                <img src="<?php echo e('storage/gambar/headIcon.png'); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                <h2 style="color: black;">Artikel Yudis</h2>
                </a>
                <span class="navbar-text">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('login')); ?>">Login</a>
                        </li>
                    </ul>
                </span>
            </div>
        </nav>
    </header>

    <div class="container main">



            <div class="bd-example">

                <div class="card-deck">
                    <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row col-md-4" style="margin-top: 50px">

                        <div class="card">
                            <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22468%22%20height%3D%22180%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20468%20180%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1739c96ba50%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A23pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1739c96ba50%22%3E%3Crect%20width%3D%22468%22%20height%3D%22180%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22175.171875%22%20y%3D%22100.134375%22%3E468x180%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                            <div class="card-body">
                            <h5 class="card-title"><?php echo e($data->title); ?></h5>
                            <p class="card-text"><?php echo e($data->excerpt); ?></p>
                            </div>
                            <div class="card-footer">
                            <small class="text-muted">Last updated 3 mins ago</small>
                            </div>

                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

            </div>

    </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\webinar-himit-yudis\resources\views/tampilArtikel.blade.php ENDPATH**/ ?>