<?php
@include_once 'bean/cliente.php';
require_once 'banco.php';

class ClienteDAO extends Banco{
    public function listaClientes(){
        $conexao = $this->abreConexao();
        
        $sql = "SELECT * FROM ".TBL_CLIENTE;
        
        $banco = $conexao->query($sql);
        
        $linhas = array();
        while($linha = $banco->fetch_assoc()){
            $linhas[] = $linha;
        }
        
        return $linhas;
        
        $this->fechaConexao();
    }
}

$objClienteDao = new ClienteDAO();