<?php
//home
$router['home']='home';
$router['default_controller'] = 'home';
//product
$router['admin']='product/getListProduct';
$router['admin/them-sp']='product/getProduct';
$router['admin/cap-nhat-sp/.+-(\d+).html'] = 'product/get_detail_product/$1';
$router['admin/cap-nhat-san-pham']='product/update_product';
$router['admin/xoa-sp']='product/delete_product';
//category
$router['admin/danh-muc']='category/getListCategories';
$router['admin/them-danh-muc-sp']='category/get_category';
$router['admin/cap-nhat-danh-muc/.+-(\d+).html'] = 'category/get_detail_category/$1';
$router['admin/cap-nhat-dm']='category/update_category';
$router['admin/xoa-danh-muc']='category/delete_category';
//role
$router['admin/chuc-nang']='role/getListRoles';
$router['admin/them-chuc-nang']='role/get_role';
$router['admin/post_role']='role/post_role';
$router['admin/update-role/.+-(\d+).html']='role/get_detail_role/$1';
$router['admin/save-role']='role/update_role';
$router['admin/xoa-chuc-nang']='role/delete_role';
//account
$router['admin/account']='account/getListAccount';
$router['register']='account/register';
$router['post_account']='account/post_account';
$router['login']='account/login';
$router['logout']='account/logout';
$router['get-account']='account/get_user';
$router['admin/delete-account']='account/delete_account';
$router['admin/update-account/.+-(\d+).html']='account/get_detail_account/$1';
$router['admin/save-user']='account/save_account';
//cart
$router['admin/cart']='cart/getListCart';
$router['admin/cart-detail/.+-(\d+).html']='cart/get_detail_cart/$1';
$router['admin/delete-cart']='cart/delete_cart';
$router['product-detail/.+-(\d+).html']='product/get_detail/$1';
//order
$router['add-to-cart']='order/add_to_cart';
$router['list-order']='order/get_list_order';
$router['update-order']='order/update_order';
$router['delete-order']='order/delete_order';
$router['delete-all-order']='order/delete_all_order';


// $group['admin/']=[
    // $router['']='product/getListProduct',
    // $router['them-sp']='product/getProduct',
    // $router['cap-nhat-sp/.+-(\d+).html'] = 'product/get_detail_product/$1',
    // $router['cap-nhat-san-pham']='product/update_product',
    // $router['xoa-sp']='product/delete_product',
    // //category
    // $router['danh-muc']='category/getListCategories',
    // $router['them-danh-muc-sp']='category/get_category',
    // $router['cap-nhat-danh-muc/.+-(\d+).html'] = 'category/get_detail_category/$1',
    // $router['cap-nhat-dm']='category/update_category',
    // $router['xoa-danh-muc']='category/delete_category',
    // //role
    // $router['chuc-nang']='role/getListRoles',
    // $router['them-chuc-nang']='role/get_role',
    // $router['post_role']='role/post_role',
    // $router['update-role/.+-(\d+).html']='role/get_detail_role/$1',
    // $router['save-role']='role/update_role',
    // $router['xoa-chuc-nang']='role/delete_role',
    // //account
    // $router['account']='account/getListAccount',
    // $router['delete-account']='account/delete_account',
    // $router['update-account/.+-(\d+).html']='account/get_detail_account/$1',
    // $router['save-user']='account/save_account',
    // //cart
    // $router['cart']='cart/getListCart',
    // $router['cart-detail/.+-(\d+).html']='cart/get_detail_cart/$1',
    // $router['delete-cart']='cart/delete_cart',
    // ];
?>