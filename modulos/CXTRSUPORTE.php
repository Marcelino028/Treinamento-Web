<?php
/* CXTRSUPORTE - JVM 26/10/22 - Tela do Suporte */


include("menu.php");

require '../../treinamento_inicial/processos/CXTRSUPORTE/CXTRSUPORTESEND.php';


?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suporte</title>
    
    <!-- Jquery AND Sweetalert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.35/dist/sweetalert2.all.min.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <!-- Scripts VUE -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

</head>
<body id="page-top" style=" overflow: hidden;">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">   
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Contatar Suporte</h1>
                    </div>

                    <div id="div_cadastro">
                        <div class="container">
                            <div class="row" style="margin-bottom: 700px;">
                                <div class="card shadow mb-5" style="width: 600px; margin-left: 250px; height: 450px;">
                                    <br>
                                    <br>

                                    <div class="col-md-12 formulario">
                            
                                        <form class="needs-validation" name="add_msg" action="" method="POST" novalidate>
                                            <div class="row">
                                    
                                          
                                                <div class="col-md-6">
                                                    <label for="">Nome Completo</label>
                                                    <input type="text" id="name" name="name" class="form-control obrigatorios" required value="<?php
                                                    if (isset($data['name'])) {
                                                        echo $data['name'];
                                                    }
                                                    ?>" required>
                                                    <div class="invalid-feedback">
                                                        Preencha o seu Nome!
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Email cadastrado no sistema</label>
                                                    <input type="email" id="email" name="email" class="form-control obrigatorios" required value="<?php
                                                    if (isset($data['email'])) {
                                                        echo $data['email'];
                                                    }
                                                    ?>" required>
                                                    <div class="invalid-feedback">
                                                        Preencha o seu Email!
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <br>
                                                    <label for="">Assunto</label>
                                                    <input type="email" name="subject" id="subject" class="form-control obrigatorios" required value="<?php
                                                    if (isset($data['subject'])) {
                                                        echo $data['subject'];
                                                    }
                                                    ?>" required>
                                                    <div class="invalid-feedback">
                                                        Preencha o Assunto!
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-4">
                                                    <br>
                                                    <label for="exampleFormControlTextarea1">Conteudo</label>
                                                    <textarea name="content" id="content" rows="3"  class="form-control obrigatorios" value="<?php
                                                    if (isset($data['content'])) {
                                                        echo $data['content'];
                                                    }
                                                    ?>" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Preencha o Conteudo
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="offset-md-4 col-md-4">
                                                    <button class="btn btn-success" ttype="submit" value="Enviar" name="SendAddMsg" style="width: 100%;">Enviar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>                                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>



</html>