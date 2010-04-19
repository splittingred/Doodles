<?php
/**
 * Get a list of Doodles
 *
 * @package doodles
 * @subpackage processors
 */
/* setup default properties */
$isLimit = !empty($_REQUEST['limit']);
$start = $modx->getOption('start',$_REQUEST,0);
$limit = $modx->getOption('limit',$_REQUEST,20);
$sort = $modx->getOption('sort',$_REQUEST,'name');
$dir = $modx->getOption('dir',$_REQUEST,'ASC');
$query = $modx->getOption('query',$_REQUEST,'');

/* build query */
$c = $modx->newQuery('Doodle');

if (!empty($query)) {
    $c->where(array(
        'name:LIKE' => '%'.$query.'%',
    ));
    $c->orCondition(array(
        'description:LIKE' => '%'.$query.'%',
    ));
}

$count = $modx->getCount('Doodle',$c);
$c->sortby($sort,$dir);
if ($isLimit) $c->limit($limit,$start);
$doodles = $modx->getCollection('Doodle', $c);

/* iterate */
$list = array();
foreach ($doodles as $doodle) {
    $doodleArray = $doodle->toArray();

    $doodleArray['menu'] = array();
    $doodleArray['menu'][] = array(
        'text' => 'Update Doodle',
        'handler' => 'this.updateDoodle',
    );
    $doodleArray['menu'][] = '-';
    $doodleArray['menu'][] = array(
        'text' => 'Remove Doodle',
        'handler' => 'this.removeDoodle',
    );

    $list[]= $doodleArray;
}
return $this->outputArray($list,$count);