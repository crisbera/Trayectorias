<?php

//$path = "trayectoria.xml";

$path = ROOT."public".DS."files".DS."trayectoria.xml";

$writer = new XMLWriter();
$writer->openUri($path);
$writer->startDocument('1.0', 'UTF-8'); 

$writer->startElement("trayectoria");
$writer->startElement("cables");
$area_total = 0;
$suma_cables = 0;

foreach ($_SESSION['cables'] as $cable) { 
	$area_total = $area_total+$cable["cables"]["area_cables"];
	$suma_cables = $suma_cables + $cable["cables"]["numero_cables"];
	 
	$writer->startElement("cable");
	$writer->writeElement("nombre", $cable["cables"]["nombre"]);
	$writer->writeElement("tipo", $cable["cables"]["cable_tipo"]);
   	$writer->writeElement("diametro_exterior", $cable["cables"]["diametro_exterior"]);
	$writer->writeElement("area", $cable["cables"]["area_cable"]);
	$writer->writeElement("numero", $cable["cables"]["numero_cables"]);
	$writer->endElement();	
}
$writer->writeElement("suma", $suma_cables);
$writer->writeElement("area_total", $area_total);
$writer->endElement();
$writer->endElement();
$writer->endDocument();
$writer->flush();

?>