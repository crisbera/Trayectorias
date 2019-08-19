<?php

class Categoria extends AppModel
{
	public $hasMany = array(
		'Tarea' => array(
			'className' => 'Tarea',
			'foreignKey' => 'categoria_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}