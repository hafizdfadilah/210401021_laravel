<title>list-artikel</title>

<?php $__env->startSection('konten'); ?>
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
        <!-- FORM PENCARIAN -->
        <div class="pb-3">
            <form class="d-flex" action="<?php echo e(url('artikel')); ?>" method="get">
                <input class="form-control me-1" type="search" name="katakunci" value="<?php echo e(Request::get('katakunci')); ?>" placeholder="Masukkan kata kunci" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Cari</button>
            </form>
        </div>
        
        <!-- TOMBOL TAMBAH DATA -->
        <div class="pb-3">
            <a href='<?php echo e(url('artikel/create')); ?>' class="btn btn-primary">+ Tambah Data</a>
        </div>
    
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-1">id artikel</th>
                    <th class="col-md-2">judul artikel</th>
                    <th class="col-md-2">author</th>
                    <th class="col-md-2">tahun terbit</th>
                    <th class="col-md-2">kategori</th>
                    <th class="col-md-2">aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = $data->firstitem() ?>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($i); ?> </td>
                    <td><?php echo e($item->id_artikel); ?></td>
                    <td><?php echo e($item->judul_artikel); ?> </td>
                    <td><?php echo e($item->author); ?> </td>
                    <td><?php echo e($item->tahun_terbit); ?> </td>
                    <td><?php echo e($item->kategori); ?></td>
                    <td>
                        <a href='<?php echo e(url('artikel/'.$item->id_artikel."/edit")); ?>' class="btn btn-warning btn-sm">Edit</a>
                        <form onsubmit="return confirm('yakin menghapus?')" action="<?php echo e(url('artikel/'.$item->id_artikel)); ?>" class="d-inline" method="POST">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($data->links()); ?>

    </div>
    <!-- AKHIR DATA -->
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\pem framework\210401021_laravel\resources\views/artikel/index.blade.php ENDPATH**/ ?>