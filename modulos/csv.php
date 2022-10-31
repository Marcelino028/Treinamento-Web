<?php

include('conexao.php');


if(isset($_SESSION['msg'])){

   echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}

$query_usuarios = "SELECT id_usuario, nome_usuario, email_usuario, perfil_usuario, telefone_usuario, rua_usuario, numero_usuario,
bairro_usuario, cidade_usuario, estado_usuario, complemento_usuario, nasc_usuario, cpf_usuario FROM usuarios ORDER BY id_usuario DESC";

$result_usuarios = $conn->prepare($query_usuarios);

$result_usuarios->execute();

if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){

}else{ 
    echo "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
}

