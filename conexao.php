<?php

//Inicio da cnexão com o banco de dados utilizando PDO
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "form-contato_base-dados";
$port = "3306";

try {
    //Conexão com a porta
   //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);

    //Conexão sem a porta
   $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

   //echo "Conexão com o banco de dados realizada com sucesso!";
} catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado "
    . $err->getMessage();
}

?>