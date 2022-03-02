<?php
session_start();
include_once './conexao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação com Javascript</title>
    <!--<link rel="stylesheet" href="css/style.css">-->
    <link rel="shortcut icon" href="img/php.ico"/>
</head>
<body>

         <h2>Formulário de Contato</h2>

        <?php
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            

            if(!empty($dados['AddMsgCont'])){

                 //validar cada campo individual
                 if(empty($dados['nome'])){
                    $_SESSION['smg'] = "<p style='color: #f00;'>Erro: Necessário preencher o campo nome!<p/>";
                }elseif(empty($dados['email'])){
                    $_SESSION['smg'] = "<p style='color: #f00;'>Erro: Necessário preencher o campo email!<p/>";
                }elseif(empty($dados['assunto'])){
                    $_SESSION['smg'] = "<p style='color: #f00;'>Erro: Necessário preencher o campo assunto!<p/>";
                }elseif(empty($dados['conteudo'])){
                    $_SESSION['smg'] = "<p style='color: #f00;'>Erro: Necessário preencher o campo conteúdo!<p/>";
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
                        $_SESSION['smg'] = "<p style='color: green;'>Mensagem enviada com sucesso!<p/>";
                    }else {
                        $_SESSION['smg'] = "<p style='color: #f00;'>Erro: Mensagem  não foi enviada!<p/>";
                    }
                }
            }

            if(isset($_SESSION['msg'])){
                echo "<span id='msgAlerta'>". $_SESSION['msg'] ."</span>";
                unset($_SESSION['msg']);
            }else {
                echo "<span id='msgAlerta'></span>";
            }
        
        ?>

        <span id="msgAlerta"></span>

        <form action="" method="POST" id="cadMsgCont">
            
            <?php 
                $nome = "";
                if(isset($dados['nome'])){
                    $nome = $dados['nome'];
                }
            ?>
            <label>Nome: </label>
            <input type="text" name="nome" id="nome" placeholder="Nome completo" value="<?php echo $nome; ?>" required><br><br>
            
            <?php 
                $email = "";
                if(isset($dados['email'])){
                    $email = $dados['email'];
                }
            ?>
            <label>E-mail: </label>
            <input type="email" name="email" id="email" placeholder="Digite o seu e-mail" value="<?php echo $email; ?>" required><br><br>

            <?php 
                $assunto = "";
                if(isset($dados['assunto'])){
                    $assunto = $dados['assunto'];
                }
            ?>
            <label>Assunto: </label>
            <input type="text" name="assunto" id="assunto" placeholder="Assunto da mensagem" value="<?php echo $assunto; ?>"  required><br><br>

            <?php 
                $conteudo = "";
                if(isset($dados['conteudo'])){
                    $conteudo = $dados['conteudo'];
                }
            ?>
            <label>Conteúdo: </label>
            <textarea name="conteudo" id="conteudo" rows="3" cols="30" placeholder="Conteúdo da mensagem" required><?php echo $conteudo; ?></textarea><br><br>

            <button type="submit" name="AddMsgCont" value="Enviar">Enviar</button><br><br>
        </form>


        <script src="js/custom.js"></script>

</body>
</html>

<!--
    Autor: Daniel Oliveira
    Email: danieloliveira.webmaster@gmail.com
    Manaus/Amazonas
    28/02/2022
-->