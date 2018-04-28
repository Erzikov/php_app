<div class="left-sidebar">
        <h2>Категории</h2>
        <div class="panel-group category-products">
        <?php foreach ($categories as $category):  ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a href="/category/<?= $category['id'] ?>" 

                            <?php if (isset($categoryId) AND $categoryId == $category['id']): ?> 
                                class="active" 
                            <?php endif; ?>>
                            <?= $category['name'] ?>
                        </a>
                    </h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
 </div>