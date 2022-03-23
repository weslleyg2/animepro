<?php
session_start();
include_once("connection.php");
$for = "wallacevander42@gmail.com, weslleyvander2009@gmail.com, animepro918@gmail.com";
$topic = "Dados do formulário";


$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);


$result_user = "INSERT INTO users (names, email, phone, created) VALUES('$name', '$email', '$phone', NOW())";
$resulted_user = mysqli_query($conn, $result_user);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Informações enviadas com sucesso!</p>";
    header("Location: telegram.html");
}else{
    $_SESSION['msg'] = "<p style='color:red;'>Informações não foram enviadas!</p>";
    header("Location: index.php");
}

$body = "<strong>Mensagem de Contato</strong><br><br>";
$body .= "<br><strong>Nome: </strong> $name";
$body .= "<br><strong>Email: </strong> $email";
$body .= "<br><strong>Fone: </strong> $phone";

$header = "Content-Type: text/html; charset= utf-8\n";
$header .= "From:$email Reply-to: $email\n";

@mail($for,$topic, $body, $header);