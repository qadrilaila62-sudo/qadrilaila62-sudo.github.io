<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring IoT Pertanian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">🌱 Dashboard Monitoring Tanah</h2>

    <?php if(isset($aiAdvice)): ?>
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-warning border-warning shadow-sm d-flex align-items-center" role="alert">
                <span class="fs-2 me-3">🤖</span>
                <div>
                    <h4 class="alert-heading mb-1">Analisis AI Asisten: Kondisi Tanah Memerlukan Perhatian!</h4>
                    <p class="mb-0"><?php echo e($aiAdvice); ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Kelembaban Tanah (Moisture)</h5>
                    <h1 class="display-4">
                        <?php echo e($latestData ? $latestData->moisture_value : '0'); ?> %
                    </h1>
                    <p class="card-text">Terakhir update: <?php echo e($latestData ? $latestData->created_at->format('d/m/Y H:i') : '-'); ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-white bg-success mb-3">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Dissolved Solids (TDS)</h5>
                    <h1 class="display-4">
                        <?php echo e($latestData ? $latestData->tds_value : '0'); ?> ppm
                    </h1>
                    <p class="card-text">Terakhir update: <?php echo e($latestData ? $latestData->created_at->format('d/m/Y H:i') : '-'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header bg-white">
            <h5 class="mb-0">Riwayat 10 Data Terakhir</h5>
        </div>
        <div class="card-body p-0">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Device ID</th>
                        <th>Kelembaban (%)</th>
                        <th>TDS (ppm)</th>
                        <th>Waktu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $historyData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td><?php echo e($index + 1); ?></td>
                        <td><?php echo e($data->device_id); ?></td>
                        <td><?php echo e($data->moisture_value); ?> %</td>
                        <td><?php echo e($data->tds_value); ?> ppm</td>
                        <td><?php echo e($data->created_at->format('d M Y, H:i:s')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="5" class="text-center">Belum ada data dari sensor.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html><?php /**PATH C:\Users\laila qadri\OneDrive\Documents\ProjectCCTanah\resources\views/dashboard.blade.php ENDPATH**/ ?>