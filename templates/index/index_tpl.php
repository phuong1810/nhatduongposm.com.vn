<div class="bvslide">
    <div class="wrap-content">
        <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
                <h2 class="ttl-bvslide"><?=$bvslide['name'.$lang]?></h2>
                <a href="https://zalo.me/<?= $func->parsePhone($optsetting['zalo']) ?>" target="_self" class="btn-bvslide">
                    <span>Liên hệ qua Zalo</span>
                    <i class="fa-solid fa-phone"></i>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-md-8">
                <div class="desc-bvslide">
                    <?= $func->decodeHtmlChars($bvslide['content' . $lang]) ?>
                </div>
            </div>
        </div>
        <div class="bvslide-list">
            <div class="row">
                <?php foreach($rs_slide as $v) {?>
                    <div class="col-12 col-sm-6 col-md-3">
                        <div class="bvslide-item">
                            <h4 class="ttl"><?=$v['name' . $lang]?></h4>
                            <p class="txt"><?=$v['desc' . $lang]?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php if (count($partner)) { ?>
    <div class="wrap-partner">
        <div class="wrap-content">
            <div class="title-global">
                <h2 class="ttl2">Tại sao chọn chúng tôi?</h2>
                <p class="desc">Tại sao những nhãn hàng nổi tiếng tại Việt Nam lại chọn Nhật Dương</p>
            </div>
                <div class="owl-carousel partner-carousel"
                     data-items="screen:0|items:1,screen:576|items:1,screen:768|items:1,screen:992|items:1,screen:1200|items:1"
                     data-nav="1"
                     data-dots="0"
                     data-loop="1"
                     data-autoplay="1"
                     data-autoplaytimeout="3000"
                     data-smartspeed="800"
                     data-mousedrag="1"
                     data-touchdrag="1">
                    <?php
                    $totalPartners = count($partner);
                    $partnersPerRow = 6; // Số partner mỗi hàng
                    $currentIndex = 0;

                    foreach ($partner as $index => $v) {
                        // Bắt đầu hàng mới
                        if ($currentIndex % $partnersPerRow == 0) {
                            if ($currentIndex > 0) {
                                echo '</div>'; // Đóng hàng trước đó
                            }
                            echo '<div class="item partner-row">';
                        }

                        // Hiển thị partner
                        echo '<div class="partner-item">';
                        echo '<a class="partner" href="' . $v['link'] . '" target="_blank" title="' . $v['name' . $lang] . '">';
                        echo $func->getImage(['class' => 'lazy w-100', 'sizes' => '218x122x2', 'upload' => UPLOAD_PHOTO_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]);
                        echo '</a>';
                        echo '</div>';

                        $currentIndex++;
                    }

                    // Đóng hàng cuối cùng
                    if ($currentIndex > 0) {
                        echo '</div>';
                    }
                    ?>
                </div>
        </div>
    </div>
<?php } ?>
<?php if(count($spcatnb)){ ?>
    <div class="wrap-splist">
        <div class="wrap-content">
            <div class="title-global title-global--center">
                <h2 class="ttl">Danh mục sản phẩm</h2>
            </div>
            <div class="dm-product">
                <div class="row">
                    <?php foreach ($spcatnb as $k => $v) {
                    $spcat = $cache->get("select name$lang, slugvi, slugen, id, photo from #_product where type = ? and find_in_set('hienthi',status) and find_in_set('noibat',status) and id_cat = ? order by numb,id desc", array('san-pham',$v['id']), 'result', 7200);
                    ?>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 dm-product-it--v2">
                            <a class="dm-product-it" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                                <p class="dm-product-pic scale-img">
                                 <?= $func->getImage(['sizes' => '285x260x1', 'isWatermark' => false, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                                </p>
                                <h3 class="dm-product-name"><?= $v['name' . $lang] ?></h3>
                                <p class="dm-product-count"><?=count($spcat)?> sản phẩm</p>
                                <p class="dm-product-desc"><?= $v['desc' . $lang] ?></p>
                                <p class="btn_cat">Đọc thêm</p>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php if(count($splist)){ ?>
    <div class="wrap-splist">
        <div class="wrap-content">
            <div class="title-global title-global--center">
                <div class="ttl2">Sản phẩm cỦA CHÚNG TÔi</div>
            </div>
            <?php foreach($splist as $v1) {
                $spnb = $cache->get("select name$lang, slugvi, slugen, id,photo from #_product where type = ? and id_list = ? and find_in_set('hienthi',status) and find_in_set('noibat',status) order by numb,id desc", array('san-pham',$v1['id']), 'result', 7200);
            ?>
                <div class="box-splist">
                    <div class="box-ttl-splist">
                        <h2 class="ttl-splist"><span><?= $v1['name' . $lang] ?></span></h2>
                        <a class="link-splist" href="<?= $v1[$sluglang] ?>">Xem tất cả</a>
                    </div>
                    <?php if(count($spnb)){ ?>
                        <div class="row">
                            <?php foreach ($spnb as $k => $v) { ?>
                                <div class="col-6 col-sm-6 col-md-3">
                                    <div class="box-product">
                                        <div class="product">
                                            <div class="text-decoration-none">
                                                <p class="pic-product scale-img">
                                                    <a class="scale-img" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                                                        <?= $func->getImage(['sizes' => '261x229x1', 'isWatermark' => false, 'prefix' => 'product', 'upload' => UPLOAD_PRODUCT_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                                                    </a>
                                                </p>
                                                <h3 class="name-product text-split">
                                                    <a href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?> "><?= $v['name' . $lang] ?> </a>
                                                </h3>
                                                <a class="baogia-product" href="tel:<?= $func->parsePhone($optsetting['hotline']) ?>"><span>Báo giá:</span><b><?=$optsetting['hotline']?></b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
<?php } ?>
<?php if(count($quytrinh)){ ?>
    <div class="wrap-quytrinh">
        <div class="wrap-content">
            <div class="title-global title-global--center">
                <h2 class="ttl">Quy trình sản xuất</h2>
            </div>
            <div class="lst-quytrinh">
                <?php foreach($quytrinh as $k=>$v) {?>
                    <a class="quytrinh-it" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                        <p class="quytrinh-pic">
                            <?= $func->getImage(['class' => '', 'sizes' => '340x240x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                        </p>
                        <div class="icon-box-text">
                            <div class="icon_img">
                                <img width="48" height="48" src="assets/images/icon<?=$k+1?>.png" alt="">
                            </div>
                            <h3 class="ttl-quytrinh"><?=$v['name' . $lang]?></h3>
                        </div>

                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(count($chatluong)){ ?>
    <div class="wrap-chatluong">
        <div class="wrap-content">
            <div class="title-global title-global--center">
                <h2 class="ttl">Kiểm soát chất lượng</h2>
            </div>
            <div class="lst-chatluong row">
                <?php foreach($chatluong as $k=>$v) {?>
                    <div class="chatluong-it col-6 col-sm-6 col-md-3" >
                        <p class="chatluong-pic scale-img">
                            <?= $func->getImage(['class' => '', 'sizes' => '375x375x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                        </p>
                        <div class="icon-box-text">
                            <div class="icon_img">
                                <img width="70" height="70" src="assets/images/num_<?=$k+1?>.png" alt="">
                            </div>
                            <h3 class="ttl-chatluong"><?=$v['name' . $lang]?></h3>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(count($nhamay)){ ?>
    <div class="wrap-nhamay">
        <div class="ux-shape-divider ux-shape-divider--bottom ux-shape-divider--style-curve">
            <svg viewBox="0 0 1000 100" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
                <path class="ux-shape-fill" d="M0 0C0 0 200 50 500 50C800 50 1000 0 1000 0V101H0V1V0Z"></path>
            </svg>
        </div>
        <div class="wrap-content">
            <div class="title-global title-global--center title-global--white">
                <h2 class="ttl">nhà máy của chúng tôi</h2>
            </div>
            <div class="lst-nhamay row">
                <?php foreach($nhamay as $k=>$v) {?>
                    <a class="nhamay-it col-12 col-sm-4 col-md-4" href="<?= $v[$sluglang] ?>" title="<?= $v['name' . $lang] ?>">
                        <p class="nhamay-pic scale-img">
                            <?= $func->getImage(['class' => '', 'sizes' => '410x325x1', 'upload' => UPLOAD_NEWS_L, 'image' => $v['photo'], 'alt' => $v['name' . $lang]]) ?>
                        </p>
                        <div class="info-nhamay">
                            <h3 class="ttl-nhamay"><?=$v['name' . $lang]?></h3>
                            <p class="xt">Xem thêm</p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>
