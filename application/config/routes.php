<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'View_admin_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['coupons'] = "View_coupon_controller/index";
$route['members'] = "View_member_controller/index";
$route['providers'] = "View_provider_controller/index";
$route['categories'] = "View_provider_controller/categories";
$route['promotions'] = "View_promotion_controller/index";
$route['promotions/(:num)/(:any)'] = "View_promotion_controller/index/$1/$2";

$route['admin/api/promotions/create'] = "Api_promotion_controller/create_promotions";

$route['admin/api/category/add'] = "Api_provider_controller/add_category";
$route['admin/api/category/edit'] = "Api_provider_controller/edit_category";
$route['admin/api/category/update'] = "Api_provider_controller/update_category";
$route['admin/api/category/delete'] = "Api_provider_controller/delete_category";

$route['admin/api/provider/add'] = "Api_provider_controller/add_provider";
$route['admin/api/provider/edit'] = "Api_provider_controller/edit_provider";
$route['admin/api/provider/update'] = "Api_provider_controller/update_provider";
$route['admin/api/provider/delete'] = "Api_provider_controller/delete_provider";

$route['admin/api/member/add'] = "Api_member_controller/add_member";
$route['admin/api/member/update'] = "Api_member_controller/update_member";
$route['admin/api/member/delete'] = "Api_member_controller/delete_member";
$route['admin/api/member/form'] = "Api_member_controller/update_form";

$route['admin/api/login'] = "Api_admin_controller/api_login";
$route['admin/api/logout'] = "Api_admin_controller/api_logout";