<title>create kategori</title>

<?php $__env->startSection('konten'); ?>
<!-- START FORM -->
<form action='<?php echo e(url('kategori')); ?>' method='post'>
    <?php echo csrf_field(); ?>
    <a href="<?php echo e(url('kategori')); ?>" class="btn btn-secondary" > <-kembali </a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="id_kategori" class="col-sm-2 col-form-label">id kategori</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_kategori' id="id_kategori">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama kategori</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama_kategori' id="nama_kategori">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\pem framework\210401021_laravel\resources\views/kategori/create.blade.php ENDPATH**/ ?>