<?php

require_once __DIR__ . '/vendor/autoload.php';

function dd() {
    echo '<pre>';
    array_map(function($x) {var_dump($x);}, func_get_args());
    die;
}

// Agrega credenciales
MercadoPago\SDK::setAccessToken("APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398");
MercadoPago\SDK::setIntegratorId("dev_24c65fb163bf11ea96500242ac130004");

// Creación de la URL para la imagen
$protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
$host = $_SERVER["HTTP_HOST"];
$port = $_SERVER["SERVER_PORT"] ? ":". $_SERVER["SERVER_PORT"] : "";
$uri = $_SERVER["REQUEST_URI"];

$imgUrl;

if($host === "localhost"){
  // Desarmo la uri
  $uriArray = explode("/",ltrim($uri, "/"));
  $imgUri = "";
  // Construyo la uri para la imagen
  forEach($uriArray as $idx => $param){
    if($idx != count($uriArray) - 1){
      $imgUri .= "/". $param;
    }
  }

  $imgUrl = $protocol . $host . $port . $imgUri . substr($_POST["img"], 1);
} else {
  $imgUrl = $protocol . $host . $port . substr($_POST["img"], 1);
}

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->id = "1234";
$item->description = "Dispositivo móvil de Tienda e-commerce";
$item->picture_url = $imgUrl;
$item->title = $_POST['title'];
$item->quantity = $_POST['unit'];
$item->unit_price = $_POST['price'];

$preference->items = array($item); // Lo guardo en la preferencia

// Configuro un pagador en la preferencia
$payer = new MercadoPago\Payer();
$payer->name = "Lalo";
$payer->surname = "Landa";
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
  "area_code" => "11",
  "number" => "22223333"
);
$payer->address = array(
  "zip_code" => "1111",
  "street_name" => "False",
  "street_number" => "123"
);

$preference->payer = $payer; // Lo guardo en la preferencia

// Configuro los back_urls en la preferencia
$preference->back_urls = array(
  "success" => "https://www.facebook.com",
  "pending" => "http://localhost/gonzalo/mp-ecommerce-php/",
  "failure" => "http://localhost/gonzalo/mp-ecommerce-php/",
);

// Configuro los métodos de pago
$payment_methods = new MercadoPago\PaymentMethod();
$payment_methods->installments = 6;
$payment_methods->excluded_payment_methods = array(
  array("id" => "amex")
);
$payment_methods->excluded_payment_types = array(
  array("id" => "atm")
);

$preference->payment_methods = $payment_methods; // Lo guardo en la preferencia

// Otras configuraciones

// date_create
$preference->date_create = date(DATE_ATOM);

// external_reference
$preference->external_reference = "";

// notification_url
$preference->notification_url = "";

// auto_return
$preference->auto_return = "all";

// expires
$preference->expires = true;
$preference->expiration_date_from = date(DATE_ATOM);
$preference->expiration_date_to = date(DATE_ATOM, strtotime(date(DATE_ATOM)."+ 1 month"));

// Guarda la preferencia y envía el request
$preference->save();