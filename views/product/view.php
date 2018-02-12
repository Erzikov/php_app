<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <?= $categories ?>
            </div>
            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="<?= models\Product::getImgUrl($product['id']) ?>" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <?php if ($product['is_new']): ?>
                                    <img src="/template/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif;?>
                                <h2><?= $product['name'] ?></h2>
                                <span>
                                    <span>US $<?= $product['price'] ?></span>
                                    <br>
                                    <a href="#" id="inCart" class="btn btn-default add-to-cart" data-id="<?= $product['id'] ?>">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                <p><b>Производитель:</b> <?= $product['brand'] ?></p>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">                                
                         <div class="col-sm-12">
                            <h5>Описание товара</h5>
                            <p><?= $product['description'] ?></p>
                        </div>
                    </div>
                </div><!--/product-details-->
            </div>
        </div>
    </div>
</section>
