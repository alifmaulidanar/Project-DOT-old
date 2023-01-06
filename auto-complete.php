<?php
    // Koneksi PHP dengan Database
    session_start();
    include("config.php");

    if(isset($_POST['query'])){
        $input = $_POST['query'];
        $query = "SELECT * FROM tb_pendonor WHERE id_pendonor LIKE '%$input%'";

        $result = $con1->query($query);
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<a href='#' class='list-group-item list-group-item-action'>" . $row['id_pendonor'] . "</a>";
            }
        } else {
            echo "<p class='list-group-item' style='color:#ff000b !important;'>Data tidak ditemukan!</p>";
        }
    }