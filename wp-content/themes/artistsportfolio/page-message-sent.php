<?php get_header(); ?>

    <main>
        <div class="ap-blog">

<?php
// SEND MESSAGE
sendMessage($_POST);

while (have_posts()) {
    the_post();

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