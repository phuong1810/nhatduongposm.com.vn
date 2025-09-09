<div class="menu">
  <ul class="menu-main">
    <li><a class="<?php if ($com == '' || $com == 'index') echo 'active'; ?> transition" href="" title="Trang chủ">Trang chủ</a></li>
    <li>
      <a class="<?php if ($com == 'gioi-thieu') echo 'active'; ?> transition has-child" href="gioi-thieu" title="Về chúng tôi">Về chúng tôi</a>

    </li>
    <?php if (count($splistmenu)) { ?>
      <?php foreach($splistmenu as $v) { ?>
        <?php  $spcat = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_cat where id_list = ? and find_in_set('hienthi',status) order by numb,id desc", array($v['id'])); ?>
        <li>
          <a href="<?= $v[$sluglang] ?>"><?= $v['name' . $lang] ?><?php if (!empty($spcat)) { ?>
            <i class="fa-solid fa-chevron-down"></i> <?php } ?></a>

          <?php if (!empty($spcat)) { ?>
            <ul>
              <?php foreach ($spcat as $kcat => $vcat) {
                $spitem = $d->rawQuery("select name$lang, slugvi, slugen, id from #_product_item where id_cat = ? and find_in_set('hienthi',status) order by numb,id desc", array($vcat['id'])); ?>
                <li>
                  <a class="has-child transition" title="<?= $vcat['name' . $lang] ?>" href="<?= $vcat[$sluglang] ?>"><?= $vcat['name' . $lang] ?></a>
                </li>
              <?php } ?>
            </ul>
            <?php } ?>
        </li>
      <?php } ?>
    <?php } ?>

    <li><a class="<?php if ($com == 'ho-so-nang-luc') echo 'active'; ?> transition" href="ho-so-nang-luc" title="Hồ sơ năng lực">Hồ sơ năng lực</a></li>
    <li><a class="<?php if ($com == 'tin-tuc') echo 'active'; ?> transition" href="tin-tuc" title="Tin tức">Tin tức</a></li>
    <li><a class="<?php if ($com == 'lien-he') echo 'active'; ?> transition" href="lien-he" title="Liên hệ">Liên hệ</a></li>

  </ul>
</div>