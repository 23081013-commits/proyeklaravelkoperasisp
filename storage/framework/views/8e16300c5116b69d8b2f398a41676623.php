

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark">Manajemen Data Pinjaman</h4>
        <a href="<?php echo e(route('pinjaman.create')); ?>" class="btn btn-primary shadow-sm">
            <i class="fa-solid fa-hand-holding-dollar me-2"></i>Tambah Pinjaman
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4" role="alert">
            <i class="fa-solid fa-circle-check me-2"></i><?php echo e(session('success')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card border-0 shadow-sm rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Nama Anggota</th>
                            <th>Tanggal Pinjam</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $pinjaman; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($key + 1); ?></td>
                            <td class="fw-semibold text-start"><?php echo e($row->nama ?? 'Nama Tidak Ditemukan'); ?></td>
                            <td><?php echo e($row->tanggal); ?></td>
                            <td class="text-end fw-bold text-danger">Rp<?php echo e(number_format($row->jumlah, 0, ',', '.')); ?></td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="<?php echo e(route('pinjaman.destroy', $row->id)); ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus data pinjaman ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-muted p-4">Belum ada data transaksi pinjaman.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\koperasi-app\resources\views/pinjaman/index.blade.php ENDPATH**/ ?>