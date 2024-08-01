<?php
include_once 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="src/css/teste.css">
    <title>Document</title>
</head>

<body>
    <!-- <p class='msg'>Por favor, preencha tudo</p> -->

    <header>
        <div class="logo-mobile">
            <a href="#"><img src="src/img/logo-crf.png" alt="Logo CRF" class="logo-mobile"></a>
        </div>
        <div class="titulo">
            <a href="#">
                <h1>Feed do Urubu</h1>
            </a>
        </div>
        <div class="icone-perfil">
            <i class="bi bi-person-circle"></i>
        </div>
    </header>

    <main>
        <section class="sessao-comentario">
            <form action="comentario.php" method="post">
                <div class="box-comentario">
                    <textarea type="text" name="comentario" id="" placeholder="Deixe seu comentario...">

                    </textarea>
                    <!-- <input type="text" name="" id="" placeholder="Deixe seu comentario..."> -->
                </div>

                <div class="email-comentario">
                    <input type="email" name="emailcoment" id="" placeholder="Seu email ">
                </div>

                <button class="btn-comentario" type="submit">Comentar</button>
            </form>

            <div id="comentario">
                <div class="comentario">
                    <?php
                    // Consulta para selecionar os usuários com limite para paginação
                    $select_user = "SELECT d.nome, c.comentario FROM dados d LEFT JOIN comentarios c ON d.id = c.dados_id";
                    $selected_user = mysqli_query($conexao, $select_user);
                    // Loop para exibir os usuários da página atual
                    //while ($row_user = mysqli_fetch_assoc($selected_user)) {
                        $row_user = mysqli_fetch_assoc($selected_user);
                        echo "<h3 class='nome-comentario' >" . $row_user ['nome'] . "</h3>" ;
                        echo "<h4 class='texto-comentario' >" . $row_user ['comentario'] . "</h4>" ;
                        // echo "<div class='container'>";
                        // echo "<div class='content'>";
                        // echo "<p class='infoFuncionario'>ID: " . $row_user['cpf'] . " </p>";
                        // echo "<p class='infoFuncionario'>Nome: " . $row_user['nome'] . " </p>";
                        // echo "<p class='infoFuncionario'>Telefone: " . $row_user['telefone'] . " </p>";
                        // echo "<p class='infoFuncionario'>E-mail: " . $row_user['email'] . " </p>";
                        // // echo "<p class='infoFuncionario'>CPF: " . $row_user['cpf'] ." </p>";
                        // echo "<div class='btn2'>";
                        // echo "<p class='infoFuncionario edt'><a href='edit_usuario.php?id=" . $row_user['id'] . " '>Editar</a> </p>";
                        // echo "<p class='infoFuncionario dlt'><a href='proc_apagar_usuario.php?id=" . $row_user['id'] . " '>Deletar</a> </p>";
                        // echo "</div>";
                        // echo "</div>";
                        // echo "</div>";
                    //}

                    ?>
                </div>
                <hr>
            </div>
        </section>
    </main>
</body>

</html>