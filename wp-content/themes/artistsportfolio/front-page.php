<?php get_header(); ?>

<?php
$galleryPosts = new WP_Query(array(
    'posts_per-page' => '10',
    'post_type' => 'gallery-post'
));
?>
    <main>
        <div class="gallery">
<?php
while ($galleryPosts -> have_posts()) {
    $galleryPosts -> the_post();
?>
            <div class="gallery__item">
                <a href="<?php the_permalink(); ?>" class="gallery__link"><img src="<?php echo the_post_thumbnail_url() ?>"  alt="" class="gallery__image"></a>
            </div>
<?php
} //END THE LOOP
?>   
        </div>
    </main>
<?php get_footer() ?>

