<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'home';
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
$route['institute/category/add'] = 'institute/category';     //Completed
$route['institute/category/edit'] = 'institute/category/edit';     //Completed

//Institute profile
$route['institute/profile'] = 'institute/profiles';                            //Completed
$route['institute/profile/edit'] = 'institute/profile/edit';                    //Completed
$route['institute/reports'] = 'institute/common/report';                        //Completed
$route['institute/feedbacks'] = 'institute/common/feedback';                    //Completed
$route['institute/dummy'] = 'institute/common/dummy';                    //Completed
$route['institute/category'] = 'institute/category/getAllCategory';                    //Completed
$route['institute/enquiry/all'] = 'institute/common/getAllEnquiries';                      //pending
// $route['institute/notifications'] = 'institute/notification';                   //Pending
// $route['institute/subscriptions'] = 'institute/subscription';                   //Pending
$route['institute/active-deactive'] = 'institute/course/courseActiveDeactive';                   //Pending


// Site panel
$route['home'] = 'home';                                        //Completed
$route['home/(:num)'] = 'home/$1';                      //Completed
$route['contact'] = 'home/contact';                      //Completed
$route['about'] = 'site/About';                      //Completed
$route['courses'] = 'site/Courses';                      //Completed
$route['courseDetails/(:num)'] = 'site/Courses/courseDetails/$1';                      //Completed
$route['login'] = 'site/Auth';                      //Completed
$route['logout'] = 'site/Auth/logout';                      //Completed
$route['profile'] = 'site/Profiles';                      //Completed
$route['signup'] = 'site/auth/pageSignup';                      //Completed
$route['filter'] = 'home/filter';                      //Completed
$route['filter/(:num)'] = 'home/filter/$1';                      //Completed
$route['subscribe'] = 'home/subscribe';                      //Completed
// $route['unsubscribe'] = 'home';                      //Completed
// $route['searchCourse'] = 'home/searchCourse';                      //Completed
$route['enquiry'] = 'site/courses/enquiry';                      //pending
// $route['report'] = 'site/courses';                      //pending

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