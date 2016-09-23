<?php
App::uses('AppModel', 'Model');
/**
 * CalendarsFood Model
 *
 * @property Food $Food
 */
class CalendarsFood extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'calendars_food';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';


	// The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Food' => array(
			'className' => 'Food',
			'foreignKey' => 'food_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
