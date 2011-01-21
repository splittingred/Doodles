<?php
/**
 * @package doodles
 */
$dood = $modx->getService('doodles','Doodles',$modx->getOption('doodles.core_path',null,$modx->getOption('core_path').'components/doodles/').'model/doodles/',$scriptProperties);
if (!($dood instanceof Doodles)) return '';

/* setup default properties */
$tpl = $modx->getOption('tpl',$scriptProperties,'rowTpl');
$sort = $modx->getOption('sort',$scriptProperties,'name');
$dir = $modx->getOption('dir',$scriptProperties,'ASC');

/* build query */
$c = $modx->newQuery('Doodle');
$c->sortby($sort,$dir);
$doodles = $modx->getCollection('Doodle',$c);

/* iterate */
$output = '';
foreach ($doodles as $doodle) {
    $doodleArray = $doodle->toArray();
    $output .= $dood->getChunk($tpl,$doodleArray);
}

return $output;