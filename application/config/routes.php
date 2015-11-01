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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['clear'] = 'produkt/clearCart';
$route['debug'] = 'produkt/debug';
$route['koszyk'] = 'zamowienie/cart';
$route['usun_z_koszyka/(:any)/(:num)'] = 'produkt/delete_from_cart/$1/$2';
$route['dodaj_do_koszyka/(:any)/(:num)'] = 'produkt/add_to_cart/$1/$2';
$route['ksiazka/(:num)'] = 'produkt/get_product/ksiazka/$1';
$route['album/(:num)'] = 'produkt/get_product/album/$1';
$route['film/(:num)'] = 'produkt/get_product/film/$1';
$route['get_json/(:any)'] = 'produkt/get_products_json/$1';
$route['ksiazki'] = 'produkt/index/ksiazka';
$route['albumy'] = 'produkt/index/album';
$route['filmy'] = 'produkt/index/film';
$route['profil'] = 'konto/index';
$route['admin/(:any)'] = 'admin/$1';
$route['wyloguj'] = 'konto/logout';
$route['rejestracja'] = 'konto/register';
$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
