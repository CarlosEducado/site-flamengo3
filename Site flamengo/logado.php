<?php
session_start();
include_once('conexao.php');

$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

$verifica = "SELECT * FROM dados WHERE email= '$email' AND senha = '$senha'";
$resultado = mysqli_query($conexao, $verifica);

if (mysqli_num_rows($resultado) > 0) {
    // $_SESSION['msg'] = "LOGADO";
    header('Location: teste.html');
} else {
    // $_SESSION['msg'] = "E-mail ou senha incorretos.";
    header('Location: index.php');
}
exit();
