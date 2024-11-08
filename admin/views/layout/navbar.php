<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Website</a>
    </li>
  </ul>
  <?php require_once 'models/lienheModel.php' ?>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <?php require_once 'models/lienheModel.php';
    $lienHeModel = new lienHeModel();
    $allLienHe = $lienHeModel->trang_thai_lien_he();
    $soLienHe = $lienHeModel->trang_thai_lien_he()->fetchColumn();
    ?>
    <!-- Messages Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-comments"></i>
        <span class="badge badge-danger navbar-badge"><?php echo $soLienHe ?></span>
      </a>

      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <?php foreach ($allLienHe as $lienHe): ?>
          <a href="?act=lienHe" class="dropdown-item">
            <div class="media">
              <img src="https://icon-library.com/images/icon-user/icon-user-15.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?= htmlspecialchars($lienHe['Email']); ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm"><?= htmlspecialchars($lienHe['Noi_dung']); ?></p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>
                  <?= date("H") - date("H", strtotime($lienHe['Thoi_gian_gui_lien_he'])); ?>
                </p>
              </div>
            </div>
          </a>
        <?php endforeach; ?>
      </div>

    </li>
    <!-- Notifications Dropdown Menu -->

    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>

  </ul>
</nav>