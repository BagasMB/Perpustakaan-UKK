<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'homepage';
$route['404_override'] = 'auth/my404';
$route['translate_uri_dashes'] = FALSE;

// Admin Page
$route['peminjaman/peminjaman-buku/(:num)'] = 'peminjaman/peminjamanBuku/$1';
$route['ulas'] = 'ulasan/ulas';
$route['denda'] = 'peminjaman/bayardenda';

// HomePage
$route['homepage'] = 'public/homepage';

// Peminjaman User 
$route['peminjaman-user'] = 'public/PeminjamanUser';
$route['keranjang'] = 'public/PeminjamanUser/keranjang';
$route['pinjam/detail/(:num)'] = 'public/PeminjamanUser/detail/$1';
$route['add-keranjang/(:num)'] = 'public/PeminjamanUser/addKeranjang/$1';
$route['hpskeranjang/(:num)'] = 'public/PeminjamanUser/hapuskeranjang/$1';
$route['peminjaman/proses'] = 'public/PeminjamanUser/prosesPeminjaman';

// Books
$route['book'] = 'public/book';
$route['book/detail/(:num)'] = 'public/book/detail/$1';
$route['book/category/(:num)'] = 'public/book/category/$1';

// Contact 
$route['favorit'] = 'public/favorit';
$route['favorit/tambah/(:num)'] = 'public/favorit/tambah/$1';
$route['favorit/hapus/(:num)'] = 'public/favorit/hapus/$1';

// Contact 
$route['contact'] = 'public/contact';
