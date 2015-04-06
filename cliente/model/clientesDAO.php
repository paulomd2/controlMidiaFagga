<?php

require_once 'banco.php';
require_once 'bean/cliente.php';

class ClienteDAO extends Banco {

    public function listaClientes(Cliente $objCliente) {
        $conexao = $this->abreConexao();

        $sql = "
                SELECT c.*, GROUP_CONCAT(uc.idCliente)
                    FROM ".TBL_REL_USUARIO_CLIENTE." uc
                    JOIN ".TBL_CLIENTE." c
                        WHERE uc.idUsuario = ".$objCliente->getIdCliente()."
                        GROUP BY c.idCliente
               ";

        $banco = $conexao->query($sql);

        $linhas = array();
        while ($linha = $banco->fetch_assoc()) {
            $linhas[] = $linha;
        }

        return $linhas;
    }

}

$objClienteDao = new ClienteDAO();
