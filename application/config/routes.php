<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


//apis v1
$route['api/v1/init'] = 'api/v1/BaseApi/apiInit';
$route['api/v1/login'] = 'api/v1/AuthApi/apiLogin';
$route['api/v1/setValue'] = 'api/v1/BaseApi/apiSetValue';
$route['api/v1/signUp'] = 'api/v1/AuthApi/apiSignUp';
$route['api/v1/forget'] = 'api/v1/AuthApi/apiForget';
$route['api/v1/reset'] = 'api/v1/AuthApi/apiReset';
$route['api/v1/getProfile'] = 'api/v1/UserApi/apiGetProfile';
$route['api/v1/editProfile'] = 'api/v1/UserApi/apiEditProfile';
$route['api/v1/getCategory'] = 'api/v1/BaseApi/apiGetCategory';
$route['api/v1/logout'] = 'api/v1/AuthApi/apiLogout';
$route['api/v1/addFeedback'] = 'api/v1/UserApi/apiAddFeedback';
$route['api/v1/addReport'] = 'api/v1/UserApi/apiAddReport';
$route['api/v1/addCourse'] = 'api/v1/UserApi/apiAddCourse';
$route['api/v1/editCourse'] = 'api/v1/UserApi/apiEditCourse';
$route['api/v1/getCourse'] = 'api/v1/UserApi/apiGetCourse';
