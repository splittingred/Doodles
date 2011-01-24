<?php
/**
 * Get a list of Doodles
 *
 * @package doodles
 * @subpackage processors
 */
/* setup default properties */
$isLimit = !empty($scriptProperties['limit']);
$start = $modx->getOption('start',$scriptProperties,0);
$limit = $modx->getOption('limit',$scriptProperties,20);
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');
$query = $modx->getOption('query',$scriptProperties,'');

/* build query */
$c = $modx->newQuery('Doodle');

if (!empty($query)) {
    $c->where(array(
        'name:LIKE' => '%'.$query.'%',
        'OR:description:LIKE' => '%'.$query.'%',
    ));
}

$count = $modx->getCount('Doodle',$c);
$c->sortby($sort,$dir);
if ($isLimit) $c->limit($limit,$start);
$doodles = $modx->getIterator('Doodle', $c);

/* iterate */
$list = array();
foreach ($doodles as $doodle) {
    $doodleArray = $doodle->toArray();
    $list[]= $doodleArray;
}
return $this->outputArray($list,$count);