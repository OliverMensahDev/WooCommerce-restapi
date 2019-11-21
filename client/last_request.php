<?php
 require 'vendor/autoload.php';
 $client = new \GuzzleHttp\Client();
 $url = "http://127.0.0.1:8000/api/order";
 $myBody = [
   "fullname" => "adfas",
   "phone" => "0544892841",
   "location" =>  "Afdsf",
   "products" => [
     [
             "product_id" => 1422,
             "quantity" => 2
     ]
     ]
 ]; 

 $request = $client->post($url, [
  'headers' => ['Content-Type' => 'application/json'],
  'body' => json_encode($myBody),
  'debug' => true
]);

$response = $request->getBody();
echo $response;
