<?php
    session_start();
    include("config.php");
    // echo "Used DB = " . $db;
    $nama_cabang_pmi = $_SESSION['pmiuser']['nama_cabang'];
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Rekam Medis</title>
        <link rel="icon" type="image/x-icon" href="assets/icons/Logo PMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/rekam-medis.css">
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
                            <h2 class="fw-bold mb-0">Form Pembuatan Rekam Medis</h2>
                            <h3 class="mb-2">PALANG MERAH INDONESIA - <?= $_SESSION['pmiuser']['nama_cabang']; ?></h3>
                            <img src="assets/icons/donor-form.png" alt="" width="115" style="filter: contrast(1.1);">
                    </div>
                    <div class="col-lg-6 col-md-10 col-sm-10">
                        
                        <form method="POST">
                            <h4 class="text-start fw-bold">Rekam Medis <img class="icon-pendonor" src="assets/icons/rekam-medis.png" alt="" width="30"> </h4>
                            <h6 class="text-start mb-2">Cari Data Pendonor:</h6>
                            <div class="mb-1">
                                <input type="number" class="form-control-search" placeholder="Id Pedonor" id="idpendonor" name="idpendonor">
                                <div style="position:absolute;">
                                    <div class="list-group" id="show-list">
                                        
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row g-2">
                                <h6 class="text-start sub-title">Data Pendonor:</h6>
                                <div class="col-lg-8">
                                    <div class="mb-2">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap" id="nama" name="nama" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <input type="text" class="form-control" placeholder="Gol. Darah" id="goldarah" name="goldarah" disabled>
                                        <!-- Hidden Input -->
                                        <input type="text" class="form-control" placeholder="Gol. Darah" id="goldarah-hidden" name="goldarah-hidden" style="display: none;">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2 row-2-data">
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <input type="number" class="form-control" placeholder="umur" id="umur" name="umur" disabled>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <input type="text" class="form-control" placeholder="kg" id="beratbadan" name="beratbadan" disabled>
                                    </div> 
                                </div>
                                <div class="col-lg-4">
                                    <div class="mb-2">
                                        <input type="text" class="form-control" placeholder="gender" id="jeniskelamin" name="jeniskelamin" disabled>
                                    </div>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Tanggal Donor</label>
                                        <input type="date" class="form-control-custom" id="tanggal" name="tanggal" value="<?php echo date("Y-m-d"); ?>" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="mb-2">
                                        <label for="alamat" class="form-label">Lokasi Cabang</label>
                                        <select class="form-select" id="cabang" name="cabang" required>
                                            <?php
                                                $sqldata = "SELECT * FROM tb_cabang_pmi WHERE nama_cabang = '$nama_cabang_pmi'";
                                                $result = mysqli_query($con1, $sqldata);
                                                while($row = mysqli_fetch_assoc($result)){
                                                    echo "<option value=". $row['cabang_pmi'] ."> $row[nama_cabang] </option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger py-2 px-4 fw-bold mt-1 w-100 btn-red text-white" name="buat">Buat Rekam Medis</button>
                        </form>

                    </div>
                </div>
            </div>
            <img src="assets/icons/Logo PMI.png" alt="" class="logo-pmi">
        </div>
        <!-- Jika Tombol Buat ditekan -->
        <?php
            // Insert Query
            if(isset($_POST['buat'])){
                $kd_cabang_pmi = $_POST['cabang'];
                $kd_pendonor = $_POST['idpendonor'];
                $kd_gol_darah = $_POST['goldarah-hidden'];
                $tanggal = $_POST['tanggal'];

                // Query Input data
                $insertquery = "INSERT INTO tb_rekam_medis (`kd_cabang_pmi`, `kd_pendonor`, `kd_gol_darah`, `tgl_donor`) VALUES ('$kd_cabang_pmi', '$kd_pendonor', '$kd_gol_darah', '$tanggal')";
                $result = $con1->query($insertquery);

                if($result){
                    echo '<script type="text/javascript">                        Swal.fire(
                        `Success!`,
                        `Rekam Medis berhasil dibuat`,
                        `success`
                    )</script>';
                } else {
                    $con1 -> connect_error;
                }
            }
        ?>
        <!-- Script -->
        <script type="text/javascript">
            // Autocomplete & Autofill data pasien
            $(document).ready(function(){
                $("#idpendonor").keyup(function(){
                    let searchText = $(this).val();
                    if(searchText!=''){
                        $.ajax({
                            url: 'auto-complete.php',
                            method: 'post',
                            data: {query:searchText},
                            success:function(response){
                                $("#show-list").html(response);
                            }
                        })
                    } else {
                        $("#show-list").html('');
                    }
                });
                $(document).on('click', 'a', function(){
                    // Mengisi element dengan id .. dengan value a yang ditekan
                    $("#idpendonor").val($(this).text());

                    // Mengisi variabel dengan value dari element tsb
                    let idpendonor = $("#idpendonor").val();
                    $.ajax({
                        url: 'auto-fill.php',
                        method: 'get',
                        data: 'idpendonor=' + idpendonor,
                        success:function(data){
                            let json = data,
                            obj = JSON.parse(json);
                            $("#idpendonor").attr("value", obj.id);
                            $("#nama").val(obj.nama);
                            $("#goldarah").attr("value", obj.goldarah);
                            $("#goldarah-hidden").attr("value", obj.goldarah);
                            $("#umur").val(obj.umur);
                            $("#beratbadan").val(obj.beratbadan);
                            $("#jeniskelamin").val(obj.jeniskelamin);
                        }
                    });
                    $("#show-list").html('');
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>