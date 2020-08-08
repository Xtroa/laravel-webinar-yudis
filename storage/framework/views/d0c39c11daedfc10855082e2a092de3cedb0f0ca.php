<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Artikel Yudis - News</title>
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
                <img src="<?php echo e(asset('storage/gambar/headIcon.png')); ?>" width="30" height="30" class="d-inline-block align-top" alt="">
                <h2 style="color: white;">Artikel Yudis</h2>
                </a>
                <div>
                <?php if(Route::has('login')): ?>
                    <?php if(auth()->guard()->check()): ?>
                        <?php if(Auth::user()->level == 'admin'): ?>
                            <a style="color: white;" href="<?php echo e(url('/news')); ?>">Artikel</a>
                            <a style="margin-left: 20px;color: white;" href="<?php echo e(url('/home')); ?>">Dashboard</a>
                            <a style="margin-left: 20px; color: white;" >Hi, <?php echo e(Auth::user()->name); ?></a>
                            <a style="margin-left: 20px;color: white;" href="<?php echo e(url('/logout')); ?>">Logout</a>
                        <?php else: ?>
                            <a style="margin-left: 20px;color: white;" href="<?php echo e(url('/news')); ?>">Artikel</a>
                            <a style="margin-left: 20px;color: white;" href="<?php echo e(url('/logout')); ?>">Logout</a>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="navbar-text">
                            <a style="color: white;" href="<?php echo e(url('login')); ?>">Login</a>
                            <?php if(Route::has('register')): ?>
                                <a style="margin-left: 20px;color: white;" href="<?php echo e(route('register')); ?>">Register</a>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

    <div class="container main" >


        <h3 style="margin-top: 20px;">Daftar Artikel : </h3>
            <div class="bd-example">

                <div class="card-deck">
                    <?php if($artikel->count() > 0 ): ?>
                        <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row col-md-4" style="margin-top: 30px; margin-bottom: 20px">
                        <a href="/news/<?php echo e($data->slug); ?>">
                            <div class="card">
                                
                                <img class="card-img-top" data-src="holder.js/100px180/" alt="100%x180" src="<?php echo e(asset('storage/' .$data->thumbnail)); ?>" data-holder-rendered="true" style="height: 180px; width: 100%; display: block;">
                                <div class="card-body">
                                    <h5  class="card-title" style="height:50px;"><?php echo e($data->title); ?></h5>

                                    <p class="card-text" style="height:100px;"><?php echo e(substr($data->excerpt, 0, 125)); ?></p>
                                
                                </div>
                                <div class="card-footer">
                                    <small class="card-text" ><?php echo e($data->created_at->format('d F Y ')); ?>, oleh : <?php echo e($data->user->name); ?> </small>
                                </div>
                            </div>
                        </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <div style="text-align: center; margin-top: 50px; margin-bottom: 80px;">
                        <div class="alert alert-warning ">
                            <strong>Maaf. </strong> Data Artikel belum tersedia untuk saat ini.
                        </div>
                    </div>

                    <?php endif; ?>


                </div>

            </div>
            <div class="pagination justify-content-center" style="margin-top: 30px; margin-bottom: 30px;">
                <?php echo e($artikel->links()); ?>

            </div>

    </div>

    <div class="row" style="background-color: dimgray; opacity: 0.7; filter: alpha(opacity=50);">
        <div class="col-sm-4" style="margin-left: 15%; margin-top: 20px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Contact</h5>
              <p class="card-text">Email : ywibisono24@gmail.com</p>
              <p class="card-text">(+62) 85156935120)</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4" style="margin-top: 20px;">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Digunakan untuk</h5>
              <p class="card-text">Pengumpulan Proyek Webinar Teknologi "Laravel Framework"</p>
            </div>
          </div>
        </div>
      </div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\laravel-webinar-yudis\resources\views//tampilArtikel.blade.php ENDPATH**/ ?>