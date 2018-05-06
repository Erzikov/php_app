<?php 
namespace controllers;

use components\AdminBaseController;
use models\{Order, Product};

class AdminOrdersController extends AdminBaseController
{
    public function actionIndex($status = null)
    {
        $status = trim($status, "status-"); 

        if ($status != null && $status <= 3) {        
            $orders = Order::getOrdersByStatus($status);
        } else {
            $orders = Order::getAllOrders();
        }

        $this->view->render('admin/orders/index', ['orders' => $orders]);

        return true;    
    }

    public function actionView($id)
    {
        $order = Order::getOrderById($id);
        $orderedProducts = json_decode($order['products'], true);
        $orderedProductsIds = array_keys($orderedProducts);
        $statuses = Order::STATUSES;

        $products = Product::getProductsByIds($orderedProductsIds);

        $this->view->render(
            'admin/orders/view',
            [
                'order' => $order, 
                'count' => $orderedProducts,
                'products' => $products,
                'statuses' => $statuses
            ]
        );
        
        return true;
    }

    public function actionEdit($id)
    {
        $status = $_POST['status'];
        Order::updateOrderStatus($id, $status);
        
        return true;
    }

    public function actionDelete($id)
    {
        Order::deleteOrder($id);
        return true;
    }
}