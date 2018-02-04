<?php 
return array(
    
    'admin/deleteUser/([0-9]+)$'      => 'admin/deleteUser/$1',
    'admin'                           => 'admin/users',

    'profile/edit'                    => 'user/edit',
    'profile'                         => 'user/view',

    'signup' 	                      => 'user/create',
    'signin'                          => 'session/create',
    'signout'                         => 'session/destroy',

    'products/([0-9]+)'		          => 'products/view/$1',

    'catalog' 				          => 'catalog/index',

    'category/([0-9]+)/page-([0-9]+)$'=> 'catalog/category/$1/$2',
    'category/([0-9]+)$' 	          => 'catalog/category/$1',

    'cart/addProduct/([0-9]+)$'       => 'cart/addProduct/$1',
    'cart/deleteProduct/([0-9]+)$'    => 'cart/deleteProduct/$1',
    'cart/checkout'                   => 'cart/checkout',
    'cart'                            => 'cart/index',
    
    '' 						          => 'site/index'	
);
?>
