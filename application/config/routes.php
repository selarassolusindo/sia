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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

$route['company']                          = 't01_company';
$route['user-management']                  = 'auth';
$route['create-user']                      = 'auth/create_user';
$route['create-group']                     = 'auth/create_group';
$route['edit-group/(:num)']                = 'auth/edit_group/$1';
$route['deactivate/(:num)']                = 'auth/deactivate/$1';
$route['activate/(:num)']                  = 'auth/activate/$1';
$route['edit-user/(:num)']                 = 'auth/edit_user/$1';
$route['change-password']                  = 'auth/change_password';
$route['select-company']                   = 'auth/selectCompany';
$route['saldo-awal']                       = 'saldoawal';
$route['tanggal-saldo-awal']               = 'tglsaldoawal';
$route['tanggal-saldo-awal/create']        = 'tglsaldoawal/create';
$route['tanggal-saldo-awal/update/(:num)'] = 'tglsaldoawal/update/$1';
$route['input-tanggal-saldo-awal']         = 'tglsaldoawal/withNext';

// $route['level-1']                = 'akun/level_1';
// $route['level-1/read/(:num)']    = 'akun/level_1/read/$1';
// $route['level-1/clone/(:num)']   = 'akun/level_1/clone/$1';
// $route['level-1/edit/(:num)']    = 'akun/level_1/edit/$1';
// $route['level-1/delete/(:num)']  = 'akun/level_1/delete/$1';
// $route['level-1/success/(:num)'] = 'akun/level_1/success/$1';
