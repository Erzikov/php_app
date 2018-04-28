<section> 
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-3">
                <?php foreach ($userOrders as $order): ?>
                    <div>
                        <p>
                            Статус заказа <b>№<?= $order['id'] ?></b>: <i><?= models\Order::getStatus($order['status']) ?></i>
                        </p>
                        <a onclick="confirmOrder(this); return false;"
                           href="#"
                           disabled = "disabled"
                           class="btn btn-default confirm-btn"
                           data-id="<?= $order['id'] ?>"
                           data-status="<?= $order['status'] ?>">
                            Подтвердить получение
                        </a>
                        <hr>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>