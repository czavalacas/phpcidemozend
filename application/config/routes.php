<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
//welcome,c_autocompletar,c_bootstrap,c_main,home,cf_seguridad/c_login
$route['default_controller'] = "cf_seguridad/c_login";
$route['404_override'] = '';
$route['buscar'] = 'welcome/miFuncion2';
$route['autoc'] = 'c_autocompletar/buscarProfes';
$route['logear'] = 'cf_seguridad/c_login/logear';
$route['logOut'] = 'c_main/logOut';
$route['tabla'] = 'cf_tabla/c_tabla';
$route['tabAjax'] = 'cf_tabla_ajax/c_tabla_ajax';
$route['combo'] = 'cf_combo/c_combo';
$route['autoc'] = 'cf_autocompletar/c_autocompletar';
$route['func'] = 'cf_funcion/c_funcion';
/* End of file routes.php */
/* Location: ./application/config/routes.php */