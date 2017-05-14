<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Admin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin/login'] = 'Auth/login';
$route['admin/logoff'] = 'Auth/logoff';
$route['admin/change-password'] = 'Auth/change_password';
$route['admin/update-password'] = 'Auth/update_password';
$route['admin/forgot-password'] = 'Auth/forgot_password';

$route['admin/(:any)'] = 'Admin/index/$1';
$route['admin/(:any)/save-insert'] = 'Admin/save/$1';
$route['admin/(:any)/save-update'] = 'Admin/update/$1';
$route['admin/(:any)/(:any)'] = 'Admin/$2/$1';
$route['admin/(:any)/confirm-delete/(:num)'] = 'Admin/confirm/$1/$2';
$route['admin/(:any)/(:any)/(:num)'] = 'Admin/$2/$1/$3';