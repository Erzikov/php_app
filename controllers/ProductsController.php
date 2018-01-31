<?php 
namespace controllers;

use models\{Category, Product};
use components\View;

Class ProductsController
{
    public function actionView($id)
    {
        $categories = Category::getAllCategory();
        $product = Product::getProductById($id);

        $view = new View();
      	$categoriesView = $view->fetchPartial('layouts/categories', array('categories' => $categories));
      	$view->render('product/view', array('categories'=>$categoriesView, 'product' => $product));

        return true;
    }
}
