<?php 
namespace controllers;

use models\{Cart, Product, User, Order};
use components\BaseController;

Class CartController extends BaseController
{
    public function actionIndex() 
    {
        $content = $this->getPartialCart();
        $this->view->renderPartial('layouts/main', ['content' => $content]);
        
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
        
        return true;
    }

    public function actionCheckout()
    {
        $errors = array();
        $comment = '';

        $name = !User::isGuest() ? $_SESSION['user']['name'] : "";
        $number = !User::isGuest() ? $_SESSION['user']['number'] : "";
        $user_id = !User::isGuest() ? $_SESSION['user']['id'] : null;

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

            $errorsView = $this->view->fetchPartial('layouts/errors', ['errors' => $errors]);
            $this->view->render('cart/checkout',  
                [
                    'errors' => $errorsView,
                    'name' => $name,
                    'number' => $number
                ]
            );
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

            return $this->view->fetchPartial('cart/index',
                [
                    'orderedProducts' => $orderedProducts,
                    'totalPrice' => $totalPrice
                ]
            );
        }
    }
}
