<?php

header('HTTP/1.0 200 OK');

$pfData = $_POST;


date_default_timezone_set("Africa/Johannesburg");

$confirmNotify = strval(date('H:i:s')) . '\n';
foreach($pfData as $key => $value) {
    $confirmNotify .= $key . " : " . $value . ", ";
}

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

if ($signature != $pfData['signature']) {
    $confirmNotify .= "SIGNATURE IS NOT A MATCH";
} else {
    $confirmNotify .= "SIGNATURE MATCHED YIPEEEEEEEE";
}


wordwrap($confirmNotify, 70);


mail('rhsupton@gmail.com', ('Payfast has sent ITN'), $confirmNotify);