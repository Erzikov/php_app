<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >
                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Дата заказа</th>
                        <th>Имя заказчика</th>
                        <th>Статус заказа</th>
                        <th></th>
                        <th></th>
                    </tr>
                    <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= $order['id'] ?></td>
                        <td><?= $order['date'] ?></td>
                        <td><?= $order['user_name'] ?></td>
                        <td><?= models\Order::getStatus($order['status']) ?></td>
                        <td  class='text-center'>
                            <a onclick="deleteOrder(this); return false;" href="#" class="icon" data-id="<?= $order['id'] ?>" >
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>                        
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