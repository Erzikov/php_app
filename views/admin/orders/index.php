<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <div class="panel-group category-products">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#"><span style="color: red;">Новые заказы</span></a>
                                </h4>
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#">Ожидают отправку</a>
                                </h4>
                            </div>
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a href="#">Отправлены</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-9" >
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Дата заказа</th>
                        <th>Имя заказчика</th>
                        <th>Статус заказа</th>
                        <th></th>
                    </tr>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['date'] ?></td>
                        <td><?= $order['user_name'] ?></td>
                        <td><?= models\Order::getStatus($order['status']) ?></td>
                        <td class='text-center'>
                            <a href="/admin/orders/view/<?= $order['id'] ?>" class="icon">
                                <i class="fa fa-eye fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </table> 
            </div>
        </div>
    </div>
</section>