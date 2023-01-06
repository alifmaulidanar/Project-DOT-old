<?php
    // Cabang
    $cabang = strtolower($_SESSION['rsuser']['lokasi']);
    $db = 'pmi_' . $cabang;
    $con1 = mysqli_connect("localhost", "root", "", $db);
?>