<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Framework Básico
	<?php if ($title) {
		echo "» ".$title;
	}
	?>
		</title>
	<link rel="stylesheet" 
	href="<?php echo $layoutParams["route_css"]; ?>/style.css">
</head>
<body>
<div class="container">
	<nav>
		<ul>
			<li>
				<a href="<?php echo APP_URL; ?>">Inicio</a>
			</li>
			<li>
				<a href="<?php echo APP_URL; ?>/users">Usuarios</a>
			</li>
		</ul>
	</nav>
	<div class="login">Hola <?php echo $_SESSION["username"]; ?>
	| <a href="<?php echo APP_URL."/users/logout"; ?>">Salir</a>
	</div>
	