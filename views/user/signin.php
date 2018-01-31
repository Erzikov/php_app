<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <h2>Вход</h2>
                <?= $errors ?>
                <form action="#" method="post">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Адрес</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" placeholder="Email" value="<?= $email ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Пароль</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password"  placeholder="Пароль">
                  </div>
                  <button type="submit" name="submit" class="btn btn-warning">Войти</button>
                </form>
            </div>
        </div>
    </div>
</section><!--/form-->
