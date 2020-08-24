<?php

require_once __DIR__ . '/vendor/autoload.php';

$access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";

MercadoPago\SDK::setAccessToken($access_token);


$type = $_GET["type"];

// if(isset($_GET["type"])){
//   $type = $_GET["type"];
// } else {
//   if(isset($_POST["type"])){
//     $type = $_POST["type"];
//   } else {
//     $type = false;
//   }
// }

$id = $_GET["data.id"];

// if(isset($_GET["data.id"])){
//   $id = $_GET["data.id"];
// } else {
//   if(isset($_POST["id"])){
//     $id = $_POST["id"];
//   } else {
//     $id = false;
//   }
// }

error_log("========== TYPE ========== " . $type, 0);
error_log("==========  ID  ========== " . $id, 0);

switch($type) {
  case "payment":
    $payment = MercadoPago\Payment.find_by_id($id);
    // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/payments/" . $id . "?access_token=" . $access_token));
    if(!empty($payment)){
      error_log(json_encode($payment, JSON_PRETTY_PRINT), 0);
    }

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

    header("HTTP STATUS 200 (OK)");

    break;

  default:
    http_response_code(404);
}