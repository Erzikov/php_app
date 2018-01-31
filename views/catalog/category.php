<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= $categories ?>
            </div>
            <div class="col-sm-9 padding-right">
                <?= $products ?>
                <?= $pagination->get(); ?>
            </div>
        </div>
    </div>
</section>