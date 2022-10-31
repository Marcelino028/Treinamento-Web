<?php
// Classe para tratar da listagem das funções dos usuários JVM 17/10/22

class ClassUsuarios
{
	public static function listar($conn, $filtro_perfil,$filtro_status,$filtro_inicio,$filtro_fim)
	{

        if($filtro_inicio) {
            $exp_inicio = explode("/", $filtro_inicio);
            $filtro_inicioUS = $exp_inicio[2] . "-" . $exp_inicio[1] . "-" . $exp_inicio[0];
            $where_inicio = " AND data_cadastro_usuario >= '$filtro_inicioUS'";
            $possui_inicio = 1;
        } else {
            $where_inicio = "";
            $possui_inicio = 0;
        }
        
        if($filtro_fim) {
            $exp_fim = explode("/", $filtro_fim);
            $filtro_fimUS = $exp_fim[2] . "-" . $exp_fim[1] . "-" . $exp_fim[0];
            $where_fim = " AND data_cadastro_usuario <= '$filtro_fimUS'";
            $possui_fim = 1;
        } else {
            $where_fim = "";
            $possui_fim = 0;
        }
        
        if(($possui_inicio == 1) && ($possui_fim == 1)) {
            if(strtotime($filtro_inicioUS) > strtotime($filtro_fimUS)) {
                echo "0_Filtro Início Maior que Filtro Fim!";
                return false;
            }
        }
        
        if($filtro_status != '') {
            $where_status = "WHERE status_usuario = $filtro_status";
        } else {
            $where_status = "WHERE status_usuario IN (0, 1)";   
        }
       
        if($filtro_perfil) {
            $where_perfil = " AND perfil_usuario = $filtro_perfil";
        } else {
            $where_perfil = "";   
        }
        
        
        $busca = $conn->prepare("
            SELECT * FROM usuarios
            INNER JOIN perfis ON (usuarios.perfil_usuario = perfis.id_perfil)
            $where_status
            $where_perfil
            $where_inicio
            $where_fim
        ");
   
        try {
            $busca->execute();
        } catch (PDOException $e) {
            $e->getMessage();
        }

        $dados = array();

        while ($row = $busca->fetch(PDO::FETCH_ASSOC)) {

            $status_usuario = $row['status_usuario'];
 
            if($status_usuario == 1) {
                $nome_status = "Ativo";
                $cor_status = "green";

            } else {
                $nome_status = "Inativo";
                $cor_status = "red";    
            }
            
         
            $dadosBuscaRow = array(
                'id_usuario' => $row['id_usuario'],
                'nome_usuario' => $row['nome_usuario'],
                'status_usuario' => $row['status_usuario'],
                'nome_perfil' => $row['nome_perfil'],
                'bairro_usuario' => $row['bairro_usuario'],
                'rua_usuario' => $row['rua_usuario'],
                'numero_usuario' => $row['numero_usuario'],
                'cpf_usuario' => $row['cpf_usuario'],
                'complemento_usuario' => $row['complemento_usuario'],
                'cidade_usuario' => $row['cidade_usuario'],
                'estado_usuario' => $row['estado_usuario'],
                'telefone_usuario' => $row['telefone_usuario'],
                'email_usuario' => $row['email_usuario'],
                'nasc_usuario' => $row['nasc_usuario'],
                'nome_status' => $nome_status,
                'cor_status' => $cor_status
    
			);

			array_push($dados, $dadosBuscaRow);
        }
        
        
        return($dados);

}

}
