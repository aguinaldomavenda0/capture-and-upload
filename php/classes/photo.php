<?php

class photo{

    public function add($titulo, $photoBase64){
        $inserir =  Conexao::conectar()->prepare("INSERT INTO `photo`(`id`, `title`, `binaryphoto`) VALUES (null, :title, :binayBase64)");
        $inserir->bindValue(':title',$titulo);
        $inserir->bindValue(':binayBase64',$photoBase64);
        if($this->existe($photoBase64)==0){
            return $inserir->execute();
        }
        else{
            return 0;
        }
    }

    public function existe($binaryphoto){
        $existe = Conexao::conectar()->prepare('SELECT *FROM photo WHERE binaryphoto = :binaryphoto');
        $existe->bindValue(':binaryphoto',$binaryphoto);
        $existe->execute();
        return $existe->rowCount();
    }

    public function all(){
        $existe = Conexao::conectar()->prepare('SELECT *FROM photo');
        $existe->execute();
        return $existe->fetchAll();
    }


    public function read(){
        $existe = Conexao::conectar()->prepare('SELECT *FROM outubro ORDER BY codigo DESC LIMIT 3');
        $existe->execute();
        return $existe->fetchAll();
    }

    public function readNotificacao(){
        $existe = Conexao::conectar()->prepare('SELECT *FROM registos ORDER BY codigo DESC LIMIT 4');
        $existe->execute();
        return $existe->fetchAll();
    }

    
    public function readLimitNotificacao($limite=1){
        $limitador = $limite * 3;
        $existe = Conexao::conectar()->prepare('SELECT *FROM registos ORDER BY codigo DESC LIMIT '.$limitador.',4');
        $existe->execute();
        return $existe->fetchAll();
    }
    
    public function update($dado,$campo,$onde,$valor){
        $existe = Conexao::conectar()->prepare('UPDATE outubro SET '.$campo.' = :'.$campo.' WHERE '.$onde.' = :'.$onde);
        $existe->bindValue(":".$campo,$dado);
        $existe->bindValue(":".$onde,$valor);
        return $existe->execute();
    }

    public function addregistos($nome,$acao){
        $existe = Conexao::conectar()->prepare('INSERT INTO registos(nome, acao) VALUES(:nome, :acao)');
        $existe->bindValue(":nome", $nome);
        $existe->bindValue(":acao", $acao);
        $existe->execute();

    }

    public function readLimit($limite){
        $limitador = $limite * 3;
        $existe = Conexao::conectar()->prepare('SELECT *FROM outubro ORDER BY codigo DESC LIMIT '.$limitador.',3');
        $existe->execute();
        return $existe->fetchAll();
    }

    
    public function readOne($limite){ 
        $existe = Conexao::conectar()->prepare('SELECT *FROM outubro Where telefone = :tt');
        $existe->bindValue(":tt",$limite);
        $existe->execute();
        return $existe->fetch();
    }
    
    public function delete($telefone){
        $existe = Conexao::conectar()->prepare('DELETE FROM outubro WHERE telefone = :telefone');
        $ao = $this->readOne($telefone);
        $this->addregistos($ao['nome']." ".$ao['sobrenome'],"Eliminou-se");
        $existe->bindValue(':telefone',$telefone);
        return $existe->execute();
    }
}