
<?php $__env->startSection('konten'); ?>
<title>create artikel</title>
<!-- START FORM -->
<form action='<?php echo e(url('artikel')); ?>' method='post'>
    <?php echo csrf_field(); ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="<?php echo e(url('artikel')); ?>" class="btn btn-secondary" > <-kembali </a>
        <div class="mb-3 row">
            <label for="id_artikel" class="col-sm-2 col-form-label">id artikel</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='id_artikel' id="id_artikel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="judul_artikel" class="col-sm-2 col-form-label">judul artikel</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='judul_artikel' id="judul_artikel">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="author" class="col-sm-2 col-form-label">author</label>
            <div class="col-sm-10">
                <select type="radio" class="form-control" name="author" id="author" style="text-align: center;">
                    <option value="" hidden>--pilih author--</option>
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->nama); ?>"><?php echo e($item->nama); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tahun_terbit" class="col-sm-2 col-form-label">tahun terbit</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='tahun_terbit' id="tahun_terbit">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">kategori</label>
            <div class="col-sm-10">
                <select type="radio" class="form-control" name="kategori" id="kategori" style="text-align: center;">
                    <option value="" hidden>--pilih author--</option>
                    <?php $__currentLoopData = $data2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item2->nama_kategori); ?>"><?php echo e($item2->nama_kategori); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
        </div>
    </div>
</form>
<!-- AKHIR FORM -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\pem framework\210401021_laravel\resources\views/artikel/create.blade.php ENDPATH**/ ?>