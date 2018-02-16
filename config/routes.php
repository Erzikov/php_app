<?php 
return array(
    'admin/categories/delete/([0-9]+)$' => 'adminCategories/delete/$1',
    'admin/categories/create'           => 'adminCategories/create',
    'admin/categories/edit/([0-9]+)$'   => 'adminCategories/edit/$1',  
    'admin/categories'                  => 'adminCategories/index',
    
    'admin/users/delete/([0-9]+)$'      => 'adminUsers/deleteUser/$1',
    'admin/users'                       => 'adminUsers/index',
    
    'admin/products/delete/([0-9]+)$'   => 'adminProducts/delete/$1',
    'admin/products/edit/([0-9]+)$'     => 'adminProducts/edit/$1',
    'admin/products/create'             => 'adminProducts/create',
    'admin/products/page-([0-9]+)$'     => 'adminProducts/index/$1',
    'admin/products'                    => 'adminProducts/index',
    
    'profile/edit'                      => 'user/edit',
    'profile'                           => 'user/view',
    
    'signup'                            => 'user/create',
    'signin'                            => 'session/create',
    'signout'                           => 'session/destroy',

    'products/([0-9]+)'                 => 'products/view/$1',

    'catalog'                           => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)$'  => 'catalog/category/$1/$2',
    'category/([0-9]+)$'                => 'catalog/category/$1',

    'cart/addProduct/([0-9]+)$'         => 'cart/addProduct/$1',
    'cart/deleteProduct/([0-9]+)$'      => 'cart/deleteProduct/$1',
    'cart/checkout'                     => 'cart/checkout',
    'cart'                              => 'cart/index',
    
    ''                                  => 'site/index'  
);
?>
