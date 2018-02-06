<?php 
namespace controllers;

use components\Pagination;
use components\AdminBaseController;
use models\Product;

Class AdminProductsController extends AdminBaseController
{
    public function actionIndex($page = 1)
    {
        $limit = 3;
        $total = Product::getTotalAllProducts();

        $products = Product::getProducts($page, $limit);
        $pagination = new Pagination($total, $page, $limit, 'page-');
        
        $this->view->render('admin/products/index', array('products' => $products, 'pagination' => $pagination));
        
        return true;
    }

    public function actionCreate()
    {

        $name = '';
        $category = '';
        $code = '';
        $price = '';
        $brand = '';
        $image = '';
        $description = '';
        $isNew = 1;
        $isRecomend = 0;
        $status = 1;
        $errors = array();
        $result = false;

        if (isset($_POST['submit'])) {

            $name = trim($_POST['name']);
            $category = $_POST['category'];
            $code = $_POST['code'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $isNew = $_POST['isNew'];
            $isRecomend = $_POST['isRecomend'];
            $status = $_POST['status'];

            if (empty($name)) {
                $errors[] = "Заполните поле 'Название'!";
            }

            if (empty($code)) {
                $errors[] = "Заполните поле 'Код товара'!";
            }

            if (empty($price)) {
                $errors[] = "Заполните поле 'Цена'!";
            }

            if (empty($brand)) {
                $errors[] = "Заполните поле 'Брэнд'!";
            }

            if (empty($image)) {
                $errors[] = "Заполните поле 'Изображение'!";
            }

            if (empty($description)) {
                $errors[] = "Заполните поле 'Описание товара'!";
            }

            if (empty($errors)) {
               $result = Product::create($name, $category, $code, $price, $brand, $image, $description, $isNew, $isRecomend, $status);
            }
        }

        $errorsView = $this->view->fetchPartial('layouts/errors', array('errors'=>$errors));

        $this->view->render('admin/products/create', array('result' => $result, 
                                                           'category' => $category,
                                                           'code' => $code,
                                                           'price' => $price,
                                                           'brand' => $brand,
                                                           'image' => $image,
                                                           'description' => $description,
                                                           'isNew' => $isNew,
                                                           'isRecomend' => $isRecomend,
                                                           'status' => $status));

        return true;
    }
}