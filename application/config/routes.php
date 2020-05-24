<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['register']='register';
$route['private_area']='private_area';
// $route['']='home';
// $route['posts/create'] = 'posts/create'; 
// $route['posts/(:any)']='posts/view/$1';
// $route['posts'] = 'posts/index';
$route['default_controller'] = 'login';
$route['login'] = 'login';
// $route['(:any)']='pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
