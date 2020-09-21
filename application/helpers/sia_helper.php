<?php
defined('BASEPATH') or exit('No direct script access allowed');

function numIndo($angka)
{
    return number_format($angka, 2, ',', '.');
}

function dateIndo($tgl)
{
    $ubah    = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah   = explode('-', $ubah);
    $tanggal = $pecah[2];
    $bulan   = bulan($pecah[1]);
    $tahun   = $pecah[0];
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}

function bulan($bln)
{
    switch ($bln) {
        case 1:
            return 'Januari';
            break;
        case 2:
            return 'Februari';
            break;
        case 3:
            return 'Maret';
            break;
        case 4:
            return 'April';
            break;
        case 5:
            return 'Mei';
            break;
        case 6:
            return 'Juni';
            break;
        case 7:
            return 'Juli';
            break;
        case 8:
            return 'Agustus';
            break;
        case 9:
            return 'September';
            break;
        case 10:
            return 'Oktober';
            break;
        case 11:
            return 'November';
            break;
        case 12:
            return 'Desember';
            break;
    }
}

function shortDateIndo($tgl)
{
    $ubah    = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah   = explode('-', $ubah);
    $tanggal = $pecah[2];
    $bulan   = shortBulan($pecah[1]);
    $tahun   = $pecah[0];
    return $tanggal . '/' . $bulan . '/' . $tahun;
}

function shortBulan($bln)
{
    switch ($bln) {
        case 1:
            return '01';
            break;
        case 2:
            return '02';
            break;
        case 3:
            return '03';
            break;
        case 4:
            return '04';
            break;
        case 5:
            return '05';
            break;
        case 6:
            return '06';
            break;
        case 7:
            return '07';
            break;
        case 8:
            return '08';
            break;
        case 9:
            return '09';
            break;
        case 10:
            return '10';
            break;
        case 11:
            return '11';
            break;
        case 12:
            return '12';
            break;
    }
}

function mediumDateIndo($tgl)
{
    $ubah    = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah   = explode('-', $ubah);
    $tanggal = $pecah[2];
    $bulan   = mediumBulan($pecah[1]);
    $tahun   = $pecah[0];
    return $tanggal . '-' . $bulan . '-' . $tahun;
}

function mediumBulan($bln)
{
    switch ($bln) {
        case 1:
            return 'Jan';
            break;
        case 2:
            return 'Feb';
            break;
        case 3:
            return 'Mar';
            break;
        case 4:
            return 'Apr';
            break;
        case 5:
            return 'Mei';
            break;
        case 6:
            return 'Jun';
            break;
        case 7:
            return 'Jul';
            break;
        case 8:
            return 'Ags';
            break;
        case 9:
            return 'Sep';
            break;
        case 10:
            return 'Okt';
            break;
        case 11:
            return 'Nov';
            break;
        case 12:
            return 'Des';
            break;
    }
}

function longDateIndo($tgl)
{
    $ubah    = gmdate($tgl, time() + 60 * 60 * 8);
    $pecah   = explode('-', $ubah);
    $tanggal = $pecah[2];
    $bulan   = $pecah[1];
    $tahun   = $pecah[0];
    $bulan2  = bulan($bulan);

    $nama  = date('l', mktime(0, 0, 0, $bulan, $tanggal, $tahun));
    $nama2 = '';
    switch ($nama) {
        case 'Sunday':
            $nama2 = 'Minggu';
            break;
        case 'Monday':
            $nama2 = 'Senin';
            break;
        case 'Tuesday':
            $nama2 = 'Selasa';
            break;
        case 'Wednesday':
            $nama2 = 'Rabu';
            break;
        case 'Thursday':
            $nama2 = 'Kamis';
            break;
        case 'Friday':
            $nama2 = 'Jumat';
            break;
        case 'Saturday':
            $nama2 = 'Sabtu';
            break;
    }
    return $nama2 . ', ' . $tanggal . ' ' . $bulan2 . ' ' . $tahun;
}

function setDbAktif($dbAktif) {
  $db['dsn']	= '';
  $db['hostname'] = 'localhost';
  $db['username'] = 'root';
  $db['password'] = '';
  $db['database'] = $dbAktif; //$this->session->userdata('db_aktif');
  $db['dbdriver'] = 'mysqli';
  $db['dbprefix'] = '';
  $db['pconnect'] = FALSE;
  $db['db_debug'] = (ENVIRONMENT !== 'production');
  $db['cache_on'] = FALSE;
  $db['cachedir'] = '';
  $db['char_set'] = 'utf8';
  $db['dbcollat'] = 'utf8_general_ci';
  $db['swap_pre'] = '';
  $db['encrypt'] = FALSE;
  $db['compress'] = FALSE;
  $db['stricton'] = FALSE;
  $db['failover'] = array();
  $db['save_queries'] = TRUE;
  $ci =& get_instance();
  $ci->db = $ci->load->database($db, true);
}

function pre($data) {
  echo "<pre>";
  print_r($data);
  echo "</pre>";
}
