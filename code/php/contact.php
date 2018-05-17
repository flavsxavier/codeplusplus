<?php
	include_once "conn.php";
	if ((empty($_POST["nEmail"])) || (empty($_POST["nTexto"]))) {
		header("location: ../index.html");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Enviado...</title>
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=1"/>
	<!-- CSS -->
	<link rel="stylesheet" href="../css/style.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<!-- JS -->
	<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
	<script src="../js/functions.js"></script>
</head>
<body>
	<?php
		// Recebendo dados
		$nome = (empty($_POST["nNome"])) ? "Pessoa Qualquer" : utf8_decode($_POST["nNome"]);
		$email = $_POST["nEmail"];
		$option = $_POST["nOpt"];
		$texto = $_POST["nTexto"];
		// Enviando os dados
		$contato = $conn->prepare("INSERT INTO cp_contato (id, nome, email, opcao, texto) VALUES ('', :nome, :email, :opcao, :texto)");
		$contato->bindValue(":nome", $nome);
		$contato->bindValue(":email", $email);
		$contato->bindValue(":opcao", $option);
		$contato->bindValue(":texto", $texto);
		$contato->execute();
		// Enviar Email
		$to = "flaviano.pxjunior@gmail.com";
		$subject = ucfirst($option);
		$msg = "
			<!DOCTYPE html>
			<html lang='pt-br'>
			<head>
				<title>Code++</title>
				<meta charset='utf-8' name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
				<!-- CSS -->
				<link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
				<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css'>
				<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.9/css/all.css' integrity='sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1' crossorigin='anonymous'>
				<!-- JS -->
				<script src='http://code.jquery.com/jquery-3.3.1.min.js' integrity='sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=' crossorigin='anonymous'></script>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js'></script>
			</head>
			<body>
				<div class=' card'>
					<div class=' card-content'>
						<span class=' card-title'>Code++</span>
						<p>Obrigado por entrar em contato, iremos retornar o mais rápido possível.</p>
					</div>
					<div class=' card-action'>
						<a href='http://www.codeplusplus.cf' target='_blank' class=' btn waves-effect waves-light'>Ir Para Site</a>
					</div>
				</div>
			</body>
			</html>
		";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'To: Code++ <flaviano.pxjunior@gmail.com>';
		$headers .= 'From: < ' . $email . '>' . "\r\n";
		mail($to, $subject, $msg, $headers);
		echo "
			<div class='modal' id='contato-modal'>
				<div class='modal-content'>
					<h4>Code++</h4>
					<p>Obrigado por entrar em contato, iremos retornar o mais rápido possível.</p>
				</div>
				<div class='modal-footer'>
					<a href='#!' class='modal-action modal-close waves-effect waves-green btn-flat contato-modal-close'>Fechar</a>
				</div>
			</div>
		";
	?>
</body>
</html>