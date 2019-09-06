  <footer class="footer">
    <div>(c)Copyright</div>

  </footer>
  <!-- スマホのみ -->
  <nav class="sm-nav">
    <ul>
      <li><a href="<?php echo home_url()?>"><i class="fas fa-home fa-2x"></i><span>ホーム</span></a></li>
      <li><a href="#"><i class="fas fa-fish fa-2x"></i><span>施設案内</span></a></li>
      <li><a href="<?php echo home_url('reservation/')?>"><i class="fas fa-edit fa-2x"></i><span>予約する</span></a></li>
      <li><a href="<?php echo home_url('blog/')?>"><i class="fas fa-list fa-2x"></i><span>ブログ</span></a></li>
    </ul>
  </nav>
  <!-- /スマホのみ -->
  <?php wp_footer(); ?>
</body>

</html>
