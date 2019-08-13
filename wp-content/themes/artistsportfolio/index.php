<?php get_header(); ?>

    <main>
        <div class="ap-blog">

<?php
while (have_posts()) {
    the_post();
?>
            <div class="ap-blog-post">
                <div class="ap-blog-post__content">
                    <h3 class="ap-blog-post__title">
                        <a class="link__plain" href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="ap-blog-post__copy copy">
                        <?php the_excerpt(); ?>
                        <a href="<?php echo get_the_permalink(); ?>" class="link__read-more">. . . READ MORE</a>
                    </div>
                </div>
                <div class="ap-blog-post__img-box"> 
                    <img class="ap-blog-post__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
            </div>
<?php 
}
?>          
            <div class="pagination"><?php echo paginate_links(); ?> </div>
        </div>
    </main>
<?php get_footer(); ?>



