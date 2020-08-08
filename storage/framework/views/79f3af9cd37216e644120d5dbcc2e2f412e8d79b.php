<?php $__env->startSection('formContent'); ?>
    <!-- Header-->


    <div class="content mt-3">
        <div class="animated fadeIn">


            <div class="col-lg-12">

                <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>DAFTAR ARTIKEL</strong>
                </div>

                <div class="card-body card-block">

                    <a class="btn btn-primary" href="<?php echo e(url('tambahArtikel')); ?>" role="button" style="margin-bottom: 20px;"> + Tambah Artikel </a>

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <table id="tabelArtikel" class="table bordered" style="margin-top: 20px;">
                        <thead>
                            <tr style="text-align: center">
                                <th scope="col">Kode</th>
                                <th scope="col">Judul</th>
                                <th scope="col">Kutipan</th>
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
                                <td><a href="/news/<?php echo e($data->slug); ?>"><?php echo e($data->title); ?></a></td>
                                <td><?php echo e($data->excerpt); ?></td>
                                <td>
                                    <?php if($data->thumbnail): ?>
                                        <img src="<?php echo e(asset('storage/' .$data->thumbnail)); ?>" width="150px" alt=""></td>
                                    <?php else: ?>
                                        Tidak ada gambar
                                    <?php endif; ?>

                                    <td><?php echo e($data->user->name); ?></td>

                                <td><?php echo e($data->status); ?></td>
                                
                                <td style='white-space: nowrap'><a href="/artikel/edit/<?php echo e($data->id); ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a><form action="<?php echo e(url('artikel/delete/'.$data->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus artikel ini?')">
                                        <?php echo method_field('delete'); ?>
                                        <?php echo csrf_field(); ?>
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form></a>
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



<script src="<?php echo e(asset('/js/jquery-3.5.1.js')); ?>"></script>
<script src="<?php echo e(asset('/js/jquery.dataTables.min.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('#tabelArtikel').DataTable();
    });
</script>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-webinar-yudis\resources\views//daftarArtikel.blade.php ENDPATH**/ ?>