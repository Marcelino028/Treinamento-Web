<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();


include('../../Connections/connpdo.php');
include('../../classes/ClassUsuarios.php');
include('../../classes/AwsPutObject.php');
include('../../classes/KeysAmazon.php');



$user = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil_usuario'];
$filtro_perfil = $_POST['filtro_perfil'];
$filtro_status = $_POST['filtro_status'];
$filtro_inicio = $_POST['filtro_inicio'];
$filtro_fim = $_POST['filtro_fim'];


$busca = ClassUsuarios::listar($conn, $filtro_perfil,$filtro_status,$filtro_inicio,$filtro_fim);

?>

<style>
    .table tr{
        font-size: 15px;
        text-align: center;  
    }

  

</style>

<style type="text/css">
 th {
    min-width: 200px;
    
  }
</style>



<table id="tab_grid" class="table table-striped table-bordered">
    <thead>
        <tr style=" text-align: center;">
            <th>
                <center>#</center>
            </th>
            <th>
                <center>Código</center>
            </th>
            <th>
                <center>Nome</center>
            </th>
            <th>
                <center>Perfil</center>
            </th>
            <th>
                <center>CPF</center>
            </th>
            <th>
                <center>Telefone</center>
            </th>
            <th>
                <center>Email</center>
            </th>
            <th>
                <center>Rua</center>
            </th>
            <th>
                <center>Numero</center>
            </th>
            <th>
                <center>Cidade</center>
            </th>
            <th>
                <center>Bairro</center>
            </th>
            <th>
                <center>Complemento</center>
            </th>
            <th>
                <center>Nascimento</center>
            </th>

            <th>
                <center>Status</center>
            </th>

        </tr>
    </thead>

    <tbody>
        <?php
            $qtd_registros = count($busca);
            

            for($i = 0; $i < $qtd_registros; $i++){

                ?>

                <tr>
                    <td>
                        <button id="<?php echo $busca[$i]['id_usuario']; ?>" type="button" class="btn btn-danger btnDesativar btn-sm mb-2">
                            <i class="fa fa-close"></i>
                        </button>
                        <button id="<?php echo $busca[$i]['id_usuario']; ?>" type="button" class="btn btn-warning btnEditar btn-sm mb-2">
                            <i class="fa fa-edit"></i>
                        </button>
                        <button id="<?php echo $busca[$i]['id_usuario']; ?>" type="button" class="btn btn-info btnFoto btn-sm mb-2">
                            <i class="fa fa-camera"></i>
                        </button>
                    </td>
                    
                    <td><?php echo $busca[$i]['id_usuario'];?></td>
                    <td><?php echo $busca[$i]['nome_usuario']; ?></td>
                    <td><?php echo $busca[$i]['nome_perfil']; ?></td>
                    <td><?php echo $busca[$i]['cpf_usuario']; ?></td>
                    <td><?php echo $busca[$i]['telefone_usuario'];?></td>
                    <td><?php echo $busca[$i]['email_usuario']; ?></td>
                    <td><?php echo $busca[$i]['rua_usuario']; ?></td>
                    <td><?php echo $busca[$i]['numero_usuario']; ?></td>
                    <td><?php echo $busca[$i]['cidade_usuario']; ?></td>
                    <td><?php echo $busca[$i]['bairro_usuario']; ?></td>
                    <td><?php echo $busca[$i]['complemento_usuario']; ?></td>
                    <td><?php echo $busca[$i]['nasc_usuario']; ?></td>
                    <td>
                        <b>
                            <font color ="<?php echo $busca[$i]['cor_status']; ?>">
                                <?php echo $busca[$i]['nome_status']; ?>
                            </font>
                        </b>
                    </td>

                </tr>
                <?php
            }
        ?>
        

    </tbody>

</table>

<script src="js/consultas/CXTRCAD001CON/CXTRCAD001ACOES.js?time=<?php echo time(); ?>"></script>