<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['community'] = 'Community';
$route['about'] = 'About';
$route['product'] = 'Product';
$route['umkm'] = 'Umkm';
$route['view'] = 'Umkm/viewUmkm';

$route['admin'] = 'Admin/index';
$route['admin/login'] = 'Admin/login';
$route['admin/logout'] = 'Admin/logout';

$route['admin/dashboard'] = 'Admin/dashboard';
$route['admin/product'] = 'Admin/product';
$route['admin/umkm'] = 'Admin/umkm';
$route['admin/superadmin'] = 'Admin/manageAdmin';
$route['admin/superadmin/power'] = 'superadmin/Superadmin/power';

// SUPERADMIN CONTROL
$route['admin/superadmin/power/sendquery']['GET'] = 'superadmin/Superadmin/querySql';


// PRODUCT CONTROL
$route['admin/api/getallproduct/(:num)']['GET'] = 'api/ProductApi/getAllProduct/$1';
$route['admin/api/getallproduct/(:num)/(:num)']['GET'] = 'api/ProductApi/getAllProduct/$1/$2';
// PRODUCT CONTROL
$route['admin/api/getallumkm/(:num)']['GET'] = 'api/UmkmApi/getAllUmkm/$1';
$route['admin/api/getallumkm/(:num)/(:num)']['GET'] = 'api/UmkmApi/getAllUmkm/$1/$2';


// FORM CONTROL
// PRODUCT
$route['admin/form/product/(:any)']['GET'] = 'api/FormController/product/$1'; // add form
$route['admin/form/product/(:any)/(:num)']['GET'] = 'api/FormController/product/$1/$2'; // edit form
// PRODUCT PROSES
$route['admin/api/delproduct']['GET'] = 'api/ProductApi/delProduct'; // del data
$route['admin/api/addproduct']['POST'] = 'api/ProductApi/addproduct'; // add data
$route['admin/api/updateproduct']['POST'] = 'api/ProductApi/updproduct'; // update data


// UMKM
$route['admin/form/umkm/(:any)']['GET'] = 'api/FormController/umkm/$1'; // add form
$route['admin/form/umkm/(:any)/(:num)']['GET'] = 'api/FormController/umkm/$1/$2'; // edit form
// UMKM PROSES
$route['admin/api/delumkm']['GET'] = 'api/UmkmApi/delUmkm'; // del data
$route['admin/api/addumkm']['POST'] = 'api/UmkmApi/addumkm'; // add data
$route['admin/api/updateumkm']['POST'] = 'api/UmkmApi/updumkm'; // update data


$route['admin/api/allpage']['GET'] = 'api/PageController/allpage';
$route['admin/api/homepage']['GET'] = 'api/PageController/homepage';
$route['admin/api/productpage']['GET'] = 'api/PageController/productpage';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
