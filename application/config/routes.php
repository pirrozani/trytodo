<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'pages/view';

$route['admin/home'] = 'admin/login';
$route['users/home'] = 'users/login';
$route['users/lostpass'] = 'users/check_email';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
