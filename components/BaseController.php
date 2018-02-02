<?php 
namespace components;

class BaseController 
{
	public $view;

	public function __construct()
	{
		$this->view = new View("layouts/main");
	}
}