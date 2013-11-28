<?php

class PhpExcel extends AppModel {
	
	public $useTable = false;
	
	protected $_PHPExcel = null;
	
	public function __construct($id = false, $table = false, $ds = false) {
		parent::__construct($id, $table, $ds);
		$loaded = App::import('Vendor', 'PHPExcel/Classes/PHPExcel');
		if (!$loaded || !class_exist('PHPExcel'))
			throw new CakeException('Vendor class PHPExcel not found!');
		$this->_PHPExcel = new PHPExcel();
	}
	
	public function load($filePath) {
		$this->_PHPExcel = PHPExcel_IOFactory::load($filePath);
		return $this->_PHPExcel ? true : false;
	}
	
}