<section>
    <div class="container">
        <div class="row">
            
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Наименование</th>
                    <th></th> 
                    <th></th> 
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td  class='text-center'>
                            <a href="/admin/products/edit/<?= $product['id'] ?>" class="icon">
                                <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td  class='text-center'>
                            <a onclick="deleteProduct(this); return false;" href="#" class="icon" data-id="<?= $product['id'] ?>" >
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