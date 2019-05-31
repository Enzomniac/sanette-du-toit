<?php get_header(); ?>

<?php 
while (have_posts()) {
    the_post();
?>
    <main>
        <div class="single-gallery">
            <div id="single-gallery__modal">
                <div class="close-modal">
                    <a href="#" class="link__plain">CLOSE</a>
                </div>
                <img class = "modal__image"src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
            <div class="single-gallery__title">
                <?php the_title(); ?>
            </div>
            <div class="single-gallery__item">
                <a href="#single-gallery__modal" class="gallery__link"><img src="<?php the_post_thumbnail_url(); ?>" alt="" class="single-gallery__image"></a>
            </div>
            <div class="single-gallery__info">
                <div class="single-gallery__medium">
                    <?php the_field('item_medium'); ?>
                </div>
                <div class="single-gallery__size">
                    <?php echo(get_field('width') . ' X ' . get_field('height') . " CM"); ?>
                </div>
<?php 
if (get_field('price') == 0) {
?>
                <div class="single-gallery__price sold">
                    NOT FOR SALE
                </div>
                       
<?php
} else {
?>                
                <div class="single-gallery__price">
                    <?php echo('R ' . get_field('price')); ?>
                </div>
                <a class="single-gallery__buy div-as-button" href="<?php echo(site_url('/cart?itemID=') . get_the_ID()); ?>">
                    BUY
                </a>
<?php 
}
?>
            </div>    
        </div>
    </main>

<?php 
} // END THE LOOP
?>

<?php get_footer(); ?>

