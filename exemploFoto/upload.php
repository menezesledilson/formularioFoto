<?php
include_once 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Celke - Formulário upload de imagem</title>
</head>
<body>
	<h2>Upload de Foto</h2>
     <a href="index.php">Listar</a><br>
     <a href="upload.php">Cadastrar</a><br><br>
    <?php
    // Receber os dados do formulario
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    // verficar se o usuario clicou na foto
    if (! empty($dados['SalvarFoto'])) {
        $arquivo = $_FILES['foto_usuario'];
        //var_dump($dados);
        //var_dump($arquivo);

        // Criar a query para cadastrar no banco de dados
        $query_usuario = "INSERT INTO usuarios (nome_usuario, email_usuario, foto_usuario, created) VALUES (:nome_usuario, :email_usuario, :foto_usuario, NOW())";

        // Preparar a consulta
        $cad_usuario = $conn->prepare($query_usuario);

        // Vincular os parâmetros
        $cad_usuario->bindParam(':nome_usuario', $dados['nome_usuario'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':email_usuario', $dados['email_usuario'], PDO::PARAM_STR);
        $cad_usuario->bindParam(':foto_usuario', $arquivo['name'], PDO::PARAM_STR);

        // Executar a consulta
        $cad_usuario->execute();

        // Verficar se cadastrou com sucesso
        
        if ($cad_usuario->rowCount()) {
            if((isset($arquivo['name']))and (!empty($arquivo['name']))){
                //recupera o ultimo id
                $ultimo_id = $conn->lastInsertId();
                
                //diretorio onde o arquivo sera salvo
                $diretorio = "imagens/$ultimo_id";
                
                //criar diretorio onde o arquivo sera salvo
                mkdir($diretorio, 0755);
                
                //Upload do arquivo 
                $nome_arquivo = $arquivo['name'];
                move_uploaded_file($arquivo['tmp_name'],$diretorio .'/'.$nome_arquivo);
                
                echo "<p style='color:green;'> Usuário e a foto cadastrada com sucesso!</p> ";
            } else {
                echo "<p style='color:#f00;'>Erro: Usuário  e a foto não cadastrada com sucesso!</p> ";
            }
            echo "<p style='color:green;'> Usuário cadastro com sucesso!</p> ";
        } else {
            echo "<p style='color:#f00;'>Erro: Usuário não cadastro com sucesso!</p> ";
        }
    }
    ?>
    <form name="cad_usuario" method="POST" action=""
		enctype="multipart/form-data">
		<label>Nome:</label> <input type="text" name="nome_usuario"
			id="nome_usuario" placeholder="Nome completo" autofocus required> <br>
		<br> <label>Email:</label> <input type="text" name="email_usuario"
			id="email_usuario" placeholder="Seu endereço de email" autofocus
			required> <br>
		<br>
		<!--Campo foto  -->
		<input type="file" name="foto_usuario" id="foto_usuario" required>
		<!-- Adicionei um input para seleção de arquivo -->
		<br>
		<br> <input type="submit" value="Cadastrar" name="SalvarFoto">
		<!-- Adicionei um botão de enviar -->
	</form>
</body>
</html>
