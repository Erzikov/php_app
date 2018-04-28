<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Каталог товаров</h2>
    <?php foreach ($products as $product): ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="/products/<?= $product['id'] ?>">   
                            <div class="product-img"
                                 style="background-image: url('<?= models\Product::getImgUrl($product['id']) ?>'); ">
                            </div>
                        </a>
                        <h2><?= $product['price'] ?> $</h2>
                        <p><?= $product['name'] ?></p>
                        <a href="#" id="inCart" class="btn btn-default add-to-cart" data-id="<?= $product['id'] ?>">
                            <i class="fa fa-shopping-cart"></i>В корзину
                        </a>
                    </div>
                    <?php if ($product['is_new']): ?>
                        <img src="/template/images/home/new.png" class="new" alt="" />
                    <?php endif; ?>
                </div>
            </div>
        </div>                            
    <?php endforeach; ?>    
</div><!--features_items-->

