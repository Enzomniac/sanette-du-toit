<?php
get_header();
?>
    <main>
<?php
while (have_posts()) {
    the_post();
?>

<?php
if (strlen(get_the_content()) < 780) {
?>
        <div class="mypage mypage__short">
            <div class="page__title">
                <?php the_title(); ?>
            </div>
            <div class="page__copy copy">
                <div class="page__float-image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
                <?php the_content(); ?>
            </div>
            <div class="page__image">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
        </div>
        <div class="page-illustrations">
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_1'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_2'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_3'); ?>" alt="" class="illustration-image">
            </div>
        </div>
<?php
} else {
?>
        <div class="mypage">
            <div class="page__title">
                <?php the_title(); ?>
            </div>
            <div class="page__copy copy">
                <div class="page__float-image">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                </div>
                <?php the_content(); ?>
            </div>
            <div class="page__image">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
        </div>
        <div class="page-illustrations">
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_1'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_2'); ?>" alt="" class="illustration-image">
            </div>
            <div class="illustration-box">
                <img src="<?php echo get_field('an_illustration_3'); ?>" alt="" class="illustration-image">
            </div>
        </div>
<?php
} // END IF FOR SHORT PAGE
}   //END THE LOOP
?>
    </main>
<?php 
get_footer();
?>
