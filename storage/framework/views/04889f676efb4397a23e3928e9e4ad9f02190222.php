<?php $__env->startSection('formContent'); ?>
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Ubah Artikel</h1>
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

                    <form action="/artikel/update" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <?php echo e(csrf_field()); ?>

                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Penulis</label></div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static" name="nama"><?php echo e(Auth::user()->name); ?></p>
                        </div>
                    </div>

                    <div class="row form-group">
                        
                    <div class="col-12 col-md-9"><input type="hidden" id="text-input" name="idA" placeholder="Text" class="form-control" value="<?php echo e($artikel->id); ?>" readonly></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Title</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="judul" placeholder="Text" class="form-control" value="<?php echo e($artikel->title); ?>"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Excerpt</label></div>
                        <div class="col-12 col-md-9"><input class="form-control summernote" name="kutipan" id="textarea-input" rows="9" placeholder="Content..." class="form-control" value="<?php echo e($artikel->excerpt); ?>"></div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Status</label></div>
                        <div class="col-12 col-md-9">
                            <select name="status" id="inputState" class="form-control">
                                <option <?php echo e(old('status',$artikel->status)=="published"? 'selected':''); ?>  value="published">published</option>
                                <option <?php echo e(old('status',$artikel->status)=="draft"? 'selected':''); ?> value="draft">draft</option>
                          </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content</label></div>
                        <div class="col-12 col-md-9"><textarea class="form-control summernote" name="isi" id="contentArtikel" rows="9" placeholder="Content..." class="form-control"><?php echo e($artikel->content); ?></textarea></div>
                    </div>


                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">Thumnbail</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="gambar" class="form-control-file" value="<?php echo e($artikel->thumbnail); ?>"></div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                        </button>
                        <a href="/artikel"><button class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Kembali
                        </button><a>
                    </div>
                    </form>
                </div>

                </div>
        </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'contentArtikel' );
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-webinar-yudis\resources\views/ubahArtikel.blade.php ENDPATH**/ ?>