<?php
/**
 * @package doodles
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'The chunk for displaying each row.',
        'type' => 'textfield',
        'options' => '',
        'value' => 'rowTpl',
    ),
    array(
        'name' => 'sort',
        'desc' => 'The field to sort by.',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
    ),
    array(
        'name' => 'dir',
        'desc' => 'The direction to sort by.',
        'type' => 'list',
        'options' => array(
            array('text' => 'ASC','value' => 'ASC'),
            array('text' => 'DESC','value' => 'DESC'),
        ),
        'value' => 'DESC',
    ),
);
return $properties;