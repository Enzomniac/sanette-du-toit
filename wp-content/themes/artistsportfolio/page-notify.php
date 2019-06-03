<?php

header('HTTP/1.0 200 OK');

$pfData = $_POST;

// Regen signature

foreach($pfData as $key => $value) {
    if ($key != 'signature') {
        $pfParamStr .= $key . '=' . urlencode($value) . '&';
    }
}

$pfParamStr = substr($pfParamStr, 0, -1);
$pfTempParamStr = $pfParamStr;

$passPhrase = '';

if (!empty($passPhrase)) {
    $pfTempParamStr .= '&passphrase=' .urlencode($passPhrase);    
}

$signature = md5($pfTempParamStr);

// End regen signature

// Compare Signature

if ($signature != $pfData['signature']) {
    mail('rhsupton@gmail.com', "Payfast Error", "Payfast has sent an ITN, but the signatures dont match");
} else {
    date_default_timezone_set("Africa/Johannesburg");
    $confirmNotify = strval(date('H:i:s')) . '\n';
    foreach($pfData as $key => $value) {
        $confirmNotify .= $key . " : " . $value . "\r\n";
    }
    wordwrap($confirmNotify, 70);
    mail('rhsupton@gmail.com', ('Payfast has sent ITN'), $confirmNotify);
}

notifyClient($pfData['email_address'], $pfData['item_name'], $pfData['m_payment_id']);



