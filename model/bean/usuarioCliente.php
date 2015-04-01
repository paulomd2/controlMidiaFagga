<?php
class UsuarioCliente{
    private $idUsuario;
    private $idCliente;
    private $dataCadastro;
    
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
    }
    
    
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function setIdCliente(array $idCliente){
        $idCliente = $idCliente;
    }
}

$objUsuarioCliente = new UsuarioCliente();