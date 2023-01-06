<?php
    // Cabang
    if(isset($_SESSION['pmiuser']['nama_cabang'])){
        $cabang = strtolower($_SESSION['pmiuser']['nama_cabang']);
        $db = 'pmi_' . $cabang;
        $con1 = mysqli_connect("localhost", "root", "", $db);
    } elseif($_SESSION['rsuser']['lokasi']){
        $cabang = strtolower($_SESSION['rsuser']['lokasi']);
        $db = 'pmi_' . $cabang;
        $con1 = mysqli_connect("localhost", "root", "", $db);
    } else {
        $con_pusat = mysqli_connect("localhost", "root", "", "pmi_pusat");
    }
?>