<?php 
namespace controllers;

use components\BaseController;
use models\Order;

class OrdersController extends BaseController
{

    public function actionIndex()
    {
        $content = $this->getOrderIndexPartial();
        $this->view->renderPartial('layouts/main', array('content' => $content));

        return true;
    }

    public function actionEdit($id)
    {
        $order = Order::getOrderById($id);
        $userId = $_SESSION['user']['id'];
        $orderStatus = 3; // Order completed

        if ($order['user_id'] == $userId) {
            Order::updateOrderStatus($id, $orderStatus);
            echo $this->getOrderIndexPartial();
        } else {
            echo "Ошибка доступа!";
        }

        return true;
    }

    private function getOrderIndexPartial()
    {
        $userOrders = Order::getUsersOrders($_SESSION['user']['id']);
        return $this->view->fetchPartial('orders/index', array('userOrders' => $userOrders));
    }
}