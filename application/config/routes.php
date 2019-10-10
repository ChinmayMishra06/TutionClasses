<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Home page.
$route['/'] = '/';
$route['/courses'] = '/courses';
$route['/news'] = '/news';
$route['/feedbacks'] = '/feedbacks';
$route['/tnc'] = '/tnc';
$route['/support'] = '/support';
$route['/institute/$institute'] = '/institute/$1';


// Institute panel.
$route['institute'] = 'institute/Auth';
$route['institute/login'] = 'institute/Auth/pageLogin';                         //Completed
$route['institute/signUp'] = 'institute/Auth/pageSignUp';                       //Completed
$route['institute/logout'] = 'institute/Auth/actionLogout';                     //Completed

// Category 
$route['institute/category'] = 'institute/category';

//Institute
// $route['institute'] = 'institute';
$route['institute/courses'] = 'institute/course';                               //Completed
$route['institute/courses/add'] = 'institute/course/add';                       //Completed
$route['institute/courses/edit/(:num)'] = 'institute/course/edit/$1';
$route['institute/courses/details/(:num)'] = 'institute/course/details/$1';     //Completed

//Institute profile
$route['institute/profile'] = 'institute/profiles/';                            //Completed
$route['institute/profile/edit'] = 'institute/profile/edit';                    //Completed
$route['institute/reports'] = 'institute/common/report';                        //Pending
$route['institute/feedbacks'] = 'institute/common/feedback';                    //Pending
// $route['institute/notifications'] = 'institute/notification';                   //Pending
// $route['institute/subscriptions'] = 'institute/subscription';                   //Pending

//User profile panel.
$route['user/'] = 'user';                                                       //Pending
$route['user/login'] = 'user/pageLogin';                                        //Pending
$route['user/profile/signup'] = 'user/profile/pageSignup';                      //Pending
$route['user/logout'] = 'user/actionLogout';                                    //Pending
$route['user/profile/add/$id'] = 'user/profile/add/$1';                         //Pending
$route['user/profile/edit/$id'] = 'user/profile/edit/$1';                       //Pending


//Apis v1
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
$route['api/v1/editCourses'] = 'api/v1/UserApi/apiEditCourse';
$route['api/v1/getCourses'] = 'api/v1/UserApi/apiGetCourse';
