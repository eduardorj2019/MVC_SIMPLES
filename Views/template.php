<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style.css">
	<title>Cadastro</title>
</head>
	
<body>
	<div class="container">
		<header>
			<h1>Cadastro Usuário</h1>
		</header>
		<nav>
			<a href="<?php echo BASE_URL;?>">Home</a>
			<a href="<?php echo BASE_URL;?>contato">Contato</a>
		</nav>	
		<?php $this->loadViewInTemplate($viewName, $viewData);?>
	</div>
	<script src="<?php echo BASE_URL;?>assets/js/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="<?php echo BASE_URL;?>assets/js/script.js"></script>
</body>
</html>