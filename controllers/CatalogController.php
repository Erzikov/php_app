<?php 
namespace controllers;

use models\{Category, Product};
use components\{BaseController, Pagination};

Class CatalogController extends BaseController 
{
    public function actionIndex(int $currentPage = 1)
    {
        $limit = 12;
        $total = Product::getTotalAllProducts();
        $categories = Category::getAllCategory();
        $products = Product::getAllProducts($currentPage, $limit);
        $pagination = new Pagination($total, $currentPage, $limit, 'page-');
        
        $productsView = $this->view->fetchPartial('product/index', ['products' => $products]);
        $categoriesView = $this->view->fetchPartial('layouts/categories', ['categories' => $categories]);

        $this->view->render(
            'catalog/index', 
            [
                'products' => $productsView,
                'categories' => $categoriesView,
                'pagination' => $pagination
            ]
        );

        return true;
	}

    public function actionCategory($categoryId,int $page=1)
    {
        $limit = 3;
        $total = Product::getTotalProductInCategory($categoryId);
        $categories = Category::getAllCategory();
        $products = Product::getLatestProductsByCategory($categoryId, $page, $limit);
        $pagination = new Pagination($total, $page, $limit, 'page-');	

        $categoriesView = $this->view->fetchPartial(
            'layouts/categories',
            [
                'categories' => $categories,
                'categoryId' => $categoryId
            ]
        );
        $productsView = $this->view->fetchPartial('product/index', ['products' => $products]);

        $this->view->render(
            'catalog/category',
            [
                'categories' => $categoriesView,
                'products' => $productsView,
                'pagination' => $pagination
            ]
        );

        return true;
    }
}
