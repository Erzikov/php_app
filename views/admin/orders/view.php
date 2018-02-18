<section>
    <div class="container">
        <div class="row">
            <table cellpadding='5'>
                <tr>
                    <th width="150">Номер заказа:</th>
                    <td><?= $order['id'] ?></td>
                </tr>
                <tr>
                    <th width="150">Заказчик:</th>
                    <td><?= $order['user_name'] ?></td>
                </tr>
                <tr>
                    <th width="150">Номер телефона:</th>
                    <td><?= $order['user_number'] ?></td>
                </tr>
                <tr>
                    <th>Дата заказа:</th>
                    <td><?= $order['date'] ?></td>
                </tr>
                <tr>
                    <th>Статус заказа:</th>
                    <td> 
                        <select name="status" id="status" data-id="<?= $order['id'] ?>">
                            <?php foreach ($statuses as $key => $val): ?>
                                <option value="<?= $key ?>" <?php if ($key == $order['status']): ?> selected <?php endif ?>>
                                    <?= $val ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th valign="top">Комментарий:</th>
                    <td><?= $order['comment'] ?></td>
                </tr>
            </table>
                <hr size="4">
            <table class="table table-bordered table-condensed">
                <thead>
                    <tr> 
                        <th>ID</th>
                        <th>Наименование товара</th>
                        <th>Цена(за 1 шт.)</th>
                        <th>Кол-во, шт.</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  foreach ($products as $product): ?>
                        <tr class="item">
                            <td class="id" ><?= $product['id'] ?></td>
                            <td class="name"><?= $product['name'] ?></td>
                            <td class="price"><?= $product['price'] ?>$</td>
                            <td class="count">test</td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>