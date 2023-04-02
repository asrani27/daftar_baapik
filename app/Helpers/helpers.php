<?php
function hitungUmur($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    $m = $today->diff($lahir)->m;
    $d = $today->diff($lahir)->d;
    $umur = $y . " Tahun " . $m . " Bulan " . $d . " Hari";
    return $umur;
}

function umurBulan($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    $m = $today->diff($lahir)->m;
    $d = $today->diff($lahir)->d;
    $umur = ($y * 12) + $m . " Bulan";
    return $umur;
}
function umurBulan2($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    $m = $today->diff($lahir)->m;
    $d = $today->diff($lahir)->d;
    $umur = ($y * 12) + $m;
    return $umur;
}
function Tahun($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    return $y;
}

function Bulan($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $m = $today->diff($lahir)->m;
    return $m;
}

function Hari($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $d = $today->diff($lahir)->d;
    return $d;
}

function convertid($param)
{
    if (strlen($param) == 1) {
        return $hasil = '000000000000000' . $param;
    } elseif (strlen($param) == 2) {
        return $hasil = '00000000000000' . $param;
    } elseif (strlen($param) == 3) {
        return $hasil = '0000000000000' . $param;
    } elseif (strlen($param) == 4) {
        return $hasil = '000000000000' . $param;
    } elseif (strlen($param) == 5) {
        return $hasil = '00000000000' . $param;
    } elseif (strlen($param) == 6) {
        return $hasil = '0000000000' . $param;
    } elseif (strlen($param) == 7) {
        return $hasil = '000000000' . $param;
    } elseif (strlen($param) == 8) {
        return $hasil = '00000000' . $param;
    }
}

function antrean($param)
{
    if (strlen($param) == 1) {
        return $hasil = '000' . $param;
    } elseif (strlen($param) == 2) {
        return $hasil = '00' . $param;
    } elseif (strlen($param) == 3) {
        return $hasil = '0' . $param;
    }
}
