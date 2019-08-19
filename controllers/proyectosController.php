<?php
class ProyectosController extends AppController
{
	public function __construct(){
		parent::__construct();
	}

	public function index(){
		
		$proyectos = $this->proyectos->find("proyectos", "all");

		$this->set("proyectos", $proyectos);
		
	}

	public function leerProyecto($id){
		$conditios = array(
			"conditios"=>"proyectos.id=".$id
		);
		$proyecto = $this->proyectos->find("proyectos", "first", $conditios);
		$this->set("proyecto", $proyecto);
	}
}