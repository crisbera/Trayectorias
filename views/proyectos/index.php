<h2>Listado de proyectos</h2>

<table>
	<tr>
		<td>Nombre</td>
	</tr>
<?php foreach ($proyectos as $proyecto): ?>
	<tr>
		<td><a href="<?php echo APP_URL."/proyectos/leerProyecto/".$proyecto["proyectos"]["id"]; ?>">
			<?php echo $proyecto["proyectos"]["nombre"]; ?>
			</a>
		</td>
	</tr>		
<?php endforeach; 
	?>
</table>