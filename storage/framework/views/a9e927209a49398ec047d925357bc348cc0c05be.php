<?php $__env->startSection('formContent'); ?>
    <!-- Header-->
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Daftar Artikel</h1>
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

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table class="table table-bordered" id="tabelArtikel">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Isi</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $daftarArtikel; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($data->title); ?></td>
                                <td><?php echo e($data->excerpt); ?></td>
                                <td>
                                    <?php if($data->thumbnail): ?>
                                        <img src="<?php echo e(asset('storage/' .$data->thumbnail)); ?>" width="150px" alt=""></td>

                                    <?php else: ?>
                                        Tidak ada gambar
                                    <?php endif; ?>

                                    <td><?php echo e($data->user->name); ?></td>

                                <td><?php echo e($data->status); ?></td>
                                <td><a href="" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="<?php echo e(url('artikel/delete/'.$data->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus artikel ini?')">
                                        <?php echo method_field('delete'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>



                </div>
        </div>
        </div><!-- .animated -->
    </div><!-- .content -->

<?php $__env->stopSection(); ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#tabelArtikel').DataTable();
    } );
</script>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webinar-himit-yudis\resources\views//daftarArtikel.blade.php ENDPATH**/ ?>