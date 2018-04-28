<?php 
namespace controllers;

use models\{Category, Product};
use components\BaseController;

Class SiteController extends BaseController
{
    public function actionIndex()
    {
        $categories = Category::getAllCategory();
        $products = Product::getLatestProducts(6);
        $recommended = Product::getRecommendedProducts();

        $productsView = $this->view->fetchPartial('product/index', array('products' => $products)); 
        $categoriesView = $this->view->fetchPartial('layouts/categories', array('categories' => $categories));
        $recommendedView = $this->view->fetchPartial('site/recommended', array('recommended' => $recommended));

        $this->view->render('site/index', array('products' => $productsView, 'categories' => $categoriesView, 'recommended' => $recommendedView));

        return true;
    }

    public function actionAbout()
    {
        $this->view->render('site/about');
        return true;
    }
}
