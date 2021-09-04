<?php
add_shortcode('wds_donate', 'fn_wds_donate');

function subscribe($donor_firstname, $donor_lastname, $donor_email, $donation_amount, $donor_card_number, $donor_cvv, $donor_card_expiry
){
    if( get_option('wds_donation_mode') == "live" ){
        $post_url = "https://api.authorize.net/xml/v1/request.api";
    }
    else{
        $post_url = "https://apitest.authorize.net/xml/v1/request.api";
    }

    $payload = json_encode(array(
         "ARBCreateSubscriptionRequest" => array(
             "merchantAuthentication" => array(
                 "name" =>  get_option('wds_donation_login_id'),
                 "transactionKey" => get_option('wds_donation_transaction_key')
             ),
             "refId" => "123456",
             "subscription" => array(
                 "name" => "subscription",
                 "paymentSchedule" => array(
                     "interval" => array(
                         "length" => "1",
                         "unit" => "months"
                     ),
                     "startDate" => date("Y-m-d"),
                     "totalOccurrences" => "36",
                     "trialOccurrences" => "0"
                 ),
                 "amount" => $donation_amount,
                 "trialAmount" => "0.00",
                 "payment" => array(
                     "creditCard" => array(
                         "cardNumber" => $donor_card_number,
                         "expirationDate" => $donor_card_expiry
                     )
                 ),
                 "billTo" => array(
                     "firstName" => $donor_firstname,
                     "lastName" => $donor_lastname
                 )
             )
         ))
    );

    $request = curl_init($post_url);
        curl_setopt($request, CURLOPT_HEADER, 0);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($request, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
        $post_response = curl_exec($request);
        // Connection to Authorize.net
    curl_close ($request); // close curl object

    $post_response = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $post_response);

    $post_response = json_decode($post_response, true);

    $status = ($post_response["messages"]["resultCode"] == "Ok")? '1' : '2';

    $msg =  $post_response["messages"]["message"][0]["text"];

    $code = $post_response["messages"]["message"][0]["code"];

    return array($status, $post_response["subscriptionId"], $code, $msg, substr($donor_card_number, -4));
}
?>