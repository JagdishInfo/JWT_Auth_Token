
<?php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$token_payload = [
  'name' => 'John Doe',
  'email' => 'info@auth0.com'
];

$key = '__test_secret__';

$jwt = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJuYW1lIjoiSm9obiBEb2UiLCJlbWFpbCI6ImluZm9AYXV0aDAuY29tIn0.XhmwPNGeRjqsrhPvb_ExVT5MUWcUjRa_OFi-ctXd5U8';
$decoded = JWT::decode($jwt, base64_decode(strtr($key, '-_', '+/')), ['HS256']);
print_r($decoded);

?>
