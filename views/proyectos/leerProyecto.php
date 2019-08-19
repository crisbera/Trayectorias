<?php

$file = base64_decode($proyecto["contenido"]);

$headerDoc = html_entity_decode($file, ENT_QUOTES, "UTF-8"); 
$xml = new SimpleXMLElement($headerDoc);

?>
<table class="table table-bordered">
	<tr>
		<th>No. de cables</th>
		<th>Cable</th>
		<th>Tipo</th>
		<th>Diámetro exterior</th>
		<th>Área por cable</th>
		<th>Área total</th>
	</tr>
   <?php
   foreach ($xml->cables->cable as $cable){
	?>
    <tr>
    	<td><?php echo $cable->numero; ?></td>
    	<td><?php echo $cable->nombre; ?></td>
    	<td><?php echo $cable->tipo; ?></td>
    	<td><?php echo $cable->diametro_exterior." mm"; ?></td>
    	<td><?php echo $cable->area_cable." mm<sup>2</sup>"; ?></td>
    	<td><?php echo $cable->area_cables." mm<sup>2</sup>"; ?></td>
    </tr>
<?php } ?>
</table>
	
<?php

echo $xml->cables->suma;
echo "<br>";
echo $xml->cables->area_total;

?>
