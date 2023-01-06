<?php
    session_start();
    include("config.php");
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login PMI</title>
        <link rel="icon" type="image/x-icon" href="assets/icons/Logo PMI.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css">
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
            <!-- Back to Welcome Page -->
            <div class="back-to-index mt-2">
                <a href="index.html"><i class="fa fa-arrow-left" aria-hidden="true"></i></i></a>
            </div>

            <div class="container">
                <div class="row align-items-center justify-content-center py-4">
                    <h2 class="mb-0 fw-bold text-center text-white">PALANG MERAH <span style="color: red; -webkit-text-stroke: 1.5px white;">INDONESIA</span></h2>
                    <h4 class="mb-3 text-center text-white">Login - PMI</h4>
                    <div class="col-lg-5 col-md-10 col-sm-10">

                        <form method="POST">
                        <!-- <h3 class="text-start fw-bold mb-2">Login</h3> -->
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control-custom" placeholder="your username" id="username" name="username" required>
                            </div>
                            
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group mb-2">
                                <!-- shadownoe for remove outline when focus -->
                                <input type="password" class="form-control shadow-none" placeholder="your password" id="password-field" name="password" requiredria-describedby="basic-addon2">
                                <div class="input-group-prepend">
                                    <button class="show-hide-btn" type="button">
                                        <i toggle="#password-field" class="fa fa-eye show-hide"></i>
                                    </button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-danger py-2 px-4 fw-bold mt-3 w-100 btn-login text-white" name="login">Login</button>
                        </form>

                    </div>
                </div>
            </div>
            <img src="assets/icons/Logo PMI.png" alt="" class="logo-pmi">
        </div>
        <!-- Jika Klik Tombol Submit -->
        <?php
            // Insert Query
            if(isset($_POST['login'])){
                $uname = $_POST['username'];
                $pass = $_POST['password'];

                // Query Input data
                $sqlquery = $con_pusat->query("SELECT * FROM user_pmi WHERE username='$uname' AND password='$pass'");
                $result = mysqli_num_rows($sqlquery);

                // Check if there's an account with user input
                if($result == 1){
                    $data = $sqlquery->fetch_assoc();

                    // Check User's Role
                    if($data['role'] == 'user'){
                        $_SESSION['pmiuser'] = $data;
                        echo '<script type="text/javascript">                        Swal.fire({
                            title: `Success!!!`,
                            text: `Login Success!`,
                            icon: `success`,
                            showConfirmButton: false,
                            timer: 1500,
                            timerProgressBar: true
                        })</script>
                        <script>setTimeout(function(){
                            window.location="menu.php";
                        }, 2000);
                        </script>';
                    } elseif($data['role'] == 'admin'){
                        $_SESSION['pmiuser'] = $data;
                        echo '<script type="text/javascript">                        Swal.fire({
                            title: `Success!!!`,
                            text: `Login Success! - ADMIN`,
                            icon: `success`,
                            showConfirmButton: true,
                        })</script>';
                    } else {
                        echo '<script type="text/javascript">                        Swal.fire(
                            `Role not detected!`,
                            `akun tersebut tidak ada role`,
                            `error`
                        )</script>';
                    }
                } else {
                    echo '<script type="text/javascript">                        Swal.fire(
                        `Failed to Login!`,
                        `akun tersebut tidak terdaftar`,
                        `error`
                    )</script>';
                }
            }
        ?>
        <!-- Jquery -->
        <script>
            $(".show-hide").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
    </html>