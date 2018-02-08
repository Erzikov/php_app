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

        $products = Product::getAllProducts($page, $limit);
        $pagination = new Pagination($total, $page, $limit, 'page-');
        
        $this->view->render('admin/products/index', array('products' => $products, 'pagination' => $pagination));
        
        return true;
    }

    public function actionCreate()
    {

        $name = '';
        $category = '';
        $price = '';
        $brand = '';
        $description = '';
        $image = '';
        $avability = 0;
        $isNew = 1;
        $isRecomend = 0;
        $errors = array();
        $result = false;

        if (isset($_POST['submit'])) {

            $name = trim($_POST['name']);
            $category = $_POST['category'];
            $price = $_POST['price'];
            $avability = $_POST['avability'];
            $brand = $_POST['brand'];
            $image = $_POST['image'];
            $description = $_POST['description'];
            $isNew = $_POST['isNew'];
            $isRecomend = $_POST['isRecomend'];

            if (empty($name)) {
                $errors[] = "Заполните поле 'Название'!";
            }


            if (empty($price)) {
                $errors[] = "Заполните поле 'Цена'!";
            }

            if (empty($avability)) {
                $errors[] = "Укажите наличие товара на складе!";
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
                                                           'price' => $price,
                                                           'avability' => $avability,
                                                           'brand' => $brand,
                                                           'image' => $image,
                                                           'description' => $description,
                                                           'isNew' => $isNew,
                                                           'isRecomend' => $isRecomend));

        return true;
    }
}