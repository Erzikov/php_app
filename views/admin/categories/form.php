<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        <p>Категория сохранена!</p>
                    </div>
                <?php else: ?>
                    <h2><?= $title ?></h2>
                    <?= $errors ?>
                    <form action="#" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="name">Название категории</label>
                        <input type="text" name="name" class="form-control" id="name" placeholder="Название" value="<?= $name ?>">
                      </div>                     
                      <div class="form-group">
                        <label for="price">Позиция</label>
                        <input type="number" name="sort_order" class="form-control" id="sort_order" min="1" placeholder="Позиция" value="<?= $sort_order ?>">
                      </div>
                      <button type="submit" name="submit" class="btn btn-warning">Сохранить</button>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>    