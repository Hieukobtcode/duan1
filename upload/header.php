<head>
  <marquee behavior="" direction=""> The OutFit Hub</marquee>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="author" content="flexkit">

  <?php $banner = $this->trangChuModel->banner(5)->fetch();
  if ($banner['trang_thai'] == 'Active') { ?>
    <link rel="shortcut icon" href="./assets/img/<?= $banner['Duong_dan_anh'] ?>" type="image/x-icon">
  <?php } ?>
  <link rel="preconnect" href="https://fonts.gstatic.com/">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Allura&amp;display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  <link rel="stylesheet" href="uomo-html.flexkitux.com\Demo4\css\plugins\swiper.min.css" type="text/css">
  <link rel="stylesheet" href="uomo-html.flexkitux.com\Demo4\css\style.css" type="text/css">



  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

  <!-- Document Title -->
  <title>The Oufit Hub</title>

</head>

