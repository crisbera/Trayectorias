<div class="form-group row">
	<div class="col-xs-12">
		<h2>Trayectorias</h2>
		<hr>
	</div>	

<form action="<?php echo APP_URL; ?>/calculos" method="POST" name="formulario1">

  <div class="col-xs-12 col-sm-2">
    <label for="numero_cables">Número de cables</label>
    <input type="number" name="numero_cables" class="form-control" value="1" min="1">
  </div>
  <div class="col-xs-12 col-sm-3">
		<label for="cable_tipo">Tipo de cable</label>
		<select name="cable_tipo" id="cable_tipo" class="form-control">
			<?php foreach ($cables_tipos as $tipo): ?>
				<option value="<?php echo $tipo["cables_tipos"]["id"]; ?>">
					<?php echo $tipo["cables_tipos"]["nombre"]; ?>
				</option>
			<?php endforeach; ?>
		</select>
  </div>
  <div class="col-xs-12 col-sm-3">
		<label for="cable">Cable </label>
		<select name="cable" id="cable" class="form-control">
			<?php foreach ($cables as $cable): ?>
				<option value="<?php echo $cable["cables"]["id"]; ?>">
					<?php echo $cable["cables"]["nombre"]; ?>
				</option>
			<?php endforeach; ?>
		</select>
  </div>
 
	<div class="col-xs-12 col-sm-4"><br>  	
		<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Agregar</button>
		<a class="btn btn-warning" href="#" role="button" id="reiniciar">
			<span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
			Reiniciar</a>
			<a class="btn btn-warning" href="#" role="button" id="reiniciar">
			<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
			Configuración</a>	
	</div>

</form>
</div>

<?php 

if(isset($_SESSION['trayectoria'])): 

?>
<div class="row">
	<div class="col-xs-12">	
		<h3>Resumen de cables</h3>
		<div class="table-responsive">
		<table class="table table-bordered">
			<tr>
				<th>No. de cables</th>
				<th>Cable</th>
				<th>Tipo</th>
				<th>Diámetro exterior</th>
				<th>Área por cable</th>
				<th>Área total</th>
				<th>Acción</th>
			</tr>
			<?php
			$area_total = 0;
			$suma_cables = 0;
			$i = 0;
			$indices = array_keys($_SESSION["cables"]);
			foreach ($_SESSION['cables'] as $cable) { 
				$area_total = $area_total+$cable["cables"]["area_cables"];
				$suma_cables = $suma_cables + $cable["cables"]["numero_cables"];
			?>
			<tr>
				<td><?php echo $cable["cables"]["numero_cables"]; ?></td>
				<td><?php echo $cable["cables"]["nombre"]; ?></td>
				<td><?php echo $cable["cables"]["cable_tipo"]; ?></td>
				
				<td><?php echo $cable["cables"]["diametro_exterior"]." mm"; ?></td>
				<td><?php echo number_format($cable["cables"]["area_cable"], 2)." mm<sup>2</sup>"; ?></td>
				<td><?php echo number_format($cable["cables"]["area_cables"], 2)." mm<sup>2</sup>"; ?></td>
				<td><a href="<?php echo APP_URL.'/calculos/borrarCable/'.$indices[$i]; ?>" role="button" id="reiniciar" title="Eliminar">
					<img src="<?php echo APP_URL; ?>/public/img/minus.png" alt="">
				</a></td>
			</tr>
			<?php 
			$i++;
			}
			?>		
		</table>
		<div class="alert alert-success" role="alert">
			<strong>Suma de cables: </strong> <?php echo $suma_cables; ?> |
			<strong>Suma de áreas: </strong><?php echo number_format($area_total, 2); ?> mm<sup>2</sup>
			
		</div>
		<hr>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<h3>Cálculo del conducto</h3>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h4>Tubo</h4></a></li>
		<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h4>Canaleta</h4></a></li>
		<li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab"><h4>Charola</h4></a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane fade in active" id="home">
				<div class="col-xs-12 col-sm-4">
				<form action="<?php echo APP_URL; ?>/calculos/calcularArea" method="POST">
				<input type="hidden" name="conducto_tipo" value="tubo">
				<input type="hidden" name="area_total" value="<?php echo $area_total; ?>">
				<input type="hidden" name="suma_cables" value="<?php echo $suma_cables; ?>"><br>
				<label for="tubo">Tipo</label>
				<select name="tubo_tipo" id="tubo_tipo" class="form-control">
					<?php foreach ($tubos as $tubo): ?>
						<option value="<?php echo $tubo["tubos_tipos"]["id"]; ?>">
							<?php echo $tubo["tubos_tipos"]["nombre"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
				</div>
				<div class="col-xs-12 col-sm-2"><br>
				  	<label for="mobiliario">Mobiliario</label><br>
				  	<input type="checkbox" name="mobiliario" value="si">
				</div>
				<div class="col-xs-12 col-sm-1"><br>
					<input class="btn btn-default" type="submit" value="Calcular">
				</div>
				</form>								    
			</div>
				<div role="tabpanel" class="tab-pane fade" id="profile">
				<div class="col-xs-12 col-sm-4"><br>
				<label for="tubo">Tipo</label>
				<select name="tubo_tipo" id="tubo_tipo" class="form-control">
					<?php foreach ($tubos as $tubo): ?>
						<option value="<?php echo $tubo["tubos_tipos"]["id"]; ?>">
							<?php echo $tubo["tubos_tipos"]["nombre"]; ?>
						</option>
					<?php endforeach; ?>
				</select>
				</div>
				<div class="col-xs-12 col-sm-2">
				  	<label for="mobiliario">Mobiliario</label><br>
				  	<input type="checkbox" name="mobiliario">
				</div>
				<div class="col-xs-12 col-sm-1"><br>
					<button type="button" class="btn btn-primary">Calcular</button>
				</div>								    
				</div>
				<div role="tabpanel" class="tab-pane fade" id="messages">
				<div class="col-xs-12 col-sm-4"><br>
				    <label for="tubo">Tipo</label>
						<select name="tubo_tipo" id="tubo_tipo" class="form-control">
							<?php foreach ($charolas_tipos as $charola): ?>
								<option value="<?php echo $charola["charolas_tipos"]["id"]; ?>">
									<?php echo $charola["charolas_tipos"]["nombre"]; ?>
								</option>
							<?php endforeach; ?>
						</select>    
				</div>
				</div>
		</div>

	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<?php
			if(isset($_SESSION['calculo_tubo'])){
				echo '<div class="alert alert-success" role="alert">';
				echo "<strong>Nombre: </strong>". $_SESSION["tubo_seleccion"]["nombre"]."<br>";
				echo "<strong>Tamaño comercial: </strong>".$_SESSION["tubo_seleccion"]["tamano_comercial"]."''<br>";
				echo "<strong>Diámetro interior: </strong>".$_SESSION["tubo_seleccion"]["diametro_interior"]." mm<br>";
				echo "<strong>Área total: </strong>".number_format($_SESSION["tubo_seleccion"]["area_tubo"],2)." mm<sup>2</sup><br>";
				echo "<strong>Área ".$_SESSION["tubo_seleccion"]["area_porcentaje"].":</strong> ".number_format($_SESSION["tubo_seleccion"]["area_calculada"],2)." mm<sup>2</sup><br>";
				echo '</div>';
		?>
		<form action="<?php echo APP_URL; ?>/calculos/guardarXML" method="POST">
			<button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-file" aria-hidden="true"></span> Guardar XML</button>
		</form>		
	
	<?php	} ?>

	</div>	
</div>
<?php endif; ?>