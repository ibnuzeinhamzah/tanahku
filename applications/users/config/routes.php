<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Users';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users/login'] = 'Auth/login';
$route['users/logoff'] = 'Auth/logoff';
$route['users/change-password'] = 'Auth/change_password';
$route['users/update-password'] = 'Auth/update_password';
$route['users/forgot-password'] = 'Auth/forgot_password';
$route['users/confirm-forgot-password'] = 'Auth/confirm_forgot_password';

$route['users/(:any)'] = 'Users/index/$1';
$route['users/(:any)/save-insert'] = 'Users/save/$1';
$route['users/(:any)/save-update'] = 'Users/update/$1';
$route['users/(:any)/(:any)'] = 'Users/$2/$1';
$route['users/(:any)/confirm-delete/(:num)'] = 'Users/confirm/$1/$2';
$route['users/(:any)/(:any)/(:num)'] = 'Users/$2/$1/$3';
$route['users/(:any)/(:any)/(:any)'] = 'Users/$2/$1/$3';