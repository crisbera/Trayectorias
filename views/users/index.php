<div class="row">
	<div class="divcol-xs-12">
		<h2>Listado de usuarios</h2>	
	</div>
</div>

<div class="row">
	<div class="col-xs-2">
		<h4>Barra</h4>
	</div>
	<div class="col-xs-10">
		<div class="table-responsive">
		<table class="table table-striped">
			<tr>
				<th>ID</th>
				<th>Username</th>
				<th>Type</th>
				<th>Action</th>
			</tr>
			
		<?php foreach ($users as $user): ?>
			<tr>
				<td><?php echo $user["users"]["id"]; ?></td>
				<td><?php echo $user["users"]["username"]; ?></td>
				<td><?php echo $user["types"]["name"]; ?></td>
				<td>
					

					<?php 
					
						echo $this->Html->link(
							"<span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span>",
							array(	
								"controller"=>"users",
								"method"=>"edit",
								"args" =>$user["users"]["id"]
							),
							array(
								"title"=>"Editar usuario",
								"target"=>"_blank"	
							)
						); 
						echo $this->Html->link(
							"<span class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"></span>", 
							"/users/delete/".$user["users"]["id"]
						);
					?>
				</td>
			</tr>

		<?php endforeach; ?>
		</table>
		</div>		
	</div>
</div>

