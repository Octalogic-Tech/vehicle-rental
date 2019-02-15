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
| When you set this option to TRUE, it will replace ALL dashes with
| underscores in the controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
//$route['default_controller'] = 'mycontroller';
$route['default_controller'] = 'Admincontroller/index';
$route['update'] = 'Admincontroller/update';


/*--------------------------------------INSERT------------------------------------------*/

$route['insert_brand'] = 'Admincontroller/insert_brand';
$route['Insert_category'] = 'Admincontroller/Insert_category';
$route['Insert_type'] = 'Admincontroller/Insert_type';
$route['Insert_name'] = 'Admincontroller/Insert_name';
$route['Insert_locality'] = 'Admincontroller/Insert_locality';
$route['Add_vendor'] = 'Admincontroller/Add_vendor';


/*--------------------------------------UPDATE------------------------------------------*/

$route['Change_brandname'] = 'Admincontroller/Change_brandname';
$route['Change_category'] = 'Admincontroller/Change_category';
$route['Change_type'] = 'Admincontroller/Change_type';
$route['Change_name'] = 'Admincontroller/Change_name';
$route['Change_locality'] = 'Admincontroller/Change_locality';
/*--------------------------------------DELETE------------------------------------------*/

$route['Change_brandstatus'] = 'Admincontroller/Change_brandstatus';
$route['Change_categorystatus'] = 'Admincontroller/Change_categorystatus';
$route['Change_typestatus'] = 'Admincontroller/Change_typestatus';
$route['Change_namestatus'] = 'Admincontroller/Change_namestatus';
$route['Change_localitystatus'] = 'Admincontroller/Change_localitystatus';

/*--------------------------------------DISPLAY------------------------------------------*/

$route['Display_vehiclebrand']= 'Admincontroller/Display_vehiclebrand';
$route['Display_vehiclecategory']= 'Admincontroller/Display_vehiclecategory';
$route['Display_vehicletype']= 'Admincontroller/Display_vehicletype';
$route['Display_vehiclename']= 'Admincontroller/Display_vehiclename';
$route['Display_locality']= 'Admincontroller/Display_locality';

$route['Display_vendor']= 'Admincontroller/Display_vendor';


$route['form_validation/[:any]']='Admincontroller/form_validation/';

$route['update/(:num)'] = 'Admincontroller/update/$1';
$route['Change_brandstatus/(:num)'] = 'Admincontroller/Change_brandstatus/$1';
$route['Change_categorystatus/(:num)'] = 'Admincontroller/Change_categorystatus/$1';
$route['Change_typestatus/(:num)'] = 'Admincontroller/Change_typestatus/$1';
$route['Change_namestatus/(:num)'] = 'Admincontroller/Change_namestatus/$1';
$route['Change_localitystatus/(:num)'] = 'Admincontroller/Change_localitystatus/$1';
//$route['Change_brandname/(:any)'] = 'Admincontroller/Change_brandname/';
//$route['insert_brand/(:any)'] = 'Admincontroller/insert_brand/';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
