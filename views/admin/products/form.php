<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 col-sm-offset-3 ">
                <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        <p>Товар сохранён!</p>
                    </div>
                <?php else: ?>
                    <h2><?= $title ?></h2>
                    <?= $errors ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Название товара</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Название товара" value="<?= $name ?>">
                      </div>
                      <div class="form-group">
                        <label for="#">Категория</label>
                        <select class="form-control" name='category'>
                          <?php foreach ($categoryList as $category): ?>
                            <option value="<?= $category['id'] ?>" 
                                    name='category' 
                                    <?php if ($productCategory == $category['id']): ?> selected <?php endif; ?>>
                              <?= $category['name'] ?>
                            </option>
                          <?php endforeach; ?>
                        </select>
                      </div>                       
                      <div class="form-group">
                        <label for="price">Цена товара</label>
                        <input type="text" name="price" class="form-control" id="price" placeholder="Цена товара" value="<?= $price ?>">
                      </div>
                      <div class="form-group">
                        <label for="brand">Брэнд товара</label>
                        <input type="text" name="brand" class="form-control" id="brand" placeholder="Брэнд" value="<?= $brand ?>">      
                      </div>
                      <div class="form-group">
                        <label for="img">Изображение товара</label>
                        <input type="file" accept="image/*" name="image" id='image' class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="description">Описание товара</label>
                        <textarea name="description" class="form-control" id="description" placeholder="Описание"><?= $description ?></textarea>  
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="avability" id="avability" <?php if ($avability): ?> checked <?php endif ?>>
                        <label for="avability">Наличие на складе</label>
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="isNew" id="isNew" <?php if ($isNew) : ?> checked <?php endif ?>>
                        <label for="isNew">Новый товар</label>
                      </div>
                      <div class="form-group">
                        <input type="checkbox" name="isRecommended" id="isRecommended" <?php if ($isRecommended): ?> checked <?php endif ?>> 
                        <label for="isRecommended">Рекомендованный</label>
                      </div>
                      <button type="submit" name="submit" class="btn btn-warning">Сохранить</button>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>    