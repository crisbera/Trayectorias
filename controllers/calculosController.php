<?php
class CalculosController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		if ($_POST) {
	
			$conditions = array(
				"conditions"=>"cables.id=".$_POST["cable"],
				"fields"=>"id, diametro_exterior"
				);
			$cable = $this->calculos->find("cables", "first", $conditions);
			$cable_tipo = $this->calculos->find("cables_tipos", "first", array("conditions"=>"cables_tipos.id=".$cable["cables_tipos_id"]));
			$radio_cable = $cable["diametro_exterior"]/2;
			$area_cable = 3.1416*($radio_cable*$radio_cable);
			$area_cables = $_POST["numero_cables"] * (3.1416*($radio_cable*$radio_cable));

			if (isset($_SESSION['trayectoria'])) {
				$trayectorias = $_SESSION['cables'];
			}
			
			$cable_seleccion["id"] = $cable["id"];
			$cable_seleccion["cable_tipo"] = $cable_tipo["nombre"];
			$cable_seleccion["nombre"] = $cable["nombre"];
			$cable_seleccion["diametro_exterior"] = $cable["diametro_exterior"];
			$cable_seleccion["numero_cables"] = $_POST["numero_cables"];
			$cable_seleccion["area_cable"] = $area_cable;
			$cable_seleccion["area_cables"] = $area_cables;

			$trayectorias[]["cables"] = $cable_seleccion;

