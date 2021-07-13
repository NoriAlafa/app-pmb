<?php
//fungsi untuk mengubah format tanggal menjadi format tanggal di indo
function tgl_indonesia($tgl){
    $tanggal = substr($tgl , 8 , 2);
    $nama_bulan = array("January" , "Februari" , "Maret" , "April" , "Mei" , "Juni",
                "Juli" , "Agustus" , "September" , "Oktober" , "November" , "Desember");
    $bulan = $nama_bulan[substr($tgl , 5 , 2)-1];
    $tahun = substr($tgl,0,4);
    return $tanggal.' '.$bulan.' '.$tahun;
}

//fungsi untuk mengubah susunan tanggal dari form database
function ubah_tgl1($tanggal){
    $pisah = explode('/' , $tanggal);
    $larik = array($pisah[2],$pisah[0],$pisah[1]);
    $satukan = implode('/',$larik);
    return $satukan;
}
function ubah_tgl1($tanggal){
    $pisah = explode('/' , $tanggal);
    $larik = array($pisah[1],$pisah[2],$pisah[0]);
    $satukan = implode('/',$larik);
    return $satukan;
}
?>