<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3 ">
<!--                 <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        <p>Данные сохранены!</p>
                    </div>
                <?php else: ?> -->
                    <h2>Создание товара</h2>
                    <!-- <?= $errors ?> -->
                    <form action="#" method="POST">
                      <div class="form-group">
                        <label for="name">Название товара</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Название товара">
                      </div>
                      <div class="form-group">
                        <label for="#">Категория</label>
                        <!-- Категория с выпадающим списком -->
                      </div>                       
                      <div class="form-group">
                        <label for="price">Цена товара</label>
                        <input type="text" name="#" class="form-control" id="price" placeholder="Цена товара">
                      </div>
                      <div class="form-group">
                        <label for="brand">Брэнд товара</label>
                        <input type="password" name="brand" class="form-control" id="brand" placeholder="Брэнд">                      
                      </div>
                      <div class="form-group">
                        <label for="image">Изображение товара</label>
                        <!-- Загрузка изображения -->
                      </div>
                      <div class="form-group">
                        <label for="description">Описание товара</label>
                        <textarea name="description" class="form-control" id="description">
                        </textarea>  
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="avability" id="avability">
                        <label for="avability">Наличие на складе</label>
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="isNew" id="isNew">
                        <label for="avability">Новый товар</label>
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="isRecommend" id="isRecommend">
                        <label for="isRecommend">Рекомендованный</label>
                      </div>
                      <button type="submit" name="submit" class="btn btn-warning">Сохранить</button>
                    </form>
<!--                 <?php endif;?> -->
            </div>
        </div>
    </div>
</section>    