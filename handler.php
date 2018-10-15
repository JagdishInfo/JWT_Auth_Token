<?php
require_once '2fa.php';
$auth = new userAuth();

if (!empty($_POST)) {
  $email = $_POST['email'];
  $pswd = $_POST['password'];
  $msg = $auth->mailUser($email, $pswd);
}else if (!empty($_GET['token'])) {
    $token = $_GET['token'];
    $msg = $auth->validMail($token);
}else{
    echo 'Wrong';
}
 
?>