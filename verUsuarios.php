<article>
    <aside>
        <a href="cadUsuario.php" >Cadastrar Usuário</a>        
    </aside>
    <table>
        <thead>
            <tr>
                <td>Nome</td>
                <td>Login</td>
                <td>Email</td>
                <td>Nível</td>
                <td>Alterar</td>
                <td>Excluir</td>
            </tr>
        <tbody>
            <?php
                include_once 'verUsuariosAjax.php';
            ?>
        </tbody>

        </thead>
    </table>
</article>