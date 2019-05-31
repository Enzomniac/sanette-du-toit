<?php
get_header();
?>

<main>
    <div class="transactions">
<?php
while (have_posts()) {
    the_post();
?>
        <div class="a-transaction">
            <h2 class="transaction__title">
                <?php the_title(); ?>
            </h2>
            <div class="transaction__content">
                <div class="transaction__client">
                    <div class="a-client-detail__title">
                        Client Details:
                    </div>
                    <div class="a-client-detail">
                        <?php echo(get_field('client_name') . " " . get_field('client_surname')); ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_phone') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_email') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_address_line_1') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_address_line_2') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_suburb') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_city') ?>
                    </div>
                    <div class="a-client-detail">
                        <?php the_field('client_postal_code') ?>
                    </div>
                </div>
                <div class="transaction__order">
                    <div class="order__title">
                        Order Details:
                    </div>
                    <div class="an-order__detail">
                        Order no. <?php the_field('item_id'); ?>
                    </div>
                    <div class="an-order__detail">
                        Item Name: <?php the_field('item_name') ?>
                    </div>
                    <div class="an-order__detail">
                        Size: <?php the_field('item_size'); ?> CM
                    </div>
                    <div class="an-order__detail">
                        Cost: R <?php the_field('item_cost'); ?>.00
                    </div>
                    <div class="an-order__detail">
                        Shipping Cost: R <?php the_field('shipping_cost'); ?>.00
                    </div>
                    <div class="an-order__detail">
                        Total Cost: R <?php the_field('total_cost'); ?>.00
                    </div>
                    <div class="an-order__detail">
                        Order Status: <?php the_field('order_status') ?>
                    </div>


                </div>
            </div>
        </div>
<?php
}
?>
        
    </div>
</main>

<?php
get_footer();