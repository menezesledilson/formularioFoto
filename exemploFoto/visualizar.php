<?php
session_start();
ob_start();
include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Celke - Detalhes do usuario</title>
</head>

<body>
    <a href="index.php">Listar</a><br>
    <a href="upload.php">Cadastrar</a><br>

    <h2>Detalhes do Usuário</h2>

    <?php

    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

    if (!empty($id)) {
        $query_usuario = "SELECT id, nome_usuario, email_usuario, foto_usuario, created, modified FROM usuarios WHERE id=:id LIMIT 1";
        $result_usuario = $conn->prepare($query_usuario);
        $result_usuario->bindParam(':id', $id);
        $result_usuario->execute();

        $row_usuario = $result_usuario->fetch(PDO::FETCH_ASSOC);
        //var_dump($row_usuario);
        extract($row_usuario);
        echo "ID: $id <br>";
        echo "ID: $nome_usuario <br>";
        echo "E-mail: $email_usuario <br>";
        echo "Foto: $foto_usuario <br>";
        echo "Cadastrado: " . date('d/m/Y H:i:s', strtotime($created)) . " <br>";

        echo "Editado: ";
        if(!empty($modified)){
            echo date('d/m/Y H:i:s', strtotime($modified));
        }
        echo "<br><br>";

        if ((!empty($foto_usuario)) and (file_exists("imagens/$id/$foto_usuario"))) {
            echo "<img src='imagens/$id/$foto_usuario' width='150'><br>";
           // echo "<a href='imagens/$id/$foto_usuario' download>Download</a><br><br>";
        } else {
            echo "<img src='imagens/icon_user.png' width='150'><br>";
        }
    } else {
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Necessário selecionar o usuário!</p>";
        header("Location: index.php");
    }
    ?>

</body>

</html>