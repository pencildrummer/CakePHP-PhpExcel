<?php

class Excel extends AppModel {
	
	public $useTable = false;
	
	protected $_PHPExcel = null;
	
	public function __construct($id = false, $table = false, $ds = false) {
		parent::__construct($id, $table, $ds);
		$loaded = App::import('Vendor', 'PhpExcel.PHPExcel/Classes/PHPExcel');
		if (!$loaded || !class_exists('PHPExcel'))
			throw new CakeException('Vendor class PHPExcel not found!');
		$this->_PHPExcel = new PHPExcel();
	}
	
	public function __call($name, $args) {
		if (method_exists($this->_PHPExcel, $name)) {
			return call_user_func_array(array($this->_PHPExcel, $name), $args);
		}
	}
	
	public function load($filePath) {
		$this->_PHPExcel = PHPExcel_IOFactory::load($filePath);
		return $this->_PHPExcel ? true : false;
	}
	
	
	
}