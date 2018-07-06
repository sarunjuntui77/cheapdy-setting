<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alert {

    public function send_slack($coupon, $insert_id)
    {
        $ch = curl_init();
        $email = $coupon['coupon_email'];
        $promotion_title = $coupon['promotion_title'];
        $provider_name = $coupon['provider_name'];
        $code = $coupon['coupon_code'];
        $getby = $coupon['coupon_getby'];
        $message = "$email get $promotion_title of $provider_name coupons code is $code by $getby.TransactionId=$insert_id";
        $payload = json_encode(array('text' => $message));

        curl_setopt($ch, CURLOPT_URL, SLACK_ALERT_URL);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $server_output = curl_exec($ch);
        curl_close ($ch);
    }
}