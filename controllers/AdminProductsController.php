<?php 
namespace controllers;

use components\Pagination;
use components\AdminBaseController;
use models\{Product, Category};

Class AdminProductsController extends AdminBaseController
{
    public function actionIndex($page = 1)
    {
        $limit = 5;
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
        $avability = false;
        $isNew = false;
        $isRecommended = false;
        $errors = array();
        $result = false;

        if (isset($_POST['submit'])) {        
            $name = trim($_POST['name']);
            $category = $_POST['category'];
            $price = $_POST['price'];
            $brand = $_POST['brand'];
            $description = $_POST['description'];
            $avability = isset($_POST['avability']);
            $isNew = isset($_POST['isNew']);
            $isRecommended = isset($_POST['isRecommended']);

            if (empty($name)) {
                $errors[] = "Заполните поле 'Название'!";
            }

            if (empty($price)) {
                $errors[] = "Заполните поле 'Цена'!";
            }

            if (empty($brand)) {
                $errors[] = "Заполните поле 'Брэнд'!";
            }

            if (empty($description)) {
                $errors[] = "Заполните поле 'Описание товара'!";
            }

            if (empty($errors)) {
               $id = Product::create($name, $category, $price, $avability, $brand, $description, $isNew, $isRecommended);

               $result = $id;

               $file_tmp = $_FILES['image']['tmp_name'];
               if (is_uploaded_file($file_tmp)) {
                    move_uploaded_file($file_tmp, './template/images/products/'.$id.".jpg");
               }

            }
        }

        $categoryList = Category::getAllCategory();
        $errorsView = $this->view->fetchPartial('layouts/errors', array('errors'=>$errors));

        $this->view->render('admin/products/create', array('result' => $result,
                                                           'errors' => $errorsView,
                                                           'name' => $name,
                                                           'category' => $category,
                                                           'price' => $price,
                                                           'avability' => $avability,
                                                           'brand' => $brand,
                                                           'description' => $description,
                                                           'isNew' => $isNew,
                                                           'isRecommended' => $isRecommended,
                                                           'categoryList' => $categoryList));
        return true;
    }

    public function actionDelete($id)
    {
      echo 'Hello, from delete product action!';

      return true;
    }

    public function actionEdit()
    {
      echo "Hello from edit product action!";
      return true;
    }
}