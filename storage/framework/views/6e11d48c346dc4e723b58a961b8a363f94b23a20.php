<title>create author</title>

<?php $__env->startSection('konten'); ?>
<!-- START FORM -->
<form action='<?php echo e(url('author/'.$data->author_id)); ?>' method='post'>
    <?php echo csrf_field(); ?>
    <?php echo method_field('PUT'); ?>; 
    <a href="<?php echo e(url('author')); ?>" class="btn btn-secondary" > <-kembali </a>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="mb-3 row">
            <label for="author_id" class="col-sm-2 col-form-label">id author</label>
            <div class="col-sm-10">
                <?php echo e($data->author_id); ?>

            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='nama' id="nama">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label">email</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='email' id="email">
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
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\pem framework\210401021_laravel\resources\views/author/edit.blade.php ENDPATH**/ ?>