<?php

require_once __DIR__ . '/vendor/autoload.php';

$access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";

MercadoPago\SDK::setAccessToken($access_token);

// file_get_contents('php://input');

// function dd() {
//     echo '<pre>';
//     array_map(function($x) {var_dump($x);}, func_get_args());
//     die;
// }

// $type = $_POST["type"];

// if(isset($_GET["type"])){
//   $type = $_GET["type"];
// } else {
//   if(isset($_POST["type"])){
//     $type = $_POST["type"];
//   } else {
//     $type = false;
//   }
// }

// $id = $_POST["id"];

// if(isset($_GET["data.id"])){
//   $id = $_GET["data.id"];
// } else {
//   if(isset($_POST["id"])){
//     $id = $_POST["id"];
//   } else {
//     $id = false;
//   }
// }

// dd($_GET[0], $_GET["type"]);

// $type = isset($_GET["type"]) ? $_GET["type"] : (isset($_POST["type"]) ? $_POST["type"] : null);
// $id = isset($_GET["data.id"]) ? $_GET["data.id"] : (isset($_POST["id"]) ? $_POST["id"] : null);

// error_log("========== TYPE ========== " . $type, 0);
// error_log("==========  ID  ========== " . $id, 0);

// dd($post_body);

// $type = $_POST["type"];
// $id = $_POST["id"];


switch($_POST["type"]) {
  case "payment":
    // $payment = MercadoPago\Payment::find_by_id($_POST["id"]);
    // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/payments/" . $id . "?access_token=" . $access_token));

    http_response_code(200);

    break;
  case "plan":
    // $plan = MercadoPago\Plan::find_by_id($_POST["id"]);

    // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/plans/" . $id . "?access_token=" . $access_token));
      
    http_response_code(200);

    break;
  case "subscription":
    // $plan = MercadoPago\Subscription::find_by_id($_POST["id"]);

    // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/subscriptions/" . $id . "?access_token=" . $access_token));

    http_response_code(200);

    break;
  case "invoice":
    // $plan = MercadoPago\Invoice::find_by_id($_POST["id"]);

    // $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/invoices/" . $id . "?access_token=" . $access_token));

    http_response_code(200);

    break;

  case "test":

    http_response_code(200);
    break;

  default:
    http_response_code(404);
}
