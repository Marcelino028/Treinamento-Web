<?php
    include('../../Connections/connpdo.php');;

    
    $resposta = ['ok' => false, 'msg' => ''];

    $nome_cliente = $_POST['nome'];
    $email_cliente = $_POST['email'];
    $telefone_cliente = $_POST['telefone'];
    $rua_cliente = $_POST['rua'];
    $numero_cliente = $_POST['numero']; 
    $bairro_cliente = $_POST['bairro'];
    $complemento_cliente = $_POST['complemento'];
    $cidade_cliente = $_POST['cidade'];
    $estado_cliente = $_POST['estado'];
 
    $cpf_cliente = $_POST['cpf'];
    $status_cliente = 1;

    
    if(filter_var($email_cliente, FILTER_VALIDATE_EMAIL) == true) {
        $email_valido = true;
    } else {
        $email_valido = false;  
    }

    function validaCPF($cpf) { 
        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            return false;
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }
    
    $cpfValido = validaCPF($cpf_cliente);


    try {
        $valida_cpf = $conn->prepare(
            "SELECT
            *
            FROM
                clientes
            WHERE
                cpf_cliente = :cpf_cliente"

        );
        $valida_cpf->bindParam(':cpf_cliente', $cpf_cliente);
        $valida_cpf->execute();

        $valida_email = $conn->prepare(
            "SELECT
            *
            FROM
                clientes
            WHERE
            email_cliente = :email_cliente"

        );
        $valida_email->bindParam(':email_cliente', $email_cliente);
        $valida_email->execute();


        if($valida_cpf->rowCount() > 0) {
            throw new Exception('Já existe um Cliente com este CPF!');
        }

        if($valida_email->rowCount() > 0) {
            throw new Exception('Já existe um Cliente com este Email!');
        }

        if($cpfValido == false) {
            throw new Exception('CPF inválido');
        }

        if($email_valido == false) {
            throw new Exception('Email inválido');
        }

        $insert = $conn->prepare(
            "INSERT INTO 
            clientes
            (nome_cliente, cpf_cliente, email_cliente, status_cliente, telefone_cliente, rua_cliente, numero_cliente, bairro_cliente, complemento_cliente, cidade_cliente, estado_cliente)
            VALUES
            (:nome_cliente, :cpf_cliente, :email_cliente, :status_cliente, :telefone_cliente, :rua_cliente, :numero_cliente, :bairro_cliente, :complemento_cliente, :cidade_cliente, :estado_cliente)"
        );

       
        $insert->bindParam(':nome_cliente', $nome_cliente);
        $insert->bindParam(':cpf_cliente', $cpf_cliente);
        $insert->bindParam(':email_cliente', $email_cliente);
        $insert->bindParam(':status_cliente', $status_cliente);
        $insert->bindParam(':telefone_cliente', $telefone_cliente);
        $insert->bindParam(':rua_cliente', $rua_cliente);
        $insert->bindParam(':numero_cliente', $numero_cliente);
        $insert->bindParam(':bairro_cliente', $bairro_cliente);
        $insert->bindParam(':complemento_cliente', $complemento_cliente);
        $insert->bindParam(':cidade_cliente', $cidade_cliente);
        $insert->bindParam(':estado_cliente', $estado_cliente);
        
        $resposta['ok'] = true;
        $resposta['msg'] = "Cliente salvo com sucesso";
        $insert->execute();

    } catch (Exception $e) {

        $resposta['msg'] = $e->getMessage();
    }
    echo json_encode($resposta);
?>