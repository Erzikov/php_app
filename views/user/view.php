<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <p><?= $user['name'] ?></p>
                <p><?= $user['email'] ?></p>
                <p><?= $user['number']?></p>
                <?php foreach ($orders as $order): ?>
                    <p>Статус заказа номер <?= $order['id'] ?>: <?= models\Order::getStatus($order['status']) ?></p>
                <?php endforeach; ?>
                <a href="/profile/edit">Редактировать данные</a>
            </div>
        </div>
    </div>
</section>