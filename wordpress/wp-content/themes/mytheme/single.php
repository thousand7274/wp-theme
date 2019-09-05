<?php  get_header();?>
  <main>
    <div class="article">
      <div class="article__wrapper">
        <span class="article__nav"><?php previous_post_link(); ?>|<a href="<?php echo home_url('blog/')?>"><i class="fas fa-home"></i></a>|<?php next_post_link(); ?></span>
        <div class="article__container">
          <div class="article__img">
          <?php if (has_post_thumbnail()): ?>
            <?php the_post_thumbnail('thumbnail'); ?>
          <?php else: ?>
            <img src="https://placehold.jp/591x394.png" alt="画像がありません">
          <?php endif; ?>
          </div>
          <h2 class="article__title"><?php the_title(); ?></h2>
          <?php
            if (have_posts()) :
            while (have_posts()) : the_post();
            ?>
          <div class="article__date"><i class="fas fa-calendar-check"></i><span>
            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date('Y.m.d'); ?></time></span>
          </div>

          <div class="article__text">
            <?php the_content();?>
          </div>
            <?php
            endwhile;
          endif;?>
            <!-- こんにちは！最近暑さも和らいで少しずつ秋の気配を感じるようになりましたね。ですが沖縄では台風が近づいており、週末に直撃するとかしないとか・・・。 -->
            <!-- <img src="img/03.jpg" alt="四つ出小屋の中" width="700"> -->

        </div>
      </div>
      <?php  get_sidebar();?>
    </div>
  </main>

<?php  get_footer();?>
