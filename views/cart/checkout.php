<section id="form">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-sm-offset-3 ">
                    <h2>Оформление заказа</h2>
                    <?= $errors ?>
                    <form action="#" method="post" id="checkout">
                        <div class="form-group">
                             <label for="exampleInputEmail1">Ваше имя</label>
                             <input type="text" class="form-control" name="name" placeholder="Введите имя"
                                    value="<?= $name ?>">
                        </div>                        
                        <div class="form-group">
                             <label for="exampleInputEmail1">Ваш номер телефона</label>
                             <input type="tel" class="form-control" id="tel" name="number" placeholder="Номер телефона" 
                                    value="<?= $number ?>">
                        </div>
                         <div class="form-group">
                             <label for="exampleInputPassword1">Комметарий к заказу</label>
                             <textarea class="form-control" rows="3" placeholder="Комметарий..." name="comment" form="checkout"></textarea>
                         </div>
                         <div class="from-group">
                             <button type="submit" name="submit" class="btn btn-warning" form="checkout">Отправить</button>
                         </div>  
                    </form>     
			</div>
		</div>
	</div>
</section>

<!-- Вставить кол-во товаров и total price -->