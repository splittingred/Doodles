<?php
/**
 * @package doodles
 * @subpackage build
 */
$properties = array(
    array(
        'name' => 'tpl',
        'desc' => 'prop_doodles.tpl_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'rowTpl',
        'lexicon' => 'doodles:properties',
    ),
    array(
        'name' => 'sort',
        'desc' => 'prop_doodles.sort_desc',
        'type' => 'textfield',
        'options' => '',
        'value' => 'name',
        'lexicon' => 'doodles:properties',
    ),
    array(
        'name' => 'dir',
        'desc' => 'prop_doodles.dir_desc',
        'type' => 'list',
        'options' => array(
            array('text' => 'prop_doodles.ascending','value' => 'ASC'),
            array('text' => 'prop_doodles.descending','value' => 'DESC'),
        ),
        'value' => 'DESC',
        'lexicon' => 'doodles:properties',
    ),
);
return $properties;