<?php
class View
{
	private $_controller;
	private $_method;
	private $_view;
	private $_layout = DEFAULT_LAYOUT;
	private $viewsVars;
	public  $helper = array("Html");

	public function __construct(Request $petition){
		$this->_controller = $petition->getController();
		$this->_method = $petition->getMethod();
		$this->_view = $this->_method;
		$this->loadHelper();
	}

	public function loadHelper(){
		if (!empty($this->helper)) {
			foreach ($this->helper as $key => $value) {
				$this->$value = new $value;
			}
		}
	}

	public function setLayout($layout){
		$this->_layout = $layout;
	} 

	public function setVars($vars){
		if (empty($this->viewsVars)) {
			$this->viewsVars = $vars;
		}else{
			$this->viewsVars = array_merge($this->viewsVars, $vars);
		}
		
	}

	public function render($view){
		if (!empty($this->viewsVars)) {
			extract($this->viewsVars, EXTR_OVERWRITE);
		}
		
		$layoutParams = array(
			"route" 	=> APP_URL."/views/layouts/".$this->_layout,
			"route_css" => APP_URL."/views/layouts/".$this->_layout."/css",
			"route_img" => APP_URL."/views/layouts/".$this->_layout."/img",
			"route_js"  => APP_URL."/views/layouts/".$this->_layout."/js"
		);

		$routeView = ROOT."views".DS.$this->_controller.DS.$view.".php";
		$header = ROOT."views".DS."layouts".DS.$this->_layout.DS."header.php";
		$footer = ROOT."views".DS."layouts".DS.$this->_layout.DS."footer.php";

		if (is_readable($routeView)){
				include_once($header);
				include_once($routeView);
				include_once($footer);
		}else{
			throw new Exception("La vista para el metodo $this->_method no existe", 1);
		}
	}

	public function __destruct(){
		$this->render($this->_view);
	}
}