			$this->__registrarTrayectoria($trayectorias);
			$this->redirect(array("controller"=>"calculos", "action"=>"index"));
				
		}
		$this->set("cables", $this->calculos->find("cables", "all", array("conditions"=>"cables.cables_tipos_id=1")));
		$this->set("cables_tipos", $this->calculos->find("cables_tipos", "all"));
		$this->set("charolas_tipos", $this->calculos->find("charolas_tipos", "all"));
		$this->set("tubos", $this->calculos->find("tubos_tipos", "all"));
	}

	public function listarCables(){
		$seleccion = $_POST["elegido"];
		$cables = $this->calculos->find("cables", "all", array("conditions"=>"cables.cables_tipos_id=".$seleccion));
		$opciones = "";
		foreach ($cables as $cable) {
			$opciones .= '
				<option value="'.$cable["cables"]["id"].'">'.$cable["cables"]["nombre"].'</option>
			';
		}

		echo $opciones;
	}

	public function calcularArea(){
		
		$conducto_tipo = $_POST["conducto_tipo"];
		$suma_cables = $_POST["suma_cables"];
		$area_total = $_POST["area_total"];

		if ($conducto_tipo=="tubo") {
			$tubo_tipo = $_POST["tubo_tipo"];

			if (isset($_POST["mobiliario"])) {
				$mobiliario = "si";
			}else{
				$mobiliario = "no";
			}
			
			$this->__calcularAreaTubo($suma_cables, $area_total, $tubo_tipo, $mobiliario);
			$this->redirect(array("controller"=>"calculos", "action"=>"index"));
		}
	}
	private function __calcularAreaTubo($suma_cables, $area_total, $tubo_tipo, $mobiliario){
		$conditions = array(
			"conditions"=>"tubos.tubos_tipos_id=".$tubo_tipo
		);
		$tubos = $this->calculos->find("tubos", "all", $conditions);

		if ($mobiliario=="si") {
			//60%
			foreach ($tubos as $tubo) {
				$radio_tubo = $tubo["tubos"]["diametro_interior"] / 2;
				$area_tubo = 3.1416 * ($radio_tubo*$radio_tubo);
				$area_calculada = ($area_tubo * 60) / 100;
			
				if ($area_calculada >= $area_total) {
					$tubo_seleccion["nombre"] = $tubo["tubos"]["nombre"];
					$tubo_seleccion["tamano_comercial"] = $tubo["tubos"]["tamano_comercial"];
					$tubo_seleccion["diametro_interior"] = $tubo["tubos"]["diametro_interior"];
					$tubo_seleccion["area_tubo"] = $area_tubo;
					$tubo_seleccion["area_porcentaje"] = "60%";
					$tubo_seleccion["area_calculada"] = $area_calculada;
					$this->__registrarTubo($tubo_seleccion);
					break;
				}
			}			
		}else{
			if ($suma_cables==1) {
				//53%
				foreach ($tubos as $tubo) {
					$radio_tubo = $tubo["tubos"]["diametro_interior"] / 2;
					$area_tubo = 3.1416 * ($radio_tubo*$radio_tubo);
					$area_calculada = ($area_tubo * 53) / 100;
				
					if ($area_calculada >= $area_total) {
						$tubo_seleccion["nombre"] = $tubo["tubos"]["nombre"];
						$tubo_seleccion["tamano_comercial"] = $tubo["tubos"]["tamano_comercial"];
						$tubo_seleccion["diametro_interior"] = $tubo["tubos"]["diametro_interior"];
						$tubo_seleccion["area_tubo"] = $area_tubo;
						$tubo_seleccion["area_porcentaje"] = "53%";
						$tubo_seleccion["area_calculada"] = $area_calculada;
						$this->__registrarTubo($tubo_seleccion);
						break;
					}
				}
			}elseif($suma_cables==2){
				//31%
				foreach ($tubos as $tubo) {
					$radio_tubo = $tubo["tubos"]["diametro_interior"] / 2;
					$area_tubo = 3.1416 * ($radio_tubo*$radio_tubo);
					$area_calculada = ($area_tubo * 31) / 100;
				
					if ($area_calculada >= $area_total) {
						$tubo_seleccion["nombre"] = $tubo["tubos"]["nombre"];
						$tubo_seleccion["tamano_comercial"] = $tubo["tubos"]["tamano_comercial"];
						$tubo_seleccion["diametro_interior"] = $tubo["tubos"]["diametro_interior"];
						$tubo_seleccion["area_tubo"] = $area_tubo;
						$tubo_seleccion["area_porcentaje"] = "31%";
						$tubo_seleccion["area_calculada"] = $area_calculada;
						$this->__registrarTubo($tubo_seleccion);
						break;
					}
				}				
			}elseif ($suma_cables>=3) {
				//40%
				
				foreach ($tubos as $tubo) {
					$radio_tubo = $tubo["tubos"]["diametro_interior"] / 2;
					$area_tubo = 3.1416 * ($radio_tubo*$radio_tubo);
					$area_calculada = ($area_tubo * 40) / 100;
				
					if ($area_calculada >= $area_total) {
						$tubo_seleccion["nombre"] = $tubo["tubos"]["nombre"];
						$tubo_seleccion["tamano_comercial"] = $tubo["tubos"]["tamano_comercial"];
						$tubo_seleccion["diametro_interior"] = $tubo["tubos"]["diametro_interior"];
						$tubo_seleccion["area_tubo"] = $area_tubo;
						$tubo_seleccion["area_porcentaje"] = "40%";
						$tubo_seleccion["area_calculada"] = $area_calculada;
						$this->__registrarTubo($tubo_seleccion);
						break;
					}
				}				
			}
		}
	}

	private function __registrarTrayectoria($trayectorias){
		session_start();
		$_SESSION['trayectoria'] = true;
	    $_SESSION['cables'] = $trayectorias;

	    $_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
	}

	public function borrarTrayectorias(){
		// remove all session variables
		session_unset();

		// destroy the session
		session_destroy();

		$this->redirect(array("controller"=>"calculos", "action"=>"index"));
	}

	public function borrarCable($id){
		unset($_SESSION['cables']["$id"]);
		$this->redirect(array("controller"=>"calculos", "action"=>"index"));
	}

	private function __registrarTubo($tubo_seleccion){
		session_start();
		$_SESSION['calculo_tubo'] = true;
	    $_SESSION['tubo_seleccion'] = $tubo_seleccion;

	    $_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (5 * 60) ;
	}

	public function crearXML(){
		
	}

	public function guardarXML(){
		$xmlstr  = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
		$xmlstr .= "<trayectoria>";
		$xmlstr .= "<cables>";

		$area_total = 0;
		$suma_cables = 0;

		foreach ($_SESSION['cables'] as $cable) { 
			$area_total = $area_total+$cable["cables"]["area_cables"];
			$suma_cables = $suma_cables + $cable["cables"]["numero_cables"];
			
			$xmlstr .= "<cable>";
			$xmlstr .= "<nombre>".$cable["cables"]["nombre"]."</nombre>";
			$xmlstr .= "<tipo>".$cable["cables"]["cable_tipo"]."</tipo>";
			$xmlstr .= "<diametro_exterior>".$cable["cables"]["diametro_exterior"]."</diametro_exterior>";
			$xmlstr .= "<area_cable>".$cable["cables"]["area_cable"]."</area_cable>";
			$xmlstr .= "<numero>".$cable["cables"]["numero_cables"]."</numero>";
			$xmlstr .= "<area_cables>".$cable["cables"]["area_cables"]."</area_cables>";
			$xmlstr .= "</cable>";
		}

		$xmlstr .= "<suma>".$suma_cables."</suma>"; 
		$xmlstr .= "<area_total>".$area_total."</area_total>";
		$xmlstr .= "</cables>";
		$xmlstr .= "</trayectoria>";
		
		$data = array(
			"usuario_id"=>1,
			"nombre"=>"Proyecto de prueba",
			"contenido"=>base64_encode($xmlstr)
		);

		$this->calculos->save("proyectos", $data);
	}	
}