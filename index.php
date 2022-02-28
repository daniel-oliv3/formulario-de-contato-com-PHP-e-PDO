<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de contato com PHP e PDO</title>
</head>
<body>

    <h2>Formulário de Contato</h2>

    <form action="" method="POST">
        <label>Nome: </label>
        <input type="text" name="nome" placeholder="Nome completo" required><br><br>

        <label>E-mail: </label>
        <input type="email" name="email" placeholder="Digite o seu e-mail" required><br><br>

        <label>Assunto: </label>
        <input type="text" name="assunto" placeholder="Assunto da mensagem" required><br><br>

        <label>Conteúdo: </label>
        <textarea type="text" name="conteudo" placeholder="Conteúdo da mensagem" required></textarea><br><br>
    </form>

</body>
</html>

<!--
    Autor: Daniel Oliveira
    Email: danieloliveira.webmaster@gmail.com
    Manaus/Amazonas
    28/02/2022
-->