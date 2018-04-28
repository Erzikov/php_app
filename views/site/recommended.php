<div class="recommended_items"><!--recommended_items-->
    <h2 class="title text-center">Рекомендуемые товары</h2>
    <div class="cycle-slideshow"
     data-cycle-fx=carousel
     data-cycle-timeout=5000
     data-cycle-carousel-visible=3
     data-cycle-carousel-fluid=true
     data-cycle-slides="div.item"
     data-cycle-prev="#prev"
     data-cycle-next="#next">
    
    <?php foreach ($recommended as $product): ?>
        <div class="item">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <a href="/products/<?= $product['id'] ?>">
                            <div class="product-img-rec"
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

        <a class="left recommended-item-control" href="#recommended-item-carousel" id="prev" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" id="next" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>            
    </div>
</div><!--/recommended_items-->