<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['product'] = 'admin/Product_Con';
//Category Route
$route['category'] = 'admin/Category_Con';
$route['addcategory'] = 'admin//Category_Con/InsertData';
$route['cart/show_cart_detail/(:any)'] = 'admin/Cart_Con/ShowData/$1';
$route['editcategory/(:any)'] = 'admin/Category_Con/GetRow/$1';
$route['useradd'] = 'admin/Manage_Users/UserAdd';
//Supplier Route
$route['supplier'] = 'admin/C_Supplier';
$route['addsupplier'] = 'admin/C_Supplier/AddData';
//Customer Route
$route['customer'] = 'admin/C_Customer';
$route['addcustomer'] = 'admin/C_Customer/addData';
//Brand Route
$route['brand'] = 'admin/C_Brand';
$route['addbrand'] = 'admin/C_Brand/AddData';
//Order Route
$route['order'] = 'admin/C_order';
$route['order_detail/(:any)'] = 'admin/C_order/GetDetailOrder/$1';
$route['users'] = 'admin/Manage_Users';
$route['banner'] = 'admin/C_banner';
$route['addbanner'] = 'admin/C_banner/addData';
$route['editproductphoto/(:any)'] = 'admin/Product_Con/editPhoto/$1';
$route['order/add_order_status'] = 'admin/C_order/getOrderStatus';
$route['order/create_invoice/(:any)'] = 'admin/C_order/view_Invoice/$1';
$route['invoice'] = 'admin/C_invoice';
//Invoice Route
$route['invoice/print_invoice/(:any)'] = 'admin/C_invoice/viewPrintInvoice/$1';
//Profile Setting Route
$route['profile_setting'] = 'admin/C_profile_setting';

//Sale Route
$route['sale/login'] = 'sale/C_sale_login';
$route['sale/login/logout'] = 'sale/C_sale_login/logout';
$route['sale/dashboard'] = 'sale/C_sale_dashboard';
$route['sale/brand'] = 'sale/C_sale_brand';
$route['sale/category'] = 'sale/C_sale_category';
$route['sale/product'] = 'sale/C_sale_product';
$route['sale/getrow_product'] = 'sale/C_sale_product/getRow';
$route['sale/sale_order'] = 'sale/C_sale_sale';
$route['sale/add_new_sale_order'] = 'sale/C_sale_sale/addSaleOrder';
$route['sale/sale_order/create_invoice/(:any)'] = 'sale/C_sale_sale/createInvoice/$1';
$route['sale/profile_setting'] = 'sale/C_profile_setting';