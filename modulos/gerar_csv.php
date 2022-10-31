<?php

ob_start();

include_once 'conexao.php';

$query_usuarios = "SELECT id_usuario, nome_usuario, email_usuario, perfil_usuario, telefone_usuario, rua_usuario, numero_usuario,
bairro_usuario, cidade_usuario, estado_usuario, complemento_usuario, nasc_usuario, cpf_usuario FROM usuarios ORDER BY id_usuario DESC";

$result_usuarios = $conn->prepare($query_usuarios);

$result_usuarios->execute();

if(($result_usuarios) and ($result_usuarios->rowCount() != 0)){

    header('Content-Type: text/csv; charset=utf-8');

    header('Content-Disposition: attachment; filename=usuarios.csv');

    $resultado = fopen("php://output", 'w');
    $cabecalho = ['id', 'Nome', 'E-mail','Perfil', 'Telefone', 'Numero', 'Bairro', 'Cidade', 'Estado', 'Complemento', 'Data de Nascimento', 'CPF',  mb_convert_encoding('Endereço', 'ISO-8859-1', 'UTF-8')];

    fputcsv($resultado, $cabecalho, ';');

    // Ler os registros retornado do banco de dados
    while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){

        // Escrever o conteúdo no arquivo
        fputcsv($resultado, $row_usuario, ';');

    }

    // Fechar arquivo
    //fclose($resultado);
}else{ // Acessa O ELSE quando não encontrar nenhum registro no BD
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Nenhum usuário encontrado!</p>";
    header("Location: index.php");
}