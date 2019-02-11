<?php get_header(); ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <div class="row column container">
            <div class="content-entry">
                <div class="post-title">
                    <h1 itemprop="title"><?php the_title(); ?></h1>
                </div>
                <div class="post-entry">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
<?php get_footer(); ?>