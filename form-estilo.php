<?php
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Estilizado</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/php.ico"/>
</head>
<body>

         <div class="">
            <h1 id="titulo">Formulário de Contato</h1>
            <p id="subtitulo">Complete suas informações</p>
            <br>
        </div>

        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            

            if(!empty($dados['AddMsgCont'])){
                //var_dump($dados);

                //validar TODOS os compos de uma vez
                $dados = array_map('trim', $dados);
                if(in_array('', $dados)){
                    echo "<p style='color: #f00;'>Erro: Necessário preencher todos os campos!<p/>";
                }else {
                    $query_contato = "INSERT INTO contatos (nome, email, assunto, conteudo) VALUES (:nome, :email, :assunto, :conteudo)";
                    $add_contato = $conn->prepare($query_contato);
                    $add_contato->bindParam(':nome', $dados['nome'], PDO::PARAM_STR);
                    $add_contato->bindParam(':email', $dados['email'], PDO::PARAM_STR);
                    $add_contato->bindParam(':assunto', $dados['assunto'], PDO::PARAM_STR);
                    $add_contato->bindParam(':conteudo', $dados['conteudo'], PDO::PARAM_STR);


                    $add_contato->execute();

                    if($add_contato->rowCount()){
                        unset($dados);
                        echo "<p style='color: green;'>Mensagem enviada com sucesso!<p/>";
                    }else {
                        echo "<p style='color: #f00;'>Erro: Mensagem  não foi enviada!<p/>";
                    }
                }
            }
        
        ?>

        <form action="" method="POST" id="cadMsgCont">
        <fieldset class="grupo">
            <div class="campo">
                <?php 
                    $nome = "";
                    if(isset($dados['nome'])){
                        $nome = $dados['nome'];
                    }
                ?>
                <label><strong>Nome</strong></label>
                <input type="text" name="nome" placeholder="Nome completo" value="<?php echo $nome; ?>"><br>
            
                <?php 
                    $email = "";
                    if(isset($dados['email'])){
                        $email = $dados['email'];
                    }
                ?>
                <label><strong>E-mail</strong></label>
                <input type="email" name="email" placeholder="Digite o seu e-mail" value="<?php echo $email; ?>"><br>
            </div>           
        </fieldset>
        <fieldset class="grupo">
            <div class="campo">        
                <?php 
                    $assunto = "";
                    if(isset($dados['assunto'])){
                        $assunto = $dados['assunto'];
                    }
                ?>
                <label><strong>Assunto</strong></label>
                <input type="text" name="assunto" placeholder="Assunto da mensagem" value="<?php echo $assunto; ?>"><br>

                <?php 
                    $conteudo = "";
                    if(isset($dados['conteudo'])){
                        $conteudo = $dados['conteudo'];
                    }
                ?>
                <label><strong>Conteúdo</strong></label>
                <textarea name="conteudo" rows="3" cols="30" placeholder="Conteúdo da mensagem" id="experiencia"><?php echo $conteudo; ?></textarea><br>
            </div>           
        </fieldset>
            <button type="submit" name="AddMsgCont" value="Enviar" class="botao">Enviar</button><br>
        </form>


</body>
</html>

<!--
    Autor: Daniel Oliveira
    Email: danieloliveira.webmaster@gmail.com
    Manaus/Amazonas
    28/02/2022
-->