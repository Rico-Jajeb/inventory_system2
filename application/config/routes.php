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
$route['default_controller'] = 'user_page_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//-------------------------------------------------------------
//                  LOGIN URL SECTION
//-------------------------------------------------------------
$route['login'] = 'System_controller';
$route['user_login'] = 'System_controller/user_login';
$route['user_logout'] = 'System_controller/user_logout';
$route['admin_logout'] = 'System_controller/admin_logout';

//-------------------------------------------------------------
//                  SIGNUP URL SECTION
//-------------------------------------------------------------
$route['signup'] = 'System_controller/signup'; // DISPLAY SIGN_UP PAGE
$route['user_signUp'] = 'System_controller/user_signUp'; // PROCESS THE USER DATA
$route['user_profile'] = 'System_controller/user_profile'; // DISPLAY USER PROFILE

// $route['upload_img'] = 'System_controller/upload_img'; // DISPLAY USER PROFILE




//-------------------------------------------------------------
//                  DASHBOARD URL SECTION
//-------------------------------------------------------------
$route['dashboard'] = 'features/dashboard_cont/Dashboard_controller';
$route['out_of_stock'] = 'features/dashboard_cont/Dashboard_controller/out_of_stock';
$route['low_of_stock'] = 'features/dashboard_cont/Dashboard_controller/low_of_stock';
$route['all_product'] = 'features/dashboard_cont/Dashboard_controller/all_product';


// $route['uploadForm'] = 'System_controller/uploadForm';

//-------------------------------------------------------------
//                  ITEMS URL SECTION
//-------------------------------------------------------------
$route['items'] = 'features/items_cont/item_categories/add_item_category_controller/retrieve_category';
$route['retrieve_items'] = 'features/items_cont/retrieve_item/retrieve_items_controller/retrieve_items';
$route['insert_item'] = 'features/items_cont/insert_item/insert_item_controller/insert_item';
$route['item_active_update'] = 'features/items_cont/insert_item/insert_item_controller/item_active_update';

// $route['items'] = 'features/items_cont/Item_controller';
$route['cpu_table'] = 'features/items_cont/Item_controller/cpu_table';
$route['item_s'] = 'features/items_cont/cpu/cpu_item_controller/item_s';
$route['insert_cpu_data'] = 'features/items_cont/cpu/cpu_item_controller/insert_cpu_data';


//---------- INSERT ITEMS URL ----------
$route['cpu_item'] = 'features/items_cont/insert_item/insert_item_controller/cpu_item'; //URL TO INSERT CPU DATA
$route['cpu_item2'] = 'features/items_cont/insert_item/insert_item_controller/cpu_item2'; //URL TO INSERT CPU DATA With redirection

$route['gpu_item'] = 'features/items_cont/insert_item/insert_item_controller/gpu_item'; //URL TO INSERT CPU DATA
$route['gpu_item2'] = 'features/items_cont/insert_item/insert_item_controller/gpu_item2'; //URL TO INSERT CPU DATA With redirection

$route['insert_item_category'] = 'features/items_cont/item_categories/add_item_category_controller/insert_item_category'; //URL TO INSERT CPU DATA With redirection
$route['active_category_table'] = 'features/items_cont/item_categories/add_item_category_controller/delete_category_table'; //URL TO CATEGORY DATA 
$route['category_inactive_table'] = 'features/items_cont/item_categories/add_item_category_controller/category_inactive_table'; //URL TO INACTIVE CATEGORY TABLE
$route['update_category'] = 'features/items_cont/item_categories/add_item_category_controller/update_category'; //URL TO INACTIVE CATEGORY TABLE

$route['active_update_category'] = 'features/items_cont/item_categories/add_item_category_controller/active_update_category'; //URL TO CHANGE THE ACTIVE STATUS OF THE CATEGORY
$route['inactive_update_category'] = 'features/items_cont/item_categories/add_item_category_controller/inactive_update_category'; //URL TO CHANGE THE ACTIVE STATUS OF THE CATEGORY


// $route['retrieve_cpu_data'] = 'features/items_cont/cpu/cpu_item_controller/retrieve_cpu_data'; //URL TO INSERT CPU DATA

//---------- RETRIEVE ITEMS URL ----------
$route['retrieve_cpu_data'] = 'features/items_cont/retrieve_item/retrieve_items_controller/retrieve_cpu_data'; //URL TO INSERT CPU DATA
$route['retrieve_gpu_data'] = 'features/items_cont/retrieve_item/retrieve_items_controller/retrieve_gpu_data'; //URL TO INSERT CPU DATA

$route['Items_inactive_table'] = 'features/items_cont/retrieve_item/retrieve_items_controller/Items_inactive_table'; //URL TO INSERT CPU DATA


//---------- DELETE ITEMS URL ----------
$route['delete_cpu_data'] = 'features/items_cont/delete_item/delete_item_controller/delete_cpu_data/'; //URL TO INSERT CPU DATA
$route['delete_gpu_data'] = 'features/items_cont/delete_item/delete_item_controller/delete_gpu_data/'; //URL TO INSERT CPU DATA

//---------- UPDATE ITEMS URL ----------
$route['updating_items_Form'] = 'features/items_cont/update_item/update_item_controller/updating_items_Form/'; //URL TO INSERT CPU DATA
$route['updatinggpuForm'] = 'features/items_cont/update_item/update_item_controller/updatinggpuForm/'; //URL TO INSERT CPU DATA


