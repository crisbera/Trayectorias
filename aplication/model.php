<?php

class AppModel
{
	public $belongsTo = array();

	public function __construct(){
		if (is_null($this->$belongsTo)) {
			echo "La relación esta vacia";
		}else{
			echo "La relacion no esta vacia";
		}
	}
	protected $_associationKeys = array(
		'belongsTo' => array('className', 'foreignKey', 'conditions', 'fields', 'order', 'counterCache'),
		'hasOne' => array('className', 'foreignKey', 'conditions', 'fields', 'order', 'dependent'),
		'hasMany' => array('className', 'foreignKey', 'conditions', 'fields', 'order', 'limit', 'offset', 'dependent', 'exclusive', 'finderQuery', 'counterQuery'),
		'hasAndBelongsToMany' => array('className', 'joinTable', 'with', 'foreignKey', 'associationForeignKey', 'conditions', 'fields', 'order', 'limit', 'offset', 'unique', 'finderQuery')
	);
}