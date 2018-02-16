<section>
    <div class="container">
        <div class="row">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Категория</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php foreach ($categories as $category): ?>
                    <tr>
                        <td><?= $category['id'] ?></td>
                        <td><?= $category['name'] ?></td>
                        <td  class='text-center'>
                            <a href="/admin/categories/edit/<?= $category['id'] ?>" class="icon">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td  class='text-center'>
                            <a onclick="deleteCategory(this); return false;" href="#" class="icon" data-id="<?= $category['id'] ?>" >
                                <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>