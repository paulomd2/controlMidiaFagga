<?php

session_start();
require_once '../include/funcoes.php';
require_once '../model/usuarioDAO.php';
require_once '../model/usuarioClienteDAO.php';

$opcao = $_POST['opcao'];
switch ($opcao) {
    case 'verificaLogin':
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);

        $resposta = $objUsuarioDao->verificaLogin($objUsuario);

        $retorno = 0;
        if ($resposta != 0) {
            $_SESSION["codigoAR"] = $resposta['idUsuario'];
            $_SESSION['nivel'] = $resposta['nivel'];

            //se o nível for administrador, o usuário será direcionado para
            //a área de administração
            if ($resposta['nivel'] == 1) {
                $retorno = 'admin.php';
            } else {
                //traz a quantidade de clietens que o usuário possui
                $quantidade = $objUsuarioDao->numClientes($objUsuario);

                if ($quantidade == 1) {
                    //se o usuário só tiver um cliente
                    //redireciona para a página de posts

                    $retorno = 'principal.php';
                } else {
                    //se o usuário tiver mais de um cliente
                    //redireciona para a página de clientes

                    $retorno = 'clientes.php';
                }
            }
        }

        print_r($retorno);
        break;


    case 'cadUsuario':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];
        $clientes = rtrim($_POST['clientes'], ',');

        $clientes = explode(',', $clientes);

        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);

        $idUsuario = $objUsuarioDao->cadUsuario($objUsuario);

        $objUsuarioCliente->setIdCliente($clientes);
        $objUsuarioCliente->setIdUsuario($idUsuario);

        echo $objUsuarioClienteDao->cadRelacionamento($objUsuarioCliente);
        break;

    case 'altUsuario':
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];
        $idUsuario = $_POST['idUsuario'];
        $clientes = rtrim($_POST['clientes'], ',');

        $clientes = explode(',', $clientes);

        $objUsuario->setNome($nome);
        $objUsuario->setEmail($email);
        $objUsuario->setLogin($login);
        $objUsuario->setSenha($senha);
        $objUsuario->setNivel($nivel);
        $objUsuario->setIdUsuario($idUsuario);

        $objUsuarioCliente->setIdCliente($clientes);
        $objUsuarioCliente->setIdUsuario($idUsuario);

        $objUsuarioDao->altUsuario($objUsuario);
        $objUsuarioClienteDao->cadRelacionamento($objUsuarioCliente);
        break;

    case 'delUsuario':
        $idUsuario = $_POST['idUsuario'];
        
        $objUsuario->setIdUsuario($idUsuario);
        
        $objUsuarioDao->delUsuario($objUsuario);
        break;
}
?>