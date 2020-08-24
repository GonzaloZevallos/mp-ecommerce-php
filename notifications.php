<?php

require_once __DIR__ . '/vendor/autoload.php';


if($_SERVER['REQUEST_METHOD'] === "POST"){

  $access_token = "APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398";
  
  MercadoPago\SDK::setAccessToken($access_token);

  $json = file_get_contents("php://input");
  
  $body = json_decode($json);
  
  switch($body->type) {
    case "payment":
    $payment = MercadoPago\Payment::find_by_id($body->id);
    
    http_response_code(200);
    header('Content-Type: application/json');
    
    // $data = file_get_contents("https://api.mercadopago.com/v1/payments/" . $body->id . "?access_token=" . $access_token);

    echo $json;

    // echo json_encode($data, JSON_PRETTY_PRINT);

    break;
  case "plan":
    $plan = MercadoPago\Plan::find_by_id($body->id);
      
    http_response_code(200);
    header('Content-Type: application/json');
    
    $data = file_get_contents("https://api.mercadopago.com/v1/plans/" . $body->id . "?access_token=" . $access_token);

    echo json_encode($data, JSON_PRETTY_PRINT);

    break;
  case "subscription":
    $plan = MercadoPago\Subscription::find_by_id($body->id);

    http_response_code(200);
    header('Content-Type: application/json');
    
    $data = file_get_contents("https://api.mercadopago.com/v1/subscriptions/" . $body->id . "?access_token=" . $access_token);

    echo json_encode($data, JSON_PRETTY_PRINT);

    break;
  case "invoice":
    $plan = MercadoPago\Invoice::find_by_id($body->id);
    
    http_response_code(200);
    header('Content-Type: application/json');
    
    $data = file_get_contents("https://api.mercadopago.com/v1/invoices/" . $body->id . "?access_token=" . $access_token);

    echo json_encode($data, JSON_PRETTY_PRINT);

    break;

  case "test":

    http_response_code(200);

    break;
  default:
    http_response_code(400);
    break;
  }
} else {
  http_response_code(500);
}