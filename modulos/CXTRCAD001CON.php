<?php
/* CXTRCAD001CON - JVM  17/10/22 - CONSULTA */
date_default_timezone_set('America/Sao_Paulo');

ob_start();

include("menu.php");

require("csv.php");



$user = $_SESSION['id_usuario'];
$perfil = $_SESSION['perfil_usuario'];

$data_atual = date("d/m/Y");

?>
<html lang="pt-br">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $_SESSION['nome_sistema']; ?> | Consulta</title>
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
    <meta name="msapplication-tap-highlight" content="no">
    <link href="./main.css" rel="stylesheet">
    <link href="./css/checkbox.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/themes@4.0.5/bootstrap-4/bootstrap-4.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></scrip>
    <script src="js/validarform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body id="page-top">
<?php include('processos/CXTRCAD001CON/modals.php') ?>
    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">   
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Consulta de Usuários</h1>    
                    </div>

                    <div class="card shadow" style="margin-bottom: 700px;">
                  
                        <div class="card-body">
                                <div id="div_filtro">
                                <div class="container"></div>
                         
                                    <div class="form row">
                                        <div class="col-md-4">
                                            <label for="">Perfil</label>
                                            <select name="filtro_perfil" id="filtro_perfil" class="form-control">
                                                <option value="">Escolha...</option>
                                                <?php
                                                    $busca_perfis = $conn->prepare("
                                                        SELECT * FROM perfis
                                                    ");
                                                    try {
                                                        $busca_perfis->execute();
                                                    } catch (PDOException $e) {
                                                        $e->getMessage();
                                                    }

                                                    while($row_perfil = $busca_perfis->fetch(PDO::FETCH_ASSOC)) {

                                                        $id_perfil = $row_perfil['id_perfil'];
                                                        $nome_perfil = $row_perfil['nome_perfil'];

                                                        if($id_perfil == $perfil_usuario) {
                                                            $selected_perfil = "selected";
                                                        } else {
                                                            $selected_perfil = "";
                                                        }

                                                        ?>
                                                            <option <?php echo $selected_perfil; ?> value="<?php echo $id_perfil; ?>"><?php echo $nome_perfil;?></option>
                                                        <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Status</label>
                                            <select name="filtro_status" id="filtro_status" class="form-control">
                                                <option value="">Escolha...</option>
                                                <option value="1">Ativo</option>
                                                <option value="0">Inativo</option>
                                            </select>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Data de Cadastro Inicio</label>
                                        <input type="text"  oninput="mascaraDate(this)"  name="filtro_inicio" id="filtro_inicio" class="form-control"></input>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="">Data de Cadastro Fim</label>
                                            <input type="text"  oninput="mascaraDate(this)"  name="filtro_fim" id="filtro_fim" class="form-control"></input>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="form-row">
                                            <div class="col-md-4 offset-md-5">
                                        
                                                <button @click="filtrarForm()" name="btn_filtrar" id="btn_filtar" class="btn btn-success">
                                                        Filtrar <i class="fa fa-check-circle"></i>
                                                </button>

                                                <button onclick="window.location.href = 'gerar_csv'" name="#" id="#" class="btn btn-primary">
                                                        CSV <i class="fa fa-download" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                    </div>  
                                    
                                        <div class="form-row">
                                            <div class="col-md-4 offset-md-5">
                                              
                                            </div>
                                        </div>

                                     
                                    <br>
                                    <div class="form-row">
                                            <div class="col-md-6 offset-md-3">
                                                <div class="alert alert-danger" id="erro_filtro" style="display: none;"></div>
                                            </div>
                                        </div>
                                    <br>
                                    
                                    <div class="form-row">
                                        <div class="col-md-12">
                                             <center><img id="aguarde" src="<?php echo URL::getBase(); ?>assets/images/gif/aguarde.gif" style="width: 120px; height: 120px; display:none;" /></center>
                                            <div id="resultado_grid" style="overflow:auto; width: 100%"></div>
                                        </div>
                                    </div>
                                </div>

                                
                        
                                <script src="js/consultas/CXTRCAD001CON/CXTRCAD001FILTRO.js?time=<?php echo time(); ?>"></script>
                                
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>
                                <script src="js/maskdata.js"></script>

                                <!-- Bootstrap core JavaScript-->
                                <script src="app/jquery/jquery.min.js"></script>
                                <script src="app/bootstrap/js/bootstrap.bundle.min.js"></script>

                                <!-- Custom scripts for all pages-->
                                <script src="js/sb-admin-2.min.js"></script>
       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
