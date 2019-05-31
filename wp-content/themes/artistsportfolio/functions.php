<?php

function basic_files() {
    wp_enqueue_script('main-script', get_theme_file_uri('/js_modules/script.js'), NULL, '1.0', true); //arg0 => nickname, arg1 => url, arg2 => dependencies, arg3 => version, arg4 => before closing body tag
    wp_enqueue_style('basic_style', get_stylesheet_uri());
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.8.1/css/all.css');
    wp_enqueue_style('google-font', '//fonts.googleapis.com/css?family=Roboto+Mono');
}

add_action('wp_enqueue_scripts', 'basic_files');

function features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'features');

function sendMessage($messageData) {
    $messageHtml = "";
    $messageHtml .= "Message from your Expressive Art website: \n";
    $messageHtml .= "From: " . $messageData['aName'] . "\n";
    $messageHtml .= "with email address: " . $messageData['email'] . "\n";
    $messageHtml .= "And Message: \n";
    $messageHtml .= $messageData['message'];    
    mail('sanette.upton@gmail.com', "Message from an Expressive Art visitor!", $messageHtml);
}

function generatepayfastArray($fromPost, $shippingCost) {
    echo ("The payfast() function has been called");
    $payfastArray = array(
        //change merchant id and key for production server
        'merchant_id' => '10000100',
        'merchant_key' => '46f0cd694581a',
        'return_url' => 'https://www.sanette.expressiveart.co.za/cart/success',
        'cancel_url' => 'https://www.sanette.expressiveart.co.za/cart/no-success',
        'notify_url' => 'https://www.sanette.expressiveart.co.za/cart/notify',
        'name_first' => $fromPost['client__name'],
        'name_last' => $fromPost['client__surname'],
        'email_address' => $fromPost['client__email'],
        'cell_number' => strval($fromPost['client__phone']),
        'm_payment_id' => '123',
        'amount' => intval($fromPost['itemPrice']) + $shippingCost,
        'item_name' => $fromPost['itemName'],
        'item_description' => '',
        'email_confirmation' => '1',
        'confirmation_address' => 'rhsupton@gmail.com',
        'payment_method' => ''    
    );
    $pfOutput = '';
    foreach ($payfastArray as $key => $val) {
        if (!empty($val)) {
            $pfOutput .= $key . '=' . urlencode(trim($val)) . '&';
        }
    }
    $getString = substr($pfOutput, 0, -1);
    $payfastArray['signature'] = md5($getString);   
    return $payfastArray;
}