<?php

class View{

	function __construct(){


	}

	function render($vista){

		require 'views/'.$vista.'.php';

	}
}

?>