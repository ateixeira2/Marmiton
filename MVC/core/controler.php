<?php
	/**
	* 
	*/
	/**
	* 
	*/
	class Controler
	{

		var $vars = array();
		var $layout = 'default';
		
		function __construct()
		{
			# code...
		}

		//function permettant d'appeler la vue
		function render($filename){
			extract($this->vars);

			ob_start();
			//on appel la vue
			require(ROOT.'views/'.get_class($this).'/'.$filename.'.php');
			$content_for_layout = ob_get_clean();
			if($this->layout==false){
				echo $content_for_layout;
			} else {
				require(ROOT.'views/layout/'.$this->layout.'.php');
			}

		}


		//function pour passer des valeurs
		function set($d){
			$this->vars = array_merge($this->vars , $d);
		}

		//function permettant de charger le model
		function loadModel($name){
			require_once(ROOT.'models/'.strtolower($name).".php");
			$this->$name = new $name;
		}
	}
?>