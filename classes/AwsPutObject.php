<?php
/*
CLASSE: AwsPutObject
Envia um objeto via Put para o servidor AWS
*/

class AwsPutObject
{
	public static function enviar($conn, $pasta, $objeto, $nome_objeto, $delimitador_pastas)
	{

		if(!class_exists("KeysAmazon")){
			include($delimitador_pastas . "classes/KeysAmazon.php");
		}
		require $delimitador_pastas . 'vendor_AWS/autoload.php';

		$classeObterKeys = new KeysAmazon();
		$response_keys = $classeObterKeys->obterKeys($conn);
		$exp_keys = explode("_?_", $response_keys);

		$access_key = $exp_keys[0];
		$secret_key = $exp_keys[1];
		$bucket = $exp_keys[2];

		$credentials = new Aws\Credentials\Credentials($access_key, $secret_key);

		try {
			//Create a S3Client
			$s3Client = new Aws\S3\S3Client([
				'version'     => 'latest',
				'region'      => 'sa-east-1', //escolher a região conforme o cadastro do usuário (sa-east-1 = América São Paulo)
				'credentials' => $credentials
			]);

			if($pasta == "") {
				//quero inserir na raiz do bucket
				$caminho = $nome_objeto;
			}
			else {
				$caminho = $pasta . "/" . $nome_objeto;
			}

			$result = $s3Client->putObject([
				'Bucket' => $bucket,
				'Key' => $caminho,
				'SourceFile' => $objeto,
			]);
		

	
			// $result = $s3Client->putObject([
			// 	'Bucket' => $bucket,
			// 	// 'Key' => $pasta . "/" . $nome_objeto,
			// 	'Key' => $nome_objeto,
			// 	'SourceFile' => $objeto,
			// ]);
		

			$retorno = $result['ObjectURL'];
			$status = 1;
		
		} catch (S3Exception $e) {
			$retorno =  $e->getMessage() . "\n";
			$status = 0;

		}

		return $status . "_?_" . $retorno;

	}

}


?>