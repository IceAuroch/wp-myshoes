<?php get_header(); ?>
    
    <div class="row collapse">
        <div class="column">
            <div class="catalog_inner">
                <div class="title">
                    <h1 itemprop="name"><span>Результаты поиска</span></h1>
                </div>
                <h4>Вы искали: <?php printf("%s", get_search_query() ); ?></h4>
                <ol>
                  <?php if(have_posts()):?><?php while(have_posts()):the_post(); ?>
                    <li>
                      <h5><a class="pseudo" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h5>
                      <?php the_excerpt(); ?>
                      <div class="helper"></div>
                    </li>
                  <?php endwhile; endif; ?>
                </ol>
            </div>
        </div>
    </div>

<?php get_footer(); ?>