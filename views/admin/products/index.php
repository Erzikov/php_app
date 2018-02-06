<section>
    <div class="container">
        <div class="row">
            <?php foreach ($products as $product): ?>
                <div>
                    <?= $product['name'] ?>
                </div>
            <?php endforeach ?>
            <hr>
            <div class="text-center"><?= $pagination->get(); ?></div>
        </div>
    </div>
</section>