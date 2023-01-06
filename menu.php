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
        <title>Form Registrasi Pasien</title>
        <link rel="icon" type="image/x-icon" href="assets/icons/Logo PMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/menu.css">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Javascript -->
        <script type="text/javascript" src="JS/jquery-3.6.1.min.js"></script>
    </head>
    <body>
        <div class="bungkus">
            <!-- Logout -->
            <div class="logout mt-2">
                <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i></a>
            </div>

            <div class="container">
                <div class="row align-items-center justify-content-center py-4">
                    <div class="col-lg-10 col-md-10 col-sm-10 text-center">
                        <h2 class="mb-0 fw-bold text-center text-white">PALANG MERAH <span style="color: red; -webkit-text-stroke: 1.5px white;">INDONESIA</span></h2>
                        <h4 class="mb-4 text-center text-white">Cabang <?= $_SESSION['pmiuser']['nama_cabang']; ?></h4>

                        <div class="users d-flex justify-content-center px-2">
                            <div class="user" onclick="location.href='http://localhost/PMI%20-%20DOT/registrasi.php'">
                                <div class="card mx-3">
                                    <img src="assets/images/registrasi.jpg" alt="registrasi" class="card-img">
                                </div>
                                <p>Registrasi</p>
                            </div>
                            <div class="user" onclick="location.href='http://localhost/PMI%20-%20DOT/rekam-medis.php'">
                                <div class="card mx-3">
                                    <img src="assets/images/rekam-medis.jpg" alt="rekam-medis" class="card-img">
                                </div>
                                <p>Rekam Medis</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <img src="assets/icons/Logo PMI.png" alt="" class="logo-pmi">
        </div>
        <script type="text/javascript">
            
            $(document).ready(function(){
                // Ketika div User dihover 
                $(".user").hover(function(){
                    $(this).children("div").css("border", "5px solid white");
                    $(this).children("p").css("color", "#ff0000");
                    $(this).children("p").css("transform", "translateY(-3px)");
                }, function(){
                    $(this).children("div").css("border", "none");
                    $(this).children("p").css("color", "#fff");
                    $(this).children("p").css("transform", "none");
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>