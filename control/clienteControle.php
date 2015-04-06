<?php
@session_start();

$opcao = $_POST['opcao'];
switch($opcao){
case 'altCliente':
    $idCliente = $_POST['idCliente'];
    $objCliente->setIdCliente($idCliente);
    
    $_SESSION['cliente'] = $objCliente->getIdCliente();
    break;
}