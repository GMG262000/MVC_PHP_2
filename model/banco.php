<?php

require_once("../init.php");

class banco{
    protected $mysqli;

    public function __construct(){
        $this->conxeao ();
    }
    private function conexao(){
        $this->mysqli =  new mysqli(BD_SERVIDOR,BD_USUARIO,BD_SENHA,BD_BANCO);
    }
    public function setLIvro($)

}

require_once("../init.php");
class Banco{

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(BD_SERVIDOR, BD_USUARIO , BD_SENHA, BD_BANCO);
    }

    public function getLivro(){
        $result = $this->mysqli->query("SELECT * From livros where nome='$id'");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }

    public function getLivro(){
        $result = $this->mysqli->query("SELECT * From livros");
        while($row = $result->fetch_array(MYSQLI_ASSOC)){
            $array[] = $row;
        }
        return $array;

    }


    public function setLivro($nome,$autor,$quantidade,$preco,$data){
        $stmt = $this->mysqli->prepare("INSERT INTO livros(`nome`,`autor`,`quantidade`,`preco`,`flag`,`data`)VALUES(?,?,?,?,?)");
        $stmt->bind_param("");
         if( $stmt->execute() == TRUE){
            return true ;
        }else{
            return false;
        }

    }

    public function updateLivro($nome,$autor,$quantidade,$preco,$data,$id){
        $stmt = $this->mysqli->prepare("UPDATE `livros` SET `nome`=?, `autor`=?, `quantidade`=?, `preco`=?, `flag`=?, `data`=? WHERE `nome`=?");
        $stmt->bind_param($nome,$autor,$quantidade,$preco,$data, $id);
        if( $stmt->execute() == TRUE ){
            return true;
        }else{
            return false;
        }
    }

    public function deleteLivros($id){
        if( $this->mysqli->query("DELETE From livros Where `NOME`='".$id."';") == TRUE ){
            return true;
        }else{
         return false;
        }       

    }         

}
?>