$route['active_update_item'] = 'features/items_cont/update_item/update_item_controller/active_update_item/'; //URL TO INSERT CPU DATA
$route['inactive_update_item'] = 'features/items_cont/update_item/update_item_controller/inactive_update_item/'; //URL TO INSERT CPU DATA
$route['best_selling_item'] = 'features/items_cont/update_item/update_item_controller/best_selling_item/'; //URL TO INSERT CPU DATA
// $route['item_active_update'] = 'features/items_cont/update_item/update_item_controller/item_active_update/'; //URL TO INSERT CPU DATA



//-------------------------------------------------------------
//                  user_page URL SECTION
//-------------------------------------------------------------
$route['user_page'] = 'user_page_controller/display_best_selling_products';
$route['display_all_products'] = 'user_page_controller/display_all_products';
$route['add_to_cart_page'] = 'user_page_controller/add_to_cart_page';
$route['add_to_cart'] = 'user_page_controller/add_to_cart';
$route['update_cart_item'] = 'user_page_controller/update_add_to_cart_item';
$route['update_order_status'] = 'user_page_controller/update_order_status';

$route['views_item_details'] = 'user_page_controller/views_item_details';
$route['display_items_category'] = 'user_page_controller/display_item_on_each_category';
$route['user_profile_order'] = 'user_page_controller/user_profile_order';
$route['user_profile_page'] = 'user_page_controller/user_profile_user_page';


$route['search_products'] = 'user_page_controller/search_products';
$route['display_search_results'] = 'user_page_controller/display_search_results';
$route['check_out_item'] = 'user_page_controller/check_out_item';
$route['check_out'] = 'user_page_controller/check_out';
$route['checkout_items'] = 'user_page_controller/checkout_items';
$route['place_order'] = 'user_page_controller/place_order';
$route['placer_order_process'] = 'user_page_controller/placer_order_process';



// $route['check_out_item_page'] = 'user_page/user_page_controller/check_out_item_page';
// $route['check_out_item_page'] = 'user_page/user_page_controller/check_out_item_page';


//-------------------------------------------------------------
//                  ORDER MANAGEMENT URL SECTION
//-------------------------------------------------------------
$route['orders_table'] = 'features/order_management/Order_management_controller/orders_on_pending';
$route['Preparing_order'] = 'features/order_management/Order_management_controller/orders_table';
$route['update_ordermanegement_stats'] = 'features/order_management/Order_management_controller/update_ordermanegement_status';
$route['orders_complete'] = 'features/order_management/Order_management_controller/orders_complete_table';
$route['orders_on_delivery'] = 'features/order_management/Order_management_controller/orders_on_delivery';


//-------------------------------------------------------------
//                  DEFECTIVES URL SECTION
//-------------------------------------------------------------
// $route['defective'] = 'features/defectives_cont/Defective_controller';
$route['defective'] = 'features/defectives_cont/Defective_controller/defective_table';
$route['insert_defective_item'] = 'features/defectives_cont/Defective_controller/insert_defective_item';
$route['updating_defective_item'] = 'features/defectives_cont/Defective_controller/updating_defective_item';
$route['active_update'] = 'features/defectives_cont/Defective_controller/active_update';
$route['inactive_update'] = 'features/defectives_cont/Defective_controller/inactive_update';

$route['defective_inactive_table'] = 'features/defectives_cont/Defective_controller/defective_inactive_table'; //this is for the inactive defective tables

//-------------------------------------------------------------
//                  TRANSACTIONS URL SECTION
//-------------------------------------------------------------
$route['transaction'] = 'features/transaction_cont/Transaction_controller';

//-------------------------------------------------------------
//                  SUPPLIERS URL SECTION
//-------------------------------------------------------------
$route['supplier'] = 'features/supplier_cont/Supplier_controller/all_supplier_tbl';
$route['insert_supplier_item'] = 'features/supplier_cont/Supplier_controller/insert_supplier_item';
$route['updating_supplier_info'] = 'features/supplier_cont/Supplier_controller/updating_supplier_info';



//-------------------------------------------------------------
//                  EVENTS URL SECTION
//-------------------------------------------------------------
$route['events_controller'] = 'features/events_cont/events_controller';
$route['insert_message_data'] = 'features/events_cont/events_controller/insert_message_data';

$route['display_messages'] = 'features/events_cont/events_controller/display_messages';

//-------------------------------------------------------------
//                  AUDIT LOGS URL SECTION
//-------------------------------------------------------------
$route['admin_logs'] = 'features/audit_logs/admin_audit_logs_controller/admin_logs_data'; //URL FOR ADMIN LOGS

$route['user_logs'] = 'features/audit_logs/user_audit_logs_controller/user_logs_data'; //URL FOR USER LOGS



//-------------------------------------------------------------
//                   STAFF CREATION URL SECTION
//-------------------------------------------------------------
$route['staff_creation'] = 'features/staff_creation/staff_creation_controller';
$route['create_staff'] = 'features/staff_creation/staff_creation_controller/create_staff';


$route['Customize'] = 'features/customization/customization_controller/get_defective_Details';
$route['update_shop_name'] = 'features/customization/customization_controller/update_shop_name';
$route['update_shop_quote'] = 'features/customization/customization_controller/update_shop_quote';
$route['update_shop_logo'] = 'features/customization/customization_controller/update_shop_logo';
$route['update_shop_background_image'] = 'features/customization/customization_controller/update_shop_background_image';








$route['bet'] = 'black_jack_controller/bet';

$route['res'] = 'black_jack_controller/res';


