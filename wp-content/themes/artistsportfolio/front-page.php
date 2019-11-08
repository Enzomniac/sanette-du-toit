<?php get_header(); ?>

<?php
$galleryPosts = new WP_Query(array(
    'paged' => get_query_var('page', 1),
    'post_type' => 'gallery-post',   
    'has-archive' => true
));
?>
    <main>
        <div class="gallery">
<?php
while ($galleryPosts -> have_posts()) {
    $galleryPosts -> the_post();
?>
            <div class="gallery__item">
                <a href="<?php the_permalink(); ?>" class="gallery__link"><img src="<?php echo the_post_thumbnail_url('galleryThumbnail') ?>"  alt="" class="gallery__image"></a>
            </div>
<?php
} //END THE LOOP
?>   
        </div>
        <div class="page_pag">
               
<?php
$total_pages = $galleryPosts->max_num_pages;
$current_page = max(1, get_query_var('page'));
echo paginate_links(array(
    'total' => $galleryPosts -> max_num_pages,    
    'current' => $current_page,
));    
?>
        </div>
     
    </main>
<?php get_footer() ?>

