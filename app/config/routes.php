<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    
// Page routes 
// $routes['/'] = 'welcome'; <- '/' this a main or default routes
// $routes['/test/:any'] = 'test/$value/$id';
//            ^     ^        ^      ^    ^   
//    page routes ,type ,file name, var,var

// $routes['/admin/:num'] = 'add/admin/$id';
//                              ^
//                          file path
// NOTE '$' is require for your variable

// router type
// :any for add multiple routes like /test/product/392
// :num for only number it's support only one routes like /product/392
// Add 404 use -> $routes['404'] = '404';

$routes['/'] = 'welcome';
$routes['/test/:any'] = 'test/$value/$id';