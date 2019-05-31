<?php get_header(); ?>

    <main>
        <div class="ap-blog">

<?php 
    while (have_posts()) {
        the_post();
?>
            <div class="breadcrumb">
                <!-- <div class="breadcrumb__previous"><a href="#" class="breadcrumb__previous__link link__plain">previous post</a></div> -->
                <div class="breadcrumb__previous"><?php previous_post_link('%link', "previous post"); ?></div>
                <div class="breadcrumb__blog"><a href="<?php echo site_url('/blog'); ?>" class="breadcrumb__previous__link link__plain">back to blog</a></div>
                <div class="breadcrumb__next"><?php next_post_link('%link', 'next post'); ?></div>
            </div>
<?php
if (strlen(get_the_content()) < 780) {
?>
            <div class="ap-blog-post ap-blog-post__short">
                <div class="ap-blog-post__content">
                    <h3 class="ap-blog-post__title">
                        <?php the_title(); ?>
                    </h3>
                    <div class="ap-blog-post__copy">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="ap-blog-post__img-box">
                    <img class="ap-blog-post__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
            </div>
<?php
} else {
?>
            <div class="ap-blog-post">
                <div class="ap-blog-post__content kill-flex-width">
                    <h3 class="ap-blog-post__title">
                        <?php the_title(); ?>
                    </h3>
                    <div class="ap-blog-post__copy">
                        <div class="ap-blog-post__img-box float-box">
                            <img class="ap-blog-post__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                        </div>
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="ap-blog-post__img-box float-not-box">
                    <img class="ap-blog-post__image" src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
            </div>          
<?php
    }
}
?>           
        </div>
    </main>

<?php get_footer() ?>

