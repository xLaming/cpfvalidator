<!DOCTYPE html>
<html>
<head>
	<title>CPF Validator</title>
</head>
<body>
	<div align="center">
		<form action="#" method="POST">
			CPF:<br>
			<input type="text" name="cpf" placeholder="123.456.789-00">
			<br>
			<input type="submit" value="Validar">
		</form>
		<?php
		if (isset($_POST['cpf']))
		{
			require_once('class.CPFValidator.php');

			$cpf = new CPFValidator();
			$validate = $cpf->validate($_POST['cpf']);
			$message  = $validate == true ? 'CPF Valido!' : 'CPF Invalido!';

			echo "<br> <strong>{$message}</script>";
		}
		?>
		<br><br>
		<a href="https://github.com/xlaming/cpfvalidator">CPFValidator - Open Source</a>
	</div>
</body>
</html>
