<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//apis v1
$route['api/v1/init'] = 'api/v1/BaseApi/init';
$route['api/v1/login'] = 'api/v1/AuthApi/login';
$route['api/v1/setValue'] = 'api/v1/BaseApi/setValue';
$route['api/v1/signUp'] = 'api/v1/AuthApi/signUp';
$route['api/v1/forget'] = 'api/v1/AuthApi/forget';
$route['api/v1/reset'] = 'api/v1/AuthApi/reset';