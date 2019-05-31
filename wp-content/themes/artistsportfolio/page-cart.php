<?php 
get_header();

$cartQuery = new WP_Query(array(
    'post_type' => 'gallery-post',
    'p' => $_GET['itemID']
));
?>
    <main>
        <div class="cart">
            <h2 class="cart__title">Cart Content:</h2>
<?php
while($cartQuery -> have_posts()) {
    $cartQuery -> the_post();
?>
            <div class="an-item">
                <h3 class="an-item__title"><?php the_title(); ?></h3>                
                <div class="an-item__image-box">
                    <img src="<?php echo(the_post_thumbnail_url()); ?>" alt="" class="an-item__image">
                </div>
                <p class="an-item__price"><?php echo("R " . get_field('price') . ".00"); ?></p>
                
            </div>
<?php
}
?>
            <div class="cart__total">
                Total: <?php echo("R " . get_field('price') . ".00"); ?>
            </div>
        </div>
        <div class="client">
            <h2 class="client__title">Client Details:</h2>
            <form action="<?php echo(site_url('/cart/confirm-cart')); ?>" class="client__details" method="post">
                <div class="box__address">
                    <label for="client-name" class="label__name">First Name: </label>
                    <input type="text" placeholder=" FIRST NAME" name="client__name">
                </div>
                <div class="box__address">
                    <label for="client-surname" class="label__name">Last Name: </label>
                    <input type="text" placeholder=" LAST NAME" name="client__surname">
                </div>
                <div class="box__address">
                    <label for="client-phone" class="label__phone">Last Name: </label>
                    <input type="text" placeholder=" PHONE NUMBER" name="client__phone" pattern="[0-9]{10}">
                </div>
                <div class="box__address">
                    <label for="client-address__email" class="label__amil">Email: </label>
                    <input type="text" placeholder="EMAIL" name="client__email">
                </div>
                <div class="box__address">
                    <label for="client-address__street1" class="label__name">Address Line 1: </label>
                    <input type="text" placeholder=" ADDRESS LINE 1" name="client__address1">
                </div>
                <div class="box__address">
                    <label for="client-address__street2" class="label__name">Address Line 2: </label>
                    <input type="text" placeholder=" ADDRESS LINE 2" name="client__address2">
                </div>
                <div class="box__address">
                    <label for="client-address__suburb" class="label__name">Suburb: </label>
                    <input type="text" placeholder=" SUBURB" name="client__suburb">
                </div>
                <div class="box__address">
                    <label for="client-address__city" class="label__name">City: </label>
                    <input type="text" placeholder=" CITY" name="client__city">
                </div>
                <div class="box__address">
                    <label for="client-address__postal" class="label__name">Postal Code: </label>
                    <input type="text" placeholder=" POSTAL CODE" name="client__postal">
                </div>
                <div class="passthrough">
                    <input type="hidden" name="itemID" value="<?php echo($_GET['itemID']); ?>">
                    <input type="hidden" name="itemName" value="<?php the_title(); ?>">
                    <input type="hidden" name="itemWidth" value="<?php echo(get_field('width')); ?>">
                    <input type="hidden" name="itemHeight" value="<?php echo(get_field('height')); ?>">
                    <input type="hidden" name="itemPrice" value="<?php echo(get_field('price')); ?>">
                </div>
                <div class="box__address box__button">
                    <button class="ap-button" type="submit">PROCEED TO CHECKOUT</button>
                </div>
            </form>            
        </div>
    </main>
<?php 
get_footer();
?>