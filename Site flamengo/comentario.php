<?php
include_once 'conexao.php';

// $comentario = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
// $email = filter_input(INPUT_POST, 'emailcoment', FILTER_SANITIZE_EMAIL);




// $verifica_email = "SELECT user_id FROM comentarios  WHERE email = '$email'";
// $result_email = mysqli_query($conexao, $verifica_email);

// if (mysqli_num_rows($result_email) == 0) {

    
//     $criar_comentarios = "INSERT INTO comentarios (comentario, email ,created) VALUES ('$comentario','$email',NOW())";
//     $comentario_criado = mysqli_query($conexao, $criar_comentarios);

// }

// Filtra e valida os dados do formulário
$comentario = filter_input(INPUT_POST, 'comentario', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'emailcoment', FILTER_SANITIZE_EMAIL);

// Verifica se o email está cadastrado na tabela 'dados'
$verifica_email = "SELECT id FROM dados WHERE Email = '$email'";
$result_email = mysqli_query($conexao, $verifica_email);

// Se o email não está cadastrado, mostra mensagem de erro
if (mysqli_num_rows($result_email) == 0) {
    echo "Email não cadastrado.";
} else {
    // Pega o id do usuário associado ao email
    $row = mysqli_fetch_assoc($result_email);
    $dados_id = $row['id'];

    // Insere o comentário na tabela 'comentários'
    $criar_comentarios = "INSERT INTO comentarios (dados_id,comentario, email, created) VALUES ('$dados_id', '$comentario', '$email', now())";
    $comentario_criado = mysqli_query($conexao, $criar_comentarios);

    if ($comentario_criado) {
        echo "Comentário adicionado com sucesso.";
    } else {
        echo "Erro ao adicionar comentário.";
    }
}



