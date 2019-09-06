<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>四つ手網小屋 近藤</title>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
  <header class="header">
    <div class="nav">
      <h1 class="nav__logo">
        <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="四つ手小屋 近藤" height="80">
      </h1>
      <!-- PCの時のみ メニュー -->
      <div class="nav__menu">
        <ul>
          <li><a href="<?php echo home_url()?>"><i class="fas fa-home fa-2x"></i><span>トップ</span></a></li>
          <li><a href="#"><i class="fas fa-fish fa-2x"></i><span>施設案内</span></a></li>
          <li><a href="<?php echo home_url('reservation/')?>"><i class="fas fa-edit fa-2x"></i><span>予約する</span></a></li>
          <li><a href="<?php echo home_url('blog/')?>"><i class="fas fa-list fa-2x"></i><span>ブログ</span></a></li>
        </ul>
      </div>
    </div>
    <!-- /PCの時のみ メニュー -->
    <div class="border"></div>
    <?php wp_head();?>
  </header>
