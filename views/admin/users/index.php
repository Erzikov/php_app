<section>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Контактынй номер</th>
                    <th  class='text-center'>Удалить</th>
                </tr>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['name'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['number'] ?></td>
                        <td class='text-center'>
                            <a href="#" onclick="deleteUser(this); return false;" class="icon" data-id="<?= $user['id'] ?>" >
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <div class="text-center"><?= $pagination->get(); ?></div>
        </div>
    </div>
</section>