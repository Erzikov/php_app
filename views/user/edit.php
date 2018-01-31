<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 ">
                <?php if ($result): ?>
                    <div class="alert alert-success" role="alert">
                        <p>Данные сохранены!</p>
                    </div>
                <?php else: ?>
                    <h2>Редактирование профиля</h2>
                    <?= $errors ?>
                    <form action="#" method="POST">
                      <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" name="name" value="<?= $user['name'] ?>" class="form-control" id="name" placeholder="Введите имя">
                      </div>
                      <div class="form-group">
                        <label for="name">Ваш номер телефона</label>
                        <input type="text" name="number" value="<?= $user['number'] ?>" class="form-control" id="name" placeholder="Введите номер">
                      </div>                       
                      <div class="form-group">
                        <label for="newPassword">Новый пароль</label>
                        <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="Введите новый пароль">
                      </div>
                      <div class="form-group">
                        <label for="confNewPassword">Повторите пароль</label>
                        <input type="password" name="confNewPassword" class="form-control" id="confNewPassword" placeholder="Повторите пароль">
                      </div>
                      <div class="form-group">
                        <label for="curPassword">Текущий пароль*</label>
                        <input type="password" name="curPassword" class="form-control" id="curPassword" placeholder="Введите пароль">
                        <span class="help-block">*Необходимо ввести пароль для изменения данных</span>
                      </div>
                      <button type="submit" name="submit" class="btn btn-warning">Сохранить</button>
                    </form>
                <?php endif;?>
            </div>
        </div>
    </div>
</section>