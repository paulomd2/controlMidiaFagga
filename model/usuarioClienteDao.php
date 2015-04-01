<?php
require_once 'bean/usuarioCliente.php';
require_once 'banco.php';

class UsuarioClienteDAO extends Banco{
    public function cadRelacionamento(UsuarioCliente $objUsuarioCliente){
        $conexao = $this->abreConexao();
        
        $sql1 = "DELETE FROM ".TBL_REL_USUARIO_CLIENTE." WHERE idUsuario = ".$objUsuarioCliente->getIdUsuario();
        $conexao->query($sql1);
        
        var_dump($objUsuarioCliente->getIdCliente());
    }
}

$objUsuarioClienteDao = new UsuarioClienteDAO();