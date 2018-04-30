<?php 
namespace controllers;

use models\{Cart, Product, User, Order};
use components\BaseController;

Class CartController extends BaseController
{
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
        
        // echo $this->getPartialCart();
        
        return true;
    }

    public function actionCheckout()
    {
        $errors = array();
        $comment = '';
        $user_id = null;

        if (User::isGuest()) {
            $name = '';
            $number = '';
        } else {
            $name = $_SESSION['user']['name'];
            $number = $_SESSION['user']['number'];
            $user_id = $_SESSION['user']['id'];
        }

        if (!Cart::isEmptyCart()) {
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
                    if (Order::createOrder($name, $number, $comment, $order, $user_id)) {   
                        unset($_SESSION['order']);
                        $this->view->render('cart/success');
                        exit;
                    } else {
                        echo "<br> Ошибка";
                    }
                }
            }

        $errorsView = $this->view->fetchPartial('layouts/errors', array('errors' => $errors));
        $this->view->render('cart/checkout', array('errors' => $errorsView, 'name' => $name, 'number' => $number));
            
        } else {
            header('Location: /');
        }

        return true;
    }

    private function getPartialCart()
    {   
        if (Cart::isEmptyCart()) {
            return $this->view->fetchPartial('cart/emptyCart');
        } else {
            $orderProductsIds = array_keys($_SESSION['order']);
            $orderedProducts = Product::getProductsByIds($orderProductsIds);
            $totalPrice = Cart::totalPrice($orderedProducts);

            return $this->view->fetchPartial('cart/index', array('orderedProducts' => $orderedProducts, 'totalPrice' => $totalPrice));
        }
    }
}
