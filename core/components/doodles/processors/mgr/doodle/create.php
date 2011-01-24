<?php
/**
 * @package doodles
 * @subpackage processors
 */

if (empty($scriptProperties['name'])) {
    $modx->error->addField('name',$modx->lexicon('doodles.doodle_err_ns_name'));
} else {
    $alreadyExists = $modx->getObject('Doodle',array('name' => $scriptProperties['name']));
    if ($alreadyExists) {
        $modx->error->addField('name',$modx->lexicon('doodles.doodle_err_ae'));
    }
}


if ($modx->error->hasError()) {
    return $modx->error->failure();
}

$doodle = $modx->newObject('Doodle');
$doodle->fromArray($scriptProperties);

/* save */
if ($doodle->save() == false) {
    return $modx->error->failure($modx->lexicon('doodles.doodle_err_save'));
}


return $modx->error->success('',$doodle);