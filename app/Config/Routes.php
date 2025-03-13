<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//USER
// Auth
$routes->get('/loginadmin', 'Auth::loginadmin');
$routes->get('/login', 'Auth::login');
$routes->get('/pendaftaran', 'Auth::pendaftaran');
$routes->get('/logout', 'Auth::logout');
$routes->post('/auth/save_register', 'Auth::save_register');
$routes->post('/auth/cek_login', 'Auth::cek_login');
$routes->post('/auth/cek_login_admin', 'Auth::cek_login_admin');
$routes->get('/', 'Page::index');
$routes->get('/index', 'Page::index');
$routes->get('/lupa_password', 'Page::lupa_password');
$routes->get('otp/(:num)', 'Auth::otp/$1');
$routes->post('gan/otp', 'Auth::cekotp');
$routes->get('change/password/(:num)', 'Auth::change/$1');
$routes->post('c/pas', 'Auth::cpas');



$routes->group('', ['filter' => 'auth'], function ($routes) {

    $routes->get('/member_kursus', 'Page::member_kursus');

    $routes->get('/edit_profile', 'Page::edit_profile');
    $routes->post('/save_profile', 'Page::save_profile');

    $routes->get('/video_kursus/(:segment)', 'Page::video_kursus/$1');
    $routes->get('/video_kursus/(:segment)/(:segment)', 'Page::video_kursus/$1/$2');
    $routes->post('/save_progress', 'Page::save_progress');



    //ADMIN


    $routes->get('/data_mitra', 'AdminDataMitra::index');
    $routes->get('/tambah_mitra', 'AdminDataMitra::tambah_mitra');
    $routes->post('/save_mitra', 'AdminDataMitra::save_mitra');
    $routes->get('/edit_mitra/(:segment)', 'AdminDataMitra::edit_mitra/$1');
    $routes->post('/save_edit_mitra', 'AdminDataMitra::edit_save');
    $routes->get('/delete_mitra/(:segment)', 'AdminDataMitra::delete_mitra/$1');

    $routes->get('/data_user', 'AdminDataUser::index');
    $routes->get('/edit_user/(:segment)', 'AdminDataUser::edit_user/$1');
    $routes->post('/edit_user/save_edit_user', 'AdminDataUser::edit_save');
    $routes->get('/delete_user/(:segment)', 'AdminDataUser::delete_user/$1');

    $routes->get('/data_pengajar', 'AdminDataPengajar::index');
    $routes->get('/tambah_pengajar', 'AdminDataPengajar::tambah_pengajar');
    $routes->post('/save_pengajar', 'AdminDataPengajar::save_pengajar');
    $routes->get('/edit_pengajar/(:segment)', 'AdminDataPengajar::edit_pengajar/$1');
    $routes->post('/save_edit_pengajar', 'AdminDataPengajar::edit_save');
    $routes->get('/delete_pengajar/(:segment)', 'AdminDataPengajar::delete_pengajar/$1');

    $routes->get('/data_modul', 'AdminDataModul::index');
    $routes->get('/tambah_modul', 'AdminDataModul::tambah_modul');
    $routes->post('/save_modul', 'AdminDataModul::save_modul');
    $routes->get('/edit_modul/(:segment)', 'AdminDataModul::edit_modul/$1');
    $routes->post('/save_edit_modul', 'AdminDataModul::edit_save');
    $routes->get('/delete_modul/(:segment)', 'AdminDataModul::delete_modul/$1');

    $routes->get('/data_materi', 'AdminDataMateri::index');
    $routes->post('/data_materi', 'AdminDataMateri::index');
    $routes->get('/tambah_materi', 'AdminDataMateri::tambah_materi');
    $routes->post('/save_materi', 'AdminDataMateri::save_materi');
    $routes->get('/edit_materi/(:segment)', 'AdminDataMateri::edit_materi/$1');
    $routes->post('/save_edit_materi', 'AdminDataMateri::edit_save');
    $routes->get('/delete_materi/(:segment)', 'AdminDataMateri::delete_materi/$1');
});

$routes->post('gan/password', 'Auth::ganpas');
