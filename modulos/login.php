<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.35/dist/sweetalert2.all.min.js"></script>

</head>

<body>
       
    <main>
        <div class="container">

            <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">

                    <div class="row justify-content-center formulario">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="card mb-3">
                                <div class="card-body">

                                    <div class="pt-4 pb-2">
                                        <h5 class="card-title text-center pb-0 fs-4">Logar em sua Conta</h5>
                                        <p class="text-center small">Emtre com seu usuário e senha.</p>
                                    </div>

                                    <form action="" class="row g-3" id="form" method="POST">

                                        <div class="col-12">
                                            <label for="yourUsername" class="form-label">Usuario</label>
                                            <div class="input-group has-validation">
                                            
                                                <input type="text" id="usuario" name="usuario" class="form-control">

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <label for="yourPassword" class="form-label">Senha</label>
                                            <div class="input-group has-validation">
                                                
                                                <input type="password" id="senha" name="senha" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col-12"></div>

                                        <div class="col-12">
                                            <button class="btn btn-info w-100 text-white"   id="enviar" name="enviar" type="submit" type="submit">Login</button>
                                        </div>

                                        <div class="col-12">
                                            <p class="small mb-0">Esqueceu a senha? <a  style="color: black; font-weight: 500; text-decoration: none;" href="#">Fale com o Suporte</a></p>
                                        </div>
                                        
                                    </form>
                                    
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
        </div>
    </main>
</body>

    <script src="js/login/scripts.js"></script>

</html>