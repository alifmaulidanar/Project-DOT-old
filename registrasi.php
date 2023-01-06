<?php
    session_start();
    include("config.php");
    // echo "Used DB = " . $db;
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registrasi</title>
        <link rel="icon" type="image/x-icon" href="assets/icons/Logo PMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/registrasi.css">
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
            <!-- Back to Menu -->
            <div class="back-to-menu mt-2">
                <a href="menu.php"><i class="fa fa-arrow-left" aria-hidden="true"></i></i></a>
            </div>
            <!-- Logout -->
            <div class="logout mt-2">
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>

            <div class="container">
                <div class="row align-items-center justify-content-center py-4">
                    <div class="col-lg-5 col-md-10 col-sm-10 text-center text-white">
                            <h2 class="fw-bold mb-0">Form Registrasi Pendonor</h2>
                            <h3 class="mb-2">PALANG MERAH INDONESIA - <?= $_SESSION['pmiuser']['nama_cabang']; ?></h3>
                            <img src="assets/icons/donor.png" alt="" width="115" style="filter: contrast(1.2);">

                    </div>
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        
                        <form method="POST">
                            <h4 class="text-start fw-bold">Data Pendonor <img class="icon-pendonor" src="assets/icons/id-outline.png" alt="" width="35"> </h4>
                            <div class="row g-2">
                                <div class="col-lg-8">
                                    <div class="mb-2">
                                        <label for="nama" class="form-label">Nama Pendonor</label>
                                        <input type="text" class="form-control-custom" placeholder="Nama Lengkap" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="goldarah" class="form-label">Gol. Darah</label>
                                    <select class="form-select" id="goldarah" aria-label="Default select" name="goldarah" required>
                                        <option selected disabled value=""> A / B / O / AB </option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="O">O</option>
                                        <option value="AB">AB</option>
                                    </select>
                                </div>
                            </div>


                            <div class="row g-2">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label for="umur" class="form-label">Umur</label>
                                        <input type="number" class="form-control-custom" placeholder="tahun" id="umur" name="umur" required>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label for="tensi" class="form-label">Berat Badan</label>
                                        <input type="text" class="form-control-custom" placeholder="kg" id="beratbadan" name="beratbadan" required>
                                    </div> 
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <label for="jeniskelamin" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select" id="jeniskelamin" aria-label="Default select" name="jeniskelamin" required>
                                            <option selected disabled value=""> Male / Female </option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <textarea class="form-control-custom" placeholder="" id="alamat" style="height: 60px" name="alamat"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Anamnesa</label>
                                        <textarea class="form-control-custom" placeholder="" id="anamnesa" style="height: 60px" name="anamnesa"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger py-2 px-4 fw-bold mt-1 w-100 btn-regis text-white" name="submit">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
            <img src="assets/icons/Logo PMI.png" alt="" class="logo-pmi">
        </div>
        <!-- Jika Klik Tombol Submit -->
        <?php
            // Insert Query
            if(isset($_POST['submit'])){
                $nama_pendonor = $_POST['nama'];
                $golongan_darah = $_POST['goldarah'];
                $umur = $_POST['umur'];
                $berat_badan = $_POST['beratbadan'];
                $jenis_kelamin = $_POST['jeniskelamin'];
                $alamat = $_POST['alamat'];
                $anamnesa = $_POST['anamnesa'];

                // Query Input data
                $insertquery = "INSERT INTO tb_pendonor (`nama_pendonor`, `golongan_darah`, `jenis_kelamin`, `umur`, `berat_badan`, `alamat`, `anamnesa`) VALUES ('$nama_pendonor', '$golongan_darah', '$jenis_kelamin', '$umur', '$berat_badan', '$alamat', '$anamnesa')";
                $result = $con1->query($insertquery);

                if($result){
                    echo '<script type="text/javascript">                        Swal.fire(
                        `Success!`,
                        `data berhasil diinput`,
                        `success`
                    )</script>';
                } else {
                    $con1 -> connect_error;
                }
            }
        ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>