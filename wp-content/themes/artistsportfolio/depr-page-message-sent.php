<?php
get_header();

$formName = $_POST['aName'];
$formMail = $_POST['email'];
$formMessage = wordwrap($_POST['message'], 70);


?>
    <main>
<?php 
mail('rhsupton@gmail.com', ('Message From Website: '), $formMessage);
?>

<?php
while (have_posts()) {
    the_post();
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
} //END THE LOOP
?>

    </main>
<?php
get_footer();

?>



