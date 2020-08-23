<?php

$access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";

MercadoPago\SDK::setAccessToken($access_token);

switch($_POST["type"]) {
  case "payment":
    $payment = MercadoPago\Payment.find_by_id($_POST["id"]);

    $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/payments/" . $_POST["id"] . "?access_token=" . $access_token));

    http_response_code(200);

    break;
  case "plan":
    $plan = MercadoPago\Plan.find_by_id($_POST["id"]);

    $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/plans/" . $_POST["id"] . "?access_token=" . $access_token));
      
    http_response_code(200);

    break;
  case "subscription":
    $plan = MercadoPago\Subscription.find_by_id($_POST["id"]);

    $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/subscriptions/" . $_POST["id"] . "?access_token=" . $access_token));

    http_response_code(200);

    break;
  case "invoice":
    $plan = MercadoPago\Invoice.find_by_id($_POST["id"]);

    $data = file_put_contents(__DIR__ . "/notificationResponse.json",file_get_contents("https://api.mercadopago.com/v1/invoices/" . $_POST["id"] . "?access_token=" . $access_token));

    http_response_code(200);

    break;

  case "test":

    http_response_code(200);

    break;

  default:
    http_response_code(500);
}