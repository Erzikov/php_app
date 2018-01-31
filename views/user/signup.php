<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        <p>Вы успешно зарегестрированы!</p>
                    </div>
                <?php else: ?>
                    <h2>Регистрация</h2>
                    <?= $errors ?>
                    <form action="#" method="post">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Имя</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="name" placeholder="Введите имя" value="<?= $name ?>">
                      </div>                        
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email Адрес</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Введите Email" value="<?= $email ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Пароль</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password"  placeholder="Введите пароль">
                      </div>
                      <button type="submit" name="submit" class="btn btn-warning">Отправить</button>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</section><!--/form-->