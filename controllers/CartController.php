<?php 
namespace controllers;

use models\Cart;
use models\Product;
use models\User;
use models\Order;
use components\View;

    
Class CartController
{
    private $view;

    public function __construct()
    {
        $this->view = new View;
    }

    public function actionIndex() 
    {
        $content = $this->getPartialCart();
        $this->view->renderPartial('layouts/main', array('content' => $content));
        
    	return true;
    }

    public function actionAddProduct($id)
    {  
        echo Cart::addItem($id);
        
        return true;
    }

    public function actionDeleteProduct($id)
    {   
        Cart::deleteItem($id);
        echo $this->getPartialCart();
        
        return true;
    }

    public function actionCheckout()
    {
        if (!empty($_SESSION['order'])) {
            //Корзина не пуста
            $errors = array();

            if (isset($_POST['submit'])) {
                $name = trim($_POST['name']);
                $number = trim($_POST['number']);
                $comment = trim($_POST['comment']);
                $order = $_SESSION['order'];

                if (empty($name)) {
                    $errors[] = "Введите имя";
                }

                if (empty($number)) {
                    $errors[] = "Введите номер телефона";
                }

                if (empty($errors)) {
                    if (Order::createOrder($name, $number, $comment, $order)) {   
                        unset($_SESSION['order']);
                        $this->view->render('cart/success');
                        exit;
                    } else {
                        echo "<br> Ошибка";
                    }
                }
            } 

            $errorsView = $this->view->fetchPartial('layouts/errors', array('errors' => $errors));
            $this->view->render('cart/checkout', array('errors' => $errorsView));
            
        } else {
            //Корзина пуста
            header('Location: /');
        }

        return true;
    }

    private function getPartialCart()
    {   
        if (empty($_SESSION['order'])) {
            return $this->view->fetchPartial('cart/emptyCart');
        } else {
            $orderProductsIds = array_keys($_SESSION['order']);
            $orderedProducts = Product::getProductsByIds($orderProductsIds);
            $totalPrice = Cart::totalPrice($orderedProducts);

            return $this->view->fetchPartial('cart/index', array('orderedProducts' => $orderedProducts, 'totalPrice' => $totalPrice));
        }
    }
}
