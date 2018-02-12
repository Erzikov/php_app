<section >
    <div class="container">
        <div class="row">
            <div>
                <?php if (empty($_SESSION['order'])): ?>
                    <h2>Корзина пуста!</h2>
                <?php else: ?>
                    <table class="table table-bordered">
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Наименование товара</th>
                                <th>Цена(за 1 шт.)</th>
                                <th>Кол-во, шт.</th>
                                <th>Удалить</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  foreach ($orderedProducts as $product): ?>
                                <tr class="item">
                                    <td class="id" ><?= $product['id'] ?></td>
                                    <td class="name"><?= $product['name'] ?></td>
                                    <td class="price"><?= $product['price'] ?>$</td>
                                    <td class="count"><?= $_SESSION['order'][$product['id']] ?></td>
                                    <td>
                                        <a href="#" onclick="deleteCartProduct(this); return false;" class="deleteItem" data-id="<?= $product['id'] ?>" >
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>    
                    <h3>Итоговая сумма: <?= $totalPrice ?>$</h3>
                    <a href="cart/checkout">Оформить заказ</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>