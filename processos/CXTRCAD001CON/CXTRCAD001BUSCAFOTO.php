<?php
date_default_timezone_set('America/Sao_Paulo');
session_start();

include('../../Connections/connpdo.php');

$id_usuario = $_POST['id_usuario'];
 
$busca = $conn->prepare("SELECT foto_usuario FROM usuarios WHERE id_usuario = $id_usuario");

try {
    $busca->execute();
} catch (PDOException $e) {
    $e->getMessage();
}

$row = $busca->fetch(PDO::FETCH_ASSOC);

    $foto_usuario = $row['foto_usuario'];

?>

<div class="form-row">
    <div class="col-md-6 offset-md-3" id="div_imagem_usuario">
        <img id="imagem_usuario" style="width: 160px; height: 160px" src="<?php echo $foto_usuario; ?>">
    </div>
</div>
<br>
<br>
<div class="form_row">
    <div class="col-md-12">
        <label for="">Nova Foto</label>
        <input type="file" name="files[]" id="nova_foto" class="form-control">
    </div>
</div>


