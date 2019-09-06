<?php  get_header();?>
<main>
  <div class="main">
    <div class="main__container">
      <h2 class="main-title"></h2>
      <div class="list-wrapper">
      <?php
      if (have_posts()) :
        while (have_posts()) :?>
        <?php the_post();
        get_template_part('each_exrpt_post');?>
          <a href="<?php the_permalink()?>">
            <section class="article-list">
              <div class="article-list__img">
                <?php if (has_post_thumbnail()): ?>
                <?php the_post_thumbnail('thumbnail'); ?>
                <?php else: ?>
                <img src="https://placehold.jp/700x394.png" alt="画像がありません" height="394" width="700">
                </div>
                <?php endif; ?>
                <h3 class="article-list__title"><?php the_title()?></h3>
                <div class="article-list__date"><i class="far fa-calendar-alt"></i><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></div>
                <div class="article-list__text"><?php the_excerpt(); ?></div>
                <div class="article-list__more">
                <a href="<?php the_permalink()?>"></a>
              </div>
            </section>
          </a>
      <?php endwhile;
    endif;
    ?>
      </div>
    </div>
    <?php  get_sidebar();?>
  </div>
</main>
<?php  get_footer();?>
