<?php
    // Koneksi PHP dengan Database
    session_start();
    include("config.php");

    $idpendonor = $_GET['idpendonor'];
    $query = mysqli_query($con1, "SELECT * FROM tb_pendonor WHERE id_pendonor = '$idpendonor'");
    $datapendonor = mysqli_fetch_array($query);
    $data = array(
        'id'=> $datapendonor['id_pendonor'],
        'nama' => $datapendonor['nama_pendonor'],
        'goldarah' => $datapendonor['golongan_darah'],
        'umur' => $datapendonor['umur'],
        'beratbadan' => $datapendonor['berat_badan'],
        'jeniskelamin' => $datapendonor['jenis_kelamin'],
    );
    echo json_encode($data);
?>