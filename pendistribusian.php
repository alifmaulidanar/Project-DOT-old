<?php
    date_default_timezone_set("Asia/Jakarta");
    session_start();
    include("config.php");
    $nama_rs = $_SESSION['rsuser']['nama_rs'];
    $nama_cabang = $_SESSION['rsuser']['lokasi'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pendistribusian Darah</title>
        <link rel="icon" type="image/x-icon" href="assets/icons/Logo PMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/pendistribusian.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Sweet Alert 2 -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <!-- Javascript -->
        <script type="text/javascript" src="JS/jquery-3.6.1.min.js"></script>
    </head>
    <body>
        <div class="bungkus">
            <!-- Logout -->
            <div class="logout mt-2">
                <a href="logout-rs.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>
            
            <div class="container">
                <div class="row align-items-center justify-content-center py-4">
                    <div class="col-lg-5 col-md-10 col-sm-10 text-center text-white">
                            <h2 class="fw-bold mb-0">Form Pendistribusian Darah</h2>
                            <h3 class="mb-2">PALANG MERAH INDONESIA - <?= $_SESSION['rsuser']['lokasi'] ?></h3>
                            <img src="assets/icons/bus.png" alt="" width="115" style="filter: contrast(1.1);">
                    </div>
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        
                        <form method="POST">
                            <h4 class="text-start fw-bold">Pendistribusian Darah <img class="icon-pendonor" src="assets/icons/deployment.png" alt="" width="25"> </h4>
                            <div class="mb-2">
                                <label for="rumahsakit" class="form-label">Rumah Sakit yang meminta:</label>
                                <select class="form-select" id="rumahsakit" name="rumahsakit" required>
                                    <?php
                                        $sqldata = "SELECT * FROM tb_rumah_sakit WHERE nama_rs = '$nama_rs'";
                                        $result = mysqli_query($con1, $sqldata);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<option value=". $row['id_rs'] ."> $row[nama_rs] </option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="alamat" class="form-label">Lokasi Cabang</label>
                                <select class="form-select" id="cabang" name="cabang" required>
                                    <?php
                                        $sqldata = "SELECT * FROM tb_cabang_pmi WHERE nama_cabang = '$nama_cabang'";
                                        $result = mysqli_query($con1, $sqldata);
                                        while($row = mysqli_fetch_assoc($result)){
                                            echo "<option value=". $row['cabang_pmi'] ."> $row[nama_cabang] </option>";
                                        }
                                    ?>
                                </select>
                            </div>

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="mb-2">
                                        <label for="goldarah" class="form-label">Jenis Golongan Darah</label>
                                        <select class="form-select" id="goldarah" name="goldarah" required>
                                            <option selected value="" disabled>A / B / O / AB</option>
                                            <?php
                                                $sqldata = "SELECT * FROM tb_gol_darah";
                                                $result = mysqli_query($con1, $sqldata);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<option value=". $row['gol_darah'] ."> $row[gol_darah] - (Stok: $row[stok])</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label for="qty" class="form-label">Kuantitas</label>
                                        <input type="number" class="form-control-custom" id="qty" name="qty" required>
                                    </div>
                                </div>
                            </div>


                            <div class="mb-2">
                                <label for="alamat" class="form-label">Tanggal Pendistribusian</label>
                                <input type="date" class="form-control-custom" id="tanggal" name="tanggal" value="<?php echo date("Y-m-d"); ?>" required>
                            </div>

                            <button type="submit" class="btn btn-danger py-2 px-4 fw-bold mt-1 w-100 btn-red text-white" name="buat-permintaan">Buat Permintaan</button>
                        </form>

                    </div>
                </div>
            </div>
            <img src="assets/icons/Logo PMI.png" alt="" class="logo-pmi">
        </div>
        <!-- Jika Tombol Buat ditekan -->
        <?php
            // Insert Query
            if(isset($_POST['buat-permintaan'])){
                $kd_rs = $_POST['rumahsakit'];
                $kd_cabang_pmi = $_POST['cabang'];
                $kd_gol_darah = $_POST['goldarah'];
                $tanggal = $_POST['tanggal'];
                $qty = $_POST['qty'];

                // Query Input data
                $insertquery = "INSERT INTO tb_distribusi_darah (`kd_rs`, `kd_cabang_pmi`, `kd_gol_darah`, `tgl_distribusi`, `qty`) VALUES ('$kd_rs', '$kd_cabang_pmi', '$kd_gol_darah', '$tanggal', '$qty')";
                $result = $con1->query($insertquery);

                if($result){
                    echo '<script type="text/javascript">                        Swal.fire({
                        title: `Success!`,
                        text: `Permintaan Darah berhasil dibuat`,
                        icon: `success`,
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true
                    })</script>
                    <script>setTimeout(function(){
                        window.location="pendistribusian.php";
                    }, 2000);
                    </script>';
                } else {
                    $con1 -> connect_error;
                }
            }
        ?>
        <!-- Script -->
        <script type="text/javascript">

        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>