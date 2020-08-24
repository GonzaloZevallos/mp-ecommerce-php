<?php

$access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";

MercadoPago\SDK::setAccessToken($access_token);


$type = isset($_GET["type"]) ? $_GET["type"] : isset($_POST["type"]) ? $_POST["type"] : false;

$id = isset($_GET["id"]) ? $_GET["id"] : isset($_POST["id"]) ? $_POST["id"] : false;

if($id && $type){

  switch($type) {
    case "payment":
      $payment = MercadoPago\Payment.find_by_id($id);
  
      // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/payments/" . $id . "?access_token=" . $access_token));
  
      http_response_code(200);
  
      break;
    case "plan":
      $plan = MercadoPago\Plan.find_by_id($id);
  
      // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/plans/" . $id . "?access_token=" . $access_token));
        
      http_response_code(200);
  
      break;
    case "subscription":
      $plan = MercadoPago\Subscription.find_by_id($id);
  
      // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/subscriptions/" . $id . "?access_token=" . $access_token));
  
      http_response_code(200);
  
      break;
    case "invoice":
      $plan = MercadoPago\Invoice.find_by_id($id);
  
      // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/invoices/" . $id . "?access_token=" . $access_token));
  
      http_response_code(200);
  
      break;
  
    case "test":
  
      http_response_code(200);
  
      break;
  
    default:
      http_response_code(500);
  }

} else {
  http_response_code(500);
}
