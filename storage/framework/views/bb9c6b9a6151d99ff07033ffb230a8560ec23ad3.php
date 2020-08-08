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

    .headTitle {
        width: 100%;
        height: 100%;
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-box-pack: center;
        -moz-box-pack: center;
        -ms-flex-pack: center;
        -webkit-justify-content: center;
        justify-content: center;
        -webkit-box-align: center;
        -moz-box-align: center;
        -ms-flex-align: center;
        -webkit-align-items: center;
        align-items: center;

        position: absolute;
        top: 0%;
        width: 100%;
        height: 480px;
        border: none!important;

    }

    .subheading{
        line-height:1.5;
    }
</style>
<body>
    <header>
        <?php $__currentLoopData = $artikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <img class="headImage"src='<?php echo e(asset('storage/' .$data->thumbnail)); ?>' style="width: 100%; height: 480px;"></img>





        <div class="headTitle" style="background-color: navy; opacity: 0.7; filter: alpha(opacity=50);">

        </div>

        <div class="headTitle">
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
            <div style="color: white;">
                <h1><?php echo e($data->title); ?></h1>
                <h3 class="subheading" style="margin-top: 10px;">" <?php echo e($data->excerpt); ?> "</h3>

            </div>
        </div>
    </header>



    <div class="container main" style="margin-top: 50px; margin-bottom: 50px;">
        <h6 class="" style="align-center; margin-bottom: 50px;">
            <em>Diposting tanggal : <?php echo e($data->created_at->format('d F Y ')); ?> oleh <?php echo e($data->user->name); ?> </em>
        </h6>
        <div style="text-align: center; margin-bottom: 50px;">
        <img src="<?php echo e(asset('storage/' .$data->thumbnail)); ?>" width="500px" alt=""></td>
        </div>
        <?php echo $data->content; ?>

    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
<?php /**PATH C:\xampp\htdocs\laravel-webinar-yudis\resources\views//detailArtikel.blade.php ENDPATH**/ ?>