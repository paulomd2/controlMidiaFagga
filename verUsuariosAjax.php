<?php
require_once './model/usuarioDAO.php';

$usuarios = $objUsuarioDao->listaUsuarios();
foreach ($usuarios as $usuario){
    echo '<tr>
            <td>'.$usuario["nome"].'</td>
            <td>'.$usuario["login"].'</td>
            <td>'.$usuario["email"].'</td>
            <td>'.$usuario["nivel"].'</td>
            <td><a href="altUsuario.php?id='.$usuario["idUsuario"].'">Alterar</a></td>
            <td>Excluir</td>
          </tr>
         ';
}