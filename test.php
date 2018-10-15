
<?php
require 'vendor/autoload.php';

use \Firebase\JWT\JWT;

$token_payload = [
  'name' => 'John Doe',
  'email' => 'info@auth0.com'
];

// This is your client secret
$key = '__test_secret__';

// This is your id token
$jwt = JWT::encode($token_payload, base64_decode(strtr($key, '-_', '+/')), 'HS256');

print_r($jwt);

?>
