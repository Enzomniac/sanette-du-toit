<?php
get_header();

$shippingCost = 600;

$payfastArray = generatePayfastArray($_POST, $shippingCost);

// Change out of sandbox for production
$pfHost = 'https://sandbox.payfast.co.za/eng/process';

//Create transaction post

$my_post = [
    'post_type' => 'transaction-post',
    'post_title' => "Transaction no.",
    'post_content' => "",
    'post_status' => 'publish',
    'post_author' => 2,
];

$transactionID = wp_insert_post($my_post, true);

//Insert order details into post($transactionID)

$editPost = [
    'post_type' => 'transaction-post',
    'ID' => $transactionID,
    'post_title' => ('Transaction no. ' . $transactionID),
    'post_status' => 'publish',
    'post_author' => 2 
];

wp_insert_post($editPost, true);

update_field('client_name', $payfastArray['name_first'], $transactionID);
update_field('client_surname', $payfastArray['name_last'], $transactionID);
update_field('client_phone', $payfastArray['cell_number'], $transactionID);
update_field('client_email', $_POST['client__email'], $transactionID);
update_field('client_address_line_1', $_POST['client__address1'], $transactionID); 
if ($_POST['client__address2'] != "") update_field('client_address_line_2', $_POST['client__address2'], $transactionID);
if ($_POST['client__suburb'] != "") update_field('client_suburb', $_POST['client__suburb'], $transactionID);
update_field('client_city', $_POST['client__city'], $transactionID);
update_field('client_postal_code', $_POST['client__postal'], $transactionID);
update_field('item_id', $_POST['itemID'], $transactionID);
update_field('item_name', $_POST['itemName'], $transactionID); 
update_field('item_size', ($_POST['itemWidth'] . " X " . $_POST['itemHeight'] . " CM"), $transactionID); 
update_field('item_cost', $_POST['itemPrice'], $transactionID);
update_field('shipping_cost', $shippingCost, $transactionID); 
update_field('total_cost', ($shippingCost + $_POST['itemPrice']), $transactionID);
update_field('order_status', 'pending', $transactionID);
?>
    <main>        
        <div class="confirmation">
            <div class="client__details">
                <div class="a-detail">
                    Name: <?php echo($_POST['client__name'] . " " . $_POST['client__surname']); ?>
                </div>
                <div class="a-detail">
                    Email: <?php echo($_POST['client__email']); ?>
                </div>
                <div class="a-detail a-detail__address">
                    <div class="address__label">
                        Shipping Address:&nbsp;
                    </div>
                    <div class="address__detail">
<?php
                        echo($_POST['client__address1'] . "<br>");
                        if ($_POST['client__address2'] != "") {
                            echo($_POST['client__address2'] . "<br>");
                        }
                        if ($_POST['client__suburb'] != "") {
                            echo($_POST['client__suburb'] . "<br>");
                        }                    
                        echo($_POST['client__city'] . "<br>");
                        echo($_POST['client__postal'] . "<br>");
?>
                    </div>
                </div>
            </div>
            <div class="order__details">
                <div class="a-line-item">
                    <div class="line__title">
                        <?php echo($_POST['itemName']); ?>
                    </div>
                    <div class="line__price">
                        <?php echo("R " . $_POST['itemPrice'] . ".00"); ?>
                    </div>
                </div>
                <div class="a-line-item">
                    <div class="line__title">
                        Shipping
                    </div>
                    <div class="line__price">
                        <?php echo("R " . $shippingCost . ".00") ?>
                    </div>
                </div>
                <div class="a-line-item a-line__total">
                    <div class="line__title">
                        TOTAL:&nbsp;
                    </div>
                    <div class="line__price">
                        <?php echo("R " . intval($_POST['itemPrice'] + $shippingCost) . ".00"); ?>
                    </div>
                </div>
<?php
                $htmlForm = '<form action="' . $pfHost . '" method="post">'; //site_url('/cart/process-payment')
                foreach ($payfastArray as $name => $value) {
                $htmlForm .=  '<input type="hidden" name="' . $name . '" value="' . $value . '" />';
                }
                $htmlForm .=    '<div class="payfast">';
                $htmlForm .=        '<button type="submit">CONFIRM AND PAY</button>';
                $htmlForm .=    '</div>';
                $htmlForm .= '</form>';

                echo($htmlForm); 
?>
            </div>            
        </div>
    </main>
<?php
get_footer();