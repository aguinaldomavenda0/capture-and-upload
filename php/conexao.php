<?php

class conexao{
    
    public static function conectar(){
        $host = "localhost";
        $user = "root";
        $senha = "";
        $db = "outubro";
        try {
            //code...
            $con = new PDO('mysql:host=localhost;dbname=test','root','');
            return $con;
        } catch (Exception $e) {
            echo("Erro encontrado: ".$e->getMessage());
        }
    }


}
/*
$conexao = Conexao::conectar();
$query = $conexao->prepare("Select *from outubro");
$query->execute();
var_dump($query->fetchAll());*/

?>