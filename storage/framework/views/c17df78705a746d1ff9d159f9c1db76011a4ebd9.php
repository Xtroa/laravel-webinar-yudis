<?php $__env->startSection('formContent'); ?>
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Tambah Artikel</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="animated fadeIn">

            <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                    <strong>Basic Form</strong> Elements
                </div>
                <div class="card-body card-block">
                    <form action="<?php echo e(url('artikel/add')); ?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                        <div class="col-12 col-md-9">
                        <p class="form-control-static">Username</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="judul" placeholder="Text" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Excerpt</label></div>
                        <div class="col-12 col-md-9"><textarea class="form-control summernote" name="isi" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea></div>
                    </div>


                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Thumnbail</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="gambar" class="form-control-file"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                        </button>
                    </div>
                    </form>
                </div>

                </div>
        </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webinar-himit-yudis\resources\views/tambahArtikel.blade.php ENDPATH**/ ?>