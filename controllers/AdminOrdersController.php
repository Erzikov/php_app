<?php 
namespace controllers;

use components\AdminBaseController;
use models\{Order, Product};

class AdminOrdersController extends AdminBaseController
{
    public function actionIndex()
    {
        $content = $this->getOrdersIndexPartial();
        $this->view->renderPartial('admin/main', array('content' => $content));
        return true;
    }

    public function actionView($id)
    {
        $order = Order::getOrderById($id);
        $orderedProducts = json_decode($order['products'], true);
        $orderedProductsIds = array_keys($orderedProducts);
        $statuses = Order::STATUSES;

        $products = Product::getProductsByIds($orderedProductsIds);
        $itog = 0;

/*            foreach ($products as $product) {
                $count = $orderedProducts[$product['id']];
                $total = $product['price']*$count;
                $itog += $total;

                echo $product['name']." - ".$count." Total: ".$total."$"."<br>";
            }        */    


        $this->view->render('admin/orders/view', array('order' => $order, 'products' => $products, 'statuses' => $statuses));
        return true;
    }

    public function actionEdit($id)
    {
        $status = $_POST['status'];
        Order::updateOrderStatus($id, $status);
        
        return true;
    }

    private function getOrdersIndexPartial()
    {
        $orders = Order::getAllOrders();
        return $this->view->fetchPartial('admin/orders/index', array('orders' => $orders));
    }
}