<?php 
namespace controllers;

use models\{Category, Product};
use components\{Pagination, View};

Class CatalogController
{
    public function actionIndex()
    {
        $limit = 12;

        $categories = Category::getAllCategory();
        $products = Product::getLatestProducts($limit);
        
        $view = new View();

        $title = 'Каталог';
        $productsView = $view->fetchPartial('product/index', array('products' => $products));
        $categoriesView = $view->fetchPartial('layouts/categories', array('categories' => $categories));

        $view->render('catalog/index', array('products' => $productsView, 'categories' => $categoriesView, 'title' => $title));

        return true;
	}

    public function actionCategory($categoryId,int $page=1)
    {
        $limit = 3;
        $total = Product::getTotalProductInCategory($categoryId);

        $categories = Category::getAllCategory();
        $products = Product::getLatestProductsByCategory($categoryId, $page, $limit);
        $pagination = new Pagination($total, $page, $limit, 'page-');	

        $view = new View();

        $categoriesView = $view->fetchPartial('layouts/categories', array('categories' => $categories, 'categoryId' => $categoryId));
        $productsView = $view->fetchPartial('product/index', array('products' => $products));

        $view->render('catalog/category', array('categories' => $categoriesView, 'products' => $productsView, 'pagination' => $pagination));

        return true;
    }
}
