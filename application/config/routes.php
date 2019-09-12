<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//apis v1
$route['api/v1/init'] = 'api/v1/BaseApi/init';
$route['api/v1/login'] = 'api/v1/AuthApi/login';