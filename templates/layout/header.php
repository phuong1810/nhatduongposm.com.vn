<div class="header <?php if ($source != 'index') { echo 'header-product';} ?>">
  <div class="header-top">
    <div class="wrap-content">
      <div class="d-flex">
        <div class="header-top-all">
          <div class="header-top-txt header-top-txt01"><i aria-hidden="true" class="fas fa-cogs"></i><?= $optsetting['slogan'] ?></div>
          <div class="header-top-txt header-top-txt02"><i aria-hidden="true" class="fas fa-envelope"></i><?= $optsetting['email'] ?></div>
          <div class="header-top-txt header-top-txt03"><i aria-hidden="true" class="fas fa-map-marker-alt"></i><?= $optsetting['slogan2'] ?></div>
        </div>
        <div class="box-search">
          <div class="search w-clear">
            <input type="text" id="keyword" placeholder="Nhập từ khoá tìm kiếm" onkeypress="doEnter(event,'keyword');" />
            <p onclick="onSearch('keyword');"></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php /*
  <div class="header-midd">
    <div class="wrap-content">
      <div class="d-flex">
        <div class="cont-left">
          <a class="logo-header" href="">
            <?= $func->getImage(['sizes' => '', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name' . $lang]]) ?>
          </a>
        </div>
        <div class="cont-midd">

        </div>
        <ul class="cont-right">
          <li class="hotline">
            <p>Hotline hỗ trợ</p>
            <b><?= $optsetting['hotline'] ?></b>
          </li>
        </ul>
      </div>
    </div>
  </div> */?>
  <div class="header-bottom">
    <div class="wrap-content">
      <div class="d-flex">
        <a class="logo-header" href="">
          <?= $func->getImage(['sizes' => '', 'upload' => UPLOAD_PHOTO_L, 'image' => $logo['photo'], 'alt' => $setting['name' . $lang]]) ?>
        </a>
        <?php include TEMPLATE . LAYOUT . "menu.php"; ?>
      </div>
    </div>
  </div>
  <?php include TEMPLATE . LAYOUT . "mmenu.php"; ?>
</div>