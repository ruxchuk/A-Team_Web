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

$route['default_controller'] = "index";
$route['404_override'] = '';
//$route[('หน้าแรก')] = "index";
$route['รายการ'] = "auth/signIn";
//$route[('ค้นหา/([ก-เ a-z 0-9]+)')] = "index/search";
$route[('ค้นหา')] = "index/search";


$route['ผ้าม่าน'] = "product/curtain";
$route['ผ้าม่าน/Curtain&Fabric'] = "product/curtainFabric";
$route['ผ้าม่าน/WallPaper'] = "product/wallPaper";
$route['ผ้าม่าน/RollerBlind'] = "product/rollerBlind";
$route['ผ้าม่าน/VenetianBlind'] = "product/venetianBlind";
$route['ผ้าม่าน/FurnitureBuiltIn'] = "product/furnitureBuiltIn";

$route['ผ้าม่าน/Curtain&Fabric/(\d+)'] = "product/curtainView/$3";
$route['ผ้าม่าน/WallPaper/(\d+)'] = "product/curtainView/$3";
$route['ผ้าม่าน/RollerBlind/(\d+)'] = "product/curtainView/$3";
$route['ผ้าม่าน/VenetianBlind/(\d+)'] = "product/curtainView/$3";
$route['ผ้าม่าน/FurnitureBuiltIn/(\d+)'] = "product/curtainView/$3";


$route['สินค้า'] = "product";
$route['สินค้า/([ก-เ]+)/(\d+)'] = "product/productType/$3";
$route['สินค้า/([ก-เ]+)'] = "product/productType";





//$route[('([ก-เ]+)')] = "product/productAll";

$route['สินค้าโปรโมชั่น'] = "product/showProduct/4";
$route['สินค้าแนะนำ'] = "product/showProduct/3";
$route['สินค้าขายดี'] = "product/showProduct/2";
$route['สินค้ามาใหม่'] = "product/showProduct/1";

$route[('([ก-เ]+)')] = "product/productAll";

//$route['ตะกร้าสินค้า'] = "product/viewProductCart";
$route['ตะกร้าสินค้า'] = "product/buyProductView";

;
//$route['สินค้า/([ก-เ]+)'] = "product/productType/$3";

$route['ติดต่อเรา'] = "index/contactus";

/* End of file routes.php */
/* Location: ./application/config/routes.php */