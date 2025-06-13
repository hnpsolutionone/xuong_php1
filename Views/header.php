<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themezhub.net/kumo-demo-2/kumo/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 16 Jan 2024 02:58:16 GMT -->

<head>
  <base href="/">
  <meta charset="utf-8" />
  <meta name="author" content="Themezhub" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Kumo- Fashion eCommerce HTML Template</title>
  <!-- Custom CSS -->
  <link href="<?=$baseUrl?>/Views/assets/css/styles.css" rel="stylesheet">

</head>

<body>
  
<div class="preloader"></div>
<div id="main-wrapper">
  <div class="header header-light dark-text">
    <div class="container">
      <nav id="navigation" class="navigation navigation-landscape">
        <div class="nav-header">
          <a class="nav-brand" href="<?=$baseUrl?>">
            <img src="<?=$baseUrl?>/Views/assets/img/logo.png" class="logo" alt="" />
          </a>
          <div class="nav-toggle"></div>
          <div class="mobile_nav">
            <ul>
              <li>
                <a href="#" onclick="openSearch()">
                  <i class="lni lni-search-alt"></i>
                </a>
              </li>
              <li>
                <a href="#" data-toggle="modal" data-target="#login">
                  <i class="lni lni-user"></i>
                </a>
              </li>
              <li>
                <a href="#" onclick="openWishlist()">
                  <i class="lni lni-heart"></i><span class="dn-counter">2</span>
                </a>
              </li>
              <li>
                <a href="#" onclick="openCart()">
                  <i class="lni lni-shopping-basket"></i><span class="dn-counter">0</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="nav-menus-wrapper" style="transition-property: none;">
          <ul class="nav-menu">

            <li><a href="<?=$baseUrl?>">Home</a>
            </li>

            <li><a href="#">About</a>
            </li>

            <li><a href="<?=$baseUrl?>index.php?page=product">Product</a>
            </li>
          </ul>

          <ul class="nav-menu nav-menu-social align-to-right">
            <li>
              <a href="#" onclick="openSearch()">
                <i class="lni lni-search-alt"></i>
              </a>
            </li>
            <li>
              <a href="#" data-toggle="modal" data-target="#login">
                <i class="lni lni-user"></i>
              </a>
            </li>
            <li>
              <a href="#" onclick="openWishlist()">
                <i class="lni lni-heart"></i><span class="dn-counter">2</span>
              </a>
            </li>
            <li>
              <a href="<?=$baseUrl?>index.php?page=cart">
                <i class="lni lni-shopping-basket"></i><span class="dn-counter theme-bg">3</span>
              </a>
            </li>
            <li><a href="javascript:void(0);">Tài Khoản</a>
              <ul class="nav-dropdown nav-submenu">
                <?php if (isset($_SESSION['userInfo']) && !empty($_SESSION['userInfo']['fullname'])): ?>
                  <?php if($_SESSION['userInfo']['role'] == 'admin'): ?>
                  <li><a href="<?=$baseUrl?>admin.php">Trang Quản Trị</a></li>
                  <?php endif ?>
                  <li><a href="<?=$baseUrl?>index.php?page=logout">Đăng Xuất</a></li>
                <?php else: ?>
                <li><a href="<?=$baseUrl?>index.php?page=login">Đăng nhập</a></li>
                <li><a href="<?=$baseUrl?>index.php?page=login">Đăng kí</a></li>
                <?php endif; ?>
              </ul>
            </li>
            <li><a>Xin Chào <?=$_SESSION['userInfo']['fullname']??'Guest'?></a></li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="clearfix"></div>