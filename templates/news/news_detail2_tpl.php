<div class="detail-content">
    <div class="wrap-content">
        <div class="row">
            <div class="col-12 col-sm-12 col-lg-9">
                <div class="title-main"><span><?= $rowDetail['name' . $lang] ?></span></div>
                <div class="time-main"><i class="fas fa-calendar-week"></i><span><?= ngaydang ?>: <?= date("d/m/Y h:i A", $rowDetail['date_created']) ?></span></div>
                <?php if (!empty($rowDetail['content' . $lang])) { ?>
                    <div class="cont-detail cms-content">
                        <div class="content-main w-clear" id="toc-content"><?= $func->decodeHtmlChars($rowDetail['content' . $lang]) ?></div>
                        <div class="share">
                            <b><?= chiase ?>:</b>
                            <div class="social-plugin w-clear">
                                <?php
                                $params = array();
                                $params['oaid'] = $optsetting['oaidzalo'];
                                echo $func->markdown('social/share', $params);
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning w-100" role="alert">
                        <strong><?= noidungdangcapnhat ?></strong>
                    </div>
                <?php } ?>
            </div>
            <div class="col-12 col-sm-12 col-lg-3">
                <div class="meta-toc">
                    <div class="box-readmore">
                        <ul class="toc-list" data-toc="article" data-toc-headings="h1, h2, h3"></ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>