<?php 
namespace controllers;

use models\{Category, Product};
use components\BaseController;

Class ProductsController extends BaseController
{
    public function actionView($id)
    {
        $categories = Category::getAllCategory();
        $product = Product::getProductById($id);

      	$categoriesView = $this->view->fetchPartial('layouts/categories', array('categories' => $categories));
      	$this->view->render('product/view', array('categories'=>$categoriesView, 'product' => $product));

        return true;
    }
}
