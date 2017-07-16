<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'FrontEnd';
$route['404_override'] = 'Error';
$route['translate_uri_dashes'] = FALSE;

$route['(:any)/(:any)/(:any)'] = 'FrontEnd/$2/$1/$3';
$route['(:any)/(:any)/(:num)'] = 'FrontEnd/$2/$1/$3';
$route['(:any)/(:any)'] = 'FrontEnd/$2/$1';
$route['(:any)'] = 'FrontEnd/index/$1';