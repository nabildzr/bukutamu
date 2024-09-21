<?php
session_start();
include_once '../templates/header.php';
require_once '../conf/koneksi.php';
require_once '../conf/function.php';

$result = query("SELECT COUNT(*) as total_tamu FROM tb_bukutamu");
$total_tamu = $result[0]['total_tamu'];

?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard Admin</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Tamu
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $total_tamu; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php include_once '../templates/footer.php'; ?>