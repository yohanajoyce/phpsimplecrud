<?php 

include_once 'config/class-master.php';
include_once 'config/class-mahasiswa.php';
$master = new MasterData();
$customer = new Customer();
// Mengambil daftar program studi, provinsi, dan status mahasiswa
$tableList = $master->getTable();
// Mengambil daftar provinsi
$menuList = $master->getMenu();

// $dateList = $master->getDateById($data);
// Mengambil daftar status mahasiswa
// $statusList = $master->getupdateTableStatus();
// Mengambil data mahasiswa yang akan diedit berdasarkan id dari parameter GET
$dataCustomer = $customer->getUpdateCustomer($_GET['id']);
if(isset($_GET['status'])){
    if($_GET['status'] == 'failed'){
        echo "<script>alert('Gagal mengubah data customer. Silakan coba lagi.');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
	<head>
		<?php include 'template/header.php'; ?>
	</head>

	<body class="layout-fixed fixed-header fixed-footer sidebar-expand-lg sidebar-open bg-body-tertiary">

		<div class="app-wrapper">

			<?php include 'template/navbar.php'; ?>

			<?php include 'template/sidebar.php'; ?>

			<main class="app-main">

				<div class="app-content-header">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-6">
								<h3 class="mb-0">Edit customer</h3>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-end">
									<li class="breadcrumb-item"><a href="index.php">Beranda</a></li>
									<li class="breadcrumb-item active" aria-current="page">Edit Data</li>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="app-content">
					<div class="container-fluid">
						<div class="row">
							<div class="col-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Formulir Customer</h3>
										<div class="card-tools">
											<button type="button" class="btn btn-tool" data-lte-toggle="card-collapse" title="Collapse">
												<i data-lte-icon="expand" class="bi bi-plus-lg"></i>
												<i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
											</button>
											<button type="button" class="btn btn-tool" data-lte-toggle="card-remove" title="Remove">
												<i class="bi bi-x-lg"></i>
											</button>
										</div>
									</div>
                                    <form action="proses/proses-edit.php" method="POST">
									    <div class="card-body">
                                            <input type="hidden" name="id" value="<?php echo $dataCustomer['id']; ?>">
                                            <div class="mb-3">
                                                <label for="no" class="form-label">Nomor Reservasi Customer</label>
                                                <input type="number" class="form-control" id="no" name="no" placeholder="Masukkan Nomor Reservasi Customer" value="<?php echo $dataCustomer['no']; ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="datetime" class="form-label">Tanggal Reservasi</label>
                                                <input type="datetime-local" class="form-control" id="date" name="date" placeholder="Masukkan Nomor Reservasi Customer" value="<?php echo $dataCustomer['date']; ?>" required>
                                            </div>

                                                  
                                                
                                         
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Customer</label>
                                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap Customer" value="<?php echo $dataCustomer['nama']; ?>" required>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="table" class="form-label">Nomor Table</label>
                                                <select class="form-select" id="table" name="table" required>
                                                    <option value="" selected disabled>Pilih Nomor Table</option>
                                                    <?php 
                                                    // Iterasi daftar program studi dan menandai yang sesuai dengan data mahasiswa yang dipilih
                                                    foreach ($tableList as $table){
                                                        // Menginisialisasi variabel kosong untuk menandai opsi yang dipilih
                                                        $selectedTable = "";
                                                        // Mengecek apakah program studi saat ini sesuai dengan data mahasiswa
                                                        if($dataCustomer['table'] == $table['id']){
                                                            // Jika sesuai, tandai sebagai opsi yang dipilih
                                                            $selectedTable = "selected";
                                                        }
                                                        // Menampilkan opsi program studi dengan penanda yang sesuai
                                                        echo '<option value="'.$table['id'].'" '.$selectedTable.'>'.$table['nomor'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="menu" class="form-label">Menu</label>
                                                <select class="form-select" id="menu" name="menu" required>
                                                    <option value="" selected disabled>Pilih Menu</option>
                                                    <?php
                                                    // Iterasi daftar provinsi dan menandai yang sesuai dengan data mahasiswa yang dipilih
                                                    foreach ($menuList as $menu){
                                                        // Menginisialisasi variabel kosong untuk menandai opsi yang dipilih
                                                        $selectedMenu = "";
                                                        // Mengecek apakah provinsi saat ini sesuai dengan data mahasiswa
                                                        if($dataCustomer['menu'] == $menu['id']){
                                                            // Jika sesuai, tandai sebagai opsi yang dipilih
                                                            $selectedMenu = "selected";
                                                        }
                                                        // Menampilkan opsi provinsi dengan penanda yang sesuai
                                                        echo '<option value="'.$menu['id'].'" '.$selectedMenu.'>'.$menu['nama'].'</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="telp" class="form-label">Nomor Telepon</label>
                                                <input type="tel" class="form-control" id="telp" name="telp" placeholder="Masukkan Nomor Telpon/HP" value="<?php echo $dataCustomer['telp']; ?>" pattern="[0-9+\-\s()]{6,20}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Valid dan Benar" value="<?php echo $dataCustomer['email']; ?>" required>
                                            </div>
                                            
                                        </div>
									    <div class="card-footer">
                                            <button type="button" class="btn btn-danger me-2 float-start" onclick="window.location.href='data-list.php'">Batal</button>
                                            <button type="submit" class="btn btn-warning float-end">Update Data</button>
                                        </div>
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</main>

			<?php include 'template/footer.php'; ?>

		</div>
		
		<?php include 'template/script.php'; ?>

	</body>
</html>