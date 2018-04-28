<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-4">
                <?php foreach ($userOrders as $order): ?>
                    <p>Статус заказа №<?= $order['id'] ?>: <?= models\Order::getStatus($order['status']) ?></p>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